import React, {Component} from "react";
import {connect} from "react-redux";
import {Modal, ModalHeader, ModalBody, ModalFooter, Row, Col} from "reactstrap";
import {Button, Icon} from "semantic-ui-react";

import AuthenticationApi from "./../../apis/AuthenticationApis";
import * as notify from "./../../constants/Notify";

class RegisterSuccessModal extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isLoading: false
    };

    this.handleSubmit = this.handleSubmit.bind(this);
    this.notification = this.notification.bind(this);
  }

  notification(style, title, content, timeout) {
    let options = {style, title, content, timeout};
    this.props.changeNotify(options);
  }

  async handleSubmit(event) {
    event.preventDefault();
    this.setState({isLoading: true});
    let {email} = this.props;
    const authenApi = new AuthenticationApi();
    let res = await authenApi.call("resendConfirm", {
      url: {email}
    });
    if (res.status === 404) {
      let xhtml = '<ul style="padding-left: 0;">';
      Object.values(res.message).forEach(function(item) {
        xhtml += "<li>" + item[0] + "</li>";
      });
      xhtml += "</ul>";
      this.notification(notify.DANGER, notify.TITLE_RESEND_FAIL, xhtml, 2500);
    } else {
      this.notification(notify.SUCCESS, notify.TITLE_RESEND_SUCCESS, "Gửi lại xác thực thành công", 2500);
    }
    this.setState({isLoading: false});
  }
  

  render() {
    let {isLoading} = this.state;
    return (
      <Modal size="md" style={{marginTop: "15vh"}} returnFocusAfterClose={true} isOpen={this.props.open}>
        <ModalHeader>Đăng ký thành công</ModalHeader>
        <ModalBody>
          <Row style={{textAlign: "center"}}>
            <Col>
              <Icon size="massive" color="green" name="check circle" />
            </Col>
          </Row>
          <Row style={{marginTop: "10px", marginBottom: "10px"}} className="justify-content-center">
          Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.
          Nếu bạn không nhận được email bấm nút bên dưới để gửi yêu cầu khác.
          </Row>
          <Row className="justify-content-center">
            <Button
              onClick={this.handleSubmit}
              basic
              loading={isLoading}
              disabled={isLoading}
              color="blue"
              size="medium"
              content=""
              icon="mail"
              label={{
                basic: true,
                size: "mini",
                color: "blue",
                pointing: "left",
                content: "Resend verification code"
              }}
            />
          </Row>
        </ModalBody>
        <ModalFooter>
          <Button color="primary" onClick={this.props.toggle}>
            Close
          </Button>
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
)(RegisterSuccessModal);
