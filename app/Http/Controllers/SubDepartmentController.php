<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Response;
// use redirect;

class SubDepartmentController extends Controller
{
    

    public function index() {
        
         $subdept = DB::table('sub_department')
            ->join('department', 'sub_department.dept_id', '=', 'department.id')
            ->select('sub_department.*', 'department.dept_name','department.dept_location')
            ->get();
       
        return view('sub_department.index',compact('subdept'));
    }


    public function create() {

        $department = DB::table('department')->get();
        return view('sub_department.create',compact('department'));
    }


    public function storeSubDepartment(Request $request) {

       
       $created_at = new DateTime('today');
       $updated_at = new DateTime('now');
       $dept_id = $request->input('dept_id');
       $sub_dept = $request->input('sub_dept');
       $data = DB::insert('insert into sub_department (dept_id,sub_dept,created_at,updated_at) values(?,?,?,?)',[$dept_id,$sub_dept,$created_at,$updated_at]);

         if($data){

                return Response::json(array('success'=>'1', 'message'=>'Record Created Successfully.'), 200);
                       
                  }

                  
    }



   


}