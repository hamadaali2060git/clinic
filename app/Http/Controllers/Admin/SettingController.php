<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Traits\ImageUploadTrait;

class SettingController extends Controller
{
    use ImageUploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        $doctor=User::where('type','doctor')->first();
        $settings=Setting::first();
        return view('admin.settings.edit',compact('settings','doctor'));
    }

    public function updateProfile(Request $request)
    {
        $edit = User::find($request->id);
        // dd($request->all());
        if($request->photo)
        {
          $file_name = $this->upload($request, 'photo', 'img/profiles');
          if($file_name){
            File::delete(public_path("img/profiles/". $edit->photo));
            $edit->photo=$file_name;
          }

        }else{
          $edit->photo  = $edit->photo;
        }

        $edit->first_name    = $request->first_name;
        $edit->last_name  = $request->last_name;
        $edit->mobile    = $request->mobile;
        $edit->experience  = $request->experience;
        $edit->bio  = $request->bio;
        $edit->detail  = $request->detail;


        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }



    public function updateSettings(Request $request)
    {
        $edit = Setting::first();
        // dd($request->all());
        if($request->logo)
        {
          $file_name1 = $this->upload($request, 'logo', 'img/settings');
          if($file_name1){
            File::delete(public_path("img/settings/". $edit->logo));
            $edit->logo=$file_name1;
          }
        }else{
          $edit->logo  = $edit->logo;
        }
        if($request->image)
        {
          $file_name2 = $this->upload($request, 'image', 'img/settings');
          if($file_name2){
            File::delete(public_path("img/settings/". $edit->image));
            $edit->image=$file_name2;
          }

        }else{
          $edit->image  = $edit->image;
        }
        if($request->favicon)
        {
          $file_name3 = $this->upload($request, 'favicon', 'img/settings');
          if($file_name3){
            File::delete(public_path("img/settings/". $edit->favicon));
            $edit->favicon=$file_name3;
          }
        }else{
          $edit->favicon  = $edit->favicon;
        }

        $edit->name = $request->name;
        $edit->title_ar = $request->title_ar;
        $edit->title_en = $request->title_en;
        $edit->mail  = $request->mail;
        $edit->phone  = $request->phone;
        $edit->desc_ar = $request->desc_ar;
        $edit->desc_en = $request->desc_en;
        $edit->privacy_ar = $request->privacy_ar;
        $edit->privacy_en = $request->privacy_en;


        $edit->save();
        return back()->with("success", 'تم التحديث ');
    }

    public function updateSettingPrice(Request $request)
    {
         // $userId = 1;
        $edit = Setting::first();
         if(isset($request->price)){
             $edit->price  = $request->price;
         }else{
             $edit->price  = $edit->price;
         }
         $edit->save();

        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function allAdminVideo()
    {
        $admin_videos=Admin_Video::get();
        return view('admin.settings.all_video',compact('admin_videos'));
    }
    public function addAdminVideo(Request $request)
    {
        $this->validate($request, [
            'url'     => 'required',
            'title'     => 'required',
        ]);
        $add = new Admin_Video;
        // if($file=$request->file('url'))
        // {
        //     $file_extension = $request -> file('url') -> getClientOriginalExtension();
        //     $file_name = time().'.'.$file_extension;
        //     $file_nameone = $file_name;
        //     $path = 'assets_admin/img/settings/video';
        //     $request-> file('url') ->move($path,$file_name);
        //     $add->url  = $file_name;
        // }
        $add->url = $request->url;
        $add->title  = $request->title;
        $add->save();

        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function deleteAdminVideo(Request $request)
    {
        // dd($request->id);
        $delete_video = Admin_Video::find($request->id);
        $delete_video->delete();
        return back()->with("message",'تم الحذف بنجاح');
    }
    public function updatePrivacy(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->privacy_ar  = $request->privacy_ar;
        $edit->privacy_en  = $request->privacy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateAgreement(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->agreements_ar  = $request->agreements_ar;
         $edit->agreements_en  = $request->agreements_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function agreement_student()
    {
        $contactInfo=ContactInfo::first();
        return view('admin.settings.agreement_student',compact('contactInfo'));
    }
    public function updateAgreement_student(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->agreements_student_ar  = $request->agreements_student_ar;
         $edit->agreements_student_en  = $request->agreements_student_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateTerms(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->terms_ar  = $request->terms_ar;
         $edit->terms_en  = $request->terms_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }


     public function updateReturn_policy(Request $request)
    {
        $edit = ContactInfo::first();
        // dd('csdsd');
        $edit->return_policy_ar  = $request->return_policy_ar;
        $edit->return_policy_en  = $request->return_policy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateCancellationPolicy(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->cancellation_policy_ar  = $request->cancellation_policy_ar;
        $edit->cancellation_policy_en  = $request->cancellation_policy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function updateDeliveryPolicy(Request $request)
    {
        // dd('ffff');
        $edit = ContactInfo::first();
         $edit->delivery_ar  = $request->delivery_ar;
         $edit->delivery_en  = $request->delivery_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function certificatePrice()
    {
        $contactInfo=ContactInfo::first();
        return view('admin.settings.certificate',compact('contactInfo'));
    }
    public function updateCertificatePrice(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->certificate_price  = $request->certificate_price;
        $edit->live_certificate  = $request->live_certificate;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function changePassword(Request $request){
        $user=Auth::user();
        $this->validate($request, [
            'current-password'     => 'required',
            'new-password'     => 'required',
            // 'confirm_password' => 'required|same:new_password',
        ]);
        // dd('ugutg');
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            return redirect()->back()->with("error","كلمة المرور الحالية لا تتطابق مع كلمة المرور التي قدمتها. حاول مرة اخرى.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","لا يمكن أن تكون كلمة المرور الجديدة هي نفسها كلمة مرورك الحالية. الرجاء اختيار كلمة مرور مختلفة.");
        }

        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("message","تم تغيير الرقم السري بنجاح !");
    }
}
