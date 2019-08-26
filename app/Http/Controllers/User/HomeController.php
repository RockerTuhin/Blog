<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

    	$posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);

    	//return (string)$posts->hasMorePages();
    	//return (string)$posts->nextPageUrl();
    	//return $posts;

    	return view('user.blog',compact('posts'));
    	
    }

    public function tag(Tag $tag)
    {
    	$posts = $tag->posts();
    	//return $tag = Tag::where('slug',$slug)->get();//AS SAME AS UPPER LINE WITHOUT EFFECT OF posts()

    	return view('user.blog',compact('posts'));
    }

    public function category(Category $category)
    {

    	$posts = $category->posts();
    	//return $category = Category::where('slug',$slug)->get();//AS SAME AS UPPER LINE WITHOUT EFFECT OF posts()

    	return view('user.blog',compact('posts'));
    }
}
