<?php
use App\Models\SiteVisitor;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Page;


if(!function_exists('sidebar_active')){
    function sidebar_active($route = []){
        return request()->routeIs($route) ? 'active' : '';
    }
}

if(!function_exists('site_visitor')){
    function site_visitor(){
        $visitor = SiteVisitor::all();
        return $visitor->count();
    }
}

if(!function_exists('site_visitor_today')){
    function site_visitor_today(){
        $visitor = SiteVisitor::whereDate('created_at', Carbon::today())->get();
        return $visitor->count();
    }
}

if(!function_exists('site_visitor_yesterday')){
    function site_visitor_yesterday(){
        $visitor = SiteVisitor::whereDate('created_at', Carbon::yesterday())->get();
        return $visitor->count();
    }
}

if(!function_exists('total_user')){
    function total_user(){
        return User::all()->count();
    }
}

if(!function_exists('categoryAll')){
    function categoryAll(){
        return Category::all();
    }
}

if(!function_exists('all_page')){
    function all_page(){
        return Page::where('status','publish')->get();
    }
}

if(!function_exists('uploadFile')){
    function uploadFile($files, $custom_path = '')
{
    $path = '/uploads/' . $custom_path . '/';

    if (is_array($files)) {
        $uploadedPaths = [];
        foreach ($files as $file) {
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $filepath = $path . $filename;
                $file->move(public_path($path), $filename);
                $uploadedPaths[] = $filepath;
            } else {
                $uploadedPaths[] = NULL;
            }
        }
        return $uploadedPaths;
    } else {
        if ($files->isValid()) {
            $extension = $files->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $filepath = $path . $filename;
            $files->move(public_path($path), $filename);
            return $filepath;
        } else {
            return NULL;
        }
    }
}

}

if(!function_exists('get_page_by_id')){
    function get_page_by_id($id){
        return Page::find($id);
    }
}

if (!function_exists('page_detail')) {
    function page_detail($id)
    {
        return Page::find($id);
    }
}

