<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model {
    use HasFactory;

    protected $table = 'jeux';
    public $timestamps = false;

    protected $fillable = ['nom', 'description', 'regle', 'langue',
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
