<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Entité représentant les types de produits
 */
class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Association OneToMany avec les produits
     * Chaque type (catégorie) comporte un certain nombre de produits
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
            return $this->hasMany(Product::class);
    }

    /**
     * Association `ManyToMany avec les types de paniers
     * Chaque type de produit peut apparaître dans différents types de paniers
     * (cf. BasketType)
     *
     * @return BelongsToMany
     */
    public function basketTypes(): BelongsToMany
    {
            return $this
                ->belongToMany(BasketType::class)
                ->withPivot('quantity');
    }


}
