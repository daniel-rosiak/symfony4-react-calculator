import React from 'react';
import {FormattedMessage} from 'react-intl';


const GlobalInfo = ({text}) => {
    return (
        <div className="global-info">
            <div><FormattedMessage id={`globalinfo.${text}`} /></div>
        </div>
    )
}

export default GlobalInfo;