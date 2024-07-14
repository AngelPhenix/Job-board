<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $table = "fish_listings";
    
    protected $fillable = [
        'name', 'level'
    ];

    public $timestamps = false;

    public function spots()
    {
        return $this->belongsToMany(Spot::class, 'fish_spot');
    }
}
