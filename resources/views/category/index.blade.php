@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-5">
            <ul class="list-group list-group-flush">
                <strong>
                    <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">ジャンル
                    </li>
                </strong>
                @foreach ($categories as $category)
                    <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                        <a href="{{ url('category/'. $category->id) }}" class="justify-content-center text-dark btn btn-white">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-2"></div>
        <div class="col-5">
            <ul class="list-group list-group-flush">
                <strong>
                    <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">地域</li>
                </strong>
                @foreach ($areas as $area)
                    <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                        <a href="{{ url('area/'. $area->id) }}" class="text-center text-dark btn btn-white">{{ $area->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection