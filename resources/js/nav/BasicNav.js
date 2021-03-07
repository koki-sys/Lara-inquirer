// React、それに関連するコンポーネント
import { Component } from 'react';
import { Link } from 'react-router-dom';
import { Navbar, Nav, Form, FormControl, Button } from 'react-bootstrap';

// アプリケーションのコンポーネント
import { IsLoginNav } from './IsLoginNav';

// 画像など
import InQuirer from '../../img/InQuirer.svg';


export class BasicNav extends Component {
    render() {

        return (
            <>
                <Navbar bg="light" expand="lg" className="mt-3 mr-5 ml-5 navigation">
                    <Link to="/">
                        <img src={InQuirer} alt="InQuirer" />
                    </Link>
                    <Navbar.Collapse id="navbarSupportedContent">
                        <ul className="navbar-nav mr-auto"></ul>
                        <ul className="navbar-nav">
                            <li className="nav-item mr-1">
                                <Nav.Link href="{{ route('book.index') }}">書籍一覧<span className="sr-only">(current)</span></Nav.Link>
                            </li>
                            <li className="nav-item mr-1">
                                <Nav.Link href="{{ route('category.index') }}">カテゴリ</Nav.Link>
                            </li>
                            <li>
                                <Form inline action="{{ route('book.search') }}" method="POST" className="my-2 my-lg-0">
                                    <FormControl type="text" className="mr-sm-2" placeholder="書籍名、地域を入力" name="search" aria-label="Search" />
                                    <Button variant="outline-success" className="my-2 my-sm-0">探す</Button>
                                </Form>
                            </li>
                        </ul>
                    </Navbar.Collapse>
                </Navbar>

                {/* ログインしたかどうかの判定 */}
                <IsLoginNav />
            </>
        )
    }
}