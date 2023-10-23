<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Treatment extends Model
{
    use HasFactory;
    protected $table = "treatments";

    protected $fillable = [
        'id',
        'obserbations',
        'amount',
        'animals_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function animals()
    {
        return $this->belongsTo(Animal::class, 'animals_id');
    }
}
