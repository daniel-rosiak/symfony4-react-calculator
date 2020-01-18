import React from 'react';
import {FormattedMessage} from 'react-intl';
import {connect} from 'react-redux';
import {report} from '../actions/Operation';
import {calculate} from '../actions/Operation'
import {default as operarationModel} from '../model/Operation'
import {ButtonList} from '../components/element'


class Calc extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            parameters: {
                arguments: [],
                type: ''
            },
            display: '',
            result: '',
            currentNumber: ''
        };
    }

    handleClickClear = () => {
        this.setState({
            parameters: {
                arguments: [],
                type: ''
            },
            display: '',
            result: '',
            currentNumber: ''
        });
    };


    handleClickNumber = (val) => {
        this.setState(prevState => ({
            ...prevState,
            display: prevState.display + val,
            currentNumber: prevState.currentNumber + val
        }))
    };

    handleClickType = async (val) => {

        await this.setState(prevState => ({
            ...prevState,
            currentNumber: '',
            parameters: {
            ...prevState.parameters,
                arguments: prevState.currentNumber !== '' ? [...prevState.parameters.arguments, parseFloat(prevState.currentNumber)] : prevState.parameters.arguments
        }
        }));

        if(this.state.parameters.arguments.length > 1) {
            await this.handleClickCalculate();
        }
        else {
            await this.setState(prevState => ({
                ...prevState,
                display: prevState.display + operarationModel.getSymbol(val),
                parameters: {
                    ...prevState.parameters,
                    type: val
                }
            }));
        }
    };

    handleClickCalculate = async () => {
        if(this.state.parameters.type) {
            await this.setState(prevState => ({
                ...prevState,
                parameters: {
                    ...prevState.parameters,
                    arguments: prevState.currentNumber !== '' ? [...prevState.parameters.arguments, parseFloat(prevState.currentNumber)] : prevState.parameters.arguments
                }
            }));
            await this.handleCalculate();
        }
    };

    handleCalculate = async (saveOperation = false) => {
        let response = await this.props.calculate(this.state.parameters);
        if(response && response.status === 200) {
            await this.setState({result: response.data.result});

            this.setState(prevState => ({
                ...prevState,
                display: this.state.result,
                currentNumber: this.state.result,
                parameters: {
                    ...prevState.parameters,
                    type: saveOperation ? this.state.parameters.type : '',
                    arguments: []
                }
            }));
        }
    }

    render() {
        return (
            <div className="calc">
                <div className="display">
                    <div>
                        <input type="" value={this.state.display} readOnly/>
                        <span><FormattedMessage id="home.calc.current"/></span>
                    </div>
                    <div>
                        <input type="" value={this.state.result} readOnly/>
                        <span><FormattedMessage id="home.calc.result"/></span>
                    </div>
                </div>
                <div className="numbers">
                    <ButtonList
                        handler={this.handleClickNumber}
                        list={[0,1,2,3,4,5,6,7,8,9]}
                    />
                </div>
                <div className="operations">
                    <ButtonList
                        handler={this.handleClickType}
                        list={operarationModel.operations}
                    />
                </div>
                <button onClick={() => {this.handleClickClear()}}>C</button>
                <button onClick={() => {this.handleClickCalculate()}}>=</button>
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
    calculate
})(Calc);