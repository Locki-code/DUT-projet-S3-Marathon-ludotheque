<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['commentaire', 'date_com', 'note'];


    function jeu() {
        return $this->belongsTo(Jeu::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
}
