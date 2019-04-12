<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = article::all();
      
        return view('menu')->with('menus',$menus);
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
        $article = new article;
        
        
    $article -> type_Article  = $request->input('type_Article');
    $article -> nom  = $request->input('nom');
    $article -> Prix  = $request->input('Prix');
    $article -> categorie_id  = $request->input('categorie_id');
    $article ->save();
    return redirect('/menu') -> with('info','article changed succesfully');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $article =  article::find($id);
        $article -> type_Article  = $request->input('type_Article');
        $article -> nom  = $request->input('nom');
        $article -> Prix  = $request->input('Prix');
        $article -> categorie_id  = $request->input('categorie_id');
        $article ->save();
        return redirect('/menu') -> with('info','article changed succesfully');
      
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
