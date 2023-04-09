<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
 * Entité représentant l'abonnement d'un client à un type de panier
 */
class Adhesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Association ManyToOne vers un client
     * Représente tous les abonnements (simultanés ou successifs) d'un même client
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Association ManyToOne vers les types de panier
     * Représente tous les abonnements à un type de panier
     *
     * @return BelongsTo
     */
    public function basketType(): BelongsTo
    {
        return $this->belongsTo(BasketType::class);
    }
}
