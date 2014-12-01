@extends('master', ['page_title' => 'Știri și noutăți legate de OpenSMS'])

@section('content')
<div>

<h3>Noutăți <a href="{{ URL::to('news/rss') }}" title="RSS Feed" target="_blank"><img src="/img/rssicon.png" width="20"></a></h3>
<br />

@foreach($news as $new)

  <h4><a href="{{ URL::to('news') }}/{{ $new->id }}" title="{{ $new->titlu }}">{{ $new->titlu }}</a> <small><em>{{ $new->created_at }}</em></small></h4>
  <p>{{ strip_tags(str_limit($new->body, 320, '[...]')) }}</p>
  <br />

@endforeach

{{ $news->links() }}
</div>
@endsection