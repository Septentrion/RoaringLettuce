<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Entité représentant les utilisateurs
 *
 * Note :
 * La classe `Authenticatable` est celle qui permet la gestion de l'authentitfication par Laravel
 * Cette déclaration est en lien avec la notion de « _provider_ », telle de définie dans le ficnier de configuration `auth.php`.
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Support de l'association OneToOne polymorphe.
     * Ceci nous permet de définir qu'un utilisateur peut être soit un `Client`, soit un `Producer .
     * Dans notre cas, cela facilite les procédures d'authentification et d'autorisation (gestion des droits d'accés)
     * Les association polymorphes nécessitent d'ajouter de l'information dans la base de données, avec deux colonnes :
     * - typeable_id : l'id correpondante dans la table liée
     * - typeable_type : la classe de l'objet lié
     * (typeable est un nom arbitraire choisi par le développeur)
     *
     * @return MorphTo
     */
    public function typeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
