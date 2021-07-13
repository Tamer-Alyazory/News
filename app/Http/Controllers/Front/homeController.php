<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $category = category::all();
        $article = article::all();
        // $category = category::all();
        return view('news.home' , compact('category' , 'article'));
        //
    }

    public function contact()
    {
       return view('news.contact');
    }
    // public function check($name){
    //     return 'welcom : ' . $name;
    // }

    public function showarticle($id) {
        $article = article::find($id);
        $seen_count = $article->seen_count;
        // $article->increament('seen_cout');
        $article->seen_count = $seen_count + 1;
        $article->save();
        $article->refresh();
    }


}
