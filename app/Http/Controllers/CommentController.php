<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, Thread $thread){
        
        $validated = request()->validate([
            'content' => 'required'
        ]);
        $validated['user_id'] = auth()->user()->id;
        $validated['username'] = auth()->user()->username;
        $validated['thread_id'] = $thread->id;
        // Use custom class to process summernote data
        $validated['content'] = \AppHelper::instance()->makeSummernote($validated['content']);

        $comment = Comment::create($validated);
        return response()->json(['comment' => $comment]);
        //return \Redirect::back();
    }
}
