<nav class="navbar navbar-expand-lg mr-5 ml-5 " style="background-color: #fbfbfb">
    <div class="collapse navbar-collapse row">
        <ul class="navbar-nav col-6"></ul>
        <ul class="navbar-nav col-6">
            <li class="col-lg-4 col-md-1"></li>
            <li class="nav-item col-lg-2 col-md-3 p-1">
                <a class="nav-link btn btn-outline-warning text-warning shadow-sm" href="{{ route('register') }}">新規登録</a>
            </li>
            <li class="nav-item col-lg-2 col-md-3 p-1">
                <a class="nav-link btn btn-warning text-white shadow-sm" href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="nav-item col-lg-4 col-md-5 p-1">
                <a class="nav-link btn btn-primary shadow-sm" href="{{ route('rental.store') }}">予約確定</a>
            </li>
        </ul>
    </div>
</nav>