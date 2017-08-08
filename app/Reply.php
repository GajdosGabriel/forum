<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;

    protected $guarded = [];
//    do jsonu
    protected $appends = ['favoritesCount', 'isFavoritedjson', 'owner', 'TimeForHuman'];
//vztahy
    protected $with = ['user', 'favorites'];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getOwnerAttribute() {
        return $this->user;
    }

    public function getTimeForHumanAttribute() {
        return $this->created_at->diffForHumans();
    }


    public function favorites() {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function isFavorited()
    {
        return ! ! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getIsFavoritedjsonAttribute()
    {
        return ! ! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }






}
