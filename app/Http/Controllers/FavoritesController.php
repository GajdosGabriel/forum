<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function store(Reply $reply) {

        $reply->favorite();
        return back();
    }

    public function destroy(Reply $reply) {

        $reply->unFavorited();
        return back();
    }
}
