import React, {Component} from "react";
import {Container, Row, Col, Alert} from "reactstrap";
import {Link} from "react-router-dom";
import {Form, Button, Card, Icon, Segment, Input, Label, Message} from "semantic-ui-react";
import $ from "jquery";

class ResetPassword extends Component {
  constructor(props) {
    super(props);

    this.state = {
      password: "",
      re_password: ""
    };

    this.handleNext = this.handleNext.bind(this);
    this.handleBack = this.handleBack.bind(this);
    this.handleChange = this.handleChange.bind(this);
  }

  componentDidMount() {
    $("div[role=alert]").hide();
    $("input[type=password]").keypress(function(e) {
      let code = e.keyCode || e.which;
      if (code === 13) {
        e.preventDefault();
        $("button.btn-next").click();
      }
    });
    $("button.btn-next").click(function(e) {
      let password = $("input[name=password]").val();
      let re_password = $("input[name=re_password]").val();
      if ( password !== "" && re_password !== "" && password !== re_password) {
        e.preventDefault();
        $("div[role=alert]").slideDown(500);
      }else{
        $("div[role=alert]").slideUp(500);
      }
    });
  }

  handleBack() {
    this.props.handleStep(2);
  }

  handleNext() {
    let {password, re_password} = this.state;
    if (password && re_password) {
      this.props.handleStep(4);
    }
  }

  handleChange(event) {
    const target = event.target;
    const name = target.name;
    const value = target.value;
    this.setState({
      [name]: value
    });
  }

  render() {
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
                  <Link to="/">
                    <img id="logo" src="/images/bigin-logo.png" alt="logo" />
                  </Link>
                  <Form style={{marginTop: "10%"}}>
                    <Label color="orange" size="large" ribbon>
                      <Icon name="lock" />
                      Choose a new password
                    </Label>
                    <Row>
                      <Col>
                        <span className="title-forgot-password">
                          Create a new password that is at least 6 characters long. A strong password has a combination
                          of letters, digits and punctuation marks.
                        </span>
                        <Form.Field
                          label="New password"
                          control={Input}
                          type="password"
                          name="password"
                          placeholder="New password"
                          required
                          value={this.state.password}
                          onChange={this.handleChange}
                          tabIndex={1}
                        />
                        <Form.Field
                          label="Confirm Password"
                          control={Input}
                          type="password"
                          name="re_password"
                          placeholder="Confirm Password"
                          required
                          value={this.state.re_password}
                          onChange={this.handleChange}
                          tabIndex={2}
                        />
                        <Alert color="danger"><li className="content">Password doesn't match.</li></Alert>
                        <Row>
                          <Col sm="6">
                            <Button
                              fluid
                              color="blue"
                              size="medium"
                              icon="left arrow"
                              labelPosition="left"
                              content="Back"
                              onClick={this.handleBack}
                              tabIndex={4}
                            />
                          </Col>
                          <Col sm="6">
                            <Button
                              fluid
                              color="blue"
                              size="medium"
                              icon="right arrow"
                              labelPosition="right"
                              content="Next"
                              className="btn-next"
                              onClick={this.handleNext}
                              tabIndex={3}
                            />
                          </Col>
                        </Row>
                      </Col>
                    </Row>
                  </Form>
                </Card.Content>
              </Card>
            </Segment>
          </Col>
        </Row>
      </Container>
    );
  }
}

export default ResetPassword;
