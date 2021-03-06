import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

// componentsディレクトリにあるコンポーネント
import { Nav } from '../nav/Nav';
import { Home } from './Home';

export function InquirerApp() {
    return (
        <div>

            <BrowserRouter>
                <Route exact path="/" component={Home} />
                <Nav />
            </BrowserRouter>
        </div>
    );
}

if (document.getElementById('app')) {
    ReactDOM.render(<InquirerApp />, document.getElementById('app'));
}
