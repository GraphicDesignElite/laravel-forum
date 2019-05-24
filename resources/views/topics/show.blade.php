@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('topic', $topic) }}
    <div class="container-fluid">
        <div class="row">
            <h1 class="display-3">{{$topic->name}}</h1>
            <p class="lead">{{$topic->description}}</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bar">
                    @if (!Auth::guest())
                        <a href="/{{$topic->id}}/{{$topic->slug}}/create-thread" class="btn btn-primary float-right">+ New</a>
                    @endif
                    <h3>Current Threads:</h3>
                    
                </div>
                
               
                @foreach($threads as $thread)
                    <div class="topic">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="mb-0">
                                    <a href="/{{$topic->id}}/{{$topic->slug}}/{{$thread->id}}/{{$thread->slug}}">{{$thread->title}}</a>
                                </p>
                                <small>
                                    Started by <a href="/user/{{$thread->user->id}}/{{$thread->user->username}}">{{$thread->user->username}}</a>
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