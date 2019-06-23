import React, { Component } from "react";
import { Link } from "react-router-dom";

import "./error.scss";

class Page404 extends Component {
  render() {
    return (
      <React.Fragment>
        <div id="notfound">
          <div className="notfound">
            <div className="notfound-404">
              <h1>500</h1>
            </div>
            <h2>Server Error</h2>
            <p>
              Sorry, something went wrong on our end. We are currently trying to
              fix the problem.
            </p>
            <Link to="/dashboard">Go To Homepage</Link>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

export default Page404;
