<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    // Déclaration des champs qui pourront être remplis via la validation du formulaire :
    protected $fillable = ['prenom', 'nom', 'pays', 'adresse', 'adresse2', 'code_postal', 'ville', 'telephone'];

}
