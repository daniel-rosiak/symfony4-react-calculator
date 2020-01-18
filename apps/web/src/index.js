import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux'
import {ConnectedRouter} from 'react-router-redux'

// main App with routes
import {App} from './containers'

// main store
import store, {history} from './store/configureStore'
import registerServiceWorker from './registerServiceWorker';
import './main.scss';

store.subscribe(() => {
    localStorage.setItem('reduxState', JSON.stringify(store.getState()))
});

ReactDOM.render(
    <Provider store={store}>
        <ConnectedRouter history={history}>
            <App/>
        </ConnectedRouter>
    </Provider>,
    document.getElementById('root')
);
registerServiceWorker();