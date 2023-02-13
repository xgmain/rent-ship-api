<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'price_type', 'roast_id'];

    public function roast()
    {
        return $this->belongsTo(Roast::class, 'roast_id');
    }
}
