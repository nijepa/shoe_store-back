<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoe_specific_id',
        'image'
    ];

    /**
     * Relationship to shoe specific
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoe_specific()
    {
        return $this->belongsTo(Shoe_specific::class);
    }
}
