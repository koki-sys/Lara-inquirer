import { Link } from 'react-router-dom';

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

    const logout = () => {
        axios
            .get("/api/logout")
            .then(res => {
                setUser(null);
            })
            .catch(err => {
                console.log(err);
            });
    };

    return (
        <nav className="navbar navbar-expand-lg mr-5 ml-5" style={{ backgroundColor: "#fbfbfb" }}>
            <div className="collapse navbar-collapse">
                <ul className="navbar-nav mr-auto"></ul>
                <ul className="navbar-nav mr-2 w-25">
                    <li className="nav-item w-25"></li>
                    <li className="nav-item mr-2" width="40%">
                        <button onClick={logout} className="nav-link btn btn-outline-danger text-danger shadow-sm">ログアウト</button>
                    </li>
                    <li className="nav-item w-50">
                        <a className="nav-link btn shadow-sm" style={{ backgroundColor: "#E6E6E6" }} href="{{ route('rental.index') }}" >
                            <img src="{{ asset('storage/img/mylibrary.svg') }}" alt="Myライブラリ" />
                        </a>
                    </li>
                </ul>
                <ul className="navbar-nav w-25">
                    <li className="nav-item mr-2 w-50">
                        <a className="nav-link btn btn-info shadow-sm" href="{{ route('bookcart.index') }}">
                            <img src="{{ asset('storage/img/bookcart.svg') }}" alt="ブックカート" />
                        </a>
                    </li>
                    <li className="nav-item w-50">
                        <a className="nav-link btn btn-primary shadow-sm" href="{{ route('rental.create') }}">予約確定</a>
                    </li>
                </ul>
            </div>
        </nav>
    )
}

const IsLoginNav = () => {
    if (sessionStorage) {
        return AfterLoginNav()
    } else {
        return BeforeLoginNav()
    }
}

export { IsLoginNav };
