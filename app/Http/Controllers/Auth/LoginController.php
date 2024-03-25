<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;


use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use Crypt;
use Hash;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function LoginAdmin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate(request(),[
            'email'    => 'required',
            'password' => 'required',
            ],
            [
                'email.required'=>' البريد  الإلكتروني مطلوب',
                'password.required'=>' كلمة المرور مطلوبة',
            ]
        );

        
        $credentials = $request->only('email', 'password');
        $check_doctor = User::where("email" , $request->email)->where('type','doctor')->first();
        if($check_doctor){
            $good =Auth::attempt($credentials);
            if ($good) {
                // dd('ffn');
                return redirect('categories');
            }else{
                return redirect('admin-login')->with("errorss", 'Login data is incorrect');
            }
        }else{
            return redirect('admin-login')->with("errorss", 'Login data is incorrect');
        }


        // $credentials = $request -> only(['email','password']);
        // $checkinstructor = Instructor::where("email" , $request->email)->first();
        // if($checkinstructor){
        //     if($checkinstructor->is_activated ==0)
        //     {
        //         return redirect('user-login')->with("errorss", 'الحساب غير مفعل');
        //     }else{
        //         $good = Auth::guard('instructors') -> attempt($credentials);
        //         if($good) {
        //             if($checkinstructor->type='instructor'){
        //                 return redirect('instructor/courses');
        //             }else{
        //                 return redirect('home');
        //             }
        //         }else{
        //             return redirect('user-login')->with("errorss", 'بيانات الدخول غير صحيحةة');
        //         }
        //     }
        // }else{
        //     return redirect('user-login')->with("errorss", 'بيانات الدخول غير صحيحة');
        // }
    }



    public function signOut() {
      Auth::logout();
      return redirect('/');
    }








    

    public function Activated()
    {
        return view('activated');
    }


    public function userActivation($token){
        $check = DB::table('user_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->id_user);
            if ($user->is_activated ==1){
                return redirect()->to('activated')->with('message'," الحساب مفعل ");
            }
            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('activated')->with('message',"تم تفعيل حسابك");
        }
        return redirect()->to('/activated')->with('errorss',"رمز التفعيل غير صالح");
    }

   

## start reset for api
    public function resetPasswordGetApi($token) {
        return view('auth.forgetpasswordlink_api', ['token' => $token]);
   }
   public function resetPasswordPostApi(Request $request)
   {
         // $request->validate([
         //     // 'email' => 'required|email|exists:users',
         //     'password' => 'required|string|min:3|confirmed',
         //     'password_confirmation' => 'required'
         // ]);
         $this->validate(request(),[
                 'password' => 'required|string|min:3|confirmed',
                 'password_confirmation' => 'required'
             ],
             [
                 'password.required'=>'Neues Kennwort',
                 'password.min'=>'Nicht weniger als drei Buchstaben und Zahlen',
                 'password_confirmation.required'=>' Bestätige das Passwort',
             ]
         );

         $updatePassword = DB::table('password_resets')->where([
                               // 'email' => $request->email,
                               'token' => $request->token
                             ])->first();

         if(!$updatePassword){
             return back()->withInput()->with('errorss', __('Invalid token'));
         }
         $user = User::where('email', $updatePassword->email)->first();
         // $user->email  = $request->email;
         $user->password  = bcrypt($request->password);
         $user-> save();

         DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
        //  if(session()->get('locale')){
        //      $langg=session()->get('locale');
        //  }else{
        //      $langg=app()->getLocale();
        //  }
        //  dd($langg);
           return redirect('activated')->with('message', __('front.Your password has been changed'));

   }
## end for api









}
