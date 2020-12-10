<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Jeu extends Model {
    use HasFactory;

    protected $table = 'jeux';
    public $timestamps = false;

    const LANGUES = ['Français', 'Allemand', 'Suisse', 'Espagnole', 'Suédois'];
    const AGE = ['2', '4', '6', '8', '12', '14'];
    const NBJOUEUR = [2, 3, 4, 5, 6, 8];
    const DUREE = ['- de 10 Minute', 'Entre 10 et 20 Min', 'Une demi heure', 'une heure', 'Plus d\'une heure'];
    const CATEGORY = ['Cartes à  jouer', 'Escape Game', 'Jeu d\'Ambiance', 'Jeu de Cartes', 'Jeu de dés', 'Jeu de lettres', 'Jeu de logique', 'Jeu de pions', 'Jeu de plateau'
        , 'jeu de rôle', 'jeu de tuiles', 'Murder Party'];

    protected $fillable = ['nom', 'description', 'regles', 'langue',
        'url_media', 'age', 'nombre_joueurs', 'categorie', 'duree'];

    function createur() {
        return $this->belongsTo(User::class);
    }

    function theme() {
        return $this->belongsTo(Theme::class);
    }

    function editeur() {
        return $this->belongsTo(Editeur::class);
    }

    function mecaniques() {
        return $this->belongsToMany(Mecanique::class, 'avec_mecaniques');
    }

    function acheteurs() {
        return $this->belongsToMany(User::class, 'achats')
            ->as('achat')
            ->withPivot('prix', 'lieu', 'date_achat');
    }

    function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
}
