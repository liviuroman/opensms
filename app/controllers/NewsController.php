<?php

class NewsController extends BaseController {

  public function index()
  {
    $news = News::orderBy('created_at', 'desc')->paginate(10);
    return View::make('news.index')->with(compact('news'));
  }

  public function show($id)
  {
    $news = News::where('id', '=', $id)->firstOrFail();
    return View::make('news.show')->with(compact('news'));
  }

  public function rss()
  {
    $news = News::orderBy('created_at', 'desc')->take(10)->get();
    return View::make('news.rss')->with(compact('news'));
  }

}