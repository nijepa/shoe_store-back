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
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * Relationship to shoe colors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Relationship to shoes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }
}
