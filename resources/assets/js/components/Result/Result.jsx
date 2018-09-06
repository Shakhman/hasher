import React, { Component } from 'react'
import PropTypes from 'prop-types';

import { Table } from '../Table/Table';

const styles = {
    wrap: {
        marginTop: '50px'
    },
    title: {
        textAlign: 'center',
        marginBottom: '10px'
    },
}

class Result extends Component {
    render() {
        const { wrap, title } = styles;

        return (
            <div style={wrap}>
                <h3 style={title}>Your result:</h3>
                <Table hashes={this.props.hashes}/>
            </div>
        )
    }
}

Result.propTypes = {
    hashes: PropTypes.array.isRequired,
}

export { Result };
