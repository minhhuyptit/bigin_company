import React, {Component} from "react";
import {connect} from "react-redux";
import {AlertContainer, Alert} from "react-bs-notifier";

class Notification extends Component {
  constructor(props) {
    super(props);

    this.handleDismiss = this.handleDismiss.bind(this);
  }

  handleDismiss() {
    this.props.hideNotify();
  }

  render() {
    let {style, title, content, isShow, position, timeout} = this.props.notify;
    if (isShow === false) return null;
    return (
      <div>
        <AlertContainer position={position}>
          <Alert headline={title} type={style} timeout={timeout} onDismiss={this.handleDismiss}>
          <div dangerouslySetInnerHTML={{ __html: content }} />
          </Alert>
        </AlertContainer>
      </div>
    );
  }
}

const mapStateToProps = state => {
  return {
    notify: state.notify
  };
};

const mapDispatchToProps = dispatch => ({
  hideNotify: () => {
    dispatch.notify.hideNotification();
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Notification);
