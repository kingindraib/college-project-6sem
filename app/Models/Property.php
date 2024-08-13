<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Models\PropertyCategory;
use App\Models\Gallery;

class Property extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'user_id',
        'agent_id',
        'property_category',
        'name',
        'slug',
        'location',
        'description',
        'image',
        'additional_image',
        'price',
        'available_status',
        'property_type',
        'property_for',
        'property_meta',
        'meta_data',
        'map_ifreme',
        'video_url',
        'provience_id',
        'district_id',
        'local_id',
        'ward_no',
        'status',
    ];

    protected $casts = [ 
        'additional_image'=> 'array',
        'property_category' => 'array',
        'property_meta' => 'array',
        'meta_data' => 'array',
      ];


      public function get_category($arr = false){
        $p_cat =[];
        if($this->property_category == NULL){
           if($arr == false){
            return 'N/A';
           }else{
            return $p_cat;
           }
        }
        foreach ($this->property_category as $key => $value) {
            if($arr == true){
                $p_cat[] = PropertyCategory::where('id',$value)->first();

            }else{
                $p_cat[] = PropertyCategory::where('id',$value)->first()->name;

            }
           
        }

        if($arr == true){
            return $p_cat;
        }else{
            return implode(', ', $p_cat);
        }
        
      }

      public function get_gallery(){
        return Gallery::where('data_id', $this->id)->where('type','property')->get();
      }

      public function get_image($param = 'image'){
        if($this->$param == NULL){
            return url('no_image.jpg');
        }else{
            return url($this->$param);
        }
      }
}
