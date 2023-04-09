<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Entité représentant les paniers
 * Un panier est l'objet concret reçu par les clients.
 * La composition du panier est fonction du type de panier
 */
class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference'
    ];

    /**
     * Association ManyToOne avec les points de livraison
     * Différents paniers peuvent être livrés au même point de rendez-vous avec les clients
     *
     * @return BelongsTo
     */
    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }

    /**
     * Association ManyToMany avec les clients
     * Chaque client recevra plusieurs paniers (successivement ou simultanément)
     * Chapque panier sera livré à plusieurs clients.
     * Cette association ManyToMany supporte des informations complémentaires :
     * - notification de réception par le client
     *
     * @return BelongsToMany
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

    /**
     * Association ManyToMany avec les produits
     * Chaque panier comporte plusieurs produits et éciproquement
     * Cette association supporte une information complémentaire :
     *- quantité du produit dans le panier
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Association ManyToOne avec les types de panier
     * Plusieurs paniers répondent à la définition du type de panier
     * La composition varie notamment en fonction de la saison
     *
     * @return BelongsTo
     */
    public function basketType(): BelongsTo
    {
        return $this->belongsTo(BasketType::class);
    }
}
