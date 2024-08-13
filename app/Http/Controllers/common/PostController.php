<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Auth;
use App\Models\Category;
use App\Models\PostMeta;
class PostController extends Controller
{
    public function index(Request $request)
    {
        if($request->category_id){
            $post = Post::where('category_id', $request->category_id)->orderBy('id', 'DESC')->get();
            $post_title = Category::find($request->category_id)->name;
        }else{
            $post = Post::orderBy('id','DESC')->get();
            $post_title = 'All Post';
        }
        
        return view('admin.post.index', compact('post','post_title'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        $data['slug'] = Str::slug($request->title);
        if($request->hasFile('image') && $request->file('image')->isValid() == true){
        $data['image'] = Post::uploadFile($data['image']);
        }
        $lastInsert =  Post::create($data);
        if($request->icon){
            PostMeta::create([
                'post_id' => $lastInsert->id,
                'meta_key' => 'icon',
                'meta_value' => $request->icon
            ]);
        }
        return redirect()->route('post.index')->with('success_message', 'Post created successfully.');
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view('admin.post.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['user_id'] = Auth::guard('admin')->user()->id;
        // $data['slug'] = Str::slug($request->title);
        if($request->hasFile('image') && $request->file('image')->isValid() == true){
            Post::deleteFile($post->image);
        $data['image'] = Post::uploadFile($data['image']);
        }
        $post->update($data);
        return redirect()->route('post.index')->with('success_message', 'Post updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        Post::deleteFile($post->image);
        $post->delete();
        return redirect()->route('post.index')->with('success_message', 'Post deleted successfully.');
    
    }
}
