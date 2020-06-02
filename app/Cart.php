<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cartable_id', 'cartable_type', 'size'
    ];

    /**
     * Type that are allowed to be in cart.
     *
     * @var array
     */
    public static $cartable_types = [
        Product::class
    ];
}
