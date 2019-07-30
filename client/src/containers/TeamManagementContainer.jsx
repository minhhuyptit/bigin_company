import React, {Component} from "react";
import {Row, Col, Card, CardBody, CardHeader} from "reactstrap";
import {connect} from "react-redux";
import {withRouter} from "react-router-dom";

import ListTeam from "./../components/Team/ListTeam";
import {Segment, Label, Popup, Button} from "semantic-ui-react";
import AddTeamModal from "./../components/Team/AddTeamModal";

import "./css/management.scss";

class TeamManagementContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      showModal: false
    };
    this.handleDelete = this.handleDelete.bind(this);
    this.toggleModal = this.toggleModal.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  componentWillMount() {
    this.props.getTeams();
    this.props.getMembers();
  }

  toggleModal() {
    this.setState({
      showModal: !this.state.showModal
    });
  }

  handleDelete(id) {
    this.props.deleteTeam(id);
  }

  handleSubmit(item) {
    this.props.addTeam(item);
  }

  render() {
    return (
      <Card className="team-management-container" style={{height: "80%"}}>
        <CardHeader>
          <Label icon="group" color="orange" size="large" content="Team Management" />
          <Popup
            className="btn-add-team"
            trigger={
              <Button className="btn-add-team" content="Add" color="blue" icon="plus" onClick={this.toggleModal} />
            }
            content="Add new team"
          />
        </CardHeader>
        <CardBody>
          <AddTeamModal
            show={this.state.showModal}
            toggle={this.toggleModal}
            handleSubmit={this.handleSubmit}
            data={Object.values(this.props.allMember)}
          />
          <Row>
            <Col sm={{size: 12}}>
              <Segment color="orange">
                <ListTeam 
                    handleDelete={this.handleDelete} 
                    data={this.props.allTeam} 
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
    allTeam: state.team.teamList,
    allMember: state.member.memberList
  };
};

const mapDispatchToProps = dispatch => ({
  getTeams: () => {
    dispatch.team.asyncGetAllTeam();
  },
  getMembers: () => {
    dispatch.member.asyncGetAllMember();
  },
  addTeam: item => {
    dispatch.team.asyncCreateTeam(item);
  },
  deleteTeam: id => {
    dispatch.team.asyncDeleteTeam(id);
  }
});

export default withRouter(
  connect(
    mapStateToProps,
    mapDispatchToProps
  )(TeamManagementContainer)
);
