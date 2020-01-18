import config from '../config';
import React from 'react';


class ConnectionManager extends React.Component {

    static prepareOptions(requestPath, method, data = {}, additionalHeaders = []) {
        const apiUrl = config.apiUrl + requestPath;

        let headers = undefined;

        if (additionalHeaders !== null) {
            for (let el of Object.values(additionalHeaders)) {
                headers = Object.assign({}, headers, el);
            }
        }

        if (method === 'GET') {
            return {
                method,
                headers,
                params: data,
                url: apiUrl
            }
        }

        return {
            method,
            headers,
            data: JSON.stringify(data),
            url: apiUrl
        };
    };
}

export default ConnectionManager;