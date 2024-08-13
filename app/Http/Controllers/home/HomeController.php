<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Post;
use App\Models\Gallery;
use Str;
use App\Models\Provience;
use App\Models\District;
use App\Models\Local;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->type && $request->id){
           return $this->pages($request->type,$request->id);
        }
        return view('home.index');
    }

    public function pages($type,$id)
    {
        switch($type){
            case 'property':
                $data = Property::find($id);
                return view('home.pages.property', compact('data'));
            case 'post-detail':
                $data = Post::find($id);
                return view('home.pages.single',compact('data'));
            default:
            abort(404);
        }
    }

    public function catgeory(Request $request)
    {
        if($request->type){
            // dd($request->all());
            switch ($request->type) {
                case 'property':
                    $property = Property::where('status', 'publish')->latest('id')->get();
                    return view('home.pages.property-category', compact('property'));
                
                default:
                    # code...
                    break;
            }
        }else{
            abort(404);
        }
    }

    public function add_new_property()
    {
        return view('home.pages.new-property');
    }

    public function submit_new_property(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'property_meta_key' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['status'] = 'pending';
        if(isset($data['property_meta_key'])){
            $data['property_meta'] = [];
           foreach($data['property_meta_key'] as $key => $value){
               $data['property_meta'][$value] =   $request->property_meta_value[$key];
           }
        }

        if(isset($data['meta_data_key'])){
            $data['meta_data'] = [];
           foreach($data['meta_data_key'] as $key => $value){
               $data['meta_data'][$value] =   $request->property_meta_value[$key];
           }
        }
        if($request->hasFile('image')){
            $data['image'] = Property::uploadFile($request->image);
        }

        if(isset($data['additional_image'])){
            foreach($data['additional_image'] as $key => $value){
                $data['additional_image'][$key] = Property::uploadFile($value);
            }
        }
        // dd($data);
        $lastInsert = Property::create($data);
        if($lastInsert){
            if(isset($data['gallery_image'])){
                foreach($data['gallery_image'] as $key => $value){
                    Gallery::create([
                        'data_id' => $lastInsert->id,
                        'type' => 'property',
                        'path' => Gallery::uploadFile($value),
                    ]);
                }
            }
        }

        return redirect()->back()->with('success_message', 'Property added successfully');
    }

    public function district($id){
        return District::where('province_id', $id)->get();
    }

    public function municipal($id){
        return Local::where('district_id', $id)->get();
    }
}


