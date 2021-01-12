@extends('layouts.layout')

@section('content')
<div class="container">
    <h4>Myライブラリ</h4>
    <div class="row mt-3">
        <div class="col-lg-2"></div>
        <div class="col-md-6 col-lg-3 mt-5">
            <a href="{{ route('rental.book') }}" class="text-dark">
                <div class="card shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/img/book.svg') }}">
                    <div class="card-body">
                        <h5 class="card-title">貸出書籍一覧</h5>
                        <p class="card-text">
                            現在貸出した書籍を確認できます。
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-md-6 col-lg-3 mt-5">
            <a href="{{ route('rental.detail') }}" class="text-dark">
                <div class="card shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/img/receipt.svg') }}">
                    <div class="card-body">
                        <h5 class="card-title">貸出予約明細</h5>
                        <p class="card-text">
                            貸出予約した予約IDなどの確認ができます。
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

@endsection