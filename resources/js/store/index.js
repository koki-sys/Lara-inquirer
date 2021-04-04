import { combineReducers } from "redux";
import { configureStore } from "@reduxjs/toolkit";

import authReducer from "../auth/LoginPage";

const reducer = combineReducers({
    auth: authReducer,
});

// デバッグ：変数reducerの中身を表示
export function debugReducer() {
    console.log(reducer);
}

const store = configureStore({ reducer });

export default store;
