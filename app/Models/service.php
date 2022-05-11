<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'service_number', 'origin', 'destination', 'service_value', 'plate', 'insurance', 'driver', 'company'];

}
