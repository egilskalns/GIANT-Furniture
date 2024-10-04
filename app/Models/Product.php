<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'details',
        'description',
        'main_image',
        'alt_images',
        'price',
        'quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'alt_images' => 'array',
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        $array2 = [
            'categories' => $this->categories->pluck('name')->toArray(),
        ];

        return array_merge($array, $array2);
    }

    /**
     * The categories that belong to the Product
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The orders that belong to the Product
     *
     * @return BelongsToMany
     */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}
