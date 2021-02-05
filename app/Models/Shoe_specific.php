<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe_specific extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoe_id',
        'size_id',
        'color_id',
        'stock',
        'price',
        'details'
    ];

    /**
     * Relationship to shoe sizes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe_sizes()
    {
        return $this->hasMany(Shoe_size::class);
    }

    /**
     * Relationship to shoe colors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe_colors()
    {
        return $this->hasMany(Shoe_color::class);
    }

    /**
     * Relationship to shoes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }
}
