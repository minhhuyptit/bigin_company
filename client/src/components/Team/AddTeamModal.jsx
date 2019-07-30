import React, {Component} from "react";
import {connect} from "react-redux";
import {Modal, ModalBody, ModalFooter, ModalHeader} from "reactstrap";
import {Button, Label} from "semantic-ui-react";

import AddEditTeamForm from "./AddEditTeamForm";
import {listAllMember} from "./../../helpers/team";
import * as notify from "./../../constants/Notify";

class AddTeamModal extends Component {
  constructor(props) {
    super(props);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleSubmit() {
    let {name, leader} = this.addTeamForm.state.form;
    if (name === "" || leader === "") {
      let option = {
        style: notify.WARNING,
        title: notify.TITLE_CREATE_FAIL,
        content: "Team name and leader cannot be empty",
        timeout: 500
      };
      this.props.changeNotify(option);
      return;
    }
    this.props.handleSubmit(this.addTeamForm.state.form);
    this.props.toggle();
  }

  render() {
    let arrMembers = listAllMember(this.props.data);
    return (
      <Modal
        style={{marginTop: "15vh"}}
        className="modal-md add-team-modal"
        isOpen={this.props.show}
        toggle={this.props.toggle}
      >
        <ModalHeader toggle={this.props.toggle} className="color-teal">
          <Label size="large" color="orange" ribbon>
            Add Team
          </Label>
        </ModalHeader>
        <ModalBody>
          <AddEditTeamForm
            listMember={arrMembers}
            ref={instance => {
              this.addTeamForm = instance;
            }}
          />
        </ModalBody>
        <ModalFooter>
          <Button color="teal" onClick={this.handleSubmit}>
            Add
          </Button>
          <Button onClick={this.props.toggle}>Cancel</Button>
        </ModalFooter>
      </Modal>
    );
  }
}

const mapDispatchToProps = dispatch => ({
  changeNotify: option => {
    dispatch.notify.changeNotification(option);
  }
});

export default connect(
  null,
  mapDispatchToProps
)(AddTeamModal);
