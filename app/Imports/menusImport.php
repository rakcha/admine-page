<?php

namespace App\Imports;
use App\menu;
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
        return new menu([
            'nom_comercial'   => $row[0],
         'nom'    => $row[1],
         'Prix'  => $row[2],
         'Categorie'   => $row[3],
        ]);
    }
}
