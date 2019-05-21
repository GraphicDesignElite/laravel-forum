<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;
use App\Comment;
use App\Upvote;
class UpvoteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function upvoteThread(Thread $thread)
    {
        $action = $this->handleUpvote('App\Thread', $thread->id);
        return response()->json(['action' => $action]);
    }
    public function upvoteComment(Comment $comment)
    {
        $action = $this->handleUpvote('App\Comment', $comment->id);
        return response()->json(['action' => $action]);
    }
    public function handleUpvote($type, $id)
    {
        $existing_upvote = Upvote::withTrashed()->whereUpvoteableType($type)->whereUpvoteableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_upvote)) {
            Upvote::create([
                'user_id'       => Auth::id(),
                'upvoteable_id'   => $id,
                'upvoteable_type' => $type,
            ]);
            return 'added';
        } else {
            if (is_null($existing_upvote->deleted_at)) {
                $existing_upvote->delete();
                return 'removed';
            } else {
                $existing_upvote->restore();
                return 'added';
            }
        }
    }
}
