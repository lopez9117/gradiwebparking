<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use DB;
use App\vehicle;
use Validator;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propietarios = DB::table('users')->get();

        return view('vehicles.index',compact('propietarios'));
    }


    public function getvehicle(){


$students = DB::table('vehicles')->join('users', 'vehicles.userid', '=', 'users.id')
            ->select(['vehicles.id', 'vehicles.placa', 'vehicles.tipodevehiculo', 'vehicles.marca', 'users.name']);



//          $students = vehicle::select(
//             'id',
//     'placa',
// 'tipodevehiculo',
// 'marca',

//  );
     return Datatables::of($students)
     ->addColumn('action', function($student){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
     //->take(1000)
     ->make(true);



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
        
        $validation = Validator::make($request->all(), [         
             'placa'  => 'required',
             'tipodevehiculo'  => 'required',
             'marca'  => 'required',
             'propietario'  => 'required',
                 
          
        ]);


        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                DB::table('vehicles')->insert([
                "placa" => $request->get('placa'),
                "tipodevehiculo" => $request->get('tipodevehiculo'),
                "marca" => $request->get('marca'),
               "userid" => $request->get('propietario'),                       

                                 ]);             
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
            if($request->get('button_action') == 'update')
            {
                DB::table('vehicles')->where('id',$request->get('id'))->update([
              
             
                       "placa" => $request->get('placa'),
                "tipodevehiculo" => $request->get('tipodevehiculo'),
                "marca" => $request->get('marca'),
               "userid" => $request->get('propietario'), 
                      
                 ]);            
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

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
    public function update(Request $request)
    {
         $id = $request->input('id');
         $student = vehicle::where('id',$id)->get();
         return response($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
             if($request->input('id'))
            {
             DB::table('vehicles')->where('id', '=', $request->input('id') )->delete();
            echo 'Data Deleted';
             }
         }
}