import React from 'react';
import {
    BrowserRouter as Router,
    Route,
    Switch
} from 'react-router-dom';

import {
    Home
} from './containers';


export default () => {
    return (
        <Router>
            <Switch>
                <Route exact path="/" component={Home} param="0"/>
            </Switch>
        </Router>
    )
}
