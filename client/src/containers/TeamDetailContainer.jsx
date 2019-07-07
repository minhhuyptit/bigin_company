import React, {Component} from "react";
import {withRouter} from "react-router-dom";
import {connect} from "react-redux";
import {Row, Col, Card, CardBody, CardHeader} from "reactstrap";
import {Button, Dropdown, Label, Segment, Header, Icon} from "semantic-ui-react";

import AddEditTeamForm from "./../components/Team/AddEditTeamForm";
import ListTeamMember from "./../components/Team/ListTeamMember";
import {listTeamMembers, listRoleMembers, listMemberNotInTeam} from "./../helpers/team";
import "./css/management.scss";

class TeamManagementContainer extends Component {
  constructor(props) {
    super(props);
    this.state = {
      team_id: parseInt(this.props.match.params.id),
      newMember: {
        member_id: "",
        member_role_id: ""
      }
    };
    // this.handleDelete = this.handleDelete.bind(this)
    // this.handeUpdate = this.handeUpdate.bind(this)
    // this.handleChange = this.handleChange.bind(this)
    // this.handleAdd = this.handleAdd.bind(this)
  }

  componentWillMount() {
    let {team_id} = this.state;
    this.props.getInfoTeam(team_id);
    this.props.getTeamMembersList(team_id);
    this.props.getAllMember();
    this.props.getMemberRole("team_member_role");
  }

  // handleDelete(member_id) {
  //     let team_id = parseInt(this.props.match.params.id)
  //     let item = {
  //         team_id, member_id
  //     }
  //     this.props.deleteMemberFromTeam(item)
  // }

  // handeUpdate() {
  //     let team_id = parseInt(this.props.match.params.id)
  //     let { name, pic, description } = this.editTeamForm.state.form
  //     let item = {
  //         team_id, name, pic, description
  //     }
  //     this.props.updateInfoTeam(item)
  // }

  // handleAdd() {
  //     let team_id = parseInt(this.props.match.params.id)
  //     let { member_id, member_role_id } = this.state.newMember
  //     let item = {
  //         team_id, member_id, member_role_id
  //     }
  //     this.props.addMemberIntoTeam(item)
  //     this.setState({
  //         newMember: {
  //             member_id: '',
  //             member_role_id: ''
  //         }
  //     })
  // }

  handleChange(value, key) {
    let {newMember} = this.state;
    newMember[key] = value;
    this.setState({newMember});
  }

  render() {
    let {member_id, member_role_id} = this.state.newMember;
    let {infoTeam, teamMembersList, teamMemberRole, allMember} = this.props;
    let arrTeamMembers = listTeamMembers(teamMembersList);
    let arrRoleMembers = listRoleMembers(teamMemberRole);
    let arrMemberNotInTeam = listMemberNotInTeam(allMember, teamMembersList);

    return (
      <Card className="team-detail-container">
        {/* <CardHeader>
          <Label basic size="large" pointing="right" color="orange">
            Team {infoTeam.name}
          </Label>
        </CardHeader> */}
        <CardBody>
          <Row>
            <Col sm={4}>
              <Segment color="orange">
                <Header as="h6" icon textAlign="center">
                  <Icon color="blue" name="users" circular />
                  <label className="lb-title-team">Team {infoTeam.name}</label>
                </Header>
                <AddEditTeamForm
                  listMember={arrTeamMembers}
                  infoTeam={infoTeam}
                  ref={instance => {
                    this.editTeamForm = instance;
                  }}
                />
              </Segment>
              <Button color="teal" className="update-team" onClick={this.handeUpdate}>
                Update
              </Button>
            </Col>
            <Col sm={{size: 7, offset: 1}} style={{height: "320px"}}>
              <Row>
                <label className="lb-add-member">Add member</label>
              </Row>
              <Row>
                <Col sm={5}>
                  <Dropdown
                    placeholder="Select Member"
                    fluid
                    selection
                    search
                    onChange={(e, {value}) => {
                      this.handleChange(value, "member_id");
                    }}
                    value={member_id}
                    options={arrMemberNotInTeam}
                  />
                </Col>
                <Col sm={4}>
                  <Dropdown
                    placeholder="Role Member"
                    fluid
                    selection
                    search
                    onChange={(e, {value}) => {
                      this.handleChange(value, "member_role_id");
                    }}
                    value={member_role_id}
                    options={arrRoleMembers}
                  />
                </Col>
                <Col sm={3}>
                  <Button icon="add" content="Add" color="teal" className="add-member" onClick={this.handleAdd} />
                </Col>
              </Row>
              <ListTeamMember handleDelete={this.handleDelete} data={this.props.teamMembersList} />
            </Col>
          </Row>
        </CardBody>
      </Card>
    );
  }
}

const mapStateToProps = state => {
  return {
    infoTeam: state.team.infoTeam,
    teamMembersList: state.team.teamMembersList,
    teamMemberRole: state.config.team_member_role,
    allMember: state.member.memberList
  };
};

const mapDispatchToProps = dispatch => ({
  getTeamMembersList: team_id => {
    dispatch.team.asynGetTeamMembersList(team_id);
  },
  getInfoTeam: team_id => {
    dispatch.team.asynGetInfoTeam(team_id);
  },
  getAllMember: () => {
    dispatch.member.asyncGetAllMember();
  },
  getMemberRole: type => {
    dispatch.config.asyncGetConfigByType(type);
  }
});

export default withRouter(
  connect(
    mapStateToProps,
    mapDispatchToProps
  )(TeamManagementContainer)
);
