import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

// componentsディレクトリにあるコンポーネント
import { BasicNav } from '../nav/BasicNav';
import { Home } from './Home';

export function InquirerApp() {
    return (
        <div>
            <BrowserRouter>
                <BasicNav />
                <Route exact path="/" component={Home} />
            </BrowserRouter>
        </div>
    );
}

if (document.getElementById('app')) {
    ReactDOM.render(<InquirerApp />, document.getElementById('app'));
}
