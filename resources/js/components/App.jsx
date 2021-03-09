import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

// アプリケーションのコンポーネント
import { BasicNav } from '../nav/BasicNav';
import { LoginPage } from '../auth/LoginPage';
import { RegisterPage } from '../auth/RegisterPage';
import { Home } from './Home';


export function InquirerApp() {
    return (
        <div>
            <BrowserRouter>
                <BasicNav />
                <Route exact path="/" component={Home} />
                <Route path="/login" component={LoginPage} />
                <Route path="/register" component={RegisterPage} />
            </BrowserRouter>
        </div>
    );
}

if (document.getElementById('app')) {
    ReactDOM.render(<InquirerApp />, document.getElementById('app'));
}
