<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specie;

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
    public function animals()
    {
        return $this->belongsTo(Specie::class, 'species_id');
    }
}
