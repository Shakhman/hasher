import React, { Component } from 'react'
import PropTypes from 'prop-types';

const styles = {
    table: {
        margin: '0 auto',
        borderCollapse: 'collapse',
    },
    tdTh: {
        border: '1px solid #ddd',
        textAlign: 'left',
        padding: '8px',
    }
}

class Table extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        const { table, tdTh } = styles;
        const { hashes } = this.props;

        return (
            <table style={table}>
                <thead>
                    <tr>
                        {Object.keys(hashes[0]).map((val, i) => {
                            return <th style={tdTh} key={i}>{val}</th>
                        })}
                    </tr>
                </thead>
                <tbody>
                    {
                        hashes.map((obj, i) => {
                            return (
                                <tr key={i}>
                                    {Object.keys(obj).map((cell) => {
                                        return <td key={obj[cell]} style={tdTh}>{obj[cell]}</td>
                                    })}
                                </tr>
                            )
                        })
                    }
                </tbody>
            </table>
        )
  }
}

Table.propTypes = {
    hashes: PropTypes.array.isRequired,
}

export { Table };
