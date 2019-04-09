<?php

namespace App\Imports;
use App\article;
use Illuminate\Support\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class menusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new article([
            'menu_id'   => $row[0],
            'type_Article'   => $row[1],
            'nom'    => $row[2],
            'Prix'  => $row[3],
         
        ]);
    }
}
