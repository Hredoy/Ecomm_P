<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $table = 'posts';
     public function post($request){
       return $this->where('created_at',$request)->paginate(10);
    }
    
}
