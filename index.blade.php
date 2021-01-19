{{-- リスト3−１２ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    <p>{{$msg}}</p>
  </body>
</html> --}}

{{-- リスト3−１２ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    <p>{{$msg}}</p>
    <form action="hello" method="post">
      @csrf
      <input type="text" name="msg">
      <input type="submit">
    </form>
  </body>
</html> --}}

{{-- リスト3−１７ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    @if ($msg != '')
      <p>こんにちは、{{$msg}}さん。</p>
    @else
      <p>何か書いてください。</p>
    @endif
    <form action="hello" method="post">
      @csrf
      <input type="text" name="msg">
      <input type="submit">
    </form>
  </body>
</html> --}}

{{-- リスト３ー１９ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    @isset ($msg)
      <p>こんにちは、{{$msg}}さん。</p>
    @else
      <p>何か書いてください。</p>
    @endisset
    <form action="hello" method="post">
      @csrf
      <input type="text" name="msg">
      <input type="submit">
    </form>
  </body>
</html> --}}

{{-- リスト3−２１ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    <p>&#064;foreachディレクティブの例</p>
    <ol>
      @foreach ($data as $item)
      <li>{{$item}}</li>
      @endforeach
    </ol>
  </body>
</html> --}}

{{-- リスト3−２４ --}}
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {
        font-size: 16pt;
        color: #999;
      }
      h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0 -30px 0;
        letter-spacing: -4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    <p>&#064;forディレクティブの例</p>
    @foreach($data as $item)
      @if ($loop->first)
        <p>*データ一覧</p>
        <ul>
      @endif
      <li>No,{{$loop->iteration}}. {{$item}}</li>
      @if($loop->last)
        </ul>
        <p>---ここまで</p>
      @endif
    @endforeach
  </body>
</html> --}}

{{-- リスト３−２７ --}}
{{-- @extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}

{{-- リスト3−２９ --}}
{{-- @extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>

  @component('components.message')
    @slot('msg_title')
    CAUTION!
    @endslot

    @slot('msg_content')
    これはメッセージの表示です。
    @endslot
  @endcomponent
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}

{{-- リスト3−３０ --}}
{{-- @extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>

  @include('components.message',['msg_title'=>'OK','msg_content'=>'サブビューです。'])
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}


{{-- リスト3−３２ --}}
{{-- @extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <ul>
    @each('components.item', $data, 'item')
  </ul>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}

{{-- リスト3−３７ --}}
{{-- @extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>Controller value<br>'message' = {{$message}}</p>
  <p>ViewComposer value<br>'view_message' = {{$view_message}}</p>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}

{{-- リスト4−５ --}}
{{-- @extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <table>
    @foreach($data as $item)
      <tr>
        <th>{{$item['name']}}</th>
        <td>{{$item['mail']}}</td>
      </tr>
    @endforeach
  </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection --}}


{{-- リスト4−７ --}}
@extends('layouts.helloapp')


@section('title', 'Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
  <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
