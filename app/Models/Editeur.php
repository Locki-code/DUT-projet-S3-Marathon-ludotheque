<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editeur extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nom'];

    function jeux() {
        return $this->hasMany(Jeu::class);
    }
}

//boucle sur valeur
//drop down (value = id, ) .value
