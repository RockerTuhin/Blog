<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Like;
use App\Model\User\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $post)
    {
    	//return $post;
    	return view('user.post',compact('post'));
    }

    public function getAllPosts()
    {

    	return $posts = Post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(5);

    }

    public function saveLike(Request $request)
    {

    	$likeCheck = Like::where(['user_id' => Auth::id(),'post_id' => $request->id])->first();

    	if($likeCheck) 
    	{

    		Like::where(['user_id' => Auth::id(),'post_id' => $request->id])->delete();
    		return 'deleted';

    	}else{

    		$like = new Like;

	    	$like->user_id = Auth::id();

	    	$like->post_id = $request->id;

	    	$like->save();

    	}

    }
}
