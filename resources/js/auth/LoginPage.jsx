import React, { useState, useEffect } from "react";
import { Container, Row, Col, Form, Button } from "react-bootstrap";
import { Link } from "react-router-dom";
import history from "../components/history";


const LoginPage = () => {

    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    const Login = async () => {
        await axios.get('/sanctum/csrf-cookie')
            .then((res) => {
                axios.post('/api/login', {
                    email: this.email,
                    password: this.password,
                })
                    .then((res) => {
                        console.log(res.data);
                        if (res.data.result) {
                            console.log("[login]ログイン成功しました。");
                            // ログイン後にユーザー情報をストアに格納する
                            dispatch(slice.actions.setUser(res.data));
                            history.push("/");
                        } else {
                            console.log(res.data.message);
                            console.log("[login]ログイン失敗しました。");
                        }
                    })
                    .catch((err) => {
                        console.log(err.response);
                        console.log("[login]ログインエラー");
                    });
            })
            .catch((err) => {
                console.log("sanctumエラー");
            });
    };

    return (
        <Container
            bg="light"
            className="border border-dark mt-5 shadow-lg"
            style={{ paddingBottom: "15%" }}
        >
            <ul className="float-right" style={{ listStyle: "none" }}>
                <li>
                    <Link to="/" className="text-dark float-right p-3 m-2">
                        <span
                            className="rounded-circle p-3"
                            style={{ fontSize: "3em" }}
                        >
                            x
                        </span>
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
                <Form>
                    <Form.Group className="mt-5">
                        <Col sm={12} md={6} className="float-right">
                            <img
                                src="/img/login.png"
                                alt="login"
                                className="mx-auto d-block"
                                width="60%"
                                height="60%"
                            />
                        </Col>
                        <Col sm={12} md={6}>
                            <Row>
                                <Col md={2}></Col>
                                <Col md={10}>
                                    <Form.Control
                                        type="email"
                                        value={email}
                                        onChange={(e) =>
                                            setEmail(e.target.value)
                                        }
                                        placeholder="メールアドレスを入力"
                                    />
                                    <br />
                                    <Form.Control
                                        type="password"
                                        value={password}
                                        onChange={(e) =>
                                            setPassword(e.target.value)
                                        }
                                        placeholder="パスワード"
                                    />
                                    <br />
                                    <Button
                                        onClick={Login}
                                        className="pt-2 pb-2 bg-dark text-white btn-block"
                                    >
                                        サインイン
                                    </Button>
                                </Col>
                            </Row>
                        </Col>
                    </Form.Group>
                </Form>
            </div>
        </Container>
    );
};

export { LoginPage };



