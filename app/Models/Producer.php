<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Entité représentant les producteurs
 */
class Producer extends Model
{
    use HasFactory;

    /**
     * La plupart des propriétés de `Producer`sont définies dans `User`
     * du fait de l'association polymorphe
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
    ];

    /**
     * Association `OneToOne` **polymorphe** avec la classe `User`
     * Une association polymorphe permet de définir des associations « flexibles », d'une entité vers plusieurs autres entités alternativement
     *
     * Ici, naturellement, un profil producteur ne peut correspondre qu'à un seul utilisateur et réciporoquement
     * (nous pourrions néanmoins imaginer des comptes partagés)
     *
     * L'attribut `name: typeable` correspond au nom choisi dans la table User (cf. User)
     *
     * @return MorphOne
     */
    public function type(): MorphOne
    {
        return $this->morphOne(User::class, 'typeable');
    }

    /**
     * Association OneToMany avec les types de panier
     * Un même producteur peut proposeer plusieurs types de paniers
     *
     * @return HasMany
     */
    public function basketTypes(): HasMany
    {
        return $this->hasMany(BasketType::class);
    }

    /**
     * Association ManyToMany avec les points de livraison
     * Un producteur peu être présent sur plusieurs points de livraison et réciproquement
     *
     * @return BelongsToMany
     */
    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(Delivery::class);
    }

}
