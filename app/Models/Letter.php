<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
