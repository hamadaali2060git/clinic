<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class ArticleController extends Controller
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
    public function serverSide()
    {
        $articles=Article::paginate(3);
        return view('admin.server-side',compact('articles'));
    }

    public function index()
   {
       // dd('dd');
       $articles=Article::paginate(10);
       return view('admin.articles.all',compact('articles'));
   }

    public function create()
    {
        return view('admin.articles.create');
    }



    public function store(Request $request)
    {
      $this->validate( $request,[
              'title_ar'=>'required',
              'title_en'=>'required',
              'image'=>'required',
          ],
          [
              'title_ar.required'=>'العنوان عربي مطلوب',
              'title_en.required'=>'العنوان انجليزي مطلوب',
              'image.required'=>' يرجي إختيار صورة jpeg,jpg,png',
          ]
      );

        $file_name = $this->upload($request, 'image', 'img/articles');
        $add = new Article;
        $add->title_ar= $request->title_ar;
        $add->title_en= $request->title_en;
        $add->description_ar= $request->description_ar;
        $add->description_en= $request->description_en;
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


        $edit = Article::findOrFail($request->id);

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
        if($request->description_ar !=''){
            $edit->description_ar    = $request->description_ar;
         }else{
            $edit->description_ar    = $edit->description_ar;
        }
        if($request->description_en !=''){
            $edit->description_en    = $request->description_en;
         }else{
            $edit->description_en    = $edit->description_en;
        }
        if($request->file('image'))
                {
                    $file_name = $this->upload($request, 'image', 'img/articles');
                    $edit->image=$file_name;
                }else{
                    $edit->image  = $edit->image;
                }
        $edit->save();
        return redirect()->route('articles.index')->with("message", 'Updated successfully');
    }

    public function destroy(Request $request )
    {
        $delete = Article::findOrFail($request->id);
        $delete->delete();
        return redirect()->route('articles.index')->with("message",'Deleted successfully');
    }
}
