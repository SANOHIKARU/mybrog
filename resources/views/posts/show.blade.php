@extends('layouts.default')

@section('title', "$post->title")

@section('content')


<h1>

  @yield('edit')

  @section('back')
  <a href="{{ url('/') }}" class="header-menu">Top</a>
  @show

  @section('link')
  {{ $post->title }}
  @show


</h1>
<p style="font-size: 10px; border-bottom: 1px solid #ddd;">作成日: {{ $post->created_at }}</p>


<p>{!! nl2br(e($post->body)) !!}</p>

<h2>Comments</h2>
<ul>


  @section('delete')

  @forelse ($post->comments as $comment)
  <li>
    {{ $comment->body }}
    </form>
  </li>
  @empty
  <li>Nocommentsyet</li>
  @endforelse
  @show

</ul>

<form method="post" action="{{  action('CommentsController@store', $post)  }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Add Comment">
  </p>
</form>
<script src="/js/main.js"></script>
@endsection



<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>{{ $post->title }}</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
  </div>
</body>

</html> -->