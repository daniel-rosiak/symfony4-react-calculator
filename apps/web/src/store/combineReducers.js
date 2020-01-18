import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux';
import GlobalReducer from '../reducers/GlobalReducer';

export default combineReducers({
    routing: routerReducer,
    global: GlobalReducer
})