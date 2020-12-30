@extends('layouts.layout')

@section('content')
<h4>ジャンル：{{ $category->name }}</h4>
<div class="row">
    @foreach($areabook as $book)
    <div class="col-md-6 col-lg-4 mt-5">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/img/book_img/'. $book->img)}}">
            <div class="card-body">
                <h5 class="card-title">{{ $book->name }}</h5>
                <div class="row">
                    <form action="../bookcart/add.php" method="post">
                        <input type="hidden" name="cartid" value="{{ $book->id }}">
                        <input type="submit" class="btn btn-info mr-3 ml-3" value="ブックカートへ"></a>
                    </form>
                    <form action="../home/show.php" method="post">
                        <input type="hidden" name="showid" value="{{ $book->id }}">
                        <input type="submit" class="text-primary btn-white btn" value="書籍詳細"></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection