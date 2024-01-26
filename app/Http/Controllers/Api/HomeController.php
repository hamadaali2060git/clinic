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

use DateTime;
use App\Traits\ImageUploadTrait;

class HomeController extends Controller
{
    use GeneralTrait;
    use ImageUploadTrait;

    public function home(Request $request)
    {    
        $categotries = Category::selection()->get();   
        $articles = Article::selection()->get(); 
        $sliders = Slider::get(); 
        $data  =[  
            // 'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
            // 'previous_appointments'=>AppointmentResource::collection($previous_appointments),
            'sliders'=>SliderResource::collection($sliders),
            'categotries'=> CategoryResource::collection($categotries),
            'articles'=>   ArticleResource::collection($articles),
            
        ];
        return $this -> returnDataa(
            'data',$data,''
        );
    }
    public function categotries(Request $request)
    {    
        $categotries = Category::selection()->get(); 
        return $this -> returnDataa(
            'data', CategoryResource::collection($categotries),''
        );
    }
    public function articles(Request $request)
    {    
        $articles = Article::selection()->get();   
        return $this -> returnDataa(
            'data', ArticleResource::collection($articles),''
        );
    }
    public function patientWorkDays(Request $request)
    {   
        $day_name = Carbon::parse($request->date)->format('l');
        $day =Day::where("name" ,$day_name)->first();
        $work_day =WorkDay::selection()
                        ->with('days')
                        ->with('worktimes')
                        ->where("day_id" ,$day->id)->first();
        $doctor = User::where('type','doctor')->first();
        $patients = User::where('type','patient')->count();
        $reviews = Review::count();
        $data  =[  
            'work_day'=>$work_day,
            'doctor'=>new DoctorResource($doctor),
            'count_patients'=>$patients,
            'count_reviews'=>$reviews,
            'rate'=>2,
            'price'=>20,

        ]; 
        return $this -> returnDataa('data',$data,''); 
    }
    public function bookAppointment(Request $request)
    {
        // dd($request->all());
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $check_appointment = Appointment::where("date" , $request->date)
                                    ->where("time" , $request->time)->first();
        if($check_appointment){
            return $this->returnError('تم حجز الموعد مسبقا');
        }
        $add = new Appointment();
        $add->user_id  = $user->id;
        // $add->category_id  = $request->category_id;
        $add->work_day_id  = $request->work_day_id;
        $add->date  = $request->date;
        $add->time  = $request->time;
        $add->price  = $request->price;
        // $add->type  = $request->type;


        // $todayDate = date("Y-m-d");
        //     $time = new DateTime();
        //     $time->modify('+3 hours');
        //     $add->date  = $todayDate;
        //     $add->time  = $time->format("H:i");

        $add->save();
       




        return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function patientAppointments(Request $request)
    {    
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $upcoming_appointments = Appointment::with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->where("user_id" ,$user->id)
                            ->orderBy('id', 'DESC')->get();
        $previous_appointments = Appointment::with('user_appointment')
                    ->with('workdays')
                    ->where("status" ,'expired')
                    ->where("user_id" ,$user->id)
                    ->orderBy('id', 'DESC')->get();
        
        
        $data  =[  
            'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
            'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        ];
        return $this -> returnDataa(
            'data',$data,''
        );
        
    }
     public function addRecord(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $file_redocd = $this->upload($request, 'image', 'img/records');
        $add = new Record;
        $add->user_id    = $user->id;
        $add->url    = $file_redocd;
        $add->name   = $request->name;
        $add->save();
        return redirect()->back()->with("message",'تمت الإضافة بنجاح'); 
    }
    public function patientRecords(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
        $records = Record::where("user_id" , $user->id)->get();  
        return $this -> returnDataa('data',RecordResource::collection($records),''); 
    }

## end   

## start  doctor
    public function patientProfile(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $diagnosis = Diagnos::where('user_id',$request->user_id)->get();
        
        $data  =[  
            'user'=>new UserResource($user),
            'diagnosis'=>$diagnosis
            // 'count_reviews'=>$reviews,
           

        ]; 
        return $this -> returnDataa('data',$data,''); 
    }
    public function addWorkDays(Request $request)
    {
        // dd($request->all());
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
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
            return $this->returnError('يجب تسجيل الدخول أولا');
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
            return $this->returnError('يجب تسجيل الدخول أولا');
        $work_day =WorkDay::selection()->with('days')->with('worktimes')->get();
        return $this -> returnDataa(
            'data',$work_day,''
        ); 
    }
    
    public function doctorAppointments(Request $request)
    {    
        $upcoming_appointments = Appointment::with('categories')
                            ->with('user_appointment')
                            ->with('workdays')
                            ->where("status" ,'pending')
                            ->orderBy('id', 'DESC')->get();
        $previous_appointments = Appointment::with('categories')
                    ->with('user_appointment')
                    ->with('workdays')
                    ->where("status" ,'expired')
                    ->orderBy('id', 'DESC')->get();
        
        
        $data  =[  
            'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
            'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        ];
        return $this -> returnDataa(
            'data',$data,''
        );
        
    }
   
    
    public function doctorRecords(Request $request)
    {
        $records = Record::where("user_id" , $request->user_id)->get();   
        return $this -> returnDataa('data',RecordResource::collection($records),''); 
    }
   
   
    
    public function settings(Request $request)
    {    
        $settings = Setting::selection()->first(); 
        
        return $this -> returnDataa(
            'data',new SettingResource($settings),''
        );
    }
    

    
   
    
   
}
