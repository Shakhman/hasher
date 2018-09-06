import React, { Component } from 'react';
import { BrowserRouter as Router } from 'react-router-dom'
import { Switch, Route } from 'react-router'

import Index from './components/Index/Index';
import { History } from './components/History/History';
import { Header } from './components/layouts/Header/Header';

const styles = {
    wrap: {
        padding: '0 0 20px 0'
    }
}

class Main extends Component {


    render() {
        const { wrap } = styles;

        return (
            <div style={wrap}>
                <Header name="Laravel Hasher" />
                <Router>
                    <Switch>
                        <Route exact path="/history" component={History}></Route>
                        <Route exact path="/" component={Index}></Route>
                    </Switch>
                </Router>
            </div>
        )
    }
}

export { Main };
