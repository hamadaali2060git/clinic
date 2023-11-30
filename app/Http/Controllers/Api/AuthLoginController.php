<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use DB;
use Hash;
use Mail;
use Crypt;
use Session;

use App\User;
use Illuminate\Support\Str;

class AuthLoginController extends Controller
{
    use GeneralTrait;
    public function LoginUser(request $request)
    {
        
        $rules = [
            "phone" => "required",
            "password" => "required",
            // "device_token" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        // $messages = [
        //     'phone.required'=>' رقم الهاتف مطلوب ويجب ان يكون ارقام فقط ',  
        //     'phone.regex'=>' يجب أن يكون ارقام فقط ',
        //     'password' => 'صخقهبتخهقتبق',
        // ];
        // $validator = Validator::make($request->all(), [
        //     'phone' => 'required|regex:/[0-9]/',
        //     'password'=>'required',
        // ], $messages);
        // if($validator->fails()) {
        //     return response()->json([$validator->errors(), 401]);
        // }
        $phone  = '00964'.''.$request->phone;
        $user = User::where("phone" ,$phone)->first();
        if(!$user) {
            return $this -> returnError('','رقم الهاتف غير صحيح');
        }else{
            $request->merge(['email' => $user->email]);
            $credentials = $request->only(['email','password']);
            $token =  Auth::guard('user-api') -> attempt($credentials);
            if(!$token)
                if(isset($request->lang)  && $request -> lang == 'en' ){
                    return $this -> returnError('','The password is incorrect');
                }else{
                    return $this -> returnError('','كلمة المرور غير صحيحة');
                }
                
            // $user = User::where("email" , $request->email)->first();
            $user->token=$token;
            // $user->device_token=$request->device_token;

            $user->save();
            $user->photo= "https://elnamat.com/poems/araqi/img/profiles/".$user->photo;
        }
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnDataa('data',$user,'Logged in successfully');   
        }else{
            return $this -> returnDataa('data',$user,'تم تسجيل الدخول بنجاح');  
        }
       
        // return response()->json(['success' => 'تم تسجيل الدخول بنجاح','data' =>$user]); 
    }

    
    public function registerNewUser(Request $request)
    {
        $rules = [
            "name" => "required",
            "phone" => "required",
            "password" => "required",
            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        // $count=count($request->phone);
        $result = strlen($request->phone);
    
        if($result !=10)
            return $this -> returnError('','ادخل الرقم المحلي');
        // $phone  = '009647715173456';
        $phone  = '00964'.''.$request->phone;
        $checkemail = User::where("phone" , $phone)->first();
        if($checkemail){
                 return $this -> returnError('','رقم الهاتف موجود مسبقا');
        }else{
            $add = new User();
            $add->name  = $request->name;
            $add->phone  = $phone;
            $add->email  = $request->name.''.$request->phone.'@araqi.com';
            $add->password = Hash::make($request->password);
            $add->save();
        }
        // vdfivudf,1.1ofjervsFG
        // 7715173456
        // 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d
        // 3a31d1e0ffmsh71573524061764ap1cac3bjsn2227725c1418
        // 5e6e9907f8mshc0ea527ce2cce55p1b58afjsn75c80045b190
        // 939b6204a3mshc7808b3458c9900p13c103jsnbb1c18e1a487
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-request-otp",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "phone=". $phone ."&country=EG&message=Your%20OTP%3A%20*%7Bcode%7D*%20-%20You%20have%20*5%20minutes*%20to%20enter%20this%20code",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
                    "X-RapidAPI-Key: 3a31d1e0ffmsh71573524061764ap1cac3bjsn2227725c1418",
                    "content-type: application/x-www-form-urlencoded"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if($err) {
                // echo "cURL Error #:" . $err;
                if ($err ) {
                    return $this -> returnError('',$err); 
                }
            } else {
                $to_obj = json_decode($response);
                 // dd($to_obj);
            }

            // dd($to_obj);
            // return $to_obj->message;
            if($to_obj->message=="You have exceeded the DAILY quota for Request OTP on your current plan, BASIC. Upgrade your plan at https://rapidapi.com/ptwebsolution/api/whatsapp-otp-verification") {
                return $this -> returnError('',$to_obj->message); 
            }else{
                if($to_obj->success ==false){
                    return $this -> returnError('',$to_obj->message);
                }else{
                    $home  = [  
                        'user'=>$add,
                        'code_response'=>$to_obj,
                    ];
                    if(isset($request->lang)  && $request -> lang == 'en' ){
                        return $this -> returnDataa('data',$home,'The code has been sent');  
                    }else{
                        return $this -> returnDataa('data',$home,'تم إرسال الرمز');  
                    }
                    
                }
            }

            
        // return response()->json(['success' => 'تم إرسال كود التفعيل','data' =>$add,'code_response'=>$to_obj]); 

    }
    public function verifyRegisterCode(Request $request)
    {
        $rules = [
            "phone" => "required",
            "verify_code" => "required",
            "device_token" => "required",
            "results" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }


        // $messages = [
        //     'verify_code.required'=>'كود التفعيل مطلوب',   
        // ];
        // $validator = Validator::make($request->all(), [
        //     'verify_code' => 'required',
        // ], $messages);
        // if ($validator->fails()) {
        //     return response()->json(['error' => 'كود التفعيل مطلوب', 401]);
        // }

        $user = User::where("phone" ,$request->phone)->first();
        if(!$user) 
            
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnError('','Phone number is incorrect');
            }else{
                return $this -> returnError('','رقم الهاتف غير صحيح');
            }
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-verify-otp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "requestId=".$request->results."&otp=". $request->verify_code,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
                "X-RapidAPI-Key: 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $to_obj = json_decode($response);
        }
       
        $token = Str::random(60).''.Str::random(60);
        $user->token=$token;
        $user->device_token=$request->device_token;
        $user->save();
        Auth::login($user);
        

        // $home  = [  
        //     'user'=>$user,
        //     'code_response'=>$to_obj,
        // ];
        // return $this -> returnDataa('data',$home,'تم التسجيل  بنجاح');  

        if($to_obj->success ==false){
                return $this -> returnError('',$to_obj->message);
        }else{
            $token = Str::random(60).''.Str::random(60);
            $user->token=$token;
            $user->device_token=$request->device_token;
            $user->save();
            $user->photo= "https://elnamat.com/poems/araqi/img/profiles/".$user->photo;
            Auth::login($user);
            $home  = [  
                'user'=>$user,
                'code_response'=>$to_obj,
            ];
            
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnDataa('data',$home,'successfully registered');
            }else{
                return $this -> returnDataa('data',$home,'تم التسجيل  بنجاح');
            }
        }






        // return response()->json(['success' => 'تم التسجيل  بنجاح','data' =>$user,'code_response'=>$to_obj]); 
    }
    public function forgetPassword(Request $request)
    {
        $rules = [
            'phone' => 'required|regex:/[0-9]/'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }else {
            try {
                $user= User::where("phone" ,$request->phone)->first();
                if(!$user){
                    if(isset($request->lang)  && $request -> lang == 'en' ){
                        return $this -> returnError('phone was not found');
                    }else{
                        return $this -> returnError('رقم الهاتف غير موجود');
                    }
                }else{
                    $curl = curl_init();
                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-request-otp",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "phone=". $request->phone ."&country=EG&message=Your%20OTP%3A%20*%7Bcode%7D*%20-%20You%20have%20*5%20minutes*%20to%20enter%20this%20code",
                        CURLOPT_HTTPHEADER => [
                            "X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
                            "X-RapidAPI-Key: 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d",
                            "content-type: application/x-www-form-urlencoded"
                        ],
                    ]);
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $to_obj = json_decode($response);
                    }


                    if($to_obj->success ==false){
                        return $this -> returnError('',$to_obj->message);
                    }else{
                        $home  = [  
                            'user'=>$add,
                            'code_response'=>$to_obj,
                        ];
                        
                        if(isset($request->lang)  && $request -> lang == 'en' ){
                            return $this -> returnDataa('data',$to_obj,'The code has been sent'); 
                        }else{
                            return $this -> returnError('رقم الهاتف غير موجود');
                        }
                    }


                     // return response()->json(['success' => 'تم ارسال كود التفعيل','code_response'=>$to_obj]); 
                }
            } catch (\Swift_TransportException $ex) {
                   $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            } catch (Exception $ex) {
                   $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            }
        }
        // return \Response::json('doneeeee');
    }
    public function verifyPassword(Request $request)
    {
        $rules = [
            "phone" => "required",
            "verify_code" => "required",
            "results" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://whatsapp-otp-verification.p.rapidapi.com/auth/client-verify-otp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "requestId=".$request->results."&otp=". $request->verify_code,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: whatsapp-otp-verification.p.rapidapi.com",
                "X-RapidAPI-Key: 7e840e8ec9mshe876dabeed464d0p1d8bccjsneb6d367c8e0d",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $to_obj = json_decode($response);
        }


        if($to_obj->success ==false){
            return $this -> returnError('',$to_obj->message);
        }else{
            $home  = [  
                'user'=>$add,
                    'code_response'=>$to_obj,
            ];
            
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnDataa('data',$to_obj,'The code has been sent'); 
            }else{
                return $this -> returnError('رقم الهاتف غير موجود');
            } 
        }

        // return $this -> returnDataa('data',$to_obj,'تم ارسال الرمز');  
        // return response()->json(['success' => 'تم التسجيل  بنجاح','code_response'=>$to_obj]); 
    }
    public function resetUserPasswordPost(Request $request)
    {
        // $messages = [
        //      'password.required'=>'New password',
        //           'password.min'=>'No less than three letters and numbers',
        //           'password_confirmation.required'=>' Confirm the password',  
        // ];
        // $validator = Validator::make($request->all(), [
        //     'password' => 'required|string|min:3|confirmed',
        //           'password_confirmation' => 'required'
        // ], $messages);
        // if ($validator->fails()) {
        //     return response()->json(['error' => 'كود التفعيل مطلوب', 401]);
        // }

        $rules = [
            "phone" => "required",
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $user = User::where('phone', $request->phone)->first();
        if(!$user)
                    return $this -> returnError('phone was not found');
        $user->password  = bcrypt($request->password);
        $user-> save();
        // return response()->json(['success' => 'تم إنشاء كلمة مرور جديدة']); 
        
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnDataa('data',$to_obj,'A new password has been created'); 
        }else{
            return $this -> returnSuccessMessage('تم إنشاء كلمة مرور جديدة');
        } 
    }
    public function getUserData()
    {    
        $user = Auth::guard('user-api')->user();
         if(!$user)
            return $this->returnError('يجب تسجيل الدخول أولا');
           
            $user->photo= "https://elnamat.com/poems/araqi/img/profiles/".$user->photo;
            // $country= Country::selection()->where('id',$user->countryId)->first();
            // if($country){
            //     $user->country=$country;
            // }else{
            //     $user->country=null;
            // }
            // $city= City::selection()->where('id',$user->cityId)->first();
            // if($city){
            //     $user->city=$city;
            // }else{
            //     $user->city=null;
            // }
        return $this -> returnDataa(
            'data',$user,'riuhfer'
        );
    }
    
    public function ProfileUpdate(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('','You must login first ');
        $edit = User::findOrFail($user->id);
        if($file=$request->file('photo'))
        {
            $file_extension = $request -> file('photo')->getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/profiles';
            $request-> file('photo') ->move($path,$file_name);
            $edit->photo  = $file_nameone;
        }else{
            $edit->photo  = $edit->photo;
        }

        if(isset($request->first_name)){
            $edit->name  = $request->name;
        }else{
            $edit->name  = $edit->name;
        }


        $edit-> save();

        $user = User::find($edit->id);
        $user->photo= "https://elnamat.com/poems/araqi/img/profiles/".$user->photo;
        return $this -> returnDataa('data',$user,'تم تحديث البيانات');

    }
}
