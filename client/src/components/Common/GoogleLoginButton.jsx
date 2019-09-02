import React, {Component} from "react";
import {GoogleLogin} from "react-google-login";
import {Button} from "semantic-ui-react";

class GoogleLoginButton extends Component {
  constructor(props) {
    super(props);

    this.responseGoogle = this.responseGoogle.bind(this);
  }

  responseGoogle(response) {
    console.log(response);
  }

  render() {
    return (
      <GoogleLogin
        clientId={process.env.REACT_APP_ID_LOGIN_GOOGLE}
        onSuccess={this.responseGoogle}
        onFailure={this.responseGoogle}
        cookiePolicy={"single_host_origin"}
        render={renderProps => (
          <Button
            size="large"
            id="btn-google"
            color="google plus"
            icon="google plus"
            circular
            onClick={renderProps.onClick}
          />
        )}
      />
    );
  }
}

export default GoogleLoginButton;
