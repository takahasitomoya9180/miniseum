<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'image_path','body',
    ];
    
     public static $rules=array(
        'title' => 'required',
        'image_path' => 'required',
        'body' =>'required',
    );
}
