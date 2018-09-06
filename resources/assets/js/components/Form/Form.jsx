import React, { Component } from 'react';

import { Algorithm } from '../Algorithm/Algorithm';
import { HashButton } from '../HashButton/HashButton';
import { Vocabulary } from '../Vocabulary/Vocabulary';

import { getAll as getAllAlgorithms } from '../../api/algorithms';
import { create as createHashes } from '../../api/users_hashes';

const style = {
    wrap: {
        textAlign: 'center'
    }
}


class Form extends Component {
    constructor(props) {
        super(props);

        this.state = {
            algorithms: null,
        }

        this.selectedData = {
            words: null,
            algorithms: [],
        }
    }


    componentDidMount() {
        getAllAlgorithms().then(({data, status}) => {
            if (status === 200) {
                this.setState({algorithms: data})
            }
        });
    }

    onSelectChange(e) {
        let words = [...e.target.selectedOptions].map(o => {
            return {
                id: +o.id,
                name: o.value
            }
        });
        this.selectedData.words = words;
    }

    onCheckboxChange(e) {
        if (e.target.checked) {
            this.selectedData.algorithms.push({
                id: +e.target.id,
                name: e.target.value,
            });
        } else {
            let filteredArr = this.selectedData.algorithms.filter(val => {
                return val.id !== +e.target.id
            });

            this.selectedData.algorithms = filteredArr;
        }
    }

    onSubmit() {
        if (!this.selectedData.words) {
            alert('Select at least one word')
            return;
        }

        if (this.selectedData.algorithms.length === 0) {
            alert('Select at least one algorithm')
            return;
        }

        createHashes(this.selectedData).then(({data}) => {
            this.props.handleResult(data);
        });
    }

    render() {
        const { wrap } = style;
        const { algorithms } = this.state;

        return (
            <div style={wrap}>
                <h3>Select words</h3>
                <form action="">
                    <Vocabulary
                        onSelectChange={this.onSelectChange.bind(this)}
                    />
                    {algorithms && algorithms.map( ({id, name}) => {
                        return <Algorithm
                                    key={id}
                                    name={name}
                                    id={id}
                                    onCheckboxChange={this.onCheckboxChange.bind(this)}
                                />
                    })}
                    {algorithms && <HashButton onSubmit={this.onSubmit.bind(this)} />}
                </form>
            </div>
        );
    }
}

export { Form };
