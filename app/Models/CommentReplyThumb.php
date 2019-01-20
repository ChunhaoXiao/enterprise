<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReplyThumb extends Model
{
    protected $fillable = ['user_id', 'type', 'reply_id'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function reply()
    {
    	return $this->belongsTo(CommentReply::class, 'reply_id');
    }
}
