<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Room extends Model
{
    protected $fillable = ['type','price'];

    public function booking() {
      return $this->belongsTo('App\Booking');
    }
}
