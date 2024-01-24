<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cities=City::all();
        // foreach ($cities as $item) {
        //     $item->country= Country::where('id',$item->countryId)->first();
        // }
        // $countries=Country::all();
        return view('admin.cities.all',compact('cities'));
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

        $add = new City;
        if($file=$request->file('image'))
        {
            $file_extension = $request -> file('image') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/cities/';
            $request-> file('image') ->move($path,$file_name);
            $add->image  =$file_nameone;
        }
        $add->name   =  $request->name;
        $add->save();
        return redirect()->back()->with("message", 'تم الإضافة بنجاح');
    }
    public function edit(City $city)
    {
        return view('admin.cities.edit',compact('city'));
    }
    public function update(Request $request, City $city){
      $this->validate( $request,[
              'name'=>'required',
          ],
          [
              'name.required'=>'يرجى ادخال اسم المدينة ',
          ]
      );

       $edit = City::findOrFail($city->id);
       if($file=$request->file('image'))
       {
           $file_extension = $request -> file('image')-> getClientOriginalExtension();
           $file_name = time().'.'.$file_extension;
           $file_nameone = $file_name;
           $path = 'img/cities/';
           $request-> file('image') ->move($path,$file_name);
           $edit->image = $file_nameone;
       }else{
           $edit->image = $edit->image;
       }
       $edit->name    = $request->name;

       $edit->save();
      return redirect()->route('cities.index')->with("message", 'تم التعديل بنجاح');
   }
    


    public function destroy(Request $request )
    {
        // $doctors=Doctor::where('countryId',$request->id)->get();
        // if(count($doctors) == 0){
            $delete = City::findOrFail($request->id);
            $delete->delete();
            return redirect()->route('cities.index')->with("message",'تم الحذف بنجاح');
        // }else{
        //    return redirect()->back()->with("error", 'غير مسموح حذف هذا العنصر');
        // }
    }
}
