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
        return view('posts.index')->with('posts', $posts);
    }
	
	public function addPage(Request $request) {
		return view('posts.addPage');
	}
	
	public function add(Request $request) {
		 $request->validate([
            'post' => 'required|string|max:250',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $addPost = new Post();
        $addPost->post = $request->post;
        $addPost->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $addPost->image = $imagePath;
        }

        $addPost->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
	}
	
	public function viewPage(Request $request) {
		$posts = Post::all();
        return view('posts.view')->with('posts', $posts);
	}
	
	public function updatePage(Request $request) {
		$posts = Post::where('id','=',$request->id)->get();
        return view('posts.update')->with('posts', $posts);
	}
	
	public function update(Request $request, Post $post)
    {
        $request->validate([
            'post' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post->post = $request->post;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Delete image from storage
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
