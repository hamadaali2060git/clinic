<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\City;
use App\State;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Visit;
class ProductController extends Controller
{
    public function index()
    {
        // $edit = Product::findOrFail(33);
        // $ggg=json_decode($edit->size);
        // dd($ggg);

        $products=Product::with('visitViewer')->get();
        foreach ($products as $item) {
            $item->images= ProductImage::where('product_id',$item->id)->get();
            // $item->visitViewer;
        }
        // dd($products);
        $categories=Category::all();
        return view('admin.products.all',compact('products','categories'));
    }
    public function create()
    {
        $categories=Category::all();
        $cities=City::all();
        $states=State::all();
        return view('admin.products.create',compact('categories','cities','states'));
    }
    

    public function store(Request $request)
    {
         $add = new Product;
        $add->user_id    = $user->id;
        $add->city_id    = $request->city_id;
        $add->category_id    = $request->category_id;
        $add->state_id    = $request->state_id;        
        $add->title    = $request->title;
        $add->type    = $request->type;
        $add->address    = $request->address;
        $add->location    = $request->location;
        $add->width    = $request->width;
        $add->height    = $request->height;
        $add->total_area    = $request->total_area;
        $add->year    = $request->year;
        $add->bathrooms    = $request->bathrooms;
        $add->rooms    = $request->rooms;
        $add->role    = $request->role;   // عدد الادوار
        $add->price    = $request->price;
        $add->description    = $request->description;
        $add->name    = $request->name;
        $add->email    = $request->email;
        $add->phone    = $request->phone;    
        $add->save();
        // if($files = $request->file('image'))
        // {
        //     $length_file = count($files);
        //     if($length_file > 0)
        //     {
        //         for($i=0; $i<$length_file; $i++)
        //         {
        //             $file_extension = $files[$i] -> getClientOriginalExtension();
        //             $file_name = time().rand(1,100).'.'.$file_extension;
        //             $files[$i]->move('img/product/', $file_name);   
        //             $add_image= new ProductImage;
        //             $add_image->product_id    =  $add->id;
        //             $add_image->image  = $file_name;             
        //             // $add_image->title    =  $request->title[$i];       
        //             $add_image->save();
        //         }
        //     }
        // }
       
        if($files = $request->file('image'))
        {
            $length_file = count($files);
            if($length_file > 0)
            {
                for($i=0; $i<$length_file; $i++)
                {
                    $file_extension = $files[$i] -> getClientOriginalExtension();
                    $file_name = time().rand(1,100).'.'.$file_extension;
                    $files[$i]->move('img/product/', $file_name);   

                    $add_image= new ProductImage;
                    $add_image->productId    =  $add->id;
                    $add_image->image  = $file_name;             
                    // $add_image->title    =  $request->title[$i];       
                    $add_image->save();
                }
            }
        }



        return redirect()->route('products.index')->with("message", 'تم الإضافة بنجاح');
    }

    
    public function edit(Request $request,Product $product)
    {
        // $ipAddr=$request->ip();
        // $ipAddr = $request->header('User-Agent');
        // $clientIP = $request->header('User-Agent');
        
        // $client_ip=$request->getClientIp(); 
        
        // $count = $product->visitViewer;
       
        // if($count){
        //     $count->viewer = $count->viewer + 1;
        // }else{
        //     $count = new Visit;
        //     $count->viewer = "1";
        //     $count->client_ip=$client_ip;
        // }
        // $product->visitViewer()->save($count);
        // dd($product);
        $categories=Category::all();
        return view('vendors.products.edit',compact('product','categories'));
    }

   

    public function update(Request $request,Product $product)
    {   
        $edit = Product::findOrFail($product->id);
        $edit->name    = ['ar' => $request->name_ar,'en' => $request->name_en];
        $edit->description    = ['ar' => $request->description_ar,'en' => $request->description_en];
        $edit->price    = $request->price;
        $edit->quantity    = $request->quantity;
        $edit->modal_number    = $request->modal_number;
        $edit->slug    = ['ar' => $request->name_ar,'en' => $request->name_en];
        $edit->save();

        
        if($file=$request->file('imagee'))
         {
            $file_extension = $request -> file('imagee') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/product/';
            $request-> file('imagee') ->move($path,$file_name);
            $edit->image  =$file_nameone;
        }else{
            $edit->image  = $edit->image; 
        }
        return back()->with("message", 'تم التعديل بنجاح'); 
    }

    public function destroy(Request $request )
    {
        
            $delete = Product::findOrFail($request->id);
            $delete->delete();
            // dd($request->id);
            return back()->with("success",'تم الحذف بنجاح'); 
              
    } 

    public function productSizeEdit($product)
    {
        $sizes=Size::where('productId',product);
        return view('vendors.products.size',compact('product','sizes'));
    }

   

    public function productSizeUpdate(Request $request)
    {   
        $edit = Size::findOrFail($request->id);
       
        $edit->title    = $request->title;
        $edit->description  = $request->description;
        
        $edit->price    = $request->price;
        $edit->quantity    = $request->quantity;
        $edit->slug    = $request->title;
        $edit->save();

        if($filess = $request->file('imagee'))
        {
            $length_file = count($filess);
            if($length_file > 0)
            {
                for($i=0; $i<$length_file; $i++)
                {
                    $file_extension = $filess[$i] -> getClientOriginalExtension();
                    $file_name = time().rand(1,100).'.'.$file_extension;
                    $filess[$i]->move('assets_admin/products/', $file_name);   

                    $add_image= new Image;
                    $add_image->productId    =  $edit->id;
                    $add_image->url  = $file_name;             
                    // $add_image->title    =  $request->title[$i];       
                    $add_image->save();
                }
            }
        }else{

        }
        return back()->with("message", 'تم التعديل بنجاح'); 
    }

}
