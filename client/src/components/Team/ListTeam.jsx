import React, {Component} from "react";
import {Button} from "semantic-ui-react";
import {withRouter} from "react-router-dom";
import {connect} from "react-redux";
import {BootstrapTable, TableHeaderColumn} from "react-bootstrap-table";

class ListTeam extends Component {
  constructor(props) {
    super(props);

    this.openConfirm = this.openConfirm.bind(this);
  }
  openConfirm(event, id) {
    event.stopPropagation();
    var result = window.confirm("Are you sure you want to delete this ?");
    if (result === true) {
      this.props.handleDelete(id);
    }
  }
  showListTeamMember(row) {
    this.props.history.push("/management/team/detail/" + row.id);
  }

  actionFormatter(cell, row, context) {
    return (
      <div style={{textAlign: "center"}}>
        <Button size="mini" color="red" onClick={e => context.openConfirm(e, row.id)}>
          Delete
        </Button>
      </div>
    );
  }
  render() {
    let context = this;
    const tableOptions = {
      // page: this.props.currentPage,
      // sizePerPage: this.props.sizePerPage,  // which size per page you want to locate as default
      page: 1,
      sizePerPage: 5, // which size per page you want to locate as default
      pageStartIndex: 1, // where to start counting the pages
      paginationSize: 3, // the pagination bar size.
      prePage: "Prev", // Previous page button text
      nextPage: "Next", // Next page button text
      firstPage: "First", // First page button text
      lastPage: "Last", // Last page button text
      // onExportToCSV: this.retrieveCSVData,
      // onPageChange: this.props.onPageChange,
      paginationShowsTotal: this.showPaginationTotalText, // Accept bool or function
      // paginationPosition: 'top',  // default is bottom, top and both is all available
      hideSizePerPage: true, // You can hide the dropdown for sizePerPage,
      onRowClick: function(row) {
        context.showListTeamMember(row);
        // console.log(context)
      }
    };
    return (
      <BootstrapTable
        hover
        trClassName="clickable-row"
        data={this.props.data}
        pagination
        ignoreSinglePage
        options={tableOptions}
      >
        <TableHeaderColumn isKey dataField="id" dataSort width="5%">
          ID
        </TableHeaderColumn>
        <TableHeaderColumn dataField="name" width="16%">
          Name
        </TableHeaderColumn>
        <TableHeaderColumn dataField="leader" width="20%">
          Leader
        </TableHeaderColumn>
        <TableHeaderColumn dataField="description" width="50%">
          Description
        </TableHeaderColumn>
        <TableHeaderColumn width="9%" formatExtraData={this} dataFormat={this.actionFormatter}>
          Action
        </TableHeaderColumn>
      </BootstrapTable>
    );
  }
}

export default withRouter(connect(null, null)(ListTeam));
