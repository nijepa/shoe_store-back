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
    public function shoe_size()
    {
        return $this->belongsTo(Shoe_size::class);
    }
}
