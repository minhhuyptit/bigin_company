import React from "react";
import {Redirect, Route} from "react-router-dom";
import {isLoggedIn} from "../../helpers/token";

function authen(authenType) {
  return authenType === "isLogin" ? isLoggedIn() : false;
}

export default function ProtectedRoute({component: Component, authed, ...rest}) {
  return (
    <Route
      {...rest}
      render={props =>
        authen(authed) ? (
          <Component {...props} />
        ) : (
          <Redirect to={{pathname: "/login", state: {from: props.location}}} />
        )
      }
    />
  );
}
