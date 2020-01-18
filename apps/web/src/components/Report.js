import React from 'react';
import {FormattedMessage} from 'react-intl';
import {connect} from 'react-redux';
import {report} from '../actions/Operation';
import {default as reportModel} from '../model/Report'

class Report extends React.Component {

    constructor(props) {
        super(props);
    }

    _formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    _getDatesFromType(type) {

        let dates = {};
        switch(type) {
            case 'month':
                dates.from = new Date().setMonth(new Date().getMonth() - 1);
                break;
            case 'year':
                dates.from = new Date().setFullYear(new Date().getFullYear() - 1);
                break;
            default:
                dates.from = new Date();
        }
        dates.from = this._formatDate(dates.from);
        return dates;
    }

    handleGetReportClick = async (type) => {
        let dates = this._getDatesFromType(type);
        let response = await this.props.report(dates);
        if(response && response.status == 200) {
            reportModel.downloadAsCSV(response.data, 'report_'+type);
        }
    }

    
    render() {
        return (
            <div className="report">
                <h3><FormattedMessage id="report.info"/></h3>
                <button onClick={() => {this.handleGetReportClick('day')}}><FormattedMessage id="report.button.day"/></button>
                <button onClick={() => {this.handleGetReportClick('month')}}><FormattedMessage id="report.button.month"/></button>
                <button onClick={() => {this.handleGetReportClick('year')}}><FormattedMessage id="report.button.year"/></button>
            </div>
        )
    }
}

const mapStateToProps = state => {
    return {
        language: state.global.lang
    }
};

export default connect(mapStateToProps, {
    report
})(Report);