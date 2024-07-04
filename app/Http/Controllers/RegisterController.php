<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index',[
            'title' => 'register',
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request){

       $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        $request->session()->flash('succes','selamat data berhasil silakan login');
        return redirect('/login');
    }
}
