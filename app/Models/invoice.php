<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $fillable = ['date_issue','invoice_number', 'value', 'insurance', 'company', 'date_receipt'];
}
