<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs=blog::latest()->get();
        return view('blog.index',compact('blogs'));
    }
    public function more(){
        return view('blog.readmore');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $user_id=Auth::user()->id;
 
            $blog=new Blog;
            $blog->title=$request->input("title");
             $blog->description=$request->input("description");
            $blog->user_id=$user_id;
            if($request->hasFile('file'))
            {
                $file=$request->file("file");
                $extension=$file->getClientOriginalExtension();
                $filename=time().".".$extension;
                $file->move("images/",$filename);
                $blog->image=$filename;

            }
            if($blog->save())
            {
                return 1;
            }

        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {
     
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
