import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Input, Segment, Loader} from "semantic-ui-react";

import AuthenticationApi from "./../apis/AuthenticationApis";
import * as notify from "./../constants/Notify";
import "./css/login.scss";

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

  handleFacebook(){
    alert("Comming soon!");
  }

  handleGoogle(){
    alert("Comming soon!");
  }

  handleForgotPassword(){
    alert("Comming soon!");
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
      }
      this.props.changeNotify(option);
      } else {
        let option = {
            style: notify.DANGER,
            title: notify.TITLE_LOGIN_FAIL,
            content: res.message,
            timeout: 1500
        }
        this.props.changeNotify(option);
        this.setState({isLoading: false});
      }
    }
  }

  render() {
    let {isLoading, email, password} = this.state;
    let hrefLink = "#";
    return (
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
                  <img id="logo" src="/images/bigin-logo.png" alt="logo" />
                  <Form>
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
                    <a href={hrefLink} onClick={this.handleForgotPassword} className="forgot-password">
                      Forgot password?
                    </a>
                    <Button fluid color="blue" type="submit" content="Login" onClick={this.handleSubmit} />
                  </Form>
                  <hr className="hr-text" data-content="Or" />
                  <Row>
                    <Col xs="12" sm="6">
                      <Button size="small" id="btn-facebook" color="facebook" icon="facebook" content="Facebook" onClick={this.handleFacebook} />
                    </Col>
                    <Col xs="12" sm="6">
                      <Button size="small" id="btn-google" color="google plus" icon="google plus" content="Google" onClick={this.handleGoogle} />
                    </Col>
                  </Row>
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
  changeNotify: (option) => {
    dispatch.notify.changeNotification(option);
  }
});

export default withRouter(
  connect(
    mapStateToProps,
    mapDispatchToProps
  )(LoginContainer)
);
