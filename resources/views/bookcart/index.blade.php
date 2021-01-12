@extends('layouts.layout')

@section('content')
<div class="container mt-5 position-relative">
    <div class="row">
        <div class="col-lg-2">
            <h4 class="float-left">ブックカート</h4>
        </div>
        <div class="col-lg-8">
            <p class="text-danger mt-1">予約はまだ完了していません!　右上の「予約確定」を押して、予約を完了させてください 。</p>
        </div>
    </div>
    <h6 class="mt-3">ブックカートに入っているもの</h6>
    <div class="row">
        @if ($cartcnt > 20)
        <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。</h4>
        <h5 class="text-danger mt-2 ml-5">現在貸出冊数：{{ $cartcnt }}</h5>
        @elseif ($cartcnt == 20)
        <p>貸出上限は20冊です</p>
        @elseif (($cartcnt + $rentalcnt) > 20)
        <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。カートに入れ直してください。</h4>
        @elseif ($cartcnt == 0 && $nowurl == $indexurl)
        <div class="col-lg-12 mt-5 ml-5">
            <h4 class="text-warning">ブックカートには何も入っていません！</h4>
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