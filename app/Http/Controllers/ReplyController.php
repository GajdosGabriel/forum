<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Thread $thread) {
       $reply = $thread->addReply([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        if( request()->acceptsJson()) {
            return $reply;
        }

        return back();
    }

    public function update(Reply $reply) {
        $reply->update(request(['body']));

        return back();
    }

    public function destroy(Reply $reply) {

        $reply->delete();

        if( request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }
        return back();
    }
}
