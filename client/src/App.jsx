import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";
import Page404 from "./components/Error/Page404";
import Page500 from "./components/Error/Page500";
import MainLayout from "./components/Layout/MainLayout";
class App extends Component {
  render() {
    return (
      <Switch>
        <Route path="/404" component={Page404} />
        <Route path="/500" component={Page500} />
        <Route path="*" component={MainLayout} />
      </Switch>
    );
  }
}

export default App;
