<?php 
namespace App\Traits;
 
use Illuminate\Http\Request;
 
trait ImageUploadTrait 
{ 
    public function upload( Request $request, $fieldname, $directory) {
        if($file=$request->file($fieldname))
        {
            $file_extension = $request -> file($fieldname) -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $path = $directory;
            $request-> file($fieldname) ->move($path,$file_name);
            return $file_name;
        }
        return null;
    }
    public function getFile( $directory,$image,$filenull) {
        if($image){
            return $photo= url($directory.''.$image);
        }else{
            return $photo= url($filenull.'profile.jpeg');
        }
        return null;
    }
}


