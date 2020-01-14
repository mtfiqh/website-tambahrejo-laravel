<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getHomeNeed(){
        $data["categories"] = \App\Category::all();
        $data["slideshows"] = \App\Post::all()->sortByDesc('created_at')->take(3);
        return $data;
    }
    public function index()
    {
        //
        $posts = \App\Post::orderBy('created_at', 'DESC')->paginate(6);
        $homeNeed = $this->getHomeNeed();
        // dd($slideshows);
        return view('home', [
            'posts'=>$posts, 
            'categories'=>$homeNeed["categories"],
            'slideshows'=>$homeNeed["slideshows"]
        ]);
    }

    public function show($cat, $slug)
    {
        // echo $slug;
        $category = \App\Category::where('slug', $cat)->first();
        if(!$category) return abort(404);
        $post = $category->posts()->where('slug', $slug)->first();
        if(!$post) return abort(404);
        return view('read', ['post'=>$post]);
        
    }


    public function category($category){
        $category = \App\Category::where('slug', $category)->first();
        if(!$category){
            return abort(404);
        }

        $posts = $category->posts()->orderBy('created_at', 'DESC')->paginate(6);

        $homeNeed = $this->getHomeNeed();

        return view('home', [
            'posts'=>$posts, 
            'categories'=>$homeNeed["categories"],
            'slideshows'=>$homeNeed["slideshows"]
        ]);
    }

    public function search(Request $request){
        $posts = \App\Post::where('title', 'like', '%'.$request->get('query').'%')->orWhere('body', 'like', '%'.$request->get('query').'%')->orderBy('created_at', 'DESC')->paginate(6);
        $homeNeed = $this->getHomeNeed();

        return view('home', [
            'posts'=>$posts, 
            'categories'=>$homeNeed["categories"],
            'slideshows'=>$homeNeed["slideshows"]
        ]);
        
    }

    private function getDataJSON(){
        $data[] = '';
    }

    public function maps(){
        $file = file_get_contents(asset('/json/BALAI_DESA.json'));
        echo 'tes';
    }
}
