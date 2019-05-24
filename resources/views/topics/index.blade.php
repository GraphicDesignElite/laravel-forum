@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('home') }}
    <div class="container-fluid">
        <div class="row">
            <h1 class="display-3">Topics</h1>
            <p class="lead">View all Topics</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bar">
                    @if (!Auth::guest())
                        <a href="/topics/create" class="btn btn-primary float-right">+ New</a>
                    @endif
                    <h3>All Topics:</h3>
                    
                </div>
                <div id="topic-list">
                    @foreach($topics as $topic)
                    <div class="topic">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="mb-0">
                                    <a href="/topic/{{$topic->id}}/{{$topic->slug}}">{{$topic->name}}</a>
                                </p>
                                <small>{{$topic->description}}</small>
                            </div>
                            <div class="col-md-4 text-right">
                                <div>
                                    <small>
                                        {{$topic->thread_count}} {{  $topic->thread_count != 1 ? "Threads" : "Thread" }}
                                    </small>
                                </div>
                                
                            </div>
                        </div>
                    </div>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection