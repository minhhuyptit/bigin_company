import React, {Component} from "react";
import MicrosoftLogin from "react-microsoft-login";
import {Button} from "semantic-ui-react";

class MicrosoftLoginButton extends Component {
  constructor(props) {
    super(props);

    this.responseMicrosoft = this.responseMicrosoft.bind(this);
  }

  responseMicrosoft(err, data) {
    console.log(data);
  }
  render() {
    return (
      <MicrosoftLogin
        clientId={process.env.REACT_APP_ID_LOGIN_MICROSOFT}
        authCallback={this.responseMicrosoft}
        buttonTheme="light_short"
        withUserData={true}
      />
    );
  }
}

export default MicrosoftLoginButton;
