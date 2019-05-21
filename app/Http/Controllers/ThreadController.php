<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Thread;
class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::with('topic')->orderBy('created_at', 'DESC')->get();
        return view('threads.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Topic $topic, $slug)
    {
        abort_if($slug !== $topic->slug, 403); 
        return view('threads.create', compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Topic $topic)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $validated['content'] = \AppHelper::instance()->makeSummernote($validated['content']);
        
        $validated['slug'] = str_slug($validated['title']);
        $validated['user_id'] = auth()->user()->id;
        $validated['topic_id'] = $topic->id;
        $thread = Thread::create($validated);
        
        // Add the the thread count
        $topic->thread_count = $topic->thread_count + 1;
        $topic->save();

        // Redirect to the newly created thread
        return \Redirect::route('show-thread', [
            'topic'=> $topic->id, 
            'slug' =>$topic->slug,
            'thread'=> $thread->id,
            'threadslug' => $thread->slug
            ])->with('success', 'Your thread has been created.');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic, $slug, Thread $thread, $threadslug)
    {
        abort_if($slug !== $topic->slug || $threadslug !== $thread->slug, 403); 
        $thread->views = $thread->views + 1;
        $thread->save();
        // Load Comments
        $thread->load('comments.upvotes');

        //dd($thread->comments[0]->upvotes);
        
        
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
