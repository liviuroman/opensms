<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">

<channel>
  <title>RSS feed - OpenSMS</title>
  <link>http://opensms.ro</link>
  <description>OpenSMS este un proiect personal, non-profit care ofera posibilitatea trimiterii de SMS-uri gratuit catre orice telefon mobil din Romania.</description>

  @foreach($news as $item)
    <item>
      <title>{{{ $item->titlu }}}</title>
      <link>{{ URL::to('news') }}/{{ $item->id }}</link>
      <description>{{{ $item->body }}}</description>
    </item>
  @endforeach
</channel>
</rss>