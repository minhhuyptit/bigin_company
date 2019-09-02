import React, {Component} from "react";
import FacebookLogin from "react-facebook-login/dist/facebook-login-render-props";
import {Button} from "semantic-ui-react";

class FacebookLoginButton extends Component {
  constructor(props) {
    super(props);

    this.responseFacebook = this.responseFacebook.bind(this);
  }

  responseFacebook(response) {
    console.log(response);
  }
  render() {
    return (
      <FacebookLogin
        appId={process.env.REACT_APP_ID_LOGIN_FACEBOOK}
        autoLoad={false}
        fields="name,email,picture"
        callback={this.responseFacebook}
        render={renderProps => (
          <Button
            size="large"
            id="btn-facebook"
            color="facebook"
            icon="facebook"
            circular
            onClick={renderProps.onClick}
          />
        )}
      />
    );
  }
}

export default FacebookLoginButton;
