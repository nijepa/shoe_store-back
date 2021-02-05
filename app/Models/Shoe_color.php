<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe_color extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoe_specific_id',
        'color_id'
    ];

    /**
     * Relationship to colors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    /**
     * Relationship to specific shoes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe_specific()
    {
        return $this->hasMany(Shoe_specific::class);
    }
}
