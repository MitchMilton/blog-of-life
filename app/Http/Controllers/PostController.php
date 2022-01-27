<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get and list all posts
        $posts = Post::all();     
        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('pages.posts_create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255|unique:posts',                       
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024|sometimes',            
        ));

                
        //store in the database
        $post = new Post;
        $post->title = $request->title;        
        $post->content = $request->content;
        $post->slug = str_slug($post->title);
        
        if($request->hasFile('image')){           
                
            $fileNamewithExt = $request->file('image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNamewithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $post->image = 'p_'.$post->id.'_img'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/post',$post->image);
            $post->image = 'storage/post/'.$post->image;
            
        }
        
        $post->save();

        return redirect('/dashboard')->with('success', $post->title.'  has been created!');
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
        $post = Post::find($id);
        if(empty($post)){
            return redirect('/dashboard')->with('error', "Post does'nt exist!");
        }else{            
            return view('pages.posts_create_edit',compact('post'));
        }
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
        $this->validate($request, array(
            'title' => 'required|max:255|unique:posts,'.$id,                       
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024|sometimes',            
        ));  

        //GET POST FROM DB AND UPDATE
        $post = Post::findOrFail($request->id);
        $post->title = $request->title;
        $post->slug = $post->title;
        $post->content = $request->content;
        $post->slug = str_slug($post->title);
        //Handle File Upload
        if($request->hasFile('image')){
            $oldFiletitle = $post->image;   
                    
            $fileNamewithExt = $request->file('image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNamewithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $post->image = 'p_'.$post->id.'_img'.time().'.'.$extension;
            Storage::delete($oldFiletitle);
            //Upload Image
            $path = $request->file('image')->storeAs('public/post',$post->image);
            $post->image = 'storage/post/'.$post->image;

        }

        $post->save();

        return redirect('/dashboard')->with('success', $post->title.' updated');
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

        if($post->delete()){
            
            return redirect('dashboard')->with('success', $post->title. ' has been deleted!');
        }
    }
}
