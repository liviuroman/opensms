<?php

class AdminBlockController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$block = Block::paginate(10);
		return View::make('admin.blockcreate')->with(compact('block'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('telefon' => 'required|digits:10|unique:blocked');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$block = new Block;
			$block->telefon = Input::get('telefon');
			$block->save();

			return Redirect::to('admin/numereblocate');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$block = Block::where('id', '=', $id)->firstOrFail();
		return View::make('admin.blockedit')->with(compact('block'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array('telefon' => 'required|digits:10|unique:blocked');

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/numereblocate/' . $id . '/edit')->withErrors($validator);
		} else {
			$block = Block::find($id);
			$block->telefon = Input::get('telefon');
			$block->save();

			return Redirect::action('AdminBlockController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$block = Block::find($id);
    $block->delete();
    return Redirect::action('AdminBlockController@index');
	}


}
