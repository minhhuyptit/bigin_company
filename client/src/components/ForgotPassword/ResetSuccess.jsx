import React, {Component} from "react";
import {connect} from "react-redux";
import {withRouter, Link} from "react-router-dom";
import {Container, Row, Col} from "reactstrap";
import {Form, Button, Card, Segment, Icon} from "semantic-ui-react";
import $ from "jquery";

class ResetSuccess extends Component {
  constructor(props) {
    super(props);

    this.handleNext = this.handleNext.bind(this);
    this.handleBack = this.handleBack.bind(this);
  }

  handleNext() {
    console.log("Login nào");
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
                  <Form style={{marginTop: "5%"}}>
                    <Row style={{textAlign: "center"}}>
                      <Col>
                        <Icon size="huge" color="green" name="check circle" />
                      </Col>
                    </Row>
                    <Row className="justify-content-center">
                      <span className="title-forgot-password">Reset password successful</span> <br></br>
                      <span className="title-forgot-password">You can login directly or return to login.</span>
                    </Row>
                    <Row style={{marginTop:"5%"}}>
                      <Col xs="12">
                        <Button
                          fluid
                          color="blue"
                          size="medium"
                          icon="right arrow"
                          labelPosition="right"
                          content="Continue"
                          onClick={this.handleNext}
                        />
                      </Col>
                       <Col xs="12" style={{marginTop:"5%"}}>
                        <Button
                          fluid
                          size="medium"
                          content="Cancel"
                          onClick={this.handleBack}
                        />
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
  )(ResetSuccess)
);
