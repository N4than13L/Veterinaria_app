<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Specie extends Model
{
    use HasFactory;
    protected $table = 'species';

    protected $fillable = [
        'id',
        'name',
        'type',
        'users_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
