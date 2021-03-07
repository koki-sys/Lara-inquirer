import { Component } from 'react';
import axios from 'axios';
import { Card, Container, Button, Row, Col, Form } from 'react-bootstrap';

export class Home extends Component {

    render() {

    const BookData = async () => {
        const result = await axios.get('http://localhost:8000/api');
        console.log(result.data.[0]);
        return result;
    }

    BookData();

        return (
            <>
            <Container>
                <h4>書籍一覧</h4>
                <Row>
                    {/*foreach($books as $book)*/}
                    <Col md="6" lg="4" className="mt-5">
                        <Card style={{ width: '18rem' }}>
                            <Card.Img variant="top" src="{{ asset('storage/img/book_img/'.$book->img) }}" />
                            <Card.Body>
                                <Card.Title>{/*{ $book-> name}*/}</Card.Title>
                                <Row>
                                    <Form action="{{ route('bookcart.store') }}" method="post">
                                        <input type="hidden" name="cartid" value="{{ $book->id }}" />
                                        <Button type="submit" variant="info" className="mr-3 ml-3" value="ブックカートへ" />
                                    </Form>
                                    <Button variant="link">書籍詳細</Button>
                                </Row>
                            </Card.Body>
                        </Card>
                    </Col>
                    {/*endforeach*/}
                </Row>
            </Container>
            </>
        )
    }
}
