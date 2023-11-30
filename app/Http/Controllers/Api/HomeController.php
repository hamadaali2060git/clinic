<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use DB;
use Hash;
use Mail;
use Crypt;
use Session;
use App\City;
use App\Category;
use App\Product;
use App\State;
use App\Feature;
use App\User;
use App\Setting;
use App\ProductImage;
use App\Favorite;
use Illuminate\Support\Str;
use App\Visit;
class HomeController extends Controller
{

    // $2y$10$3PSH/l1FjTu4UwbquUtStuP7tUPosoAHlF.ZORo0dP0wngzkm/02S
    use GeneralTrait;
    public function cities(Request $request)
    {    
        $cities = City::get();   
        foreach ($cities as $item) {
            $count = Product::where('city_id',$item->id)->get();  
            $item->product_count=count($count);
        }
        return $this -> returnDataa(
            'data',$cities,''
        );
    }

    public function categotries(Request $request)
    {    
        $categotries = Category::get();   
       
        return $this -> returnDataa(
            'data',$categotries,''
        );
    }

    public function states(Request $request)
    {   
        if($request->city_id){
            $states = State::where('city_id',$request->city_id)->get();
        }else{
            $states = State::get();    
        } 
        
        return $this -> returnDataa(
            'data',$states,''
        );
    }
    
    public function productDetais(Request $request)
    {   
        $product = Product::where('id',$request->product_id)->first();
        if(!$product)  
                return $this -> returnError('','هذا العقار غير موجود'); 
                
        $client_ip=$request->getClientIp(); 
        $count = $product->visitViewer;
        // dd($count->viewer.'-'.$client_ip);
        if($count){
            if($count->client_ip != $client_ip){
                $count->viewer = $count->viewer + 1;
            }
        }else{
            $count = new Visit;
            $count->viewer = "1";
            $count->client_ip=$client_ip;
        }
        $product->visitViewer()->save($count);
        
        $product->city= City::where('id',$product->city_id)->first();  
        $product->category= Category::where('id',$product->category_id)->first();  
        $product->state = State::where('id',$product->state_id)->first();
        $product->user = User::where('id',$product->user_id)->first();   
        $product_image = ProductImage::where('product_id',$product->id)->first();  
        $product->image="https://elnamat.com/poems/araqi/img/product/".$product_image->image;
        $ProductImage=ProductImage::where('product_id',$product->id)->get();
        foreach ($ProductImage as $item) {
            $item->image="https://elnamat.com/poems/araqi/img/product/".$item->image;
        }
        $product->images=$ProductImage;
        return $this -> returnDataa(
            'data',$product,''
        );
    }
    public function products(Request $request)
    {   
        if($request->city_id){
            $products = Product::where('city_id',$request->city_id)->get();
        }else{
            $products = Product::get();   
        }  
        foreach ($products as $item) {
            $item->user = User::where('id',$item->user_id)->first();  
            $item->city= City::where('id',$item->city_id)->first();  
            $item->category= Category::where('id',$item->category_id)->first();  
            $item->state = State::where('id',$item->state_id)->first();  
            
            $product = ProductImage::where('product_id',$item->id)->first();  

            $item->image="https://elnamat.com/poems/araqi/img/product/".$product->image;
        }
        return $this -> returnDataa(
            'data',$products,''
        );
    }
    public function productsSearch(Request $request)
    {   
        if($request->price){
           $products = Product::where('price',$request->price)->get();
        }else{
            $products = Product::where('city_id',$request->city_id)
                               ->where('category_id',$request->category_id)
                               ->where('state_id',$request->state_id)
                               ->where('type',$request->type)->get(); 
        }
        foreach ($products as $item) {
            $item->user = User::where('id',$item->user_id)->first();  
            $item->city= City::where('id',$item->city_id)->first();  
            $item->category= Category::where('id',$item->category_id)->first();  
            $item->state = State::where('id',$item->state_id)->first(); 

            $product = ProductImage::where('product_id',$item->id)->first();  

            $item->image="https://elnamat.com/poems/araqi/img/product/".$product->image;
        }
        return $this -> returnDataa(
            'data',$products,''
        );
    }
    public function features(Request $request)
    {   

        $products = Product::where('special',1)->get(); 
        
        foreach ($products as $item) {
            $item->city= City::where('id',$item->city_id)->first();  
            $item->category= Category::where('id',$item->category_id)->first();  
            $item->state = State::where('id',$item->state_id)->first();  
            $item->user = User::where('id',$item->user_id)->first();  
            $product = ProductImage::where('product_id',$item->id)->first();  

            $item->image="https://elnamat.com/poems/araqi/img/product/".$product->image;
        }
        return $this -> returnDataa(
            'data',$products,''
        );
        // $features = Feature::get();   
        // foreach ($features as $item) {
        //     $product = Product::where('id',$item->product_id)->first();  
        //     $product->city= City::where('id',$product->city_id)->first();  
        //     $product->category= Category::where('id',$product->category_id)->first();  
        //     $product->state = State::where('id',$product->state_id)->first();  
        //     // $product->user = User::where('id',$product->user_id)->first();  
        //     $product->image="https://elnamat.com/poems/araqi/img/product/".$product->image;
        //     $item->product=$product;
        // }
        // return $this -> returnDataa(
        //     'data',$features,''
        // );
    }
    public function favorites(Request $request)
    {   
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('','يجب تسجيل الدخول أولا');
       
        $features = Favorite::where('user_id',$user->id)->get();   
        foreach ($features as $item) {
            $item->user = User::where('id',$item->user_id)->first();  
            $product = Product::where('id',$item->product_id)->first();  
            $product->city= City::where('id',$product->city_id)->first();  
            $product->category= Category::where('id',$product->category_id)->first();  
            $product->state = State::where('id',$product->state_id)->first();  
            
            $product_image = ProductImage::where('product_id',$product->id)->first();  
            $product->image="https://elnamat.com/poems/araqi/img/product/".$product_image->image;
            $item->product=$product;
        }
        return $this -> returnDataa(
            'data',$features,''
        );
    }
    public function addFavorite(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('','يجب تسجيل الدخول أولا');
        
        $chefavorite = Favorite::where("product_id" , $request->product_id)->where("user_id" , $user->id)->first();
        if($chefavorite){
            return $this -> returnError('','موجود بالفعل');
        }else{
            $add = new Favorite();
            $add->product_id  = $request->product_id;
            $add->user_id  = $user->id;
            $add->save();
        }
          
        return $this -> returnSuccessMessage('تم الإضافة');
    }
    public function deleteFavorite(Request $request )
    {
        $user = Auth::guard('user-api')->user();
        if(!$user)
             return $this->returnError('','يجب تسجيل الدخول أولا');
        $delete = Favorite::where("product_id" , $request->product_id)->where("user_id" , $user->id)->first();
        if(!$delete)
            return $this->returnError('هذا العقار غير موجود');
        $delete->delete();
           return $this -> returnSuccessMessage('تم الحذف');     
    } 
    public function vendorProducts(Request $request)
    {   
        $user = Auth::guard('user-api')->user();
        if(!$user)
            return $this->returnError('','يجب تسجيل الدخول أولا');

        $products = Product::where('user_id',$user->id)->get();   
        foreach ($products as $item) {
            $item->user = User::where('id',$item->user_id)->first();  
            $item->city= City::where('id',$item->city_id)->first();  
            $item->category= Category::where('id',$item->category_id)->first();  
            $item->state = State::where('id',$item->state_id)->first();  
            
            $product = ProductImage::where('product_id',$item->id)->first();  

            $item->image="https://elnamat.com/poems/araqi/img/product/".$product->image;
        }
        return $this -> returnDataa(
            'data',$products,''
        );
    }
    public function settings(Request $request)
    {    
        $settings = Setting::get();   
        
        return $this -> returnDataa(
            'data',$settings,''
        );
    }
    public function addProduct(Request $request)
    {
        // $user = Auth::guard('vendorsbuyers-api')->user();
        // if(!$user)
        //      if(isset($request->lang)  && $request -> lang == 'en' ){
        //         return $this -> returnError('You must be sign in first');
        //     }else{
        //         return $this -> returnError('يجب تسجيل الدخول اولا');
        //     } 
        // $files = $request->file('image');
        // $length_file = count($files);
        
        
        // if($files = $request->file('image'))
        // {
        //     $length_file = count($files);
        //     if($length_file > 0)
        //     {
        //         return $this -> returnDataa(
        //             'data',$length_file,''
        //         );
        //     }else{
        //         return $this -> returnDataa(
        //         'data',0,''
        //     );
        //     }
        // }else{
        //      return $this -> returnError('',' يجب اضافه صوره ، او البرامتر ليس من نوع فيل '); 
        // }
            
        
        $user = Auth::guard('user-api')->user();
        if(!$user)
             return $this->returnError('','يجب تسجيل الدخول أولا');
        if(!isset($request->image))
            return $this -> returnError('','يجب إضافة صورة'); 
            
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
                    $add_image->product_id    =  $add->id;
                    $add_image->image  = $file_name;             
                    // $add_image->title    =  $request->title[$i];       
                    $add_image->save();
                }
            }
        }
           
        // $length_images = count($request->images);
        // if($length_pr$length_imagesoductId > 0)
        // {
        //     for($i=0; $i<$length_images; $i++)
        //     {          
        //         if($files = $request->images[$i]['image'])
        //         {
        //             $file_extension = $files -> getClientOriginalExtension();
        //             $file_name = time().rand(1,100).'.'.$file_extension;
        //             $files->move('img/product/', $file_name);   
                        
        //             // $product = ProductImage::findOrFail( $request->images[$i]['id']);
                    
        //             $add_image= new ProductImage;
        //             $add_image->product_id    =  $add->id;
        //             $add_image->image  = $file_name;             
        //             $add_image->save();
        //         }
        //     }
        // }
        
       
        return $this -> returnSuccessMessage('تم الإضافة ');
                
    }
}
