import React, {Component} from "react";
import {connect} from "react-redux";
import {Row, Col, Card, CardBody} from "reactstrap";
import {Segment} from "semantic-ui-react";

import ProfileHeader from "./../components/Profile/ProfileHeader";
import ProfileForm from "./../components/Profile/ProfileForm";
import "./css/profile.scss";
class ProfileContainer extends Component {
  constructor(props) {
    super(props);

    // this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleSubmit(data) {
    this.props.updateProfile(data);
  }

  render() {
    let {email, role} = this.props.userInfo;
    return (
      <Card id="profile" style={{height: "80%"}}>
        <CardBody>
          <Row className="justify-content-center">
            <Col xs="12">
              <Segment color="teal">
                <ProfileHeader email={email} role={role} />
                <ProfileForm
                  userInfo={this.props.userInfo}
                  handleChange={this.handleChange}
                  handleSubmit={this.handleSubmit}
                />
              </Segment>
            </Col>
          </Row>
        </CardBody>
      </Card>
    );
  }
}

const mapStateToProps = state => {
  return {
    userInfo: state.user.user
  };
};

const mapDispatchToProps = dispatch => ({
  updateProfile: user => {
    dispatch.user.asyncUpdateProfile(user);
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(ProfileContainer);
