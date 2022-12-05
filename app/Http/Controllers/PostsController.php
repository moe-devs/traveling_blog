<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','DESC')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'description'   =>  'required',
            'image' =>  'required|mimes:png,jpg,jpeg,webp'
        ]);

        $slug = SlugService::createSlug(Post::class,'slug',$request->title);
        $image = $request->image;
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        
        $request->image->move('images',$image_name);
        Post::create([
            'title' =>  $request->title,
            'description'   =>  $request->description,
            'slug'  =>  $slug,
            'image_path'    =>  $image_name,
            'user_id'   =>  auth()->user()->id
        ]);
        return redirect('/blog')->with('message','Your post has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $slugs = SlugService::createSlug(Post::class,'slug',$request->title);
        if($request->image) {
            $image= $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('images',$image_name);
            Post::where('slug',$slug)
            ->update([
                'title' =>  $request->title,
                'description' => $request->description,
                'slug'  =>  $slugs,
                'image_path' => $image_name,
                'user_id'   =>  auth()->user()->id
            ]);
        }
        else{
            Post::where('slug',$slug)
            ->update([
                'title' =>  $request->title,
                'description' => $request->description,
                'slug'  =>  $slugs,
                'user_id'   =>  auth()->user()->id
            ]);
        }

        return redirect('/blog')->with('message','Your Post has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image_path = public_path() . "/images/" ;
        $image = $image_path . $post->image;
        if(file_exists($image)) {
            @unlink($image);
        }
        $post->delete();
        return redirect('/blog')->with('message','POST Deleted Successfully');
    }
}
