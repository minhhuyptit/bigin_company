import React, {Component} from "react";
import {Menu} from "semantic-ui-react";

class MenuConfiguration extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    let {menu, activeItem} = this.props;
    const listType = menu.map((item, index) => {
      return (
        <Menu.Item 
            key={index} 
            name={item} 
            active={activeItem === item} 
            onClick={(event, {name}) => this.props.onClickItemType(name)} />
      );
    });
    return (
      <Menu pointing secondary vertical>
        {listType}
      </Menu>
    );
  }
}

export default MenuConfiguration;
