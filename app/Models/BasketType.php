<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Classe représentant un type de panier,
 * constitué de types de produits
 */
class BasketType extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'seaseon',
        'reference',
        'description'
    ];

    /**
     * Association ManyToMany avec les types de produits
     * Un type de panier est constitué de différents types de produits
     * Cette association comporte une information complémentaire :
     * - quantité
     *
     * @return BelongsToMany
     */
    public function productTypes(): BelongsToMany
    {
            return $this->belongsToMany(ProductType::class);
    }

    /**
     * Association OneToMany avec les paniers
     * Chaque type de panier de réalise dans divers paniers au cours du temps
     *
     * @return HasMany
     */
    public function baskets(): HasMany
    {
        return $this->hasMany(Basket::class);
    }

    /**
     * Association ManytoOne avec les producteurs
     * Diffférents types de paniers peuvent être proposés oar le même producteur
     * (ce sont ces types de paniers auxquels les clients d'abonnent)
     *
     * @return BelongsTo
     */
    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class);
    }
}
