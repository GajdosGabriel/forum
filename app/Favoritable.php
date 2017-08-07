<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 03.08.2017
 * Time: 11:16
 */

namespace App;


trait Favoritable
{

    public function favorites() {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function isFavorited()
    {
        return ! ! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }




}