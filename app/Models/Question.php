<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Entité représentant des questions, sur le modèle Question/Réponses genre StackOverflow
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
    ];

    /**
     * Association ManyyToOne avec les auteurs des question
     * Plusieurs questions peuvent être posées par un même auteur
     *
     * Note : Les auteurs sont des `User`, c'est-à-dire aussi bien des producteurs que des clients, du fait de l'association polymorphe
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Association OneToMny avec les questions
     * Une question peut admettre plusieurs réponses
     *
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
