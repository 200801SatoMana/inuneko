<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    protected $fillable = [
        'user_id','tweet','image_path'
    ];
    use HasFactory;
}
