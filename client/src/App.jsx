import React, {Component} from "react";

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
