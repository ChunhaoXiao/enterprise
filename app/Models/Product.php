<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCache;
use DB;
class Product extends Model
{
    use ClearCache;
    protected $fillable = [
    	'name', 'category_id', 'description'
    ];


    public function properties()
    {
    	return $this->belongsToMany(Property::class)->withPivot('value');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function pictures()
    {
    	return $this->hasMany(Picture::class, 'product_id');
    }

    public function cover()
    {
    	return $this->hasOne(Picture::class)->orderBy('is_cover', 'desc')->withDefault();
    }

    public function setCover($picture)
    {
        $this->pictures()->update(['is_cover' => 0]);
        $picture->update(['is_cover' => 1]);
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'product_id');
    }

    

    public function syncProperties($datas)
    {
		foreach ($datas as $key => $value) 
		{
            if($value)
            {
                $rows[$key] = ['value' => $value];
            }
		}
        if(!empty($rows))
        {
            return $this->properties()->sync($rows);
        }
        //如果没有勾选，全部删除
        $this->properties()->detach();
    }

    public function syncPictures($data)
    {
        $this->pictures()->delete();
        if(!empty($data))
        {
            $data = array_map(function($item){
                return ['path' => $item];
            }, $data);
            $this->pictures()->createMany($data);
        }
        return $this;  	
    }

    public function scopeSearch($query, $data)
    {
        return $query->when(!empty($data), function($query) use ($data){
    		foreach($data as $field => $value)
    		{
                if($value)
                {
                    if($field == 'name')
                    {
                        $query->where('name', 'like', '%'.$value.'%');
                    }
                    elseif($field == 'category')
                    {
                        $query->where('category_id', $value);
                    }
                }
    			
    		}
    	});
    }

    // public function scopeRelated($query, $id)
    // {
    //     return $query->where('id', '<>', $id)->inRandomOrder()->with('cover')->limit(2);
    // }

    public function getRelated()
    {
        return $this->category->products()->where('id', '<>', $this->id)->inRandomOrder()->limit(2)->get();
    }

    public function getComments($userid = 0)
    {
        return $this->comments()->when($userid, function($query) use($userid){
            $query->withCount([
                'upthumbs AS myup' => function($query) use($userid){
                    $query->where('comment_reply_thumbs.user_id', $userid);
                },
                'downthumbs AS mydown' => function($query) use($userid){
                    $query->where('comment_reply_thumbs.user_id', $userid);
                },
            ]);
        })
        ->withCount('upthumbs')->withCount('downthumbs')->orderBy('upthumbs_count', 'desc')->paginate(25);//
    }
}
