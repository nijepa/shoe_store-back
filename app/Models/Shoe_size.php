<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe_size extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoe_specific_id',
        'size_id'
    ];


    /**
     * Relationship to sizes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    /**
     * Relationship to shoes specific
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe_specifics()
    {
        return $this->hasMany(Shoe_specific::class);
    }
}
