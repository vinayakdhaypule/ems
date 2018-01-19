@extends('layouts.app')

@section('content')
<style type="text/css">
    
    .panel-default  a {
    color: #ffffff;
    text-decoration: none;

}
button.btn.btn-primary.btn-sm {
    float: right;
    margin: 5px 24px 1px 9px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         


            <div class="panel panel-default">
                <button type="button" class="btn btn-primary btn-sm"><a href="{{route('employee.index')}}">Back</a></button>
                <div class="panel-heading">Employee Details</div>

                <div class="panel-body">

                  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Name:</strong>
                {{$employee[0]->emp_name}}
                
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Job:</strong>
                 {{$employee[0]->emp_job}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Phone:</strong>
                 {{$employee[0]->emp_phone}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Address:</strong>
                {{$employee[0]->location}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salary:</strong>
                 {{$employee[0]->emp_salary}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                {{$employee[0]->dept_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department Location:</strong>
                {{$employee[0]->dept_location}}
                
            </div>
        </div>
  </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
