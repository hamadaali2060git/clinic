<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\State;
use App\City;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $states=State::all();
        foreach ($states as $item) {
            $item->country= City::where('id',$item->city_id)->first();
        }
        $cities=City::all();
        return view('admin.states.all',compact('states','cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }



    public function store(Request $request)
    {

        $this->validate( $request,[
                'name'=>'required',
            ],
            [
                'name.required'=>'يرجى ادخال اسم التخصص عربي',
            ]
        );

        $add = new State;
        $add->city_id    = $request->city_id;
        $add->name   = $request->name;
        $add->save();
        // toastr()->success(trans('messages.success'));
        return back()->with("message", 'تم الإضافة بنجاح');
    }


    public function edit(State $state)
    {
        // dd($state);
        $cities=City::get();
        return view('admin.states.edit',compact('cities','state'));
    }

    public function update(Request $request, State $state)
    {
         $edit = State::findOrFail($state->id);
         $edit->city_id  = $request->city_id;
         $edit->name  =  $request->name;
         $edit->save();
        return redirect()->route('states.index')->with("message", 'تم التعديل بنجاح');
    }


    public function destroy(Request $request )
    {
        // $doctors=Doctor::where('countryId',$request->id)->get();
        // if(count($doctors) == 0){
            $delete = City::findOrFail($request->id);
            $delete->delete();
            return redirect()->route('states.index')->with("message",'تم الحذف بنجاح');
        // }else{
        //    return redirect()->back()->with("error", 'غير مسموح حذف هذا العنصر');
        // }
    }
}
