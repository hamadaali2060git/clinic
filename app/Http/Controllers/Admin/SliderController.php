<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class SliderController extends Controller
{
    use ImageUploadTrait;

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
        // dd('dd');
        $sliders=Slider::paginate(10);
        return view('admin.sliders.all',compact('sliders'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(Request $request)
    {
        $this->validate( $request,[
                'image'=>'required',
            ],
            [
                'image.required'=>' يرجي إختيار صورة jpeg,jpg,png',
            ]
        );
        $file_name = $this->upload($request, 'image', 'img/sliders');
        $add = new Slider;
        $add->image= $file_name;
        $add->save();
        return redirect()->back()->with("message", 'Added successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
      $edit = Slider::findOrFail($request->id);
      if($request->file('image'))
      {
         $file_name = $this->upload($request, 'image', 'img/sliders');
         $edit->image=$file_name;
      }else{
          $edit->image  = $edit->image;
      }
      $edit->save();
      return redirect()->route('sliders.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
        $delete = Slider::findOrFail($request->id);
        $delete->delete();
        return redirect()->route('sliders.index')->with("message",'Deleted successfully');
    }
}
