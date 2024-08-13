<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page;
use App\Models\AwardCategory;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('menu_position',1)->where('parent_menu',NULL)->get();
        $categories = Category::where('status', 'publish')->get();
        foreach($categories as $cat){
            $cat->menu_type = 'Category';
        }
        $page = Page::where('status', 'publish')->get();
        foreach($page as $pg){
            $pg->menu_type = 'Page';
        }
        $award_category =AwardCategory::where('status', 'publish')->get();
        foreach($award_category as $aw){
            $aw->menu_type = 'AwardCategory';
        }
        $allitems = array_merge($categories->toArray(), $page->toArray(),$award_category->toArray());
        // dd($allitems);
        return view('admin.menu.index', compact('menus','allitems'));
    
    }

    public function store_main(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $newArray = [];
        foreach ($data['menuvalue'] as $string) {
            $string = str_replace("'", '"', $string); 

            $content = utf8_encode($string);
            $array = json_decode($content);
            // dd($array);
            $newArray[] = $array;
        }
        // dd($newArray);
        Menu::where('menu_position',$data['menu_position'])
                        // ->where('parent_id',$data['parent_id'])
                        ->delete();
        foreach($newArray as $key=>$value){
            $data['menu_id'] = $value->id;
            $data['menu_type'] = $value->type;
            // dd($data);
            $is_exixst = 
            Menu::create($data);
        }
        
       return redirect()->back()->with('success_message','Menu updated successfully');
    }

    public function store_sub(Request $request)
    {
        $request->validate([
            'parent_menu' =>'required',
        ]);
        $data = $request->all();
        // dd($data);
        // $data['menuvalue'] = json_encode($data['menuvalue']);
        $newArray = [];
        foreach ($data['menuvalue'] as $string) {
            $string = str_replace("'", '"', $string); 

            $content = utf8_encode($string);
            $array = json_decode($content);
            $array->parent_menu = $data['parent_menu'];
            // dd($array);
            $newArray[] = $array;
        }
        // dd($newArray);
        // Menu::where('menu_position',$data['menu_position'])
        //                 ->where('parent_id',$data['parent_id'])
        //                 ->delete();
        foreach($newArray as $key=>$value){
            $data['menu_id'] = $value->id;
            $data['menu_type'] = $value->type;
            // dd($data);
            // $is_exixst = 
            Menu::create($data);
        }
        
       return redirect()->back()->with('success_message','Menu updated successfully');
    
    }

    public function delete_sub($id)
    {
        Menu::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Menu deleted successfully');
    
    }
}
