import React, {Component} from "react";
import {Row, Col} from "reactstrap";
import {Label, Icon} from "semantic-ui-react";

class ProfileHeader extends Component {
  render() {
    let {email, role} = this.props;
    return (
      <React.Fragment>
        <Row>
          <Col xs="12" sm="6">
            <Label color="red" size="large" ribbon>
              <Icon name="mail" />
              {email}
            </Label>
          </Col>
          <Col xs="12" sm="6" style={{textAlign: "right"}}>
            <Label color="olive" tag>
              {role}
            </Label>
          </Col>
        </Row>
      </React.Fragment>
    );
  }
}

export default ProfileHeader;
