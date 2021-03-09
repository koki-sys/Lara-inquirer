import { Link } from 'react-router-dom';
import { useState } from 'react';

const BeforeLoginNav = () => {
    return (
        <nav className="navbar navbar-expand-lg mr-5 ml-5 navigation">
            <div className="collapse navbar-collapse row">
                <ul className="navbar-nav col-6"></ul>
                <ul className="navbar-nav col-6">
                    <li className="col-lg-4 col-md-1"></li>
                    <li className="nav-item col-lg-2 col-md-3 p-1">
                        <Link className="nav-link btn btn-outline-warning text-warning shadow-sm" to="register">新規登録</Link>
                    </li>
                    <li className="nav-item col-lg-2 col-md-3 p-1">
                        <Link className="nav-link btn btn-warning text-white shadow-sm" to="login">ログイン</Link>
                    </li>
                    <li className="nav-item col-lg-4 col-md-5 p-1">
                        <a className="nav-link btn btn-primary shadow-sm" href="{{ route('rental.create') }}">予約確定</a>
                    </li>
                </ul>
            </div>
        </nav>
    )
}

const AfterLoginNav = () => {
    return (
        <nav class="navbar navbar-expand-lg mr-5 ml-5" style="background-color: #fbfbfb;">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav mr-2 w-25">
                    <li class="nav-item w-25"></li>
                    <li class="nav-item mr-2" style="width: 40%">
                        <form action="{{ route('logout') }}" method="POST">
                            <button type="submit" class="nav-link btn btn-outline-danger text-danger shadow-sm">ログアウト</button>
                        </form>
                    </li>
                    <li class="nav-item w-50">
                        <a class="nav-link btn shadow-sm" style="background-color: #E6E6E6;" href="{{ route('rental.index') }}" >
                            <img src="{{ asset('storage/img/mylibrary.svg') }}" alt="Myライブラリ" />
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav w-25">
                    <li class="nav-item mr-2 w-50">
                        <a class="nav-link btn btn-info shadow-sm" href="{{ route('bookcart.index') }}">
                            <img src="{{ asset('storage/img/bookcart.svg') }}" alt="ブックカート" />
                        </a>
                    </li>
                    <li class="nav-item w-50">
                        <a class="nav-link btn btn-primary shadow-sm" href="{{ route('rental.create') }}">予約確定</a>
                    </li>
                </ul>
            </div>
        </nav>
    )
}

const IsLoginNav = (props) => {
    const [user, setUser] = useState([]);

    return (
        <BeforeLoginNav />
    )
}

export { IsLoginNav };