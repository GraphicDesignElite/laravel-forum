@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('thread', $thread) }}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="thread-detail">
                    <div class="user-avatar">
                        <!-- TODO insert image -->
                    </div>
                    <p><a href="/user/{{$thread->user->id}}/{{$thread->user->username}}">{{$thread->user->username}}</a>
                        <small>Created {{$thread->created_at->diffForHumans()}}</small>
                    </p>
                    <h1 class="h3">{{$thread->title}}</h1>
                </div>
                <div class="thread-content">
                    {!! $thread->content !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="button-toolbar">
                    <div class="contents">
                        <!-- TODO upvoting via ajax -->
                        <upvote-button 
                            vote-count="{{$thread->upvotes->count()}}" 
                            v-bind:did-vote="{{ json_encode($thread->isUpvoted) }}" 
                            id="{{$thread->id}}" 
                            type="thread" >
                        </upvote-button>

                        <reply-button type="thread" itemid="{{$thread->id}}"/>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <div id="comments-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{$thread->comments->count()}} {{  $thread->comments->count() != 1 ? "Comments" : "Comment" }}</h4>
                    <div class="filter-toolbar">
                        X
                    </div>
                    @foreach($thread->comments as $comment)
                        <div class="comment">
                            <small><a href="/user/{{$comment->user->id}}/{{$comment->user->username}}">{{$comment->user->username}}</a> commented {{$comment->created_at->diffForHumans()}}</small>
                            <p>{!! $comment->content !!}</p>
                            <div class="button-toolbar">
                                <div class="contents">

                                    <upvote-button 
                                        vote-count="{{$comment->upvotes->count()}}" 
                                        v-bind:did-vote="{{ json_encode($comment->isUpvoted) }}" 
                                        id="{{$comment->id}}" 
                                        type="comment" >
                                    </upvote-button>
                                    <reply-button type="comment" itemid=""/>
                                    <a href="#" class="btn btn-secondary btn-sm">Reply</a>
                                </div>
                            </div> 
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @if (!Auth::guest())
        <comment-box 
            itemid="1"
            type="thread"
            username="{{Auth::user()->username}}">
        </comment-box>
            
        <?php /* 
        <div class="create-comment" v-bind:class="{ show: uiCreateComment }">
            @include('partials.form-error-message')
            <form action="/comment/{{$thread->id}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="user-avatar">
                            <!-- TODO insert image -->
                            </div>
                            <label for="content">Comment as <strong>{{Auth::user()->username}}</strong></label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="toolbar">
                            <button type="submit" class="btn btn-primary btn-sm">Comment</button>
                            <button class="btn btn-secondary btn-sm" v-on:click.prevent="toggleCreateComment()">Close</button>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control summernote {{ $errors->has('content') ? 'is-invalid' : ''}}" name="content" id="content" rows="3" required placeholder="Write a comment"></textarea>
                    </div>
                </div> 
            </form>
        </div>
        */ ?> 
    @endif
    
@endsection