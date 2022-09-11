<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_admin',
    ];
}
