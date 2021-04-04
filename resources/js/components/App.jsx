import React from "react";
import ReactDOM from "react-dom";
import { Route, Router } from "react-router-dom";

// アプリケーションのコンポーネント
import { BasicNav } from "../nav/BasicNav";
import { LoginPage } from "../auth/LoginPage";
import { RegisterPage } from "../auth/RegisterPage";
import { Home } from "./Home";
import history from "./history";

// デバッグ用関数のインポート
import { login } from "../store/auth";
import { debugReducer } from '../store/index';

export function InquirerApp() {
    // デバッグ
    login();
    debugReducer();

    return (
        <div>
            <Router history={history}>
                <BasicNav />
                <Route exact path="/" component={Home} />
                <Route path="/login" component={LoginPage} />
                <Route path="/register" component={RegisterPage} />
            </Router>
        </div>
    );
}

if (document.getElementById("app")) {
    ReactDOM.render(<InquirerApp />, document.getElementById("app"));
}
