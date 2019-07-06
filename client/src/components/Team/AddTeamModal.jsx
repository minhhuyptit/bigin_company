import React, {Component} from "react";
import {Modal, ModalBody, ModalFooter, ModalHeader} from "reactstrap";
import {Button} from "semantic-ui-react";

import AddEditTeamForm from "./AddEditTeamForm";

class AddTeamModal extends Component {
  render() {
    return (
      <Modal className="modal-sm add-team-modal" isOpen={this.props.show} toggle={this.props.toggle}>
        <ModalHeader toggle={this.props.toggle} className="color-teal">
          Add Team
        </ModalHeader>
        <ModalBody>
          <AddEditTeamForm
            // listMember={arrMember}
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

export default AddTeamModal;
