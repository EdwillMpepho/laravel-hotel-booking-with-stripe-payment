<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalPrice extends Model
{
    public function getTotalPrice($nrOfDays,$price) {
       return $nrOfDays * $price;
    }
}
