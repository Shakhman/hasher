import React, { Component } from 'react';
import { getUserHashes } from '../../api/users_hashes';
import { Table } from '../Table/Table';

const styles = {
    title: {
        textAlign: 'center',
        marginBottom: '50px',
    },
    subtitle: {
        textAlign: 'center',
    }
}
class History extends Component {

    constructor(props) {
        super(props);

        this.state = {
            hashes: null,
        }
    }

    componentDidMount() {
        getUserHashes().then(({data}) => {
            if (data.length > 0) {
                this.setState({ hashes: data })
            }
        })
    }
    render() {
        const { title, subtitle } = styles;
        const { hashes } = this.state;

        return (
            <div>
                <h1 style={title}>History</h1>
                {hashes && <Table hashes={hashes}/>}
                {!hashes && <h5 style={subtitle}>No hashes</h5>}
            </div>
    )
  }
}

export { History }
