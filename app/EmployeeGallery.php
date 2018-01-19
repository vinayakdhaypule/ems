<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class EmployeeGallery extends Model {


    protected $table = 'emp_gallery';
    public $fillable = ['emp_id','galley'];


        public static function saveEmployeeImages($request, $empId){
            
    
             $now = date('Y-m-d H:i:s');

             if(isset($request['files']))            			
				
               $directory = storage_path().'/app/employee/'.$empId.'/';

                    if (!file_exists($directory)) {
                        mkdir($directory, 0777, true);
                    }

                $files = $request['files'];                
                $gallery = '';


    			    foreach($files as $k=>$file){

                            $i = time()+$k;

        			    	$img = 'EMP'.'_'.$empId.'_'.$i.'.'.$file->getClientOriginalExtension();
                            
                            
                            $gallery    = DB::table('emp_gallery')->insert([
                                    'files' => $img,
                                    'emp_id' =>$empId,
                                    'created_at' =>$now,
                                    'updated_at' =>$now
                            ]);         
        			        $file->move($directory,$img);
                    }

                return $gallery;			
          }



        public static function getGalleryImages($employee_id) {
          $employee_gallerybyId   = DB::table('emp_gallery as g')
                                ->select('g.*')
                                 ->where('g.emp_id',$employee_id)                              
                                ->get();
               if($employee_gallerybyId){
                    return $employee_gallerybyId;
                  }
        }

         
    public static function deleteGalleryImage($galleryId){       

       
       if($galleryId){

            // $EmployeeimageDetails = EmployeeGallery::getEmployeeIdByGalleryId($galleryId);

             $EmployeeimageDetails = DB::table('emp_gallery')
                ->select('*')
                ->where('id', $galleryId)
                ->first();


            $file = storage_path().'/app/employee/'.$EmployeeimageDetails->emp_id.'/'.$EmployeeimageDetails->files;
            if(is_file($file)){
                unlink($file); 
            }
            $deletedItems = DB::table('emp_gallery')->where('id', $galleryId)->delete();        
            
            return $deletedItems;     
        }    
    }

     

}