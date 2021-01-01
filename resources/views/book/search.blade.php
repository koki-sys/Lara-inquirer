@extends('layouts.layout')

@section('content')
    <h4>「{{ $name }}」の検索結果</h4>
    <div class="row">
        @foreach ($search as $search)
            <div class="col-md-6 col-lg-4 mt-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/img/book_img/'. $search->img) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $search->name }}</h5>
                        <div class="row">
                            <form action="../bookcart/add.php" method="post">
                                <input type="hidden" name="cartid" value="{{ $search->id }}">
                                <input type="submit" class="btn btn-info mr-3 ml-3" value="ブックカートへ"></a>
                            </form>
                            <form action="../home/show.php" method="post">
                                <input type="hidden" name="showid" value="{{ $search->id }}">
                                <input type="submit" class="text-primary btn-white btn" value="書籍詳細"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection