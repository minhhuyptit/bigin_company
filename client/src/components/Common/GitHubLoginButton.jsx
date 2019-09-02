import React, {Component} from "react";
import GitHubLogin from "react-github-login";
import {Button} from "semantic-ui-react";

class GitHubLoginButton extends Component {
  constructor(props) {
    super(props);

    this.onSuccess = this.onSuccess.bind(this);
    this.onFailure = this.onFailure.bind(this);
  }

  onSuccess(response) {
    console.log(response);
  }

  onFailure(response) {
    console.log(response);
  }

  render() {
    return (
      <GitHubLogin
        clientId={process.env.REACT_APP_ID_LOGIN_GITHUB}
        onSuccess={this.onSuccess}
        onFailure={this.onFailure}
      />
    );
  }
}

export default GitHubLoginButton;
