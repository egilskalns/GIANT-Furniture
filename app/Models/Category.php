<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        if ($this->children->count() > 0) {
            $categoryIds = $this->children->pluck('id')->toArray();
            return Product::whereIn('category_id', $categoryIds);
        } else {
            return Product::where('category_id', $this->id);
        }
    }
}
