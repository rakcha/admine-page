<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Illuminate\Http\Request;
use DB;
use App\menu;
use Excel;
class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $menu = menu::all();
      //  $data = DB::table('menus')->orderBy('id','DESC')->get();
       // return view('menu', compact('data'));
       return view('menu')->with('menu',$menu);
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
    function import(Request $request){
        
     /*   //if($request->hasFile('excel'))
        //{
        $path =$request ->file('select_file')->getRealPath();
        //console.log($path);
        $data = Excel::load($path)->get();
        if($data->count()>0){
            foreach($data->toArray() as $key => $value){
                foreach($value as $row){
                    $insert_data[]=array(
                        'logo' => $row['logo'],
                        'nom_comercial' => $row['nom_comercial'],
                        'adresse' => $row['adresse'],
                        'num_telephone' => $row['num_telephone'],
                    );
                }
            }
            if(!emplty($insert_data)){
                DB::table('menus')->insert($insert_data);
            }
        }
    
        return redirect('/menu')->with('info','Excel Date imported successfully');
*/}
}