import React, {Component} from "react";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Input, Segment, Loader} from "semantic-ui-react";

import "./login.scss";

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
  }

  handleChange(event) {
    const target = event.target;
    const name = target.name;
    const value = target.value;
    this.setState({
      [name]: value
    });
  }

  handleSubmit(event) {
    let {email, password} = this.state;
    if (email !== "" && password !== "") {
      this.setState({isLoading: true});
      console.log("Email: ", email);
      console.log("Password: ", password);
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
                <Segment color="red">
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
                        <a href={hrefLink} className="forgot-password">
                          Forgot password?
                        </a>
                        <Button fluid color="blue" type="submit" content="Login" onClick={this.handleSubmit} />
                      </Form>
                      <hr className="hr-text" data-content="Or" />
                      <Row>
                        <Col xs="12" sm="6" >
                          <Button size="small" id="btn-facebook" color="facebook" icon="facebook" content="Facebook" />
                        </Col>
                        <Col xs="12" sm="6">
                          <Button
                            size="small"
                            id="btn-google"
                            color="google plus"
                            icon="google plus"
                            content="Google"
                          />
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

export default LoginContainer;
