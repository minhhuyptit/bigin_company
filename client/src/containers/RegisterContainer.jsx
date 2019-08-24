import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter, Link} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Segment, Loader} from "semantic-ui-react";

import AuthenticationApi from "./../apis/AuthenticationApis";
import * as notify from "./../constants/Notify";
import "./css/login.scss";

class RegisterContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isLoading: false,
      email: "",
      password: ""
    };

    this.handleBackLogin = this.handleBackLogin.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleFacebook = this.handleFacebook.bind(this);
    this.handleGoogle = this.handleGoogle.bind(this);
    this.handleForgotPassword = this.handleForgotPassword.bind(this);
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

  handleFacebook() {
    alert("Comming soon!");
  }

  handleGoogle() {
    alert("Comming soon!");
  }

  handleForgotPassword() {
    alert("Comming soon!");
  }

  handleBackLogin() {
    this.props.history.push("/login");
  }

  async handleSubmit(event) {
    let {email, password} = this.state;
    if (email !== "" && password !== "") {
      this.setState({isLoading: true});
      const authenApi = new AuthenticationApi();
      let res = await authenApi.call("login", {
        body: {email, password}
      });

      console.log(res);

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
      <Container>
        <video autoPlay muted loop id="video_background">
          <source src="/video/background-login.mp4" type="video/mp4" />
        </video>
        <Row className="justify-content-center">
          <Col lg="5" md="10" sm="8" xs="10" className="form-login">
            <Segment color="orange">
              <Card fluid>
                <Card.Content>
                  <Loader size="massive" active={isLoading} />
                  <Link to="/">
                    <img id="logo" src="/images/bigin-logo.png" alt="logo" />
                  </Link>
                  <Form>
                    <Form.Input icon="user" required iconPosition="left" placeholder="Full name" />
                    <Form.Group>
                      <Form.Input
                        icon="calendar"
                        type="date"
                        iconPosition="left"
                        placeholder="Day of birth"
                        width={10}
                      />
                      <Button.Group>
                        <Button size="small" content="Male" />
                        <Button.Or />
                        <Button size="small" content="Female" />
                      </Button.Group>
                    </Form.Group>
                    <Form.Group>
                      <Form.Input icon="mail" type="email" iconPosition="left" placeholder="Email" width={9} />
                      <Form.Input icon="phone" iconPosition="left" placeholder="Phone" width={7} />
                    </Form.Group>
                    <Form.Input icon="lock" type="password" required iconPosition="left" placeholder="Password" />
                    <Form.Input
                      icon="lock"
                      type="password"
                      required
                      iconPosition="left"
                      placeholder="Confirm Password"
                    />
                    <Form.Checkbox label="I agree to the Terms and Conditions" />
                    <Button circular fluid color="green" type="submit" content="Register" onClick={this.handleSubmit} />
                  </Form>
                  <hr className="hr-text" data-content="Return to login" />
                  <Button
                    onClick={this.handleBackLogin}
                    circular
                    color="blue"
                    fluid
                    icon
                    labelPosition="left"
                    icon="left arrow"
                    content="Sign in"
                  />
                </Card.Content>
              </Card>
            </Segment>
          </Col>
        </Row>
      </Container>
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
  )(RegisterContainer)
);
