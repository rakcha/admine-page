<?php

namespace App\Http\Controllers;
use App\endroit;
use Illuminate\Http\Request;
use Input;
class EndroitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endroits = endroit::all();
        return view('endroit')->with('endroits',$endroits);
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
        $endroits -> logo = $request->input('logo');
        $endroits -> nom_comercial = $request->input('nom_comercial');
        $endroits -> adresse = $request->input('adresse');
        $endroits -> num_telephone = $request->input('num_telephone');
        $endroits ->save();
        return redirect('/endroit') -> with('info','endroit saved succesfully');
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
        $endroits =  endroit::find($id);
        $endroits -> logo = $request->input('logo');
        $endroits -> nom_comercial = $request->input('nom_comercial');
        $endroits -> adresse = $request->input('adresse');
        $endroits -> num_telephone = $request->input('num_telephone');
        $endroits ->save();
       return redirect('/endroit') -> with('info','endroit changed succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endroits = endroit::find($id);
        $endroits -> delete();
        return redirect('/endroit') -> with('info','endroit deleted succesfully');

    }
}
