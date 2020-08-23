<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = ['nom'];
    protected $table = "modeles";

    public function vehicules(){

        return $this->hasMany(Vehicule::class);
    }
}
