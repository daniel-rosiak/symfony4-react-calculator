import ConnectionManager from '../services/ConnectionManager';
import axios from 'axios';
import {
    LOADING,
    LOADED
} from '../actionTypes/Global';
import {showGlobalInfo} from "./Global";


export const calculate = (parameters) =>
{
    return async(dispatch) => {
        try {

            let response = null;

            dispatch({
                type: LOADING
            });

            const requestURL = '/operation';
            let data = parameters;

            let options = ConnectionManager.prepareOptions(requestURL, 'POST', data);
            response = await axios(options)
                .then(response => {
                    return response;
                })
                .catch(error => {
                    dispatch(showGlobalInfo('api_error'));
                });

            dispatch({
                type: LOADED
            });

            return response

        } catch (error) {
            return error.error;
        }
    }
};

export const report = (parameters) =>
{
    return async(dispatch) => {
        try {
            let response = null;

            dispatch({
                type: LOADING
            });

            const requestURL = '/operation';
            let data = parameters;

            let options = ConnectionManager.prepareOptions(requestURL, 'GET', data);
            response = await axios(options)
                .then(response => {
                    return response;
                })

                .catch(error => {
                    dispatch(showGlobalInfo('api_error'));
                });

            dispatch({
                type: LOADED
            });

            return response;

        } catch (error) {
            return error.error;
        }
    }
};


