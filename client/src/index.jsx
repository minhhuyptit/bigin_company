import React from "react";
import ReactDOM from "react-dom";
import {Provider} from "react-redux";
import {Router, Switch, Route} from "react-router-dom";
import {init} from "@rematch/core";
import createPersistPlugin, {getPersistor} from "@rematch/persist";
import {PersistGate} from "redux-persist/lib/integration/react";

import * as serviceWorker from "./serviceWorker";
import * as models from "./models/rootModel";
import App from "./App";
import history from "./helpers/history";
import LoginContainer from "./containers/LoginContainer";
import ProtectedRoute from "./components/Common/ProtectedRoute";
import Notification from "./components/Common/Notification";
  
import "semantic-ui-css/semantic.min.css";
import "bootstrap/dist/css/bootstrap.min.css";

import "@coreui/icons/css/coreui-icons.min.css";
import "@coreui/coreui/scss/coreui.scss";
require('dotenv').config();

const persistPlugin = createPersistPlugin({
  version: 2
});

export const store = init({
  models,
  plugins: [persistPlugin]
});

ReactDOM.render(
  <Provider store={store}>
    <PersistGate persistor={getPersistor()}>
      <Router history={history}>
        <Notification />
        <Switch>
          <Route exact path="/login" component={LoginContainer} />
          <ProtectedRoute path="*" authed='isLogin' component={App} />
        </Switch>
      </Router>
    </PersistGate>
  </Provider>,
  document.getElementById("root")
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
