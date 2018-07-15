<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
//    protected $fillable = ['title', 'body'];
//    protected  $guarded = [];

    public function comments()
    {
        // return $this->hasMany('App\Comment');

        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
//        Comment::create([
//            'body' => $body,
//            'post_id' => $this->id
//        ]);

//        $this->comments()->create(['body' => $body]);

        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
