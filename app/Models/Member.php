<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'email', 'address', 'city', 'state', 'postal_code',
    ];

    public function ship() {
        return $this->hasMany(Ship::class, 'owner_id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'owner_id');   
    }
}
