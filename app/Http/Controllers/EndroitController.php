<?php

namespace App\Http\Controllers;
use App\endroit;
use App\categorie;
use App\categorie_endroit;
use Input;
use Illuminate\Http\Request;

class EndroitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endroits = new endroit;
        
        
        $endroits -> logo  = $request->input('logo');
        $endroits -> nom_comercial  = $request->input('nom_comercial');
		$endroits -> adresse  = $request->input('adresse');
        $endroits -> num_telephone  = $request->input('num_telephone');
        $endroits ->save();
        foreach($categories->all() as $categorie){
             if($request->$categorie->id == $categorie->name){
                 $cat_end=new categorie_endroit;
                 $cat_end -> categorie_id = $categorie -> id;
                 $cat_end -> endroit_id = $endroits -> id;
                 $cat_end ->save();
             }       
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
