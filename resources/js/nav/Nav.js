// React、それに関連するコンポーネント
import { Component } from 'react';
import { Link } from 'react-router-dom';

// アプリケーションのコンポーネント
import { IsLoginNav } from './IsLoginNav';

// 画像など
import InQuirer from '../../img/InQuirer.svg';

export class Nav extends Component {
    render() {
        alert("ナビゲーション部分を開発中です。");
        return (
            <>
                <nav className="navbar navbar-expand-lg navbar-light mt-3 mr-5 ml-5 navigation">
                    <Link to="/">
                        <img src={InQuirer} alt="InQuirer" />
                    </Link>

                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav mr-auto"></ul>
                        <ul className="navbar-nav">
                            <li className="nav-item mr-1">
                                <a className="nav-link" href="{{ route('book.index') }}">書籍一覧<span className="sr-only">(current)</span></a>
                            </li>
                            <li className="nav-item mr-1">
                                <a className="nav-link" href="{{ route('category.index') }}">カテゴリ</a>
                            </li>
                            <li>
                                <form action="{{ route('book.search') }}" method="POST" className="form-inline my-2 my-lg-0">

                                    <input type="search" className="form-control mr-sm-2" placeholder="書籍名、地域を入力" name="search" aria-label="Search" />
                                    <input className="btn btn-outline-success my-2 my-sm-0" type="submit" value="探す" />
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                {/* ログインしたかどうかの判定 */}
                <IsLoginNav />
            </>
        )
    }
}