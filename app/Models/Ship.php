<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'description'];

    public function member() {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function roast() {
        return $this->hasMany(Roast::class, 'ship_id');
    }

    public function asset() {
        return $this->hasMany(Asset::class, 'ship_id');
    }
}
