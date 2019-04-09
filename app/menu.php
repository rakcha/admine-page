<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{   
    public function endroit(){
        return $this ->BelongsTo('app\endroit');
    }
    public function articles(){
        return $this ->HasMany('app\menu');
    }
}
