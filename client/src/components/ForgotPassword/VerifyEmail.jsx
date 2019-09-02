import React, {Component} from "react";
import {Container, Row, Col} from "reactstrap";
import {Link} from "react-router-dom";
import {Form, Button, Card, Icon, Segment, Input, Label} from "semantic-ui-react";
import $ from "jquery";

class VerifyEmail extends Component {
  constructor(props) {
    super(props);

    this.state = {
      code: ""
    }

    this.handleNext = this.handleNext.bind(this);
    this.handleBack = this.handleBack.bind(this);
    this.handleChange = this.handleChange.bind(this);
  }

  componentDidMount(){
    $('input[type=mail]').first().keypress(function (e){
      var code = e.keyCode || e.which;
      if (code === 13){
        e.preventDefault();
        $('button.btn-next').click();
      }
    });
  }

  handleBack() {
    this.props.handleStep(1);
  }

  handleNext() {
    if(this.state.code){
      this.props.handleStep(3);
    }
  }

  handleChange(event) {
    this.setState({
      code: event.target.value
    })
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
                          control={Input}
                          type="mail"
                          placeholder="Enter code"
                          required
                          value={this.state.code}
                          onChange={this.handleChange}
                          tabIndex={1}
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
                              tabIndex={3}
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
                              tabIndex={2}
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
