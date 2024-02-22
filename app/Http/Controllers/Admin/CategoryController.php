<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class CategoryController extends Controller
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
        $categories=Category::all();
        return view('admin.categories.all',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(Request $request)
    {
        $this->validate( $request,[
                'title_ar'=>'required',
                'title_en'=>'required',
                'icon'=>'required',
            ],
            [
                'title_ar.required'=>'العنوان عربي مطلوب',
                'title_en.required'=>'العنوان انجليزي مطلوب',
                'icon.required'=>' يرجي إختيار صورة jpeg,jpg,png',
            ]
        );
        $file_name = $this->upload($request, 'icon', 'img/categories');
        $add = new Category;
        $add->title_ar= $request->title_ar;
        $add->title_en= $request->title_en;
        $add->icon= $file_name;
        $add->save();
        return redirect()->back()->with("message", 'Added successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
        // $this->validate( $request,[
        //         'name'=>'required',
        //     ],
        //     [
        //         'name.required'=>'يرجى ادخال نوع العقار',
        //     ]
        // );

        $edit = Category::findOrFail($request->id);

        if($request->title_ar !=''){
            $edit->title_ar    = $request->title_ar;
         }else{
            $edit->title_ar    = $edit->title_ar;
        }
        if($request->title_en !=''){
            $edit->title_en    = $request->title_en;
         }else{
            $edit->title_en    = $edit->title_en;
        }
        if($request->file('icon'))
                {
                    $file_name = $this->upload($request, 'icon', 'img/categories');
                    $edit->icon=$file_name;
                }else{
                    $edit->icon  = $edit->icon;
                }
        $edit->save();
        return redirect()->route('categories.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->route('categories.index')->with("message",'Deleted successfully');
    }
}
