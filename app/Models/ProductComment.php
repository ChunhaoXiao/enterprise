<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = [
    	'user_id',
    	'product_id',
    	'content',
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id')->withDefault(['name' => '匿名用户']);
    }

    public function reply()
    {
    	return $this->hasOne(CommentReply::class, 'comment_id');
    }

    public function upthumbs()
    {
        return $this->hasManyThrough('App\Models\CommentReplyThumb', 'App\Models\CommentReply', 'comment_id', 'reply_id')->where('comment_reply_thumbs.type', 'up');
    }

    public function downthumbs()
    {
        return $this->hasManyThrough('App\Models\CommentReplyThumb', 'App\Models\CommentReply', 'comment_id', 'reply_id')->where('comment_reply_thumbs.type', 'down');
    }
    // public function thumbs()
    // {
    //     return $this->hasMany(CommentReplyThumb::class, 'comment_id');
    // }

    public static function boot()
    {
        parent::boot();
        static::deleted(function($comment){
            $comment->reply()->delete();
        });
    }
}
