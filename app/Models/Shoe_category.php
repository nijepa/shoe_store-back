<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

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
