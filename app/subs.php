<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subs extends Model
{
     protected $table = 'subs';
     public function categorys()
    {
    	return $this->belongsToMany('App\categorys');
    }
}
