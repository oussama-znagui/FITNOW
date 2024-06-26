<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPD extends Model
{
    protected $fillable = [
        'title',
        'weight',
        'size',
        'user_id',
        'status',
    ];
    use HasFactory;
}
