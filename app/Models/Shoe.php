<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'brand_id'
    ];

    /**
     * Relationship to order details
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail()
    {
        return $this->hasMany(Order_detail::class);
    }

    /**
     * Relationship to order details
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoe_specific()
    {
        return $this->hasMany(Shoe_specific::class);
    }

    /**
     * Relationship to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Shoe_category::class);
    }

    /**
     * Relationship to brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Shoe_brand::class);
    }
}
