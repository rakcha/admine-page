<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Exports\UsersExport;

use App\Imports\UsersImport;

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

        Excel::import(new UsersImport,request()->file('file'));

           

        return back();

    }
}
