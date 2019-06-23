import React from "react";
import { Redirect, Route } from "react-router-dom";
import {store} from "./../../index";

export default function ProtectedRoute ({component: Component, ...rest}) {
    const authed = store.getState().user.isAuthenticated;
    return (
      <Route
        {...rest}
        render={(props) => authed
            ? <Component {...props} />
            : <Redirect to={{pathname: '/login', state: {from: props.location}}} />}
      />
    )
}