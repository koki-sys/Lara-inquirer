@extends('layouts.layout')

@section('content')
<div class="container">
    <a href="{{ route('rental.index') }}">
        ＜＜ Myライブラリへ</a>
    <h4 class="mt-5 ml-5">貸出書籍一覧</h4>
    <div class="row ml-5 mt-3">
        @foreach ($mybook as $book)
        <div class="col-3 m-2">
            <img src="{{ asset('storage/img/book_img/'. $book->book->img) }}" alt="img" height="80%" width="auto">
        </div>
        @endforeach
    </div>
</div>
@endsection