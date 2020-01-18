import {
    CHANGE_LANG,
    LOADING,
    LOADED,
    SHOW_INFO,
    HIDE_INFO
} from '../actionTypes/Global';

export const setLang = (lang) => {

    sessionStorage.setItem('lang', JSON.stringify(lang));

    return dispatch => {
        dispatch({
            type: CHANGE_LANG,
            payload: lang
        })
    }
};

export const showGlobalInfo = (info) => {

    return dispatch => {

        dispatch({
            type: SHOW_INFO,
            payload: info
        });

        setTimeout(() => {
            dispatch({
                type: HIDE_INFO
            });
        }, 3000);
    }
};

export const loading = () => {
    return {
        type: LOADING
    }
};

export const loaded = () => {
    return{
        type: LOADED
    }
};
