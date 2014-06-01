<?php

class MediaapiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$media = Media::get(array(
                '_id',
                'title',
                'genre',
                'artist',
                'type',

                'defaultpictures.thumbnail_url',
                'defaultpictures.large_url',
                'defaultpictures.medium_url',
                'defaultpictures.full_url',
                'defaultpictures.filename',
                'defaultpictures.filesize',
                'defaultpictures.filetype',
                'defaultpictures.is_image',
                'defaultpictures.is_audio',
                'defaultpictures.is_video',
                'defaultpictures.fileurl',
                'defaultpictures.file_id',
                'defaultpictures.caption',

                'defaultmedias.thumbnail_url',
                'defaultmedias.large_url',
                'defaultmedias.medium_url',
                'defaultmedias.full_url',
                'defaultmedias.filename',
                'defaultmedias.filesize',
                'defaultmedias.filetype',
                'defaultmedias.is_image',
                'defaultmedias.is_audio',
                'defaultmedias.is_video',
                'defaultmedias.fileurl',
                'defaultmedias.file_id',
                'defaultmedias.caption'

            ));

        return Response::json(array(
            'error' => false,
            'media' => $media->toArray()),
            200
        );
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


}
