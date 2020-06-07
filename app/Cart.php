<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Cart extends Model
{
    /**
     * Type that are allowed to be in cart.
     *
     * @var array
     */
    public const CARTABLES = [
        Product::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cartable_id', 'cartable_type', 'size'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'cartable'
    ];

    /**
     * Get cart item.
     *
     * @return MorphTo
     */
    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get cart items.
     *
     * @return MorphTo
     */
    public function cartables(): MorphToMany
    {
        return $this->morphToMany();
    }
}
