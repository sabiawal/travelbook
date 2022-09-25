<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','destination_id','date_from','date_to'];

    public function destination()
    {
        return $this->hasOne(Destinations::class, 'id','destination_id');
    }
}

