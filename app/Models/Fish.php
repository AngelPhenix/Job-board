<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $table = "fish_listings";
    protected $fillable = ['name'];

    public function spot()
    {
        return $this->belongsToMany(Spot::class, 'fish_spot');
    }
}
