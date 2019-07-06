import React, {Component} from "react";
import {Row, Col} from "reactstrap";
import {Label, Icon} from "semantic-ui-react";

class ProfileHeader extends Component {
  render() {
    const styleTeam = [
      {size: "small", color: "purple"},
      {size: "medium", color: "brown"},
      {size: "large", color: "orange"},
      {size: "large", color: "blue"},
      {size: "large", color: "red"}
    ];

    let {email, role, teams} = this.props.userInfo;
    const listTeam = teams.map((item, index) => {
      let {size, color} = styleTeam[index];
      return (
        <Label key={item.id} size={size} color={color}>
          {item.name}
        </Label>
      );
    });
    return (
      <React.Fragment>
        <Row>
          <Col xs="12" sm="6">
            <Label color="red" size="large" ribbon>
              <Icon name="user" />
              {email}
            </Label>
            <Label color="olive" tag>
              {role}
            </Label>
          </Col>
          <Col xs="12" sm="6" style={{textAlign: "right"}}>
            {listTeam}
          </Col>
        </Row>
      </React.Fragment>
    );
  }
}

export default ProfileHeader;
