<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $category = category::all();
        // $category = category::all();
        return view('news.home' , compact('category'));
        //
    }


}
