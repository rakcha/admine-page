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
         //get file
         $upload=$request->file('upload-file');
         $filePath=$upload->getRealPath();
         //open and read
         $file=fopen($filePath, 'r');
 
         $header= fgetcsv($file);
 
         // dd($header);
         $escapedHeader=[];
         //validate
         foreach ($header as $key => $value) {
             $lheader=strtolower($value);
             $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
             array_push($escapedHeader, $escapedItem);
         }
 
         //looping through othe columns
         while($columns=fgetcsv($file))
         {
             if($columns[0]=="")
             {
                 continue;
             }
             //trim data
             foreach ($columns as $key => &$value) {
                 $value=preg_replace('/\D/','',$value);
             }
 
            $data= array_combine($escapedHeader, $columns);
 
            // setting type
            foreach ($data as $key => &$value) {
             $value=($key=="logo" || $key=="nom_comercial")?(integer)$value: (float)$value;
            }
 
            // Table update
            $logo=$data['logo'];
            $nom_comercial=$data['nom_comercial'];
            $adresse=$data['adresse'];
            
            $num_telephone=$data['num_telephone'];
 
            $menu= menu::firstOrNew(['logo'=>$logo,'nom_comercial'=>$nom_comercial]);
            $menu->adresse=$adresse;
            $menu->num_telephone=$num_telephone;
            $menu->save();
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