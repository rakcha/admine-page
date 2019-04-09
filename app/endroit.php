<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class endroit extends Model
{
    public function categories(){
        return $this ->BelongsToMany('app\categorie');
    }
}
