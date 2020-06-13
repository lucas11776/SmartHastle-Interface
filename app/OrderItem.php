<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_id', 'orderizable_id', 'orderizable_type', 'size'
    ];

    /**
     * Get cart item.
     *
     * @return MorphTo
     */
    public function product(): MorphTo
    {
        return $this->morphTo('orderizable');
    }
}
