import React from 'react';
import {FormattedMessage} from 'react-intl';

const LoaderContent = (type, isLoading) => {
    if(isLoading){
        if(type === 'spinner'){
            return (
                <div className="processing">
                    <div className="loader small"></div>
                </div>
            )
        } else if (type === 'page') {
            return (
                <div className="preloader active">
                    <div className="loader"></div>
                </div>
            )
        } else {
            return (
                <div className="processing">
                    <div className="loader small"></div>
                    <div className="processing__name"><FormattedMessage id="loader.info"/></div>
                </div>
            )
        }
    } else {
        return null;
    }
};

const Loader = ({type, isLoading}) => (
    <LoaderContent type={type} isLoading={isLoading}/>
);

export default Loader;