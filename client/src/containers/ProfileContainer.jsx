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

    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleSubmit(data) {
    this.props.updateProfile(data);
  }

  render() {
    return (
      <Card id="profile" style={{height: "80%"}}>
        <CardBody>
          <Row className="justify-content-center">
            <Col xs="12">
              <Segment color="orange">
                <ProfileHeader userInfo={this.props.userInfo} />
                <ProfileForm
                  userInfo={this.props.userInfo}
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
