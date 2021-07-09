<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = author::all();
        $uthors = author::with('user')->get();

        return response()->view('cms.authors.index' , ['authors'=>$uthors]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $roles = Role::where('guard_name', 'author')->get();

        // return response()->view('cms.authors.create',compact('categories'));
        return response()->view('cms.authors.create',['categories'=>$categories ,  'roles' => $roles]);


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
            'name'=>"required|min:3|max:25",
            'email' => 'required|email|unique:authors',
            'mobile' => 'required|numeric',
            'gender' => 'required|string|max:1|in:M,F',
        ]);

        if (!$validator->fails()) {
            $author = new author();
            $author->email = $request->email;
            $author->password = Hash::make($request->get('password'));
            
                $isSaved = $author->save();
            if ($isSaved) {
                
                // $role = Role::findById($request->get('role_id'));
                // $admin->assignRole($role->name);
                $user = new User();
                $user->name = $request->get('name');
                $user->mobile = $request->get('mobile');
                $user->gender = $request->get('gender');
                $user->actor()->associate($author);
                $isSaved = $user->save();
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
