import React, { Component } from 'react';

import { Form } from '../Form/Form';
import { Result } from '../Result/Result';

class Index extends Component {
    constructor(props) {
        super(props);

        this.state = {
            isResult: false,
            resultData: null,
        }
    }

    handleResult(data) {
        this.setState({
            isResult: true,
            resultData: data,
        })
    }

    render() {
        return (
            <React.Fragment>
                <Form handleResult={this.handleResult.bind(this)}></Form>
                {this.state.isResult && <Result hashes={this.state.resultData}/>}
            </React.Fragment>
        );
    }
}

export default Index;
