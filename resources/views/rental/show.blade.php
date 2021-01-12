@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <a href="{{ route('rental.index') }}">
        ＜＜ Myライブラリへ</a>
    <div class="row mt-5 ml-5">
        <div class="col-lg-3">
            <h4>{{ $book->rental_date }}予約分</h4>
        </div>
        <div class="col-lg-9">
            <p class="text-danger">
                予約IDをメモして、貸出時に司書にお伝えください
            </p>
        </div>
    </div>
    <div class="row mt-5 ml-5">
        <div class="col-lg-3">
            <p>予約ID：</p>
        </div>
        <div class="col-lg-4">
            <p>{{ $book->rental_number }}</p>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row mt-4 ml-5">
        <div class="col-lg-3">
            <p>予約日時：</p>
        </div>
        <div class="col-lg-4">
            <p>{{ $book->rental_date }}</p>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row mt-4 ml-5">
        <div class="col-lg-3">
            <p>受取期限日：</p>
        </div>
        <div class="col-lg-4">
            <p>{{ $book->receipt_date }}</p>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row mt-4 ml-5">
        <div class="col-lg-3">
            <p>受取図書館</p>
        </div>
        <div class="col-lg-4">
            <p>{{ $library->name }}</p>
        </div>
        <div class="col-lg-5"></div>
    </div>
</div>
@endsection