<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['jeu_id', 'user_id', 'date_achat', 'lieu', 'prix'];

    public function jeux(){
        return $this->belongsToMany(Jeu::class, 'achats');
    }
}
