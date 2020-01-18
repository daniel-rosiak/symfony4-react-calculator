import React from 'react';
import {Button} from "./";

class ButtonList extends React.Component {

    render() {
        let list = this.props.list || [];
        let handler = this.props.handler || {};
        let items = [];
        Object.keys(list).forEach(function (index) {
            items.push(<Button key={index}
                text={list[index]}
                handler={() => {handler(index)}}
            />);
        })
        return (<div>{items}</div>);
    }

}
export default ButtonList;