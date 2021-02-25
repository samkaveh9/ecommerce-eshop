<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(8);
        return view('dashboard.admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(auth()->user());
        return view('dashboard.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileEXT = $file->getClientOriginalExtension();
                $fileName = date('Ymdhis') .'.'. $fileEXT;
                Image::make($file)->resize(360,160)
                ->save(public_path('upload/blog/') . $fileName);
            }
            Blog::create(array_merge($request->all(),['image' => $fileName]));  
         return redirect(route('blog.index')); 
        } catch (Exception $e) {
            dd($e);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.admin.blog.edit',compact('blog')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        try {
            unlink(public_path('upload/blog/'.$blog->image));
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileEXT = $file->getClientOriginalExtension();
                $fileName = date('Ymdhis') .'.'. $fileEXT;
                Image::make($file)->resize(360,160)
                ->save(public_path('upload/blog/') . $fileName);
            }
            $blog->update(array_merge($request->all(),['image' => $fileName]));  
         return redirect(route('blog.index')); 
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        unlink(public_path('upload/blog/'.$blog->image));
        $blog->delete();
        return redirect(route('blog.index')); 
    }
}
