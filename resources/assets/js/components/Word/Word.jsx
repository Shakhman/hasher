import React, { Component } from 'react';

const styles = {
    option: {
        textAlign: 'center',
    }
}
class Word extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        const { option } = styles;
        const { id, word, onCheckBoxChange } = this.props;

        return (
            <React.Fragment>
                <option id={id} value={word} style={option} onChange={onCheckBoxChange}>{word}</option>
            </React.Fragment>
        );
    }
}

export { Word };
