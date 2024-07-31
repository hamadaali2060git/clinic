<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Str;

use DB;
use Hash;
use Mail;
use Crypt;
use Session;
use App\City;
use App\Category;
use App\Article;
use App\Record;
use App\Day;
use App\User;
use App\Setting;
use App\Appointment;
use App\Slider;
use Carbon\Carbon;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\RecordResource;


use App\Review;
use App\WorkDay;
use App\WorkTime;
use App\Diagnos;
use App\Reminder;
use App\Notification;

use DateTime;
use App\Traits\ImageUploadTrait;

class HomeController extends Controller
{
    use GeneralTrait;
    use ImageUploadTrait;


    public function home(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $categotries = Category::selection()->orderBy('id', 'DESC')->get();
        $articles = Article::selection()->orderBy('id', 'DESC')->get();;
        $sliders = Slider::get();

        if($user){
            $notifications = Notification::where('user_id',$user->id)->where('seen','notseen')->count();
        }else{
            $notifications=0;
        }
        $data  =[
            // 'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
            // 'previous_appointments'=>AppointmentResource::collection($previous_appointments),
            'sliders'=>SliderResource::collection($sliders),
            'categotries'=> CategoryResource::collection($categotries),
            'articles'=>   ArticleResource::collection($articles),
            'notifications'=>$notifications
        ];
        return $this -> returnDataa(
            'data',$data,''
        );
    }
    public function notifications(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $notifications = Notification::where('user_id',$user->id)->get();
        foreach ($notifications as $item) {
            $item->date = Carbon::parse($item->created_at)->format('Y-m-d');
            $item->time = Carbon::parse($item->created_at)->format('H:i:s');

             $edit = Notification::findOrFail($item->id);
            $edit->seen   = 'seen';
            $edit->save();
        }
        return $this -> returnDataa(
            'data',$notifications,''
        );
    }
    public function categotries(Request $request)
    {
        $categotries = Category::selection()->get();
        // return CategoryResource::collection($categotries);
        return $this -> returnDataa(
            'data', CategoryResource::collection($categotries),''
        );
    }
    public function articles(Request $request)
    {
        $search = $request->get('title');
        if($search){
            $articles = Article::selection()->where('title_ar', 'like', "%{$search}%")
                 ->orWhere('title_en', 'like', "%{$search}%")
                 ->orderBy('id', 'DESC')->paginate(10);
        }else{
             $articles = Article::selection()->orderBy('id', 'DESC')->paginate(10);

        }
        return ArticleResource::collection($articles);
        // return $this -> returnDataa(
        //     'data', ArticleResource::collection($articles),''
        // );
    }
    public function patientWorkDays(Request $request)
    {
       
       
        $day_name = Carbon::parse($request->date)->format('l');
        $day =Day::where("name" ,$day_name)->first();
        $work_day =WorkDay::selection()
                        ->with('days')
                        ->with('worktimes')
                        ->where("day_id" ,$day->id)->first();
        $doctor = User::selection()->where('type','doctor')->first();
        $patients = User::where('type','patient')->count();
        $reviews = Review::count();
        $settings_price = Setting::first();
        $data  =[
            'work_day'=>$work_day,
            'doctor'=>new DoctorResource($doctor),
            'count_patients'=>$patients,
            'count_reviews'=>$reviews,
            'rate'=>2,
            'price'=>$settings_price->price,

        ];
        return $this -> returnDataa('data',$data,'');
    }
    public function bookAppointment(Request $request)
    {
        // dd($request->all());
        
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $check_appointment = Appointment::where("date" , $request->date)
                                    ->where("time" , $request->time)->first();
        if($check_appointment){
            return $this->returnError('تم حجز الموعد مسبقا');
        }
        $patient_appointment = Appointment::where("date" , $request->date)
                                    ->where("user_id" , $user->id)->first();
        if($patient_appointment){
            return $this->returnError('لديك موعد بالفعل في هذا اليوم');
        }
        $add = new Appointment();
        $add->user_id  = $user->id;
        // $add->category_id  = $request->category_id;
        $add->work_day_id  = $request->work_day_id;
        $add->date  = $request->date;
        $add->time  = $request->time;
        $add->price  = $request->price;
        $add->save();

        $SERVER_API_KEY = 'AAAAgxL_CwE:APA91bGbFh7hhGG0uM6oGdoLkkg5f8E03vg3ohKClBcNxSX0lIg5eF0RCLxlkyhnrB4rGf1F9B5sZs3YyO5fmPLeVLJMTz3tRomuHWwIgqP1PE0g02H7iIWv26sombTOrVOb-FGUbONH';
            $doctor = User::where('type','doctor')->first();
            $token_1 = $doctor->device_token;
            $message='' ;
            if($request->header('lang') == 'en' ){
                $message= 'An appointment has been booked ';
            }else{
                $message='تم حجز موعد';
            }
            $data = [
                "registration_ids" => [
                    $token_1
                ],
                "notification" => [
                    "title" => 'DR Ehab Abu Marar',
                    "body" => $message,
                    "sound"=> "default" // required for sound on ios
                ],
            ];

            $dataString = json_encode($data);
            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $response = curl_exec($ch);


            $add = new Notification();
            $add->user_id  = $doctor->id;

            $add->message  = $message;
            $add->date   = Carbon::now()->format('d-m-Y');
            $add->time   = Carbon::now()->format('H:i:s');
            $add->save();




        return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function patientUpcomingAppointments(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $appointments_pending = Appointment::with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->where("user_id" ,$user->id)
                            ->orderBy('id', 'DESC')->paginate(10);
        $appointments_accept = Appointment::with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'accept')
                            ->where("user_id" ,$user->id)
                            ->orderBy('id', 'DESC')->paginate(10);
        $upcoming_appointments = $appointments_pending->merge($appointments_accept);



        return AppointmentResource::collection($upcoming_appointments);
        // $data  =[
        //     'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
        //     'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        // ];
        // return $this -> returnDataa(
        //     'data',$data,''
        // );

    }
    public function patientPreviousAppointments(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');

        $appointments_expired = Appointment::with('user_appointment')
                    ->with('workdays')
                    ->with('reviews')
                    ->where("status" ,'expired')
                    ->where("user_id" ,$user->id)
                    ->orderBy('id', 'DESC')->paginate(10);
        $appointments_cancel = Appointment::with('user_appointment')
                    ->with('workdays')
                    ->with('reviews')
                    ->where("status" ,'cancel')
                    ->where("user_id" ,$user->id)
                    ->orderBy('id', 'DESC')->paginate(10);
        $previous_appointments = $appointments_expired->merge($appointments_cancel);

        return AppointmentResource::collection($previous_appointments);
        // $data  =[
        //     'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
        //     'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        // ];
        // return $this -> returnDataa(
        //     'data',$data,''
        // );

    }
     public function addReview(Request $request)
    {
        // return response()->json([ 'status_message' => 'Unauthorised'], 401);
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $check_review = Review::where("appointment_id" , $request->appointment_id)->first();
        if($check_review){
            return $this->returnError('تم التقييم مسبقا');
        }
        $add = new Review;
        $add->user_id    = $user->id;
        $add->appointment_id    = $request->appointment_id;
        $add->rate   = $request->rate;
        $add->comment   = $request->comment;
        $add->date   = Carbon::now()->format('d-m-Y');
        $add->time   = Carbon::now()->format('H:i:s');
        $add->save();
        // return $this -> returnSuccessMessage('تم الإضافة');
        return $this -> returnDataa('data',$add,'تم الاضافة');
    }
    public function editReview(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $edit = Review::findOrFail($request->id);
        $edit->rate   = $request->rate;
        $edit->comment   = $request->comment;
        $edit->date   = Carbon::now()->format('d-m-Y');
        $edit->time   = Carbon::now()->format('H:i:s');
        $edit->save();
        // return $this -> returnSuccessMessage('تم التعديل');
        return $this -> returnDataa('data',$edit,'تم التعديل');
    }
    
    public function removeAcount(Request $request){
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $delete = User::find($user->id);
        $delete->delete();
        return $this -> returnSuccessMessage('Deleted Successfully');

    }
    public function removeReview(Request $request){
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $review = Review::find($request->id);
        $review->delete();
        return $this -> returnSuccessMessage('Deleted Successfully');

    }
    public function addRecord(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $file_redocd = $this->upload($request, 'file', 'img/records');
        $add = new Record;
        $add->user_id    = $user->id;
        $add->url    = $file_redocd;
        $add->name   = $request->name;
        $add->date   = Carbon::now()->format('d-m-Y');
        $add->time   = Carbon::now()->format('H:i:s');
        $add->day   =Carbon::now()->format('l');
        $add->save();
        // return $this -> returnSuccessMessage('تم الإضافة');
        return $this -> returnDataa('data',new RecordResource($add),'تم الاضافة');
    }
    public function patientRecords(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $records = Record::where("user_id" , $user->id)->orderBy('id', 'DESC')->paginate(10);
        return RecordResource::collection($records);
        // return $this -> returnDataa('data',RecordResource::collection($records),'');
    }

## end

## start  doctor
    public function patients(Request $request)
    {
        $search = $request->get('name');
        if($search){
            $user = User::where('first_name', 'like', "%{$search}%")
                 ->orWhere('last_name', 'like', "%{$search}%")
                 ->orderBy('id', 'DESC')->paginate(10);
        }else{
            $user = User::where('type','patient')->orderBy('id', 'DESC')->paginate(10);
        }
        return UserResource::collection($user);
        // return $this -> returnDataa('data',UserResource::collection($user),'');
    }
    public function patientProfile(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $diagnosis = Diagnos::with('categories')->where('user_id',$request->user_id)->orderBy('id', 'DESC')->take(10)->get();
        $diagnosis_total = Diagnos::where('user_id',$request->user_id)->count();
        $records_total= Record::where("user_id" , $request->user_id)->count();
        $data  =[
            'user'=>new UserResource($user),
            'diagnosis'=>$diagnosis,
            'diagnosis_total'=>$diagnosis_total,
            'records_total'=>$records_total,
        ];
        return $this -> returnDataa('data',$data,'');
    }
    public function diagnosis(Request $request)
    {
        $diagnosis = Diagnos::with('categories')->where('user_id',$request->user_id)->orderBy('id', 'DESC')->paginate(10);
        return $this -> returnDataa('data',$diagnosis,'');
    }
    public function addWorkDays(Request $request)
    {
        // dd($request->all());
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $add = new WorkDay();
        $add->day_id  = $request->day_id;
        $add->save();
        $length = count($request->times);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $add_lecture = new WorkTime;
                $add_lecture->work_day_id    = $add->id;
                $add_lecture->time    = $request->times[$i]['time'];
                $add_lecture->type    = $request->times[$i]['type'];

                $add_lecture->save();


            }

        }
        return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function editWorkDays(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $work_times= WorkTime::where('work_day_id',$request->work_day_id)->get();
        foreach ($work_times as $item) {
            // $delete_course = Courses_joined::findOrFail($item->id);
            $item->delete();
        }
        $length = count($request->times);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $add_lecture = new WorkTime;
                $add_lecture->work_day_id    = $request->work_day_id;
                $add_lecture->time    = $request->times[$i]['time'];
                $add_lecture->type    = $request->times[$i]['type'];
                $add_lecture->save();
            }
        }
        return $this -> returnSuccessMessage('تم التعديل بنجاح');
    }
    public function doctorWorkDays(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $work_day =WorkDay::selection()->with('days')->with('worktimes')->get();
        return $this -> returnDataa(
            'data',$work_day,''
        );
    }

    public function doctorUpcomingAppointments(Request $request)
    {
        $search = $request->get('name');
        if($search){
            $user = User::where('name', 'like', "%{$search}%")->first();

            $upcoming_pending = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->where("user_id" ,$user->id)
                            ->orderBy('id', 'DESC')->paginate(10);
            $upcoming_accept = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'accept')
                            ->where("user_id" ,$user->id)
                            ->orderBy('id', 'DESC')->paginate(10);

            $upcoming_appointments = $upcoming_pending->merge($upcoming_accept);
        }else{
            $upcoming_pending = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->orderBy('id', 'DESC')->paginate(10);
            
            $upcoming_accept = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'accept')
                            ->orderBy('id', 'DESC')->paginate(10);
            
            $upcoming_appointments = $upcoming_pending->merge($upcoming_accept);
        }
        return AppointmentResource::collection($upcoming_appointments);
        // $data  =[
        //     'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
        //     'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        // ];
        // return $this -> returnDataa(
        //     'data',$data,''
        // );

    }
    public function doctorPreviousAppointments(Request $request)
    {

       $search = $request->get('name');
        if($search){
            $user = User::where('name', 'like', "%{$search}%")->first();
            $appointments_expired = Appointment::with('categories')
                    ->with('user_appointment')
                    ->with('reviews')
                    ->with('workdays')
                    ->where("status" ,'expired')
                    ->where("user_id" ,$user->id)
                    ->orderBy('id', 'DESC')->paginate(10);
            $appointments_cancel = Appointment::with('categories')
                    ->with('user_appointment')
                    ->with('reviews')
                    ->with('workdays')
                    ->where("status" ,'cancel')
                    ->where("user_id" ,$user->id)
                    ->orderBy('id', 'DESC')->paginate(10);
            $previous_appointments = $appointments_expired->merge($appointments_cancel);
        }else{
            $appointments_expired = Appointment::with('categories')
                    ->with('user_appointment')
                    ->with('reviews')
                    ->with('workdays')
                    ->where("status" ,'expired')
                    ->orderBy('id', 'DESC')->paginate(10);
            $appointments_cancel = Appointment::with('categories')
                    ->with('user_appointment')
                    ->with('reviews')
                    ->with('workdays')
                    ->where("status" ,'cancel')
                    ->orderBy('id', 'DESC')->paginate(10);
            $previous_appointments = $appointments_expired->merge($appointments_cancel);
        }
        return AppointmentResource::collection($previous_appointments);
        // $data  =[
        //     'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
        //     'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        // ];
        // return $this -> returnDataa(
        //     'data',$data,''
        // );

    }


    public function doctorRecords(Request $request)
    {
        $records = Record::where("user_id" , $request->user_id)->orderBy('id', 'DESC')->paginate(10);
        return RecordResource::collection($records);
        // return $this -> returnDataa('data',RecordResource::collection($records),'');
    }

    public function addDiagnos(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');

        $add = new Diagnos;
        $add->user_id    = $request->user_id;
        $add->category_id    = $request->category_id;
        $add->medicine   = $request->medicine;
        $add->note   = $request->note;
        $add->date   = Carbon::now()->format('d-m-Y');
        $add->time   = Carbon::now()->format('H:i:s');
        $add->save();
        $diagnosis = Diagnos::with('categories')->where('id',$add->id)->first();

        return $this -> returnDataa('data',$diagnosis,'تم الاضافة');
        // return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function editDiagnos(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $edit = Diagnos::findOrFail($request->id);
        $edit->category_id    = $request->category_id;
        $edit->medicine   = $request->medicine;
        $edit->note   = $request->note;
        $edit->date   = Carbon::now()->format('d-m-Y');
        $edit->time   = Carbon::now()->format('H:i:s');
        $edit->save();
        $diagnosis = Diagnos::with('categories')->where('id',$edit->id)->first();

        return $this -> returnDataa('data',$diagnosis,'تم التعديل');
        // return $this -> returnSuccessMessage('تم التعديل');
    }
    public function updateStatus(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
          return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $edit = Appointment::findOrFail($request->id);
        $edit->status = $request->status;
        $edit->save();
        $appointments = Appointment::with('categories')
                ->with('user_appointment')
                ->with('reviews')
                ->with('workdays')
                ->where("id" ,$request->id)
                ->first();

        // return $this -> returnSuccessMessage('تم التعديل');
        return $this -> returnDataa('data',new AppointmentResource($appointments),'تم التعديل');
    }

    public function settings(Request $request)
    {
        $settings = Setting::selection()->first();

        return $this -> returnDataa(
            'data',new SettingResource($settings),''
        );
    }
    public function reminders(Request $request)
    {
        $reminders = Reminder::orderBy('id', 'DESC')->paginate(10);
        return $this -> returnDataa('data',$reminders,'');
    }
    public function addReminder(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');

        $add = new Reminder;
        $add->title    = $request->title;
        $add->medicine    = $request->medicine;
        $add->dosage   = $request->dosage;
        $add->timings   = $request->timings;
        $add->day   = $request->day;
        $add->duration   = $request->duration;
        $add->save();

        return $this -> returnDataa('data',$add,'تم الاضافة');
        // return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function editReminder(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $edit = Reminder::findOrFail($request->id);
        $edit->title    = $request->title;
        $edit->medicine    = $request->medicine;
        $edit->dosage   = $request->dosage;
        $edit->timings   = $request->timings;
        $edit->day   = $request->day;
        $edit->duration   = $request->duration;
        $edit->save();

        return $this -> returnDataa('data',$edit,'تم التعديل');
        // return $this -> returnSuccessMessage('تم التعديل');
    }
    public function removeReminder(Request $request){
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $delete = Reminder::find($request->id);
        $delete->delete();
        return $this -> returnSuccessMessage('Deleted Successfully');

    }
    public function NotificationStatus(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
          return $this->returnError('يجب تسجيل الدخول أولا','','401');
        $edit = User::findOrFail($user->id);
        $edit->notificationـstatus = $request->notificationـstatus;
        $edit->save();
        return $this -> returnSuccessMessage('تم التعديل');
    }

}
