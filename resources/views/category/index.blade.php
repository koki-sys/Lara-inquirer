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
                    <form action="genre.php" method="post">
                        @csrf
                        <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                            <input type="hidden" name="genreid" value="{{ $category->id }}">
                            <input type="hidden" name="genre" value="{{ $category->name }}">
                            <input type="submit" class="justify-content-center text-dark btn btn-white" value="{{ $category->name }}">
                        </li>
                    </form>
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
                    <form action="area.php" method="post">
                        @csrf
                        <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                            <input type="hidden" name="genreid" value="{{ $area->id }}">
                            <input type="hidden" name="genre" value="{{ $area->name }}">
                            <input type="submit" class="text-center text-dark btn btn-white" value="{{ $area->name }}">
                        </li>
                    </form>
                @endforeach
            </ul>
        </div>
    </div>
@endsection