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

    this.state = {
      userInfo: this.props.userInfo
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleChange({value}, key) {
    let { userInfo } = this.state
    userInfo[key] = value;
    this.setState({ key: value });
  }

  handleSubmit(picture) {
    let data = {...this.state.userInfo, picture}
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
                  userInfo={this.state.userInfo}
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
