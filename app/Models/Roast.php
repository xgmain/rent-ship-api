<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roast extends Model
{
    use HasFactory;

    public $fillable = ['ship_id', 'availability', 'number', 'owner_id', 'payer_number', 'target_fish', 'wish_fish', 'our_support'];

    public function ship() {
        return $this->belongsTo(Ship::class, 'ship_id');
    }

    public function price() {
        return $this->hasMany(Price::class, 'roast_id');
    }
}
