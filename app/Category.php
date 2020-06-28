<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = [
        'name', 'slug'
    ];

    /**
     * Get all category products.
     *
     * @return HasMany
     */
    public function categorizables(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
