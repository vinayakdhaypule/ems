<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Response;
use App\EmployeeGallery;
// use redirect;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {

        // $employee = DB::table('employee')->get();
         $employee = DB::table('employee')
            ->join('department', 'employee.emp_dept', '=', 'department.id')
            ->join('sub_department','employee.sub_dept_id','=','sub_department.id')
            ->select('employee.*', 'department.dept_name','department.dept_location','sub_department.sub_dept')
            ->get();
            // dd($employee);
        return view('employee.index',compact('employee'));
    }


    public function create() {

         $department = DB::table('department')->get();
         return view('employee.create',compact('department'));
    }


    public function storeEmployee(Request $request) {
      
           $request = $request->all();
           // dd( $request);
           // die;
            $now = date('Y-m-d H:i:s');

            $emp_name = $request['emp_name'];
            $emp_job = $request['emp_job'];
            $emp_phone = $request['emp_phone'];
            $emp_salary = $request['emp_salary'];
            $emp_dept = $request['emp_dept'];
            $sub_dept_id =$request['sub_dept_id'];
            $location = $request['location'];
            $city = $request['city']; 
            $country = $request['country'];
            $lat = $request['lat']; 
            $lng = $request['lng'];
            $created_at = $now;
            $updated_at = $now;

              $params=array(
                             'emp_name' => $emp_name,
                             'emp_job' => $emp_job,
                             'emp_phone' => $emp_phone,
                             'emp_salary' => $emp_salary,
                             'emp_dept' => $emp_dept,
                             'sub_dept_id' => $sub_dept_id,
                             'location' => $location,
                             'city' => $city,
                             'country' => $country,
                             'lat' => $lat,
                             'lng' => $lng,
                             'created_at' => $created_at,
                             'updated_at' => $updated_at
                            );
       
       $inserted_id = DB::table('employee')->insertGetId($params); 

                  if(isset($request['files'])) {

                      $images= EmployeeGallery::saveEmployeeImages($request, $inserted_id);
                      
                      }

                      if($inserted_id > 0) {

                        return Response::json(array('success'=>'1', 'message'=>'Record Created Successfully.'), 200);
                     } 
       
    }


    Public function deleteDepartment($id) {
        
        $data = DB::table('department')->where('id',$id)->delete();

        if($data){

              return Response::json(array('success'=>'1', 'message'=>'Record deleted Successfully.'), 200);
                      
                  }
        
    }

    public function editEmployee($id) {

        $employee = DB::table('employee')
            ->join('department', 'employee.emp_dept', '=', 'department.id')
            ->select('employee.*', 'department.dept_name','department.dept_location')
            ->where('employee.id',$id)
            ->get();
        $department= DB::table('department')->get();

        return view('employee.edit',compact('employee','department'));
    }

    public function updateEmployee(Request $request) {

        
      $request = $request->all();
      // dd($request);
          
            $now = date('Y-m-d H:i:s');
            $editId = $request['id'];
            $emp_name = $request['emp_name'];
            $emp_job = $request['emp_job'];
            $emp_phone = $request['emp_phone'];
            $emp_salary = $request['emp_salary'];
            $emp_dept = $request['emp_dept'];
            $sub_dept_id =$request['sub_dept_id'];
            $location = $request['location'];
            $city = $request['city']; 
            $country = $request['country'];
            $lat = $request['lat']; 
            $lng = $request['lng'];
            $created_at = $now;
            $updated_at = $now;

              $params=array(
                             'emp_name' => $emp_name,
                             'emp_job' => $emp_job,
                             'emp_phone' => $emp_phone,
                             'emp_salary' => $emp_salary,
                             'emp_dept' => $emp_dept,
                             'sub_dept_id' => $sub_dept_id,
                             'location' => $location,
                             'city' => $city,
                             'country' => $country,
                             'lat' => $lat,
                             'lng' => $lng,
                             'created_at' => $created_at,
                             'updated_at' => $updated_at
                            );


          $updated_id = DB::table('employee')->where('id', $editId)->update($params);
          // dd($updated_id);
          // die;

          if(isset($request['files'])) {

                      $images= EmployeeGallery::saveEmployeeImages($request, $editId);
                      
                      }

                      if($images) {

                        return Response::json(array('success'=>'1', 'message'=>'Record Update Successfully.'), 200);
                     } 


                // if($updated_id) {
                //   return Response::json(array('success'=>'1', 'message'=>'Record Updated Successfully.'), 200);
                //   }
    }


    public function showEmployee($id) {
      
      $employee = DB::table('employee')
                ->join('department', 'employee.emp_dept', '=', 'department.id')
                ->select('employee.*', 'department.dept_name','department.dept_location')
                ->where('employee.id',$id)
                ->get();

      return view('employee.show',compact('employee'));
      
    }


    public function deleteEmployee($id) {
  
        $data = DB::table('employee')->where('id',$id)->delete();
        if($data){

              return Response::json(array('success'=>'1', 'message'=>'Record deleted Successfully.'), 200);
                      
                  }
    }

    public function getSubDepartmentAjax($id) {

      // dd($id);
       $subdept = DB::table("sub_department")->where("dept_id",$id)
                 ->pluck("sub_dept","id");
                 
           return response()->json($subdept);
    }


    public function showEmsDetails(){

      $employee = DB::table('employee')->get();
      return view('employee.ems',compact('employee'));


    }

    public function empMap()
    {
      
      $employee = DB::table('employee')->get();
      return view('employee.map',compact('employee'));

    }


    public function getEmployeeGallerybyId($employee_id) {

      $employee_gallery = EmployeeGallery::getGalleryImages($employee_id);
          if($employee_gallery) {
            return Response::json(array('success'=>1, 'employee_gallery'=>$employee_gallery), 200);
          } else {
              return Response::json(array('success'=>0, 'message'=>'No images found'), 400);
          }
      }


    public function deleteImage($galleryImageId) {

        
        // dd($galleryImageId);
        // die;
        $employee_gallery = EmployeeGallery::deleteGalleryImage($galleryImageId);
        if($employee_gallery){             

            return Response::json(array('success'=>'1', 'message'=>'Image deleted successfully!'));

        }else{

            return Response::json(array('success'=>'0', 'message'=>'Image not deleted please try again!'));
        }

      }
        


}