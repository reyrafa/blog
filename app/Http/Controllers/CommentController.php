<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(StoreRequest $request, Post $post)
    {
        $validated_request = $request->validated();
        Comment::create($validated_request);
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(UpdateRequest $request, Comment $comment_id)
    {
        $validated_request = $request->validated();
        $comment_id->update($validated_request);
        return redirect()->route('dashboard')->with('success', 'Comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('dashboard')->with('success', 'Comment deleted successfully');
    }
}
