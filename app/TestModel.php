<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TestModel extends Eloquent
{
    //
    //protected $connection = 'mongodb';
    protected $collection = 'test';
    public function items()
    {
        return $this->hasMany('books', 't_id');
    }
}
