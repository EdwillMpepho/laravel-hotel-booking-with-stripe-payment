<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Booking extends Model
{
    protected $fillable = ['start_date','end-date','now','nrOfDays','price','room_id'];

    public function rooms() {
        return $this->hasOne('App\Room');
    }
}
