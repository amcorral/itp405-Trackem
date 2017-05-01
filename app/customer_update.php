<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_update extends Model
{
    public function customer(){
      return $this->belongsTo('App\customer');
    }
}
