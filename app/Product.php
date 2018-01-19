<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model {


    protected $table = 'product';
    public $fillable = ['title','description','price'];


}