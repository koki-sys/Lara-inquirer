import { useState } from 'react';
import { Container, Row, Col, Form, Button } from 'react-bootstrap';
import { Link } from 'react-router-dom';

const LoginPage = () => {

    const [user, setUser] = useState([]);

    const Login = async () => {
        await axios.get('/sanctum/csrf-cookie')
            .then((res) => {
                axios.post('/api/login', {
                    email: this.email,
                    password: this.password,
                })
                    .then((res) => {
                        console.log(res.data)
                        if (res.data.result) {
                            this.isLogin = true
                            this.getUserMessage = ''
                        } else {
                            this.loginMessage = res.data.message
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            })
            .catch((err) => {
                //
            })



        return (
            <Container bg="light" className="border border-dark mt-5 shadow-lg" style={{ paddingBottom: "15%" }}>
                <ul className="float-right" style={{ listStyle: "none" }}>
                    <li>
                        <Link to="/" className="text-dark float-right p-3 m-2">
                            <span className="rounded-circle p-3" style={{ fontSize: "3em" }}>x</span>
                        </Link>
                        <br />
                    </li>
                </ul>

                <div style={{ marginTop: "8%" }}>
                    <Row>
                        <Col md={1}></Col>
                        <Col md={6}>
                            <h3>サインイン</h3>
                            <label className="mt-2">新規ユーザの方</label>
                            <Link to="register">アカウントの作成</Link>
                        </Col>
                        <Col md={5}></Col>
                    </Row>
                    <Form action="../home/index.php" method="post">
                        <Form.Group className="mt-5">
                            <Col sm={12} md={6} className="float-right">
                                <img src="/img/login.png" alt="login" className="mx-auto d-block" width="60%" height="60%" />
                            </Col>
                            <Col sm={12} md={6}>
                                <Row>
                                    <Col md={2}></Col>
                                    <Col md={10}>
                                        <Form.Control type="text" name="name" placeholder="ユーザ名を入力" /><br />
                                        <Form.Control type="password" name="password" placeholder="パスワード" /><br />
                                        <Button className="pt-2 pb-2 bg-dark text-white btn-block" onClick={Login}>サインイン</Button>
                                    </Col>
                                </Row>
                            </Col>
                        </Form.Group>
                    </Form>
                </div>
            </Container>
        )
    }

    export { LoginPage };