<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.posts.index',[
            'posts' => post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    $validate = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|max:255',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
    ]);
   
    if ($request->file('image')) {
        $validate['image'] = $request->file('image')->store('post-images');
    }
   
    
    $validate['user_id'] = auth()->user()->id;
    $validate['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
    post::create($validate);

    return redirect('dashboard/posts');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('/dashboard.post.index',[
            'title' => 'detail',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
{
    $validate = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|max:255',
        'image' => 'image|file|max:1024',
        'category_id' => 'required',
        'body' => 'required'
    ]);
    if ($request->file('image')) {
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validate['image'] = $request->file('image')->store('post-images');
    }
            $validate['user_id'] = auth()->user()->id;
             $validate['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
    
    $post->update($validate);
    
    return redirect('dashboard/posts')->with('success', 'Post updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        post::destroy($post->id);
        return redirect('dashboard/posts');
    }

    public function upload(Request $request)
    {
        $validate = $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx,xlsx,xls'
        ]);

        $file = $request->file('file');
        $path = $file->store('post-images', 'public');
        
        return response()->json([
            'url' => Storage::url($path)
        ]);

        
    }
}
