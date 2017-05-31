<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BookModel extends Eloquent
{
    //
    //protected $connection = 'mongodb';
    protected $collection = 'books';
    public function test()
    {
        return $this->belongsTo('test');
    }
}
