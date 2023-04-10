<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Entité représentant les points de rendez-vous pour les livraisons des paniers aux clients
 * Les clients sont à l'avance du lieu et des horaires
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    /**
     * Association OneToMany avec les paniers
     * Chaque point de rendez-vous accueillera un certain nombre de paniers
     *
     * @return HasMany
     */
    public function baskets(): HasMany
    {
        return $this->hasMany(Basket::class);
    }

    /**
     * Association ManyToMany avec les producteurs
     * Chaque point de livraison concentrera un certain nombre de producteurs
     *
     * @return BelongsToMany
     */
    public function producer(): BelongsToMany
    {
        return $this->belongsToMany(Producer::class);
    }
}
