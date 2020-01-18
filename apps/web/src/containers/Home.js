import React from 'react';
import {connect} from 'react-redux';

import {
    Loader,
    Header,
    Footer,
    Report,
    GlobalInfo,
    Calc
} from '../components/';

import {
    loading,
    loaded
} from '../actions/Global';

import {FormattedMessage} from 'react-intl';


class Home extends React.Component {

    constructor(props) {
        super(props);
        this.props.loading();
    }

    async componentDidMount() {
        this.props.loaded();
    }

    render() {

        return (
            <React.Fragment>
                <Header />
                <div className="container content">
                    {this.props.isLoading && <Loader/>}
                    <div className="main">
                        <Calc />
                        <Report />
                    </div>
                </div>
                <Footer/>
                {this.props.info && <GlobalInfo text={this.props.info}/>}
            </React.Fragment>
        )
    }
}

const mapStateToProps = state => {
    return {
        isLoading: state.global.loading,
        info: state.global.info,
        language: state.global.lang
    }
};

export default connect(mapStateToProps, {
    loading,
    loaded
})(Home);