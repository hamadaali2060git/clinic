<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Crypt;
use Hash;
// use App\Traits\GeneralTrait;
use App\Instructor;
use App\Student;

class UserController extends Controller
{
    // use GeneralTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
	{
		$data = User::orderBy('id','DESC')->paginate(5);
		return view('admin.users.all',compact('data'))
		->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function create()
	{
		$roles = Role::pluck('name','name')->all();
		return view('admin.users.Add_user',compact('roles'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			// 'photo' => 'required',
			'mobile' => 'required',
			'address' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|same:confirm-password',
			'roles_name' => 'required'
		]);
		$input = $request->all();
		if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/users';
            $request-> file('photo') ->move($path,$file_name);
            $input['photo'] = $file_nameone;
         }else{
            $input['photo'] = "profile_image.png";
         }

		$input['password'] = Hash::make($input['password']);
		// dd($file_nameone);
        $user= User::create($input);

		// $user = User::create($input);
		$user->assignRole($request->input('roles_name'));
		return redirect()->route('users.index')
		->with('success','تم اضافة المستخدم بنجاح');
	}


	public function show($id)
	{
		$user = User::find($id);
		return view('admin.users.show',compact('user'));
	}

	public function edit($id)
	{
		$user = User::find($id);
		// $decrypt=Crypt::decrypt($user->password);
		$roles = Role::pluck('name','name')->all();
		$userRole = $user->roles->pluck('name','name')->all();
		return view('admin.users.edit',compact('user','roles','userRole'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'.$id,
			// 'password' => 'same:confirm-password',
// 			'password' => 'required',
			'roles' => 'required'
		]);
		$input = $request->all();
		if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/users';
            $request-> file('photo') ->move($path,$file_name);

            $input['photo'] = $file_nameone;
         }else{
            $input['photo'] = $request->url;
         }

// 		if(!empty($input['password'])){
// 			$input['password'] = Hash::make($input['password']);
// 		}else{
// 			$input = array_except($input,array('password'));
// 		}
		$user = User::find($id);
		$user->update($input);
		DB::table('model_has_roles')->where('model_id',$id)->delete();
		$user->assignRole($request->input('roles'));
		return redirect()->route('users.index')
		->with('success','تم تحديث معلومات المستخدم بنجاح');
	}

	public function destroy(Request $request)
	{
		User::find($request->user_id)->delete();
		return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
	}

	public function userActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = User::find($check->id_user);
		    if ($user->is_activated ==1){
		      return redirect()->to('/login/user')->with('success',"حسابكم مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
		    return redirect()->to('/login/user')->with('success',"تم تفعيل حسابك");
	  	}
	    return redirect()->to('/login/user')->with('Warning',"الرمز الخاص بك غير صالح");
	}

	public function instructorActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = Instructor::find($check->id_user);
		    if ($user->is_activated ==1){
		      //  return $this -> returnSuccessMessage('حسابكم مفعل');
		        return redirect()->to('activated')->with('message'," الحساب مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
		  //  return $this -> returnSuccessMessage('تم تفعيل حسابك');
	        return redirect()->to('activated')->with('message',"تم تفعيل حسابك");
	  	}
	  	// return $this -> returnError('رمز التفعيل غير صالح');
	  	return redirect()->to('/activated')->with('Warning',"رمز التفعيل غير صالج");
	}

	public function studentActivation($token){
	    $check = DB::table('user_activations')->where('token',$token)->first();
	  	if(!is_null($check)){
		    $user = Student::find($check->id_user);
		    if ($user->is_activated ==1){
		        return redirect()->to('activated')->with('message'," الحساب مفعل ");
		    }
		    $user->update(['is_activated' => 1]);
		    DB::table('user_activations')->where('token',$token)->delete();
            return redirect()->to('activated')->with('message',"تم تفعيل حسابك");
    	}
	  	return redirect()->to('/activated')->with('Warning',"رمز التفعيل غير صالج");

	}


}
