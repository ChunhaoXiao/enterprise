<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['category', 'content'];

    public function scopeContact($query)
    {
    	return $query->where('category', 'contact');
    }

    // public function saveAbout($data, $id = null)
    // {
    //     if($id)
    //     {
    //         $row = $this->findOrFail($id);
    //         return $row->update($data);
    //     }
    
    //     if($data['category'] != 'case')
    //     {

    //         return $this->updateOrCreate(
    //             [
    //                 'category' => $data['category'],
    //                 'content' => $data,
    //             ]
    //         );
    //     }
    //     return $this->create(
    //         [
    //             'category' => $data['category'],
    //             'content' => $data,
    //         ]
    //     );
    // }


    public function getContentAttribute($value)
    {
    	if($this->category == 'contact')
    	{
    		return unserialize($value);
    	}
    	return $value;
    }
}
