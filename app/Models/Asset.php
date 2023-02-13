<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'ship_id', 'photo',
    ];

    public function ship() {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
}
