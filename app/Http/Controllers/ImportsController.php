<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;


use App\Imports\menusImport;

use Maatwebsite\Excel\Facades\Excel;

class ImportsController extends Controller
{
       /**

    * @return \Illuminate\Support\Collection

    */

    public function importExportView()

    {

       return view('import');

    }

   

    /**

    * @return \Illuminate\Support\Collection

    */

   

    /**

    * @return \Illuminate\Support\Collection

    */

    public function import() 

    {

        Excel::import(new menusImport,request()->file('file'));

           

        return back();

    }
}
