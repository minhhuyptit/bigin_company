import React, { Component } from "react";

import {
  AppSidebar,
  AppSidebarHeader,
  AppSidebarForm,
  AppSidebarNav,
  AppSidebarFooter,
  AppSidebarMinimizer
} from "@coreui/react";

import sideBarConfig from "./SidebarConfig";

class Sidebar extends Component {
  render() {

    return (
      <AppSidebar fixed display="lg">
        <AppSidebarHeader />
        <AppSidebarForm />
        <AppSidebarNav navConfig={sideBarConfig} {...this.props.context} />
        <AppSidebarFooter />
        <AppSidebarMinimizer />
      </AppSidebar>
    );
  }
}

export default Sidebar;