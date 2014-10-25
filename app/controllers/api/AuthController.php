<?php
namespace Api;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class AuthController extends \Controller {
	public function  __construct()
	{
		//$this->model = "Member";
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
	/**
	 * @param string user
	 * @param sring pwd
	 * @method POST
	 */

    public function login(){
    	
    	if(Input::has('user') && Input::has('pwd'))
    	{
    		$retVal = array("status" => "ERR", "msg" => "Invalid username or password.");
    		$user = \Member::where('email', '=', Input::get('user'))->firstorFail();
    		if($user)
    		{
    			if(Hash::check(Input::get('pwd'), $user->password))
    			{
    				$sessionKey = md5($user->email . $user->_id . "momumu<-Salt?");
		    		$retVal = array("status" => "OK", "key" => $sessionKey);
		    		$user->session_key = $sessionKey;
		    		$user->save();
		    		
		    		
    			}
    		}
    		echo json_encode($retVal);
    	}

    }

    public function logout($id = null){

    	if(Input::has('session_key'))
    	{
    		$retVal = array("status" => "ERR", "msg" => "Invalid session.");
    		$user = \Member::where('session_key', '=', Input::get('session_key'))->firstorFail();
    		if($user)
    		{
    				$retVal = array("status" => "OK");
    				$user->session_key = null;
    				$user->save();
    		}
    		echo json_encode($retVal);
    	}
    	 
    }

    public function missingMethod($parameters = array())
    {
        //
    }

}
