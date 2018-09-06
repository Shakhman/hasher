import React from 'react';
import ReactDOM from 'react-dom';

import { Main } from './Main';

require('./bootstrap');

if (document.getElementById('app')) {
    ReactDOM.render(
        <Main/>,
    document.getElementById('app'));
}
