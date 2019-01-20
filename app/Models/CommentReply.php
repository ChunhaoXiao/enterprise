<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
    	'comment_id', 
    	'user_id', 
    	'content',
    ];

    public function comment()
    {
    	return $this->belongsTo(ProductComment::class, 'comment_id');
    }

    public function thumbs()
    {
    	return $this->hasMany(CommentReplyThumb::class, 'reply_id');
    }
}
