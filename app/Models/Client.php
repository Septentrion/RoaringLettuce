<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Entité représentant les clients
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id'
    ];

    /**
     * Association `OneToOne` **polymorphe** avec la classe `User`
     * Une association polymorphe permet de définir des associations « flexibles »,
     * d'une entité vers plusieurs autres entités alternativement
     *
     * @return MorphOne
     */
    public function type(): MorphOne
    {
        return $this->morphOne(User::class, 'typeable');
    }

    /**
     * Association OneTOMany vers les abonnements
     * Chaque client peut avoir plusieurs abonnements (successivement ou simultanément)
     * @return HasMany
     */
    public function adhesions(): HasMany
    {
        return $this->hasMany(Adhesion::class);
    }

    /**
     * Association ManyToMany avec les paniers
     * Chaque client recevre bien sûr plusieurs paniers tout au long de la durée de son abonnement
     *
     * @return BelongsToMany
     */
    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class);
    }
}
