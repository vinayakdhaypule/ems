<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Product;
use DB;
use DateTime;

class ApiProductController extends Controller {


	public function getProductList() {
		
		$product = Product::all();

		return Response::json(array(
            'error' => false,
            'products' => $product,
            'status_code' => 200
        ));
	}


	public function addProduct(Request $request){

		$request = $request->all();

		$now = date('Y-m-d H:i:s');
		$title = $request['title'];
		$description = $request['description'];
		$price = $request['price'];
		$created_at = $now;
		$updated_at = $now;


		$params =array(
					  'title'=>$title,
					  'description'=>$description,
					  'price'=>$price,	
					  'created_at' => $created_at,
                      'updated_at' => $updated_at
                         );


		$product = DB::table('product')->insert($params);
             
             if($product){

                return Response::json(array(
								            'error' => false,
								            'products' => $product,
								            'status_code' => 200
        									));


             }

	}


	public function showProduct($id) {
		
	    $product = Product::where('id',$id)->get();

	      if($product){

                return Response::json(array(
								            'error' => false,
								            'products' => $product,
								            'status_code' => 200
        									));


             }

	}


	public function deleteProduct($id) {
		
	    $product = Product::where('id',$id)->delete();

	      if($product){

                return Response::json(array(
								            'error' => false,
								            'products' => $product,
								            'message'=>'Record Deleted Successfully',
								            'status_code' => 200
        									));


             }

	}


	public function editProduct(Request $request,$id) {
		
		
		$request = $request->all();
        // $id =  $request['id'];
		$now = date('Y-m-d H:i:s');
		$title = $request['title'];
		$description = $request['description'];
		$price = $request['price'];
		$created_at = $now;
		$updated_at = $now;


		$params =array(
					  'title'=>$title,
					  'description'=>$description,
					  'price'=>$price,	
					  'created_at' => $created_at,
                      'updated_at' => $updated_at
                         );


		
		$product = DB::table('product')->where('id', $id)->update($params);
             
             if($product){

                return Response::json(array(
								            'error' => false,
								            'products' => $product,
								            'status_code' => 200
        									));


             }

	}
    


}
