<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\TestModel;
use App\BookModel;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$testModel = new TestModel;
        //$test = TestModel::all();
        //$users = DB::collection('test')->get();
        //dd($test);
        $books = DB::collection('books')->raw(function($collection)
        {
            return $collection->aggregate(array(
                array(
                    '$lookup' => array(

                        'from'=>'test',
                        'foreignField'=>'t_id',
                        'localField'=>'_id',
                        'as'=>'t_data',
                    )
                )
            ));
        });
        //dd($books);
        echo '<pre>';
        print_r($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $book = new TestModel();
        $book->name =  'Ram';
        $book->email =  'Ram@gmail.com';
        $book->save();
        $books = DB::collection('test')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $id= '592e9c2732d93f16ecb774be';
        $book = DB::collection('test')->where('_id', $id)->get();
        dd($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
