<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});



// Home > Topic
Breadcrumbs::for('thread', function ($trail, $thread) {
    $trail->parent('home');
    $trail->push($thread->title, route('show-thread', [$thread->id, 'test', $thread->id, $thread->slug]));
});

