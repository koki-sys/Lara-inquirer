@extends('layouts.layout')

@section('content')
    @if ($cartcnt > 20)
        <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。</h4>
        <h5 class="text-danger mt-2 ml-5">現在貸出冊数：{{ $cartcnt }}</h5>
    @elseif ($cartcnt == 20)
        <p>貸出上限は20冊です</p>
    @elseif (($cartcnt + $rentalcnt) > 20)
        <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。カートに入れ直してください。</h4>
    @elseif ($cartcnt == 0 && $nowurl == $addurl)
        <div class="col-lg-12 mt-5 ml-5">
            <h4 class="text-warning">予約できません！ブックカートの中身を確認して下さい。</h4>
        </div>
        <div class="col-lg-12 ml-5 mt-3">
            <h6 class="">ヒント：</h6>
        </div>
        <div class="col-lg-12 ml-5">
            <p class="ml-5">🛒書籍一覧から予約したい書籍をブックカートにいれる。</p>
        </div>
    @endif

    <div class="container mt-5 position-relative">
        <div class="row">
            <div class="col-lg-4">
                <h4 class="float-left">ブックカートに追加しました。</h4>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{ route('book.index') }}" class="btn btn-outline-success btn-block">書籍一覧へ</a>
                    </div>
                    <div class="col-lg-3">
                        <a href="../reserve/add.php" class="btn btn-primary btn-block">予約確定</a>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
        <h6 class="mt-3">ブックカートに入っているもの</h6>
        <div class="row">
            @if ($cartcnt == 0)
                <div class="col-lg-12 mt-5 ml-5">
                    <h4 class="text-warning">カートに何も入っていません!</h4>
                </div>
                <div class="col-lg-12 ml-5 mt-3">
                    <h6 class="">ヒント：</h6>
                </div>
                <div class="col-lg-12 ml-5">
                    <p class="ml-5">🛒書籍一覧から予約したい書籍をブックカートにいれる。</p>
                </div>
            @endif
        
            @foreach ($img_arry as $arry)
                <div class="col-3 m-2">
                    <img src="{{ asset('storage/img/book_img/'. $arry ) }}" alt="img" height="80%" width="auto">
                </div>
            @endforeach
        </div>
    </div>
@endsection