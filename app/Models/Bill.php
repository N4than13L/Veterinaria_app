<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;
use App\Models\Client;
use App\Models\Vaccine;
use App\Models\Animal;


class Bill extends Model
{
    use HasFactory;

    protected $table = "bills";

    protected $fillable = [
        'id', 'attendedby',  'created_at',
        'updated_at', 'client_id', 'treatment_id',  'users_id',
    ];

    // relacion de muchos a uno.
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // relacion de muchos a uno.
    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_id');
    }
}
