<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specie;
use App\Models\User;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'age',
        'species_id',
        'users_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function species()
    {
        return $this->belongsTo(Specie::class, 'species_id');
    }
    // relacion de muchos a uno.
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
