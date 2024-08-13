<?php
use App\Models\Post;
use App\Models\PropertyCategory;
use App\Models\Provience;
use App\Models\District;
use App\Models\Local;
use App\Models\Property;

if(!function_exists('property_category')){
    function property_category(){
        return PropertyCategory::all();
    }
}

if(!function_exists('provience')){
    function provience(){
        return Provience::all();
    }
}

if(!function_exists('get_provience')){
    function get_provience($id){
        return Provience::find($id);
    }
}


if(!function_exists('district')){
    function district(){
        return District::all();
    }
}
if(!function_exists('get_district')){
    function get_district($id){
        return District::find($id);
    }
}

if(!function_exists('local')){
    function local(){
        return Local::all();
    }
}

if(!function_exists('get_local')){
    function get_local($id){
        return Local::find($id);
    }
}


if(!function_exists('filter_property')){
    function filter_property($category_id,$limit=NULL,$offset=NULL,$district_id=NULL){
        $data = [];
        if($limit != NULL && $offset !=NULL){
            $all = Property::where('status', 'publish')->orderBy('id', 'DESC')->limit($limit)->offset($offset)->get();
        }elseif($offset != NULL){
            $all = Property::where('status', 'publish')->orderBy('id', 'DESC')->offset($offset)->get();
        }elseif($limit != NULL){
            $all = Property::where('status', 'publish')->orderBy('id', 'DESC')->limit($limit)->get();
        }else{
            $all = Property::where('status', 'publish')->orderBy('id','DESC')->get();
        }
        
        foreach($all as $key => $value){
            // category id in array
            // json_decode($value->category_id)
            if($value->property_category !=NULL && in_array($category_id, $value->property_category)){
                if($district_id != NULL){
                    if($value->district_id == $district_id){
                        $data[] = $value;
                    }
                }else{
                    $data[] = $value;
                }
            }
        }

        return $data;
    }

    if(!function_exists('post_data')){
        function post_data($category_id, $limit = NULL ,$order = 'ASC'){
            if($limit == NULL){
               return Post::where('category_id', $category_id)->orderBy('id', $order)->get();
            }else{
                return Post::where('category_id',$category_id)->orderBy('id', $order)->limit($limit)->get();
            }
           
        }
    }

    if(!function_exists('latest_propety')){
        function latest_propety($limit=4){
            return Property::where('status', 'publish')->orderBy('id', 'DESC')->limit($limit)->get();
        }
    }
}

if(!function_exists('get_property_by_slug')){
    function get_property_by_slug($slug){
        $data = [];
        $property_category = PropertyCategory::where('slug', $slug)->first();
        if($property_category == NULL){
            return 'NOT Found';
        }else{
            $all = Property::where('status', 'publish')->orderBy('id','DESC')->get();
            // return Property::where('property_category', $property_category->id)->get();
            foreach($all as $key => $value){
                // category id in array
                // json_decode($value->category_id)
                if($value->property_category !=NULL && in_array($property_category->id, $value->property_category)){
                    $data[] = $value;
                }
            }
    
            return $data;
        }
    }
}