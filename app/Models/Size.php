<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    /**
     * Relationship to shoe size
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoe_specific()
    {
        return $this->belongsTo(Shoe_specific::class);
    }
}
