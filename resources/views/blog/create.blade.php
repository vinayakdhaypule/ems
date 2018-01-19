@extends('layouts.app')

@section('content')
   <script src="{{asset('ckeditor/ckeditor.js')}}"> </script> 
   <script type="text/javascript">  

        CKEDITOR.replace( 'editor' );  

       </script>
			
       <div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h1>Add blog </h1>
								</div>
							</div>
						</div>
						
						<div class="row">

							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								 <div class="panel-body">
								@if(Session::has('flash_message'))
                                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                                @endif
									<div class="panel-body">	
  									<div class="row">
  									<div class="col-md-8">
  									<form action="{{route('blog.store')}}" autocomplete="off" id="slider_from" method="POST" files="true" enctype="multipart/form-data">
  											
    										<div class="form-group  {{ ($errors->has('title')) ? $errors->first('title') : '' }}">
      										<label class="control-label">blog Title</label>
												<input type="text" placeholder="Slider Title" class="form-control" id="title" value="" name="title">
												 <!-- {!! $errors->first('title','<p class="help-block">:message</p>') !!} -->
    										</div>
    										<div class="form-group">
      										<label class="control-label">blog Url</label>
												<input type="text" placeholder="Slider URL" class="form-control" id="url_slider" value="" name="blog_url">
												<!--  {!! $errors->first('url_slider','<p class="help-block">:message</p>') !!} -->
    										</div>
    										<div class="form-group ">
												<label class="control-label">blog Image</label>
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="input-group">
														<div class="form-control uneditable-input">
															<i class="fa fa-file fileupload-exists"></i>
															<span class="fileupload-preview"></span>
														</div>
														<div class="input-group-btn">
															<div class="btn btn-light-grey btn-file">
																<span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select Image</span>
																<span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
																<input type="file" name="blog_image" class="file-input">
															</div>
															<a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
																<i class="fa fa-times"></i> Remove
															</a>
														</div>

													</div>
													<!-- {!! $errors->first('slider_img','<p class="help-block">:message</p>') !!} -->
												</div>
												<div id="slider_img-error" class="error"></div>
											</div>
												<div class="form-group  {{ ($errors->has('description')) ? $errors->first('blog_url') : '' }}">
      										<label class="control-label"> Blog Description</label>
												<!-- <textarea cols="80" id="editor1" value="" name="blog_description" rows="10"></textarea>
												 {!! $errors->first('description','<p class="help-block">:message</p>') !!} -->
												  <textarea id="editor" class="ckeditor" name="blog_description"> </textarea>
    										</div>
											<br>
											<div class="form-group col-md-4" style=padding:0;>			
												<button type="submit" class="btn btn-default form-control btn_theme">Submit</button>	
											</div>
												
  										</form>
									</div>
									</div>	
									</div>
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
					</div>
					
				</div>
				<!-- end: PAGE -->
			</div>
			
@endsection