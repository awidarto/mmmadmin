<?php
namespace Api;

use Illuminate\Support\Facades\Input;

class AuthController extends \Controller {
	public function  __construct()
	{
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		echo "Hello world!";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function login(){
    	
    	//var_dump(Input::all());
    	//echo Input::get('user');
    	if(Input::has('user') && Input::has('pwd'))
    	{
    		echo Input::get('user') . " => " . Input::get('pwd');
    	}

    }

    public function logout($id = null){
        return 'logged out';
    }

    public function missingMethod($parameters = array())
    {
        //
    }

}
