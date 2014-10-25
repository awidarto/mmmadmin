<?php
namespace Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		
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
	 * @param itemid <=== What?
	 * @param itemtype
	 * @param userid
	 * @param string key
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $itemId
	 * @param string $key
	 * @return Response
	 */
	public function show($itemId, $key)
	{
		//
		$retVal = array('status' => 'ERR', 'msg' => 'Invalid Session');
		
		try {
			$user = \Member::where('session_key', '=', $key)->exists();
			if(!$user) return $retVal;
			
			$comment = \Comments::where('_id', '=', $itemId)->get();
			if($comment->count() > 0)
			{
				$retVal = array('status' => 'OK', 'comments' => $comment->toArray());
			}
			else
			{
				$retVal = array('status' => 'ERR', 'msg' => 'beyond your imagination :)');
			}
			return $retVal;
		}
		catch (ModelNotFoundException $e)
		{
				
		}
		
		return json_encode($retVal);
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


}
