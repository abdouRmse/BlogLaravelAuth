<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $recent = Post::orderBy('id',"DESC")->limit(2)->get();
        return view("posts.index",["posts" => $posts,'recent' => $recent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("posts.create",["request" => $request]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            "image_post" => 'required|mimes:jpg,png,jped|max:5048'
        ]);
        //return view("posts.store",["req"=>$request]); // for test
        $title=$request->input("title");
        $content=$request->input("content");
        $slug = Str::of($title)->slug('-'); // create the slug
        // the save of the image:
        $newImagePathName = uniqid()."-".$slug.".".$request->image_post->extension();
        $request->image_post->move(public_path("images"),$newImagePathName); // enregistre le file que est dans la $request dans le fichier puqlic "images" sou le nom de $newImagePathName

        Post::create([
            'slug' => $slug,
            'title' => $title,
            'content' => $content,
            'image_path' => $newImagePathName,
            'user_id' => Auth()->user()->id
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("posts.edit",["post" => Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            "image_post" => 'required|mimes:jpg,png,jped|max:5048'
        ]);
        $post = Post::findOrFail($id);
        $newImagePathName = uniqid()."-".$post->slug.".".$request->image_post->extension();
        $request->image_post->move(public_path("images"),$newImagePathName); // enregistre le file que est dans la $request dans le fichier puqlic "images" sou le nom de $newImagePathName
        Post::where('id',$id)
        ->update([
            'title' => $request->input("title"),
            'content' => $request->input("content"),
            'slug' => Str::of($post->title)->slug('-'),
            'image_path' => $newImagePathName,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
