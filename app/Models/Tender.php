<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    /** @use HasFactory<\Database\Factories\TenderFactory> */
    use HasFactory;
    protected $guarded = false;
    protected $table = 'tenders';

    protected $fillable = ['external_code', 'number', 'status', 'title', 'date'];
}
