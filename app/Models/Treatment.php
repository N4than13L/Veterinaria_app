<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Vaccine;

class Treatment extends Model
{
    use HasFactory;
    protected $table = "treatments";

    protected $fillable = [
        'id',
        'obserbations',
        'amount',
        'users_id',
        'vaccines_id',
        'animals_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function animals()
    {
        return $this->belongsTo(Animal::class, 'animals_id');
    }

    // relacion de muchos a uno.
    public function vaccine()
    {
        return $this->belongsTo(Animal::class, 'animals_id');
    }
}
