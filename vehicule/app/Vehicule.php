<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = "vehicules";

    protected $fillable = ['nom','marque','modele'];

    public function marque(){

        return $this->belongsTo(Marque::class);
    }

    public function modele(){

        return $this->belongsTo(Modele::class);
    }
}
