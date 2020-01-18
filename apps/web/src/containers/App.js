import React from 'react'
import {connect} from 'react-redux'

// main routes
import AppRoutes from '../routes'

// Localization
import {IntlProvider, addLocaleData} from 'react-intl';

import locale_en from 'react-intl/locale-data/en';
import locale_de from 'react-intl/locale-data/de';
import locale_pl from 'react-intl/locale-data/pl';

import messages_de from '../translations/de.json';
import messages_en from '../translations/en.json';
import messages_pl from '../translations/pl.json';


import {
    setLang
} from '../actions/Global'

addLocaleData([...locale_en, ...locale_de, ...locale_pl]);

const messages = {
    'de': messages_de,
    'en': messages_en,
    'pl': messages_pl
};


class App extends React.Component {

    constructor(props){
        super(props);


    }


    render() {

        let language = JSON.parse(sessionStorage.getItem('lang'));
        if (language !== null) {
            this.props.setLang(language);
        } else {
            language = this.props.lang || 'en';
        }
        return (
            <IntlProvider locale={language} messages={messages[language]}>
                <AppRoutes/>
            </IntlProvider>
        )
    }
}

const mapStateToProps = state => ({
    lang: state.global.lang
});

export default connect(mapStateToProps, {
    setLang
})(App);