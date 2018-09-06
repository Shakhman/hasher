import React, { Component } from 'react';
import PropTypes from 'prop-types';


const styles = {
    label: {
        marginLeft: '5px',
        marginRight: '15px',
    }
}

class Algorithm extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        const { id, name, onCheckboxChange } = this.props;
        const { label } = styles;

        return (
            <span>
                <input id={id} type="checkbox" value={name} onChange={onCheckboxChange}/>
                <label htmlFor={`algo-${id}`} style={label}>{name}</label>
            </span>
        );
    }
}

Algorithm.propTypes = {
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
}

export { Algorithm };
