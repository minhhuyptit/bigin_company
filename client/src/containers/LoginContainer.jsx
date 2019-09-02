import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter, Link} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Input, Segment, Loader, Transition} from "semantic-ui-react";
import $ from "jquery";

import AuthenticationApi from "./../apis/AuthenticationApis";
import * as notify from "./../constants/Notify";
import "./css/login.scss";
import FacebookLoginButton from "../components/Common/FacebookLoginButton";
import GoogleLoginButton from "../components/Common/GoogleLoginButton";
import MicrosoftLoginButton from "../components/Common/MicrosoftLoginButton";
import GitHubLoginButton from "../components/Common/GitHubLoginButton";
import {ReactCSSTransitionGroup} from "react-addons-css-transition-group";

class LoginContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isLoading: false,
      email: "",
      password: ""
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleRegister = this.handleRegister.bind(this);
  }

  handleChange(event) {
    const target = event.target;
    const name = target.name;
    const value = target.value;
    this.setState({
      [name]: value
    });
  }

  componentWillMount() {
    if (this.props.isLogin) {
      this.props.history.push("/dashboard");
    }
  }

  componentDidMount() {
    $("#btn-github-origin, #btn-microsoft-origin").hide();
    $("#btn-microsoft").click(function() {
      $("#btn-microsoft-origin");
    });
    $("#btn-github").click(function() {
      $("#btn-github-origin button").click();
    });
  }

  handleRegister() {
    this.props.history.push("/register");
  }

  async handleSubmit(event) {
    event.preventDefault();
    let {email, password} = this.state;
    if (email !== "" && password !== "") {
      this.setState({isLoading: true});
      const authenApi = new AuthenticationApi();
      let res = await authenApi.call("login", {
        body: {email, password}
      });
      if (res.status === 200) {
        this.props.login(res.data); //Save data to Redux LocalStorage
        this.props.history.push("/dashboard");
        let option = {
          style: notify.SUCCESS,
          title: notify.TITLE_LOGIN_SUCCESS,
          content: res.message,
          timeout: 50
        };
        this.props.changeNotify(option);
      } else {
        let option = {
          style: notify.DANGER,
          title: notify.TITLE_LOGIN_FAIL,
          content: res.message,
          timeout: 1500
        };
        this.props.changeNotify(option);
        this.setState({isLoading: false});
      }
    }
  }

  render() {
    let {isLoading, email, password} = this.state;
    return (
      <Transition visible={true} animation="scale" duration={4000}>
        <Container>
          <video autoPlay muted loop id="video_background">
            <source src="/video/background-login.mp4" type="video/mp4" />
          </video>
          <Row className="justify-content-center">
            <Col lg="4" md="6" sm="8" xs="10" className="form-login">
              <Segment color="orange">
                <Card fluid>
                  <Card.Content>
                    <Loader size="massive" active={isLoading} />
                    <Link to="">
                      <img id="logo" src="/images/bigin-logo.png" alt="logo" />
                    </Link>
                    <Form onSubmit={this.handleSubmit}>
                      <Form.Field
                        label="Email"
                        name="email"
                        control={Input}
                        type="mail"
                        placeholder="Your email"
                        required
                        value={email}
                        onChange={this.handleChange}
                      />
                      <Form.Field
                        label="Password"
                        name="password"
                        control={Input}
                        type="password"
                        placeholder="Your password"
                        required
                        value={password}
                        onChange={this.handleChange}
                      />
                      <Link className="forgot-password" to="/password/reset">
                        Forgot password?
                      </Link>
                      <Button circular disabled={isLoading} fluid color="blue" content="Login" />
                    </Form>
                    <hr className="hr-text" data-content="Or" />
                    <Row>
                      <Col xs="12" sm="3">
                        <FacebookLoginButton />
                      </Col>
                      <Col xs="12" sm="3">
                        <GoogleLoginButton />
                      </Col>
                      <Col xs="12" sm="3">
                        <Button size="large" id="btn-microsoft" circular icon="microsoft" />
                        <span id="btn-microsoft-origin">
                          <MicrosoftLoginButton id="btn-microsoft-origin" />
                        </span>
                      </Col>
                      <Col xs="12" sm="3">
                        <Button size="large" id="btn-github" circular icon="github" />
                        <span id="btn-github-origin">
                          <GitHubLoginButton />
                        </span>
                      </Col>
                    </Row>
                    <hr className="hr-text" data-content="Don't have an account?" />
                    <Button
                      onClick={this.handleRegister}
                      circular
                      color="green"
                      fluid
                      labelPosition="right"
                      icon="right arrow"
                      content="Sign up"
                    />
                  </Card.Content>
                </Card>
              </Segment>
            </Col>
          </Row>
        </Container>
      </Transition>
    );
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
  )(LoginContainer)
);
