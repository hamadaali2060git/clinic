<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\WorkTime;
use App\Day;
use App\WorkDay;
use Illuminate\Http\Request;

use App\Http\Resources\DayResource;

class WorkDayController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:specialities', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);
    }
    public function index()
    {
        $days=Day::with('work_days')->get();
        foreach ($days as $item) {
            if($item->work_days)
                $item->work_times=WorkTime::where("work_day_id",$item->work_days->id)->get();

        }
        // $schedules =WorkDay::with('alldays')->with('worktimes')->get();
        // return $schedules;
        // dd($days);
        // $schedules=DayResource::collection($days);
        // dd($days);
        return view('admin.schedules.all',compact('days'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(Request $request)
    {
      $work_day = WorkDay::where('day_id',$request->id)->first();
      if($work_day){
        $work_times= WorkTime::where('work_day_id',$work_day->id)->get();
        foreach ($work_times as $item) {
              $item->delete();
        }
        $work_day->delete();
      }

      $add = new WorkDay();
      $add->day_id  = $request->id;
      $add->save();
      $length = count($request->time);
      if($length > 0)
      {
          for($i=0; $i<$length; $i++)
          {
              $add_time= new WorkTime;
              $add_time->work_day_id    = $add->id;
              $add_time->time    = $request->time[$i];
              $add_time->type    = $request->type[$i];
              $add_time->save();
          }
      }
      return redirect()->back()->with("message", 'Added successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
        $this->validate( $request,[
                'name'=>'required',
            ],
            [
                'name.required'=>'يرجى ادخال نوع العقار',
            ]
        );

        $edit = Category::findOrFail($request->id);

        if($request->name !=''){
            $edit->name    = $request->name;
         }else{
            $edit->name    = $edit->name;
        }
        $edit->save();
        return redirect()->route('categories.index')->with("message", 'تم التعديل بنجاح');
    }

    public function destroy(Request $request )
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->route('categories.index')->with("message",'تم الحذف بنجاح');
    }
}
