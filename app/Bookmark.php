<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable=[
          'user_id','item_id',
          ];
     
    public function item()
      {
          return $this->belongsTo(Item::class)->withDefault();;
      }
}
