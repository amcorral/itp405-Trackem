<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function User(){
      return $this->belongsTo('App\User');
    }

    public function customer_update (){
      return $this->hasMany('App\customer_update');
    }
}
