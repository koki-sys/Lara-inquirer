// React、それに関連するコンポーネント
import { Component } from 'react';
import { Link } from 'react-router-dom';
import { Navbar, Nav, Form, FormControl, Button } from 'react-bootstrap';

// アプリケーションのコンポーネント
import { IsLoginNav } from './IsLoginNav';


export class BasicNav extends Component {
    render() {

        return (
            <>
                <Navbar bg="light" expand="lg" className="mt-3 mr-5 ml-5 navigation">
                    <Link to="/">
                        <img src="img/InQuirer.svg" alt="InQuirer" />
                    </Link>
                    <Navbar.Collapse id="navbarSupportedContent">
                        <ul className="navbar-nav mr-auto"></ul>
                        <ul className="navbar-nav">
                            <li className="nav-item mr-3 mt-2">
                                <Link to="/" className="text-secondary">書籍一覧</Link>
                            </li>
                            <li className="nav-item mr-3 mt-2">
                                <Link to="#" className="text-secondary">カテゴリ</Link>
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