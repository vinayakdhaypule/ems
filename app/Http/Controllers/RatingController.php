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

class RatingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function postRatings(Request $request) {

            $request = $request->all();
      
            $now = date('Y-m-d H:i:s');

            $blog_id = $request['blog_id'];
            $rating = $request['rating'];
            $created_at = $now;
            $updated_at = $now;

            $params=array('blog_id' => $blog_id,'rating' => $rating,'created_at' => $created_at,'updated_at' => $updated_at);
            $data = DB::table('ratings')->insert($params); 

             if($data) {

                        return Response::json(array('success'=>'1', 'message'=>'Rating Given  Successfully.'), 200);
                      }

    }

}