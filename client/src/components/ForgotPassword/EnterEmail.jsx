import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter, Link} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Icon, Segment, Input, Transition, Label} from "semantic-ui-react";

class EnterEmail extends Component {
  constructor(props) {
    super(props);

    this.handleNext = this.handleNext.bind(this);
    this.handleBack = this.handleBack.bind(this);
  }

  handleNext() {
    this.props.handleStep(2);
  }

  handleBack() {
    this.props.history.push("/login");
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
                      <Icon name="sync" />
                      Reset your password
                    </Label>
                    <Row>
                      <Col>
                        <span className="title-forgot-password">Enter your email address and we will send you a code to reset your password.</span>
                        <Form.Field
                          label="Email"
                          name="email"
                          control={Input}
                          type="mail"
                          placeholder="Enter your email address"
                          required
                        />
                        <Row>
                          <Col sm="6">
                            <Button fluid size="medium" content="Cancel" onClick={this.handleBack} />
                          </Col>
                          <Col sm="6">
                            <Button
                              fluid
                              color="blue"
                              size="medium"
                              icon="right arrow"
                              labelPosition="right"
                              content="Next"
                              onClick={this.handleNext}
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

export default withRouter(
  connect(
    null,
    null
  )(EnterEmail)
);
