<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">

<channel>
  <title>RSS feed - OpenSMS</title>
  <description>OpenSMS este un proiect personal, non-profit care oferă posibilitatea trimiterii de SMS-uri gratuit către orice telefon mobil din România.</description>
  <link>http://opensms.ro</link>
  

  @foreach($news as $item)
    <item>
      <title>{{ $item->titlu }}</title>
      <description>{{ strip_tags($item->body) }}</description>
      <link>{{ URL::to('news') }}/{{ $item->id }}</link>
    </item>
  @endforeach
</channel>
</rss>