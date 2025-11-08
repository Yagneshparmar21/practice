<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments = Comment::all();
        $posts = Post::with('comments')->get();
        return view('comment.create', compact('comments', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'name' => 'required',
        ], [
            'post_id.required' => 'The post field is required.',
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $posts = Post::with('comments')->get();
        return view('comment.edit', compact('comment', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'post_id' => 'required',
            'name' => 'required',
        ], [
            'post_id.required' => 'The post field is required.',
        ]);

        $comment->update([
            'post_id' => $request->post_id,
            'name' => $request->name,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
    }
}
