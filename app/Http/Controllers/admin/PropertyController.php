<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provience;
use App\Models\District;
use App\Models\Local;
use App\Models\Property;
use App\Models\Gallery;
use Str;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::orderBy('id','DESC')->get();
        return view('admin.property.index',compact('property'));
    }

    public function create(Request $request)
    {
        if($request->pid){
            return response()->json([
                'success' =>true,
                'data' => District::where('province_id',$request->pid)->get()
            ]);
        }elseif($request->did){
            return response()->json([
                'success' =>true,
                'data' => Local::where('district_id', $request->did)->get()
            ]);
        }
       
        return view('admin.property.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'property_meta_key' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
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

        return redirect()->route('admin.property.index')->with('success_message', 'Property created successfully.');
       
        // dd($data);
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        Property::deleteFile($property->image);
        Property::deleteFile($property->additional_image);
        $property_gallery = Gallery::where('data_id', $id)->where('type','property')->get();
        foreach($property_gallery as $gallery){
            Gallery::deleteFile($gallery->path);
            $gallery->delete();
        }
        $property->delete();
        return redirect()->route('admin.property.index')->with('success_message', 'Property deleted successfully.');
    }

    public function edit(Request $request,$id)
    {
        if($request->pid){
            return response()->json([
                'success' =>true,
                'data' => District::where('province_id',$request->pid)->get()
            ]);
        }elseif($request->did){
            return response()->json([
                'success' =>true,
                'data' => Local::where('district_id', $request->did)->get()
            ]);
        }
        $data = Property::findOrFail($id);
        return view('admin.property.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'property_meta_key' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
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
            Property::deleteFile($data['image']);
            $data['image'] = Property::uploadFile($request->image);
        }

        if(isset($data['additional_image'])){
            foreach($data['additional_image'] as $key => $value){
                Property::deleteFile($value);
                $data['additional_image'][$key] = Property::uploadFile($value);
            }
        }

        $lastInsert = Property::find($id);
        $lastInsert->update($data);
        if($lastInsert){
            if(isset($data['gallery_image'])){
                foreach($data['gallery_image'] as $key => $value){
                    Gallery::create([
                        'data_id' => $id,
                        'type' => 'property',
                        'path' => Gallery::uploadFile($value),
                    ]);
                }
            }
        }

        return redirect()->route('admin.property.index')->with('success_message', 'Property updated successfully.');
    }

}
