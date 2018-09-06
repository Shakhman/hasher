import React, { Component } from 'react';
import PropTypes from 'prop-types';

const styles = {
    button: {
        marginTop: '15px',
        cursor: 'pointer',
        backgroundColor: '#555',
        color: '#fff',
        fontSize: '20px',
    }
}

class HashButton extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        const { button } = styles;
        const { onSubmit } = this.props;

        return (
            <div>
                <button onClick={onSubmit} type="button" style={button}>Hash</button>
            </div>
        );
    }
}

HashButton.propTypes = {
    onSubmit: PropTypes.func.isRequired,
}

export { HashButton };
