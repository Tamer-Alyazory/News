<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = author::all();
        return response()->view('cms.authors.index' , ['authors'=>$data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        // return response()->view('cms.authors.create',compact('categories'));
        return response()->view('cms.authors.create',['categories'=>$categories]);


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
            'category_id' => 'required|numeric|exists:categories,id',
            'name'=>"required|min:3|max:25",
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|numeric',
            'gender' => 'required|string|max:1|in:M,F',
            // 'author_id' => 'required|numeric|exists:authors,id',

            
            // 'status'=>"in:Active",
        ]);

        if (!$validator->fails()) {
            $author =new author();          
            $author->email = $request->get('email');
            $author->password = Hash::make("password");
            $author->name = $request->get('name'); 
            $author->mobile = $request->get('mobile');
            $author->gender = $request->get('gender');
            
            // dd($request->get('category_id'));
            $isSaved = $author->save();

            
            // تسنخدم في علاقة المني تو مني
            $author->categories()->attach($request->get('category_id'));
           

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
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        //
    }
}
