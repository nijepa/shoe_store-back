<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detal extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'prod_id',
        'quantity',
        'prod_price'
    ];

    /**
     * Relationship to order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
