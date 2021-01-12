@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">

    </div>
    @foreach($query as $row)
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <h4 class="float-left">貸出予約が完了しました。</h4>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('book.index') }}" class="btn btn-outline-success btn-block">書籍一覧へ</a>
            </div>
        </div>
        <div class="row ml-1">
            <p class="text-danger mt-1">予約IDをメモして、貸出時に司書にお伝えください</p>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3">
                <p>予約ID：</p>
            </div>
            <div class="col-lg-4">
                <p>{{ $row->rental_number }}</p>
            </div>
            <div class="col-lg-5"></div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <p>予約日時：</p>
            </div>
            <div class="col-lg-4">
                <p>{{ $row->rental_date }}</p>
            </div>
            <div class="col-lg-5"></div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <p>受取期限日：</p>
            </div>
            <div class="col-lg-4">
                <p>{{ $row->receipt_date }}</p>
            </div>
            <div class="col-lg-5"></div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <p>受取図書館</p>
            </div>
            <div class="col-lg-4">
                @foreach ($library as $librow)
                <p>{{ $librow->name }}</p>
                @endforeach
            </div>
            <div class="col-lg-5"></div>
        </div>
    </div>
    @endforeach
</div>
@endsection