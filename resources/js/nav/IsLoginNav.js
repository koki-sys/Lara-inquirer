import { Component } from 'react';


export class IsLoginNav extends Component {
    render() {
        return (
            <nav className="navbar navbar-expand-lg mr-5 ml-5 navigation">
                <div className="collapse navbar-collapse row">
                    <ul className="navbar-nav col-6"></ul>
                    <ul className="navbar-nav col-6">
                        <li className="col-lg-4 col-md-1"></li>
                        <li className="nav-item col-lg-2 col-md-3 p-1">
                            <a className="nav-link btn btn-outline-warning text-warning shadow-sm" href="{{ route('register') }}">新規登録</a>
                        </li>
                        <li className="nav-item col-lg-2 col-md-3 p-1">
                            <a className="nav-link btn btn-warning text-white shadow-sm" href="{{ route('login') }}">ログイン</a>
                        </li>
                        <li className="nav-item col-lg-4 col-md-5 p-1">
                            <a className="nav-link btn btn-primary shadow-sm" href="{{ route('rental.create') }}">予約確定</a>
                        </li>
                    </ul>
                </div>
            </nav>
        )
    }
}