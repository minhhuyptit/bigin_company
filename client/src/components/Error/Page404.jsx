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
              <h1>404</h1>
            </div>
            <h2>Page Not Found</h2>
            <p>
              The page you are looking for might have been removed had its name
              changed or is temporarily unavailable.
            </p>
            <Link to="/dashboard">
              Go To Homepage
            </Link>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

export default Page404;
