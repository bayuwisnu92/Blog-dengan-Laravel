<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            'categories' => Category::all(),
            "posts" => Post::latest()->filter(request(['search']))->paginate(7)
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            'categories' => Category::all(),
            "post" => $post
        ]);
    }
}
