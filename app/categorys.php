<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{
   public function subs()
    {
    	return $this->belongsToMany('App\subs');
    }
    public function posts()
    {
    	return $this->belongsToMany('App\posts');
    }
    public function pagii(){
       return $this->belongsToMany('App\posts','categorys_posts', 'categorys_id', 'posts_id')->orderBy('id','desc')->paginate(10);
    }
    public function getRouteKeyName(){
        return 'name';
    }
}
