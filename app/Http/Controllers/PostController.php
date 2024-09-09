<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    //
	public function index()
    {
        $posts = Post::all();
        return view('posts.index')
					->with('posts', $posts);
    }
	
	public function create(Request $request) {
		return view('posts.create');
	}
	
	public function add() {
		 $request->validate([
            'post' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
	}
	
	public function view(Request $request) {
		
	}
	
	public function update(Request $request) {
		
	}
	
	public function remove(Request $request) {
		
	}
}
