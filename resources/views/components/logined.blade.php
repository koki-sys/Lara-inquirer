<nav class="navbar navbar-expand-lg mr-5 ml-5" style="background-color: #fbfbfb;">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mr-2 w-25">
            <li class="nav-item w-25"></li>
            <li class="nav-item mr-2" style="width: 40%">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-outline-danger text-danger shadow-sm">ログアウト</button>
                </form>
            </li>
            <li class="nav-item w-50">
                <a class="nav-link btn shadow-sm" style="background-color: #E6E6E6;" href="{{ route('rental.index') }}">
                    <img src="{{ asset('storage/img/mylibrary.svg') }}" alt="Myライブラリ">
                </a>
            </li>
        </ul>
        <ul class="navbar-nav w-25">
            <li class="nav-item mr-2 w-50">
                <a class="nav-link btn btn-info shadow-sm" href="{{ route('bookcart.index') }}">
                    <img src="{{ asset('storage/img/bookcart.svg') }}" alt="ブックカート">
                </a>
            </li>
            <li class="nav-item w-50">
                <a class="nav-link btn btn-primary shadow-sm" href="{{ route('rental.create') }}">予約確定</a>
            </li>
        </ul>
    </div>
</nav>