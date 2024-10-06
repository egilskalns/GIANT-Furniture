<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable, GenerateUniqueSlugTrait;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'specification',
        'main_img',
        'alt_img',
        'price',
        'stock',
        'discount',
        'rating',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'alt_img' => 'array',
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
     * The category that belong to the Product
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'id', 'category_id');
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
