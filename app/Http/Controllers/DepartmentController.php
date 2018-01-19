<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Response;
// use redirect;

class DepartmentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {

        $department = DB::table('department')->get();
        return view('department.index',compact('department'));
    }


    public function create() {
    
        return view('department.create');
    }


    public function storeDepartment(Request $request) {

       // $req = $request->all();
       // dd($req);
      
       $created_at = new DateTime('today');
       $updated_at = new DateTime('now');
       $dept_name = $request->input('dept_name');
       $dept_location = $request->input('dept_location');
       $data = DB::insert('insert into department (dept_name,dept_location,created_at,updated_at) values(?,?,?,?)',[$dept_name,$dept_location,$created_at,$updated_at]);

         if($data){

                        return Response::json(array('success'=>'1', 'message'=>'Record Created Successfully.'), 200);
                       // return '1';
                  }

                  // return response()->json($data);
    }

    Public function deleteDepartment($id) {
         // dd($id);
        $data = DB::table('department')->where('id',$id)->delete();
        if($data){

              return Response::json(array('success'=>'1', 'message'=>'Record deleted Successfully.'), 200);
                       // return '1';
                  }
        
    }

    public function editDepartment($id) {

        // dd($id);
        $dept= DB::table('department')->where('id',$id)->get();
        return view('department.edit',compact('dept'));
    }

    public function updateDepartment(Request $request) {

        // dd($request->all());
       $created_at = new DateTime('today');
       $id = $request->input('id');
       $updated_at = new DateTime('now');
       $dept_name = $request->input('dept_name');
       $dept_location = $request->input('dept_location');

       $data = DB::table('department')
               ->where('id', $id )
               ->update(['dept_name' =>  $dept_name, 'dept_location' =>  $dept_location,'created_at' =>  $created_at,'updated_at' =>  $updated_at,]);
       

         if($data){

                        return Response::json(array('success'=>'1', 'message'=>'Record Updated Successfully.'), 200);
                       // return '1';
                  }

                  // return response()->json($data);
    }
        



   


}