<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Str;

class PropertyCategoryController extends Controller
{
    public function index(Request $request)
    {
        $edit_data = [];
        if($request->edit){
            $edit_data = PropertyCategory::find($request->edit);
        }

        $category = PropertyCategory::orderBy('id', 'desc')->get();
        return view('admin.property.category.index',compact('category','edit_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        PropertyCategory::create($data);

        return back()->with('success_message', 'Category added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        PropertyCategory::find($id)->update($data);

        return back()->with('success_message', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        PropertyCategory::find($id)->delete();
        return back()->with('success_message', 'Category deleted successfully!');
    }
}
