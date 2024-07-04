<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AllowedUsernameController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        'latestPosts' => post::latest()->take(3)->get(),
        'categories' => Category::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "nama" => "Bayu Wisnu Aji",
        "email" => "bayuwisnu9294@gmail.com",
        "nohp" => "083806620512",
        'categories' => Category::all(),
        "title" => "about",
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

Route::get("/post/{post:slug}", [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post by: $category->name",
        'categories' => Category::all(),
        'posts' => $category->posts()->with('category', 'user')->paginate(5),
        'category' => $category->name
    ]);
});

Route::get('author/{user:username}', function (User $user) {
    return view('posts', [
        'title' => "Post by: $user->name",
        'categories' => Category::all(),
        'posts' => $user->posts()->with('user', 'category')->paginate(5),
        'user' => $user->name
    ]);
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'auth']);
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('dashboard/posts', DashboardPostController::class)->names([
    'index' => 'posts.index',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
    'edit' => 'posts.edit',
    'update' => 'posts.update',
    'destroy' => 'posts.destroy',
]);
Route::resource('dashboard/category',AdminCategoryController::class)->middleware('admin');

Route::post('dashboard/posts/upload', [DashboardPostController::class, 'upload'])->name('upload');

Route::get('/allowed_usernames', [AllowedUsernameController::class, 'index'])->name('allowed_usernames.index')->middleware('admin');
Route::post('/allowed_usernames', [AllowedUsernameController::class, 'store'])->name('allowed_usernames.store')->middleware('admin');
Route::delete('/allowed_usernames/{username}', [AllowedUsernameController::class, 'destroy'])->name('allowed_usernames.destroy')->middleware('admin');