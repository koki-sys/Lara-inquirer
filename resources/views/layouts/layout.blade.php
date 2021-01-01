<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=M+PLUS+Rounded+1c:wght@400;500&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Kosugi Maru", sans-serif;
        }

        a {
            list-style: none;
            text-decoration: none;
        }
    </style>
    <link rel="shortcut icon" href="../../favicon.ico" />
    <title>InQuirer 書籍貸出サイト</title>
</head>

<body style="background-color: #fbfbfb">
    <nav class="navbar navbar-expand-lg navbar-light mt-3 mr-5 ml-5" style="background-color: #fbfbfb">
        <a href="{{ route('book.index') }}">
            <img src="{{ asset('storage/img/InQuirer.svg') }}" alt="InQuirer" />
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item mr-1">
                    <a class="nav-link" href="{{ route('book.index') }}">書籍一覧<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link" href="{{ route('category.index') }}">カテゴリ</a>
                </li>
                <li>
                    <form action="{{ route('book.search') }}" method="POST" class="form-inline my-2 my-lg-0">
                        @csrf
                        <input type="search" class="form-control mr-sm-2" placeholder="書籍名、地域を入力" name="search" aria-label="Search" />
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="探す">
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    @auth
        @component('components.logined')
        
        @endcomponent
    @endauth

    @guest
        @component('components.menu')
        
        @endcomponent
    @endguest

    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>