<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Booking extends Model
{
    protected $fillable = ['start_date','end_date','nrOfDays','room_id','totalamount'];

    public function room(){
      return $this->belongsTo('App\Room');
    }
}
