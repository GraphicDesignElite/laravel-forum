<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('topic', function ($trail, $topic) {
    $trail->parent('home');
    $trail->push($topic->name, route('show-topic', [$topic->id, $topic->slug]));
});

// Home > Thread
Breadcrumbs::for('thread', function ($trail, $thread) {
    $trail->parent('topic', $thread->topic);
    $trail->push($thread->title, route('show-thread', [$thread->id, 'test', $thread->id, $thread->slug]));
});

