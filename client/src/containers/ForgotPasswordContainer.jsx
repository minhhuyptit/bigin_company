import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Icon, Segment, Input} from "semantic-ui-react";

import EnterEmail from "../components/ForgotPassword/EnterEmail";
import VerifyEmail from "../components/ForgotPassword/VerifyEmail";
import ResetPassword from "../components/ForgotPassword/ResetPassword";
import ResetSuccess from "../components/ForgotPassword/ResetSuccess";

class ForgotPasswordContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      step: 1
    };

    this.handleStep = this.handleStep.bind(this);
  }

  componentWillMount() {
    if (this.props.isLogin) {
      this.props.history.push("/dashboard");
    }
  }

  handleStep(step){
    this.setState({
      step
    });
  }
  render() { 
    const {step} = this.state;
    switch (step) {
      case 1:
        return <EnterEmail handleStep={this.handleStep} />;
      case 2:
        return <VerifyEmail handleStep={this.handleStep} />;
      case 3:
        return <ResetPassword handleStep={this.handleStep} />;
      case 4:
        return <ResetSuccess handleStep={this.handleStep} />;
    }
  }
}

const mapStateToProps = state => {
  return {
    isLogin: state.user.isAuthenticated
  };
};

const mapDispatchToProps = dispatch => ({
  login: item => {
    dispatch.user.login(item);
  },
  changeNotify: option => {
    dispatch.notify.changeNotification(option);
  }
});

export default withRouter(
  connect(
    mapStateToProps,
    mapDispatchToProps
  )(ForgotPasswordContainer)
);
