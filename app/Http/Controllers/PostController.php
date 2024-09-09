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
        return view('posts.index', compact('posts'));
    }
	
	public function create(Request $request) {
		return view('posts.create');
	}
	
	public function view(Request $request) {
		
	}
	
	public function update(Request $request) {
		
	}
	
	public function remove(Request $request) {
		
	}
}
