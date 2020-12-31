@extends('layouts.layout')

@section('content')
    <h4>「{{ $name }}」の検索結果</h4>
    <h4 class="mt-5">見つかりませんでした。</h4>
    <h6 class="mt-5">ヒント：</h6>
    <p class="mt-3">🔎日本の地方区分名で探してみる。</p>
    <p>🔎書籍名の中に含まれるキーワードで探してみる。</p>
@endsection