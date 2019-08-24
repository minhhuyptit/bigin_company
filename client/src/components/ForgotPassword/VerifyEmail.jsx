import React, {Component} from "react";
import {Container, Row, Col} from "reactstrap";
import {Link} from "react-router-dom";
import {Form, Button, Card, Icon, Segment, Input, Label} from "semantic-ui-react";

class VerifyEmail extends Component {
  constructor(props) {
    super(props);

    this.handleNext = this.handleNext.bind(this);
    this.handleBack = this.handleBack.bind(this);
  }

  handleBack() {
    this.props.handleStep(1);
  }

  handleNext() {
    this.props.handleStep(3);
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
                      <Icon name="check" />
                      Enter Security Code
                    </Label>
                    <Row>
                      <Col>
                        <span className="title-forgot-password">Please check your email for a message with your code. Your code is 6 digits long.</span>
                        <Form.Field
                          label="Verify Code"
                          name="email"
                          control={Input}
                          type="mail"
                          placeholder="Enter code"
                          required
                        />
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

export default VerifyEmail;
