<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\endroit;
use App\categorie;
use App\categorie_endroit;
use Input;
class PlacesController extends Controller
{
    public function index()
    {
        $categories = categorie::all();
        $endroits = endroit::all();
        $data =[
            'categories' => $categories,
            'endroits' => $endroits,
        ];
          return view('endroit')->with('data',$data);
    }
    public function ajouter(Request $request)
    {
        $endroits = new endroit;
        
        
        $endroits -> logo  = $request->input('logo');
        $endroits -> nom_comercial  = $request->input('nom_comercial');
		$endroits -> adresse  = $request->input('adresse');
        $endroits -> num_telephone  = $request->input('num_telephone');
        $endroits ->save();

        

        
        return redirect('/endroit') -> with('info','endroit saved succesfully');
        
    }
    public function update(Request $request, $id)
    {
        $endroits =  endroit::find($id);
        $endroits -> id  = $request->input('id');
        $endroits -> logo  = $request->input('logo');
        $endroits -> nom_comercial  = $request->input('nom_comercial');
		$endroits -> adresse  = $request->input('adresse');
        $endroits -> num_telephone  = $request->input('num_telephone');        
        $endroits ->save();
       return redirect('/endroit') -> with('info','endroit changed succesfully');
    }
    public function destroy($id)
    {
        $endroits = endroit::find($id);
        $endroits -> delete();
        return redirect('/endroit') -> with('info','endroit deleted succesfully');

    }

    
}
