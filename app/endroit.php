<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class endroit extends Model
{
    protected $fillable=['logo','nom_comercial','adresse','num_telephone'];

    public function categories(){
        return $this ->BelongsToMany('app\categorie');
    }
}
