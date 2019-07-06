import React, {Component} from "react";

import {BootstrapTable, TableHeaderColumn} from "react-bootstrap-table";

class ListTeam extends Component {
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
        <TableHeaderColumn dataField="pic" width="20%">
          PIC
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

export default ListTeam;
