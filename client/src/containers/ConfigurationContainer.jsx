import React, {Component} from "react";
import {connect} from "react-redux";
import {Row, Col, Card, CardBody} from "reactstrap";
import {Button, Segment} from "semantic-ui-react";

import MenuConfiguration from "./../components/Configuration/MenuConfiguration";
import TableConfiguration from "./../components/Configuration/TableConfiguration";
import AddEditConfigurationModal from "./../components/Configuration/AddEditConfigurationModal";

class ConfigurationContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      activeItem: "",
      showForm: false,
      itemSelected: null
    };

    this.onClickItemType = this.onClickItemType.bind(this);
    this.closeForm = this.closeForm.bind(this);
    this.toggleModal = this.toggleModal.bind(this);
    this.handleAdd = this.handleAdd.bind(this);
    this.handleEdit = this.handleEdit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  componentWillMount() {
    this.props.getConfig();
    this.setState({
      activeItem: Object.keys(this.props.data)[0]
    });
  }

  toggleModal() {
    this.setState({
      showForm: false
    });
  }

  onClickItemType(type) {
    this.props.getConfigByType(type);
    this.setState({
      activeItem: type
    });
  }

  closeForm() {
    this.setState({
      showForm: false,
      itemSelected: null
    });
  }

  handleAdd() {
    this.setState({
      showForm: true,
      itemSelected: null
    });
  }

  handleEdit(item) {
    this.setState({
      itemSelected: item,
      showForm: true
    });
  }

  handleDelete(id) {
    this.props.deleteConfig(id);
  }

  handleSubmit(item) {
    if (this.state.itemSelected === null) {
      this.props.addConfig(item);
    } else {
      this.props.editConfig(item);
    }
  }

  render() {
    let {activeItem, showForm, itemSelected} = this.state;
    return (
      <Card style={{height: "80%"}}>
        <CardBody>
        <Segment color="orange">
          <Row>
            <Col sm={3}>
              <Button icon="add" content="Add" color="orange" onClick={this.handleAdd} />
              <MenuConfiguration
                menu={Object.keys(this.props.data)}
                activeItem={activeItem}
                onClickItemType={this.onClickItemType}
              />
            </Col>
            <Col sm={9}>
              <TableConfiguration
                handleEdit={this.handleEdit}
                handleDelete={this.handleDelete}
                data={this.props.data[activeItem]}
              />
            </Col>
          </Row>
          </Segment>
          <AddEditConfigurationModal
            toggle={this.toggleModal}
            showForm={showForm}
            closeForm={this.closeForm}
            listType={Object.keys(this.props.data)}
            itemSelected={itemSelected}
            handleSubmit={this.handleSubmit}
          />
        </CardBody>
      </Card>
    );
  }
}

const mapStateToProps = state => {
  return {
    data: state.config
  };
};

const mapDispatchToProps = dispatch => ({
  getConfig: () => {
    dispatch.config.asyncGetConfig();
  },
  getConfigByType: type => {
    dispatch.config.asyncGetConfigByType(type);
  },
  addConfig: item => {
    dispatch.config.asyncCreateConfig(item)
  },
  editConfig: item => {
    dispatch.config.asyncUpdateConfig(item);
  },
  deleteConfig: id => {
    dispatch.config.asyncDeleteConfig(id);
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(ConfigurationContainer);
