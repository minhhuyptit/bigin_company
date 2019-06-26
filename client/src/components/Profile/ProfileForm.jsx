import React, {Component} from "react";
import $ from "jquery";
import {Segment, Button, Image, Form, Input, Label} from "semantic-ui-react";

import {Row, Col, Modal, ModalHeader, ModalBody, ModalFooter} from "reactstrap";

class ProfileForm extends Component {
  constructor(props) {
    super(props);

    this.state = {
      showAvatar: false
    };

    this.toggle = this.toggle.bind(this);
    this.handleShowAvatar = this.handleShowAvatar.bind(this);
    this.handleUpdateAvatar = this.handleUpdateAvatar.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  toggle() {
    this.setState({
      showAvatar: !this.state.showAvatar
    });
  }
  handleShowAvatar() {
    this.setState({
      showAvatar: true
    });
  }

  handleUpdateAvatar() {
    $("#input-picture").click();
  }

  handleSubmit() {
    var picture = $("#input-picture")[0].files[0];
    this.props.handleSubmit(picture);
  }

  render() {
    let {fullname, birthday, is_male, phone, picture} = this.props.userInfo;
    return (
      <Form encType="multipart/form-data" id="profile-form">
        <Row>
          <Col sm={3} style={{textAlign: "center"}}>
            <div className="avatar_content">
              <Image src={"/images/" + picture} centered onClick={this.handleShowAvatar} />
              <div className="avatar_camera" onClick={this.handleUpdateAvatar}>
                <i className="fa fa-camera" />
                <p>Update Avatar</p>
              </div>
            </div>
            <Input type="file" name="picture" id="input-picture" />
            <Label color="grey" basic size="tiny" pointing>
              Please select a square image to look better
            </Label>
            <Modal style={{marginTop: "50px", maxWidth: "400px"}} toggle={this.toggle} isOpen={this.state.showAvatar}>
              <ModalHeader toggle={this.toggle}>
                <Label size="small" color="red" content="Avatar" tag />
              </ModalHeader>
              <ModalBody>
                <Image centered src={"/images/" + picture} />
              </ModalBody>
              <ModalFooter>
                <Button color="blue" onClick={this.toggle} content="Close" />
              </ModalFooter>
            </Modal>
          </Col>
          <Col sm={6}>
            <Segment color="teal">
                  <Form.Field>
                        <Input
                          required
                          label="Fullname: "
                          placeholder="Nguyễn Hà Minh Huy"
                          icon="address book"
                          value={fullname}
                          onChange={(event, value) => this.props.handleChange(value, "fullname")}
                        />
                  </Form.Field>
              <Form.Group>
                <Form.Field width={10}>
                  <Input
                    required
                    label="Birthday: "
                    type="date"
                    value={birthday}
                    onChange={(event, value) => this.props.handleChange(value, "birthday")}
                  />
                </Form.Field>
                <Form.Field width={4}>
                  <Button.Group>
                    <Button
                      onClick={(event, value) => this.props.handleChange(value, "is_male")}
                      value={true}
                      positive={!!+is_male === true}
                      size="small"
                      content="Male"
                    />
                    <Button.Or />
                    <Button
                      onClick={(event, value) => this.props.handleChange(value, "is_male")}
                      value={false}
                      positive={!!+is_male === false}
                      size="small"
                      content="Female"
                    />
                  </Button.Group>
                </Form.Field>
              </Form.Group>
              <Form.Field>
                <Input
                  required
                  label="Phone: "
                  pattern="(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b"
                  placeholder="0794 755 005"
                  icon="phone"
                  value={phone}
                  onChange={(event, value) => this.props.handleChange(value, "phone")}
                />
              </Form.Field>
            </Segment>
          </Col>
        </Row>
        <Row style={{textAlign: "right"}}>
          <Col>
            <Form.Field color="teal" onClick={this.handleSubmit} control={Button} content="Update" />
          </Col>
        </Row>
      </Form>
    );
  }
}

export default ProfileForm;
