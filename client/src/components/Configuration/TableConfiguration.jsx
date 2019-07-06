import React, {Component} from "react";
import {Button} from "semantic-ui-react";
import {BootstrapTable, TableHeaderColumn} from "react-bootstrap-table";

class TableConfiguration extends Component {
  constructor(props) {
    super(props);
    this.handleEdit = this.handleEdit.bind(this);
    this.openConfirm = this.openConfirm.bind(this);
  }

  openConfirm(id) {
    var result = window.confirm("Are you sure you want to delete this ?");
    if (result === true) {
      this.props.handleDelete(id)
    }
  }

  handleEdit(item) {
    this.props.handleEdit(item, false);
  }

  actionFormatter(cell, row, context) {
    return (
      <div style={{textAlign: "center"}}>
        <Button size='mini' color='teal' onClick={() => context.handleEdit(row)}>
          Edit
        </Button>
        <Button size='mini' color='red' onClick={() => context.openConfirm(row.id)}>
          Delete
        </Button>
      </div>
    )
  }

  render() {
    // let context = this;
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
      hideSizePerPage: true // You can hide the dropdown for sizePerPage,
      // onRowClick: function (row) {
      //   context.showCandidateDetail(row);
      // }
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
        <TableHeaderColumn isKey dataField="id" key dataSort width="5%">
          ID
        </TableHeaderColumn>
        <TableHeaderColumn dataField="value" key dataSort width="25%">
          Value
        </TableHeaderColumn>
        <TableHeaderColumn dataField="description" dataSort width="50%">
          Description
        </TableHeaderColumn>
        <TableHeaderColumn dataField="Action" width="20%" formatExtraData={this} dataFormat={this.actionFormatter}>
          Action
        </TableHeaderColumn>
      </BootstrapTable>
    );
  }
}

export default TableConfiguration;
