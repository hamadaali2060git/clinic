<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
                'name'=>'required',
            ],
            [
                'name.required'=>'يرجى ادخال نوع العقار',
            ]
        );
        $add = new Category;

        $add->name= $request->name;
        $add->save();
        return redirect()->back()->with("message", 'تم الإضافة بنجاح');
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
