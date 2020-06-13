<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    /**
     * Order status.
     *
     * @var array
     */
    public const STATUS = [
        'declined', 'waiting', 'approved', 'completed'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'orderizable_id', 'orderizable_type', 'status', 'seen'
    ];

    /**
     * Get user of order.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get order item
     *
     * @return HasOne
     */
    public function item(): HasOne
    {
        return $this->hasOne(OrderItem::class);
    }

    /**
     * Get order items.
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
