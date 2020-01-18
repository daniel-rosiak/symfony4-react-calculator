import {
    CHANGE_LANG,
    LOADING,
    LOADED,
    SHOW_INFO,
    HIDE_INFO
} from '../actionTypes/Global';

const initState = {
    lang: 'en',
    loading: false,
    info: ''
};

export default (state = initState, action) => {
    switch (action.type) {

        case CHANGE_LANG:
            return {
                ...state,
                lang: action.payload
            };

        case LOADING:
            return {
                ...state,
                loading: true
            };

        case LOADED:
            return {
                ...state,
                loading: false
            };
        case SHOW_INFO:
            return {
                ...state,
                info: action.payload
            };
        case HIDE_INFO:
            return {
                ...state,
                info: ''
            };
        default :
            return state
    }
}