<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    public function scopeFilter($query , array $filters)
    {
        if(isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('title','like','%'.$filters['search'].'%')
                    ->orWhere('description','like','%'.$filters['search'].'%');
        }
    }

    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    protected $withCount = ['likes'];

}
