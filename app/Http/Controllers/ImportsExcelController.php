<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;


class ImportsExcelController extends Controller
{
    function index()
    {
     $data = DB::table('menus')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
    // $this->validate($request, [
    //  'select_file'  => 'required|mimes:xls,xlsx'
    // ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
      
         'nom_comercial'   => $row['nom_comercial'],
         'Categorie'   => $row['Categorie'],
         'nom'    => $row['nom'],
         'Prix'  => $row['Prix'],
         
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('menus')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
