import React from 'react';
import {Link} from 'react-router-dom';
import {FormattedMessage} from 'react-intl';


class Select extends React.Component {


    renderElement = ({title, url = null, action = null}) => {
        if(action)
        {
            return (
                <li key={title}><a href="#" onClick={() => action()}><FormattedMessage id={title}/></a></li>
            )
        }
         else {
            return (
                <li key={title}><Link to={url}><FormattedMessage id={title}/></Link></li>
            )
        }
    }


    renderElements = () => {
        let elements = this.props.elements || [];
        let label = this.props.label || '';
        let selected = this.props.selected || '';

        return elements.map(element => {

            if(label !== element.title)
            {
               return(
                   this.renderElement(element)
               )
            }

        });

    }

    renderLabel = () => {
        let label = this.props.label || '';
        let borderBottom = this.props.borderBottom || false;

        return(
            <div>
                <FormattedMessage id={label}/>
            </div>
        )
    }
    
    render() {

        return(
            <div className="select">
                { this.renderLabel() }
                <ul>
                    { this.renderElements() }
                </ul>
            </div>

        )
    }
}

export default Select;
