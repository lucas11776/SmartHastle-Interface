<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Favorite extends Model
{
    /**
     * Favoriteable classes.
     *
     * @var array
     */
    public const FAVORITEABLES = [
        Product::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'favoriteable_id', 'favoriteable_type'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [

    ];

    /**
     * Get favorite item product.
     *
     * @return MorphTo
     */
    public function favoriteable(): MorphTo
    {
        return $this->morphTo();
    }
}
