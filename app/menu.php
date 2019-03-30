<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable=['nom_comercial','nom','Prix','Categorie'];
}
