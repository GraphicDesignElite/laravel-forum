@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-3">{{$thread->title}}</h1>
        {!! $thread->content !!}
        <small>Created by <a href="/user/{{$thread->user->id}}/{{$thread->user->username}}">{{$thread->user->username}}</a> {{$thread->created_at->diffForHumans()}}</small>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{$comments->count()}} {{  $comments->count() != 1 ? "Comments" : "Comment" }}</h3>
                @if (!Auth::guest())
                    @include('partials.form-error-message')
                    <form action="/comment/{{$thread->id}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  [image]<label for="content">Comment as <strong>{{Auth::user()->username}}</strong></label>
                                  <textarea class="form-control summernote {{ $errors->has('content') ? 'is-invalid' : ''}}" name="content" id="content" rows="3" required placeholder="Write a comment"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </div>
                        </div>
                    </form>
                @endif
                @foreach($comments as $comment)
                    <div class="comment">
                        <small><a href="/user/{{$comment->user->id}}/{{$comment->user->username}}">{{$comment->user->username}}</a> commented {{$comment->created_at->diffForHumans()}}</small>
                        <p>{!! $comment->content!!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection