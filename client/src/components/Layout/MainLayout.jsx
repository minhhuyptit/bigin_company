import React, {Component} from "react";
import {Container} from "reactstrap";
import {AppHeader, AppBreadcrumb} from "@coreui/react";
import {Redirect, Route, Switch} from "react-router-dom";

import routes from "./MainLayoutRoute";
import Sidebar from "./../Sidebar/Sidebar";
import Header from "./Header";
import "./layout.scss";

class MainLayout extends Component {
  render() {
    return (
      <div className="app">
        <AppHeader fixed>
          <Header />
        </AppHeader>
        <div className="app-body">
          <Sidebar context={this.props} />
          <main className="main">
            <AppBreadcrumb appRoutes={routes} />
            <Container fluid>
              <Switch>
                {showRoute(routes)}
                <Redirect from="/" to="/dashboard" />
              </Switch>
            </Container>
          </main>
        </div>
      </div>
    );
  }
}

function showRoute(routes) {
  return routes.map((route, idx) => {
    return route.component ? (
      <Route
        key={idx}
        path={route.path}
        exact={route.exact}
        name={route.name}
        render={props => <route.component {...props} />}
      />
    ) : null;
  });
}

export default MainLayout;
