<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $table = "marques";

    public function vehicules(){

        return $this->hasMany(Vehicule::class);
    }
}
