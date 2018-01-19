<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Employee extends Model {


    protected $table = 'employee';
    public $fillable = ['emp_name','emp_job','location','city','country','lat','lng','emp_phone','emp_salary','emp_dept','sub_dept_id','created_at','updated_at'];


}


