<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Entité représentant une réponse à une question
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer'
    ];

    /**
     * Association ManyToOne avec les questions
     * On peut apporter plusieurs réponses à une question
     *
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Association ManyToOne avec les auteurs
     * Plusieurs réponses peuvent être écrites par un même auteur
     *
     * Note : Les auteurs sont des `User`, c'est-à-dire aussi bien des producteurs que des clients
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
