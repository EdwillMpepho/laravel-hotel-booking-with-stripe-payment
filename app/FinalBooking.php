<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalBooking extends Model
{
    /*
     * insertable fields
     */
    protected $fillable = ['start_date','end_date','now','nrOfDays','price','room_id','user_id'];
}
