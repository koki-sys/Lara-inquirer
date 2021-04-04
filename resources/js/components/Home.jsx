import { useState, useEffect } from 'react';
import axios from 'axios';
import { Card, Container, Button, Row, Col, Form } from 'react-bootstrap';

const Home = () => {
    const [books, setBooks] = useState([]);

    useEffect(() => {
        async function BookData() {
            await axios
                .get('/api')
                .then(res => {
                    console.log("書籍データ取得成功");

                    // cookie取得
                    console.log(document.cookie);
                    
                    setBooks(res.data);
                })
                .catch(() => {
                    console.log("apiからのデータ取得に失敗しました。");
                });
        }
        BookData()
    }, [])


    return (
        <>
            <Container>
                <h4>書籍一覧</h4>
                <Row>
                    {books.map((book) => (
                        <Col md="6" lg="4" className="mt-5" key={book.id}>
                            <Card style={{ width: '18rem' }}>
                                <Card.Img variant="top" src={"/img/book_img/" + book.img} />
                                <Card.Body>
                                    <Card.Title>{book.name}</Card.Title>
                                    <Row>
                                        <Form action="{{ route('bookcart.store') }}" method="post">
                                            <input type="hidden" name="cartid" value={book.id} />
                                            <Button type="submit" variant="info" className="mr-3 ml-3">ブックカートへ</Button>
                                        </Form>
                                        <Button variant="link">書籍詳細</Button>
                                    </Row>
                                </Card.Body>
                            </Card>
                        </Col>
                    ))}
                </Row>
            </Container>
        </>
    )
}

export { Home };
