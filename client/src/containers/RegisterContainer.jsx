import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter, Link} from "react-router-dom";
import {Container, Row, Col, Alert} from "reactstrap";
import {Form, Button, Card, Segment} from "semantic-ui-react";
import $ from "jquery";

import AuthenticationApi from "./../apis/AuthenticationApis";
import RegisterSuccessModal from "./../components/Register/RegisterSuccessModal";
import * as notify from "./../constants/Notify";
import "./css/login.scss";

class RegisterContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isLoading: false,
      fullname: "",
      email: "",
      birthday: "",
      is_male: true,
      phone: "",
      password: "",
      password_confirmation: "",
      openModal: false
    };

    this.handleBackLogin = this.handleBackLogin.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.notification = this.notification.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.toggle = this.toggle.bind(this);
  }

  toggle() {
    this.setState(({openModal}) => ({openModal: !openModal}));
  }

  handleChange({value}, key) {
    this.setState({
      [key]: value
    });
  }

  componentWillMount() {
    if (this.props.isLogin) {
      this.props.history.push("/dashboard");
    }
  }

  componentDidMount() {
    $("div[role=alert]").hide();
    $("#btn-register").click(function(e) {
      if ($("input[type=checkbox").checked === false) {
        alert("Chọn Term and Conditions");
      }
      let password = $("input[name=password]").val();
      let re_password = $("input[name=password_confirmation]").val();
      if (password !== "" && re_password !== "" && password !== re_password) {
        e.preventDefault();
        $("div[role=alert]").slideDown(500);
      } else {
        $("div[role=alert]").slideUp(500);
      }
    });
  }

  notification(style, title, content, timeout) {
    let options = {style, title, content, timeout};
    this.props.changeNotify(options);
  }

  handleBackLogin() {
    this.props.history.push("/login");
  }

  async handleSubmit(event) {
    event.preventDefault();
    let {fullname, email, birthday, is_male, phone, password, password_confirmation} = this.state;
    if (email !== "" && password !== "" && fullname !== "" && password_confirmation !== "") {
      this.setState({isLoading: true});
      const authenApi = new AuthenticationApi();
      let res = await authenApi.call("register", {
        body: {fullname, email, birthday, is_male: +is_male, phone, password, password_confirmation}
      });

      if (res.status === 404) {
        let xhtml = '<ul style="padding-left: 0;">';
        Object.values(res.message).forEach(function(item) {
          xhtml += "<li>" + item[0] + "</li>";
        });
        xhtml += "</ul>";
        this.notification(notify.DANGER, notify.TITLE_REGISTER_FAIL, xhtml, 2500);
        this.setState({isLoading: false});
      } else {
        this.setState({openModal: true, isLoading: false});
        this.notification(notify.SUCCESS, notify.TITLE_REGISTER_SUCCESS, "Đăng ký thành công", 2500);
      }
    }
  }

  render() {
    let {isLoading, openModal, fullname, birthday, is_male, email, password, phone, password_confirmation} = this.state;
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
                  <RegisterSuccessModal toggle={this.toggle} open={openModal} email={email} />
                  <Link to="/">
                    <img id="logo-register" src="/images/bigin-logo.png" alt="logo" />
                  </Link>
                  <Form onSubmit={this.handleSubmit}>
                    <Form.Input
                      icon="user"
                      required
                      iconPosition="left"
                      placeholder="Full name"
                      value={fullname}
                      onChange={(event, value) => this.handleChange(value, "fullname")}
                    />
                    <Form.Group>
                      <Form.Input
                        icon="calendar"
                        type="date"
                        iconPosition="left"
                        width={10}
                        value={birthday}
                        onChange={(event, value) => this.handleChange(value, "birthday")}
                      />
                      <Button.Group>
                        <Button
                          type="button"
                          size="small"
                          content="Male"
                          onClick={(event, value) => this.handleChange(value, "is_male")}
                          value={true}
                          positive={!!+is_male === true}
                        />
                        <Button.Or />
                        <Button
                          type="button"
                          size="small"
                          content="Female"
                          onClick={(event, value) => this.handleChange(value, "is_male")}
                          value={false}
                          positive={!!+is_male === false}
                        />
                      </Button.Group>
                    </Form.Group>
                    <Form.Group>
                      <Form.Input
                        icon="mail"
                        type="email"
                        iconPosition="left"
                        placeholder="Email"
                        width={9}
                        value={email}
                        required
                        onChange={(event, value) => this.handleChange(value, "email")}
                      />
                      <Form.Input
                        icon="phone"
                        iconPosition="left"
                        placeholder="Phone"
                        pattern="(0[1|3|5|7|8|9])+([0-9]{8})\b"
                        width={7}
                        value={phone}
                        onChange={(event, value) => this.handleChange(value, "phone")}
                      />
                    </Form.Group>
                    <Form.Input
                      icon="lock"
                      type="password"
                      required
                      name="password"
                      iconPosition="left"
                      placeholder="Password"
                      value={password}
                      onChange={(event, value) => this.handleChange(value, "password")}
                    />
                    <Form.Input
                      icon="lock"
                      type="password"
                      required
                      name="password_confirmation"
                      iconPosition="left"
                      placeholder="Confirm Password"
                      value={password_confirmation}
                      onChange={(event, value) => this.handleChange(value, "password_confirmation")}
                    />
                    <Alert color="danger">
                      <li className="content">Password doesn't match.</li>
                    </Alert>
                    <Form.Checkbox label="I agree to the Terms and Conditions" required />
                    <Button
                      circular
                      loading={isLoading}
                      disabled={isLoading}
                      fluid
                      color="green"
                      type="submit"
                      content="Register"
                      id="btn-register"
                    />
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
