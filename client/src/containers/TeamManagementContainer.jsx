import React, {Component} from "react";
import {Row, Col, Card, CardBody, CardHeader} from "reactstrap";
import {connect} from "react-redux";
import {withRouter} from "react-router-dom";

import ListTeam from "./../components/Team/ListTeam";
import {Segment, Label} from "semantic-ui-react";
// import AddTeamModal from "./../components/TeamManagement/AddTeamModal";

import "./css/management.scss";

class TeamManagementContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      showModal: false
    };
  }

  componentWillMount() {
    this.props.getTeams();
  }

  render() {
    return (
      <Card className="team-management-container" style={{height: "80%"}}>
        <CardBody>
          {/* <AddTeamModal
          /> */}
          <Row>
            <Col sm={{size: 12}}>
              <Label icon="group" color="orange" size="large" content="Team Management" />
              <Segment color="orange">
                <ListTeam data={this.props.allTeam} />
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
    allTeam: state.team.teamList
  };
};

const mapDispatchToProps = dispatch => ({
  getTeams: () => {
    dispatch.team.asyncGetAllTeam();
  }
});

export default withRouter(
  connect(
    mapStateToProps,
    mapDispatchToProps
  )(TeamManagementContainer)
);
