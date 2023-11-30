<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Visit;
class DashBoardController extends Controller
{
       

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        
        // $courses=Course::where('status',1)->get();
        // $courses_count=count($courses);
        $product_count=Product::count();
        $user_count=User::count();
        $visit_sum=Visit::sum('viewer');
        // dd($visit_sum);
        // $student_not_active_count=Instructor::where('type','student')->where('status',0)->count();
        
        // $instructor_count=Instructor::where('type','instructor')->count();
        // $instructor_count_active=Instructor::where('type','instructor')->where('suspended',1)->where('blocked',1)->count();
        
        // $instructor_publish_course=Instructor::where('type','instructor')->get();
        // $instructor_count_publish_course=[];
        // foreach ($instructor_publish_course as $item) {   
        //     $course_sum= Course::where('userId',$item->id)->first();
        //     if($course_sum){
        //         $instructor_count_publish_course[]=$course_sum;
        //     }
        // }
        
        // $balance=Transaction::orderBy('id', 'DESC')->first();
    //   dd($product_count);
        return view('admin.index_admin',compact('product_count','user_count','visit_sum'));
    }

    // public function create()
    // {
    //     return view('admin.sliders.create');
    // }
    

    // public function store(AircraftRequest $request)
    // {
    //     $userId = 1;
    //     $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //     $file_name = time().'.'.$file_extension;
    //     $file_nameone = $file_name;
    //     $path = 'admin/images/aircraft';
    //     $request-> file('logoone') ->move($path,$file_name);

    //     $request->merge(['created_by'=>$userId]);
    //     $request->merge(['logo'=>$file_nameone]);
    //     //dd($request->all());
    //     Slider::create($request->all());
    //     return redirect()->back()->with("message", __('admin.createSuccess')); 
    // }

    
    // public function edit(Slider $slider)
    // {
    //     return view('admin.sliders.edit',compact('slider'));
    // }

    // public function update(AircraftRequest $request, Slider $slider)
    // {
    //     $userId = 1;
    //      if($file=$request->file('logoone'))
    //      {
    //         $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //         $file_name = time().'.'.$file_extension;
    //         $file_nameone = $file_name;
    //         $path = 'admin/images/aircraft';
    //         $request-> file('logoone') ->move($path,$file_name);
    //         $request->merge(['logo'=>$file_nameone]);

    //          $request->merge(['updated_by'=>$userId]);
    //          $slider->update($request->all());
    //      }else{
    //       $request->merge(['logo'=> $request->url]);
    //       $request->merge(['updated_by'=>$userId]);
    //       $slider->update($request->all());
    //      }
       
    //     dd($request->all());
    //     //return redirect()->route('aircraft.index')->with("message", __('admin.updateSuccess')); 
    // }

    public function destroy(Slider $slider)
    {

        $Charter=Charter::where('aircraftId',$slider->id)->get(); 
        if(count($Charter) == 0){
            $slider->delete();
            return redirect()->route('aircraft.index')->with("message", __('admin.deleteSuccess')); 
        }else{
           return redirect()->back()->with("error", 'It is not allowed to delete this item'); 
        }

        
    } 
}
