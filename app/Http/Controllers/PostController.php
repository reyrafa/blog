<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->simplePaginate(10);
        return view('dashboard', [
            'posts' => $posts
        ]);
    }
    public function create(){
        return view('posts.create');
    }

    public function store(StoreRequest $request){
        $validated_request = $request->validated();
        Post::create($validated_request);
        return redirect()->route('dashboard')->with('success', 'Post created successfully');
    }
}
