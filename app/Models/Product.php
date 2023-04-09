<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Entité représentant les produite
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'unit',
        'unit_price',
        'description',
        'season',
        'image'
    ];

    /**
     * Association ManyToOne avec les types de produits
     *
     * @return BelongsTo
     */
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Association ManyToMany avec les paniers
     * (cf. Basket)
     *
     * @return BelongsToMany
     */
    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class);
    }

}
