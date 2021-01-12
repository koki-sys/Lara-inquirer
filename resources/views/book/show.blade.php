@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <h4 class="float-left">{{ $book->name }}</h4>
        </div>
        <div class="col-lg-8">
            <form action="../bookcart/add.php" method="post">
                <input type="hidden" name="cartid" value="{{ $book->id }}">
                <input type="submit" class="btn btn-info mr-3 ml-3" value="ブックカートへ"></a>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 mt-5">
            <img src="{{ asset('storage/img/book_img/'. $book->img) }}" alt="img">
        </div>
        <div class="col-lg-6 mt-5">
            <div class="row">
                <h5>作者：</h5><br>
                <p class="ml-3">{{ $book->author }}</p>
            </div>
            <div class="row mt-3">
                <h5>出版社：</h5><br>
                <p class="ml-3">{{ $book->publisher }}</p>
            </div>
            <div class="row mt-3">
                <h5>ジャンル：</h5>
                <p class="ml-3">{{ $category->name }}</p>
            </div>
            <div class="row mt-3">
                <h5>ISBN：</h5><br>
                <p class="ml-3">{{ $book->isbn }}</p>
            </div>
            <div class="row mt-3">
                <h5>在庫のある図書館：</h5><br>
                <p class="ml-3">{{ $library->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection