import React, {Component} from "react";
import {Button, Image, List} from "semantic-ui-react";

class ListTeamMember extends Component {
  openConfirm(team_member_id) {
    var result = window.confirm("Are you sure you want to delete this ?");
    if (result === true) {
      this.props.handleDelete(team_member_id);
    }
  }

  render() {
    let imagePath = process.env.REACT_APP_THUMB_SIZE_50 + "-";
    const listItem = this.props.data.map((item, index) => {
      return (
        <List.Item key={index}>
          <List.Content verticalAlign="middle" floated="right">
            <Button size="tiny" circular color="red" icon="delete" onClick={() => this.openConfirm(item.team_member_id)} />
          </List.Content>
          <Image size="mini" avatar src={imagePath + item.picture} />
          <List.Content>
            <List.Header className="member-title">
              {item.fullname} <span className="role-member">({item.role_in_team})</span>
            </List.Header>
            <List.Description>Member joined on {item.joinning_day}</List.Description>
          </List.Content>
        </List.Item>
      );
    });

    return (
      <List className="list-team-member" divided verticalAlign="middle" size="big">
        {listItem}
      </List>
    );
  }
}
export default ListTeamMember;
