import React, {Component} from "react";
import {withRouter} from "react-router-dom";
import {connect} from "react-redux";
import {AppSidebarToggler, AppNavbarBrand} from "@coreui/react";
import {Dropdown, DropdownItem, DropdownMenu, DropdownToggle, Nav, Badge} from "reactstrap";
class Header extends Component {
  constructor(props) {
    super(props);

    this.state = {
      dropdownOpen: false
    };

    this.toggle = this.toggle.bind(this);
    this.showProfilePage = this.showProfilePage.bind(this);
    this.handleLogout = this.handleLogout.bind(this);
  }

  toggle() {
    this.setState(prevState => ({
      dropdownOpen: !prevState.dropdownOpen
    }));
  }

  showProfilePage() {
    this.props.history.push("/profile");
  }

  handleLogout() {
    this.props.logout();
    this.props.history.push("/login");
  }

  render() {
    return (
      <React.Fragment>
        <AppSidebarToggler className="d-lg-none" display="md" mobile />
        <AppNavbarBrand
          full={{
            src: "/images/bigin-logo-text.png",
            width: 60,
            height: 35,
            alt: "Logo"
          }}
        />
        <AppSidebarToggler className="d-md-down-none" display="lg" />
        <Nav className="ml-auto" navbar>
          <Dropdown isOpen={this.state.dropdownOpen} toggle={this.toggle}>
            <DropdownToggle nav>
              <img src={"/images/avatar.png"} className="dropdown-avatar" alt="avatar" />
            </DropdownToggle>
            <DropdownMenu>
              <DropdownItem className="text-center" header>
                <strong>Account</strong>
              </DropdownItem>
              <DropdownItem onClick={this.showProfilePage}>
                <div className="user-option">
                  <img src="/images/avatar.png" alt="avatar" />
                  <div>
                    <strong>Nguyễn Hà Minh Huy</strong>
                    <div>minhhuy97.ptit@gmail.com</div>
                  </div>
                </div>
              </DropdownItem>
              <DropdownItem>
                <i className="fa fa-bell-o fa-lg" />
                Notifications
                <Badge color="warning" pill>
                  23
                </Badge>
              </DropdownItem>
              <DropdownItem>
                <i className="fa fa-envelope-o fa-lg" />
                Messages
                <Badge color="info" pill>
                  7
                </Badge>
              </DropdownItem>
              <DropdownItem className="text-center" header>
                <strong>Settings</strong>
              </DropdownItem>
              <DropdownItem>
                <i className="fa fa-wrench fa-lg" />
                Setting
              </DropdownItem>
              <DropdownItem>
                <i className="fa fa-user-o fa-lg" />
                Change Password
              </DropdownItem>
              <DropdownItem divider />
              <DropdownItem onClick={this.handleLogout}>
                <i className="fa fa-lock fa-lg" />
                Logout
              </DropdownItem>
            </DropdownMenu>
          </Dropdown>
        </Nav>
      </React.Fragment>
    );
  }
}

const mapDispatchToProps = dispatch => ({
  logout: item => {
    dispatch.user.logout();
  }
});

export default withRouter(
  connect(
    null,
    mapDispatchToProps
  )(Header)
);