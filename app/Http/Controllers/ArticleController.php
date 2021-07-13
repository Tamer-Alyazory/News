<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\author;
use App\Models\category;
use App\Models\image;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = article::all();
        return response()->view('cms.articles.index' , ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $authors = author::all();
        $images = image::all();
        return response()->view('cms.articles.create' , ['categories'=>$categories , 'authors'=>$authors , 'images'=>$images]) ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'title'=>"required|min:3|max:25",
            'short_description'=>"required",
            'full_description'=>"required",

        ]);

        if (!$validator->fails()) {
            $article =new article();
            $article->category_id = $request->get('category_id');
            $article->author_id = $request->get('author_id');
            // $article->image_id = $request->get('image_id');
            $article->title = $request->get('title');
            $article->short_description = $request->get('short_description');
            $article->full_description = $request->get('full_description');

            $image_id = $request->file('image_id');

            $imageName = time() . '_article.' . $image_id->getClientOriginalExtension();

            $image_id->storeAs('image/article', $imageName, ['disk' => 'public']);

            $article->image_id = $imageName;



            $isSaved = $article->save();
            if ($isSaved) {

                return response()->json(['message' => $isSaved ? "Saved successfully" : "Failed to save"], $isSaved ? 201 : 400);
            } else {
                return response()->json(['message' => "Failed to save"], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        //
    }
}
