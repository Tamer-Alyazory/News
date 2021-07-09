<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\article;
use Illuminate\Http\Request;

class allNewsController extends Controller
{
    //
    public function allNews($id){
        $articles = article::where('category_id', $id)->get();
        $allartical = article::orderBy('id', 'desc')->simplePaginate(5);
        return view('news.all-news',compact('articles' , 'allartical'));

    }
}
