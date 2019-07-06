import React, {Component} from "react";
import {Button, Form, Input, TextArea, Dropdown, Label} from "semantic-ui-react";
import {Modal, ModalBody, ModalFooter, ModalHeader} from "reactstrap";

class AddEditConfigurationModal extends Component {
  constructor(props) {
    super(props);
    this.state = {
      form: {
        id: "",
        type: "",
        value: "",
        description: ""
      }
    };

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.close = this.close.bind(this);
    this.resetValue = this.resetValue.bind(this);
  }

  handleChange(value, key) {
    let {form} = this.state;
    form[key] = value;
    this.setState({
      form
    });
  }

  handleSubmit() {
    // Validate
    if (this.state.form.type === "" && this.props.itemSelected != null) {
      alert("Type cannot be empty");
      return;
    } else if (this.state.form.value === "") {
      alert("Value cannot be empty");
      return;
    }
    this.props.handleSubmit(this.state.form);
    this.props.closeForm();
    this.resetValue();
  }

  close() {
    this.props.closeForm();
    this.resetValue();
  }

  resetValue() {
    this.setState({
      //When closing and reset value state
      form: {id: "", type: "", value: "", description: ""}
    });
  }

  static getDerivedStateFromProps(nextProps, prevState) {
    let {itemSelected} = nextProps;
    if (itemSelected == null) {
      //Case Add
      return prevState.form.id !== "" ? {form: {id: "", type: "", value: "", description: ""}} : null;
    }
    //Case Edit
    let {id, type, value, description} = itemSelected;
    return itemSelected.id != prevState.form.id ? {form: {id, type, value, description}} : null;
  }

  render() {
    let {toggle, showForm, itemSelected} = this.props;
    let {value, description, type} = this.state.form;
    let dropdownType = "";

    //Case Add
    if (itemSelected == null) {
      let arrType = [];
      this.props.listType.map(item => {
        arrType.push({key: item, text: item, value: item});
      });

      dropdownType = (
        <Form.Field required>
          <label>Type</label>
          <Dropdown
            name="content_type"
            placeholder="Select Type"
            fluid
            selection
            search
            onChange={(e, {value}) => {
              this.handleChange(value, "type");
            }}
            value={type}
            options={arrType}
          />
        </Form.Field>
      );
    }
    return (
      <Modal style={{marginTop: "15vh"}} toggle={toggle} isOpen={showForm} className="modal-md">
          <ModalHeader className="color-teal">
            <Label color='orange' ribbon>
              {itemSelected != null ? "Edit " : "Add "}Configuration
            </Label>
          </ModalHeader>
          <ModalBody>
            <Form className="add-edit-form">
              {dropdownType}
              <Form.Field
                label="Value"
                name="value"
                control={Input}
                value={value}
                onChange={(e, {value}) => {
                  this.handleChange(value, "value");
                }}
                placeholder="Value"
                required
              />
              <Form.Field>
                <label>Description</label>
                <TextArea
                  name="description"
                  className="textarea-form"
                  placeholder="Description something...."
                  value={description}
                  onChange={(e, {value}) => {
                    this.handleChange(value, "description");
                  }}
                />
              </Form.Field>
            </Form>
          </ModalBody>
          <ModalFooter>
            <Button color="teal" onClick={this.handleSubmit}>
              {itemSelected != null ? "Update" : "Add"}
            </Button>
            <Button onClick={this.close}>Cancel</Button>
          </ModalFooter>
      </Modal>
    );
  }
}

export default AddEditConfigurationModal;
