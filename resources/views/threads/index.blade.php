@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="display-3">Threads</h1>
            <p class="lead">View all Threads</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    @foreach($threads as $thread)
                    <div class="topic">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="mb-0">
                                    <a href="/{{$thread->topic->id}}/{{$thread->topic->slug}}/{{$thread->id}}/{{$thread->slug}}">{{$thread->title}}</a>
                                </p>
                                <small>
                                    Started by <a href="/user/{{$thread->user_id}}/{{$thread->username}}">{{$thread->username}}</a>dfasfds
                                    {{$thread->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <div class="col-md-4 text-right">
                                <div class="button-panel">
                                    <small>{{$thread->views}} Views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>
    
@endsection