<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Relationship to shoe color
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoe_color()
    {
        return $this->belongsTo(Shoe_color::class);
    }
}
