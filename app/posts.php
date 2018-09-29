<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    public function categorys()
    {
    	return $this->belongsToMany('App\categorys');
    }
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
    public function scopeSearch($query, $search){
		return $query->where('created_at','LIKE',"%$search%")->orWhere('title','LIKE',"%$search%");
	}
}
