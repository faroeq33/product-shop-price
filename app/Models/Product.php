<?php

namespace App\Models;

use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @mixin \Eloquent
 */
class Product extends Model {
    use Searchable;
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    /** @return BelongsToMany  */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }
}
