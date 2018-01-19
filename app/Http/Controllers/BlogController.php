<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Flash;
use Session;
use Redirect;
use DB;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

class BlogController extends Controller
{
    public function index(){
         
         // $blog = Blog::all();

         $blog = DB::table('blog')
            ->join('ratings', 'blog.id', '=', 'ratings.blog_id')
            ->select('blog.*', 'ratings.blog_id', 'ratings.rating')
            ->get();
            // dd($blog);
    	  return view('blog.index',compact('blog'));
    }

    public function create(){
        return view('blog.create');
    }
    
     public function store(Request $request)
    {
       // $req = $request->all();
       // dd($req);
  
      //  $this->validate($request,[
      // 'title'=> 'required|unique:ss_slider',
      // 'url_slider'=> 'required|min:1|max:300',
      // 'slider_img' => 'required|image|mimes:jpeg,png,jpg',]);

        $blog_path = public_path().'/uploads/blog/';//echo $thumb_path; die();
        
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->blog_url = $request->blog_url;
        $blog->blog_description = $request->blog_description;

         if(!empty($request->file('blog_image'))){
      

         $blog->blog_image = $request->get('blog_image');
          $request->hasFile('blog_image');
          $blog_image = $request->file('blog_image');
          $filename =$blog_image->getClientOriginalName();

          $ext = $blog_image->getClientOriginalExtension();
        $newfilename = substr($filename, 0, strrpos($filename, '.'));
        $newfilename = md5(uniqid()) . '_' . str_slug($newfilename) . '.' . $ext;

          if(!file_exists($blog_path)){
            mkdir($blog_path, 0777, true);
          }
          $blog_image->move($blog_path, $newfilename);
          $blog->blog_image = $newfilename;
          $blog->save();
          }
         
          Session::flash('flash_message','slider Has Been Created Successfully.');
          return Redirect::back();
    }
    public function show($id){
        $blog = Blog::where('id', '=', $id)->first();
      return view('blog.edit',compact('blog'));
    }
    public function edit($id) {
        
      $blog = Blog::where('id', '=', $id)->first();
      return view('blog.edit',compact('blog'));
    }

    public function update(Request $request,$id){
      // $req = $request->all();
      // dd($req);

      //   $this->validate($request,[
      // 'title'=> 'required|min:5|max:100',
      // 'blog_url'=> 'required|min:1|max:300',
      // 'blog_description' => 'image|mimes:jpeg,png,jpg',
      // 'blog_image' => 'image|mimes:jpeg,png,jpg']);

       
       $blog = Blog::findOrFail($id);

          // dd($partners);
       $blog->title = $request->title;
       $blog->blog_url = $request->blog_url;
       $blog->blog_description = $request->blog_description;
        if(!empty($request->file('blog_image'))){


        $blog->blog_image = $request->get('blog_image');
          $request->hasFile('blog_image');
          $blog_image = $request->file('blog_image');
          $filename = $blog_image->getClientOriginalName();

           $blog_path = public_path().'/uploads/block/';
            //echo $thumb_path; die();
          if(!file_exists($blog_path)){
            mkdir($blog_path, 0777, true);
          }
          $blog_image->move($blog_path, $filename);
          $blog->blog_image = $filename;
          $blog->save();
          }
          else{
         $blog->blog_image = $request->old_blog_image;
         $blog->save();

          }
          Session::flash('flash_message','block has been updated successfully.');
          return Redirect::back();
          
    }

     public function destroy($id){
        // dd($id);
        $blog = Blog::where('id', '=', $id)->first();
        $blog->delete();
        Session::flash('flash_message','blog Has Been Deleted Successfully.');
        return Redirect::route('blog.index');
    }
}
