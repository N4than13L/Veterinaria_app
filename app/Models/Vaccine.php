<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = "vaccines";

    protected $fillable = [
        'id',
        'name',
        'type',
        'effects',
        'users_id',
        'created_at',
        'updated_at'
    ];
}
