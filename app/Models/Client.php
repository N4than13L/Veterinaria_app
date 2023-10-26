<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Animal;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        'id',
        'name',
        'surname',
        'phone',
        'address',
        'users_id',
        'animals_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // relacion de muchos a uno.
    public function animals()
    {
        return $this->belongsTo(Animal::class, 'animals_id');
    }
}
