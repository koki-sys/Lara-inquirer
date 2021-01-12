@extends('layouts.layout')

@section('content')
<div class="container">
    <a href="{{ route('rental.index') }}">
        ＜＜ Myライブラリへ</a>
    <h4 class="mt-5 ml-5">貸出明細一覧</h4>
    <div class="row ml-5 mt-3">
        <ul class="list-group list-group-flush ml-5">
            <strong>
                @foreach ($detail as $d)
                <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                    <a href="/rental/{{ $d->id }}" class="text-dark btn btn-white">
                        {{ $d->rental_date }}予約分
                    </a>
                </li>
                @endforeach
            </strong>
        </ul>
    </div>
</div>
@endsection