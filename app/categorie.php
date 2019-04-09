<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function endroits(){
        return $this ->BelongsToMany('app\endroit');
    }
}
