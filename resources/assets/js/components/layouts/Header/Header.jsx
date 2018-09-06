import React from 'react';
import PropTypes from 'prop-types';

const styles = {
    header: {
        width: '100%',
        padding: '20px',
        marginBottom: '50px',
        fontSize: '20px',
        backgroundColor: '#9cd1dc',
        height: '70px'
    },
    history: {
        float: 'right',
        color: '#fff',
    },
    title: {
        color: '#fff',
        float: 'left',
    }
}

function Header({ name }) {
    const { header, history, title } = styles;

    return (
        <div>
            <header className="header" style={header}>
                <a style={title} href="/">{name}</a>
                <a href="/history" style={history}>History</a>
            </header>
        </div>
    );
}

Header.propTypes = {
    name: PropTypes.string.isRequired
}

export { Header };
