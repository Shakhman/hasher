import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { Word } from '../Word/Word';
import { getAll as getAllVocabularies} from '../../api/vocabularies';

const styles = {
    select: {
        width: '20%',
        margin: '40px 0',
        height: '400px'
    }
}

class Vocabulary extends Component {

    constructor(props) {
        super(props);

        this.state = {
            words: null,
        }
    }

    componentDidMount() {
        getAllVocabularies().then(({data, status}) => {
            if (status === 200) {
                this.setState({words: data})
            }
        });
    }

    render() {
        const { select } = styles;
        const { words } = this.state;
        const { onSelectChange } = this.props;

        return (
            <div>
                <select style={select} name="vocabulary" multiple onChange={onSelectChange}>
                    {words && words.map(({id, word}) => {
                        return <Word key={id} word={word} id={id}/>
                    })}
                </select>
            </div>
        );
    }
}

Vocabulary.propTypes = {
    onSelectChange: PropTypes.func.isRequired,
}

export { Vocabulary };
