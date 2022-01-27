<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    //
    public function index()
    {
        //get and list all posts
        $posts = Post::all();     
        return view('welcome', compact('posts'));
    }

    public function viewPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('pages.posts_view', compact('post'));
    }
}
