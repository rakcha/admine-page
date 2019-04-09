<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable=['menu_id','type_Article','nom','Prix'];
    public function menu(){
        return $this ->BelongsTo('app\menu');
    }
}


