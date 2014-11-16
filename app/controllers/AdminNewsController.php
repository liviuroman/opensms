<?php

class AdminNewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::orderBy('created_at', 'desc')->paginate(10);
    return View::make('admin.index')->with(compact('news'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.newscreate');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
                'titlu' => 'required|min:2|max:255',
                'body' => 'required|min:2|max:65536'
              );
    $validator = Validator::make(Input::all(), $rules);

    if($validator->fails()){
      return Redirect::to('admin/newsadd')->withErrors($validator)->withInput();
    } else {
      $news = new News;
      $news->titlu = Input::get('titlu');
      $news->body = Input::get('body');
      $news->save();

      return Redirect::to('admin');
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
		$news = News::where('id', '=', $id)->firstOrFail();
		return View::make('admin.newsedit')->with(compact('news'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
								'titlu' => 'required|min:2|max:255',
                'body' => 'required|min:2|max:65536'
							);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('admin/news/' . $id . '/edit')->withErrors($validator);
		} else {
			$news = News::find($id);

			$news->titlu = Input::get('titlu');
			$news->body = Input::get('body');

			$news->save();

			return Redirect::action('AdminNewsController@index');
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
		$news = News::find($id);
    $news->delete();

    return Redirect::action('AdminNewsController@index');
	}


}
