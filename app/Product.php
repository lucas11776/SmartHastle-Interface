<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    /**
     * Product sizes.'s0
     *
     * @var array
     */
    public static $sizes = [
        'xs', 's', 'm', 'l', 'xl', 'xxl'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'slug', 'name', 'brand', 'price', 'discount', 'description'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'image', 'category'
    ];

    /**
     * Get product image.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')
            ->orderBy('id', 'ASC');
    }

    /**
     * Get product images.
     *
     * @return MorphMany
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get product category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get product decimal last 2 decimal place.
     *
     * @param float $price
     * @return string
     */
    public static function decimal(float $price): string
    {
        $str = explode('.', number_format($price, 2)) ;

        return end($str);
    }
}
