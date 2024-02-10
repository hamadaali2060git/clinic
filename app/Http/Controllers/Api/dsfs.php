<?php

public function home(Request $request)
{    
    $categotries = Category::selection()->orderBy('id', 'DESC')->paginate();   
    $articles = Article::selection()->orderBy('id', 'DESC')->paginate();; 
    $sliders = Slider::get(); 
    
    $employees = User::selection()->paginate(2);
    $employees->getCollection()->transform(function($item){
        $item->age = 22;
        $item->dob = '16-06-1999';
        $item->name = $item->id;
        $item->email = $item->email;
        return $item;
    });
    // return $employees;

    $data  =[  
        // 'upcoming_appointments'=>AppointmentResource::collection($upcoming_appointments),
        // 'previous_appointments'=>AppointmentResource::collection($previous_appointments),
        
        'categotries'=> CategoryResource::collection($categotries),
        'articles'=>   ArticleResource::collection($articles),
        'sliders'=>SliderResource::collection($sliders),
        'userr'=>$employees
    ];   

    // $employees = User::paginate(2)->map(function($item){
    //     return [
    //         'age' => 22,
    //         'dob' => '16-06-1999',
    //         'name' => $item->id,
    //         'email' => $item->email,
    //     ];
    // });
    // return $employees;
    
    // $users = User::paginate();
    // $mappedcollection = $users->map(function($user, $key) {									
    // return [
    //         'id' => $user->id,
    //         'name' => $user->first_name
    //     ];
    // });
    // return $mappedcollection;

    // return CategoryResource::collection($categotries);
    return $this -> returnDataa(
        'data',$data,''
    );




    $employees = User::selection()->paginate(2);
        $employees->getCollection()->transform(function($item){
            $item->age = 22;
            $item->dob = '16-06-1999';
            $item->name = $item->id;
            $item->email = $item->email;
            return $item;
        });
}