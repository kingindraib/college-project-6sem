<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Category::create($data);
        return redirect()->route('category.index')->with('success_message','Category created successfully.');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        Category::where('parent_id',$id)->delete();
        $category->delete();
        return redirect()->route('category.index')->with('success_message','Category deleted successfully.');
    }

    public function edit($id)
    {
        $data = Category::findorFail($id);
        return view('admin.category.edit',compact('data'));
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        Category::find($id)->update($data);
        return redirect()->route('category.index')->with('success_message','Category updated successfully.');
    
    }
}
