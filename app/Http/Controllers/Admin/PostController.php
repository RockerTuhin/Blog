<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            
            $tags = Tag::all();

            $categories = Category::all();

            return view('admin.post.post',compact('tags','categories'));

        }
        
        return redirect(route('admin.home'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'title' => 'required',

            'subtitle' => 'required',

            'slug' => 'required',

            'body' => 'required',

            'image' => 'required',

        ]);

        if($request->hasFile('image'))
        {

            $imageName = $request->image->store('public');

        }

        $post = new Post;

        $post->image = $imageName;

        $post->title = $request->title;

        $post->subtitle = $request->subtitle;

        $post->slug = $request->slug;

        $post->body = $request->body;

        $post->status = $request->status;

        $post->posted_by = Auth::user()->name;

        $post->save();

        $post->tags()->sync($request->tags);

        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->can('posts.update'))
        {

            $post = Post::with('tags','categories')->where('id',$id)->first();

            $tags = Tag::all();

            $categories = Category::all();

            return view('admin.post.post',compact('tags','categories','post'));

            //return view('admin.post.edit',compact('post'));

        }

        return redirect(route('admin.home'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([

            'title' => 'required',

            'subtitle' => 'required',

            'slug' => 'required',

            'body' => 'required',

            'body' => 'required',

            'image' => 'required',

        ]);

        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public');
        }

        $post = Post::find($id);

        $post->image = $imageName;

        $post->title = $request->title;

        $post->subtitle = $request->subtitle;

        $post->slug = $request->slug;

        $post->body = $request->body;

        $post->status = $request->status;

        $post->tags()->sync($request->tags);

        $post->categories()->sync($request->categories);

        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();

        return redirect()->back();
    }
}
