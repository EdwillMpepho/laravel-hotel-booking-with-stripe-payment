<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
use App\User;

class Booking extends Model
{
    /*
     * insertable fields
     */
    protected $fillable = ['start_date','end_date','now','nrOfDays','price','room_id','user_id'];

    /**
     * Create a relationship between booking and rooms
     */
    public function rooms() {
        return $this->hasOne('App\Room');
    }
    /**
     * Create a relationship between user and booking
     */
    public function user() {
       return $this->belongsTo('App\User');
    }
}
