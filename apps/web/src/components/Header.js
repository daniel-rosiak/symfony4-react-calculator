import React from 'react';
import {FormattedMessage} from 'react-intl';
import {connect} from 'react-redux';
import {setLang} from "../actions/Global";
import {Select} from "./header/";

class Header extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			languages:  [
				{
					title: 'PL',
					action: () => this.props.setLang('pl')
				},
				{
					title: 'EN',
					action: () => this.props.setLang('en')
				},
				{
					title: 'DE',
					action: () => this.props.setLang('de')
				}
			]
		}
	}

	render() {
		return (
			<header>
				<div className="main">
					<div className="content">
						<h1><FormattedMessage id="header.info"/></h1>
						<div className="language">
							<Select
								label={this.props.language.toUpperCase()}
								elements={this.state.languages}
							/>
						</div>
					</div>
				</div>
			</header>
		)
	}
}

const mapStateToProps = state => {
	return {
		language: state.global.lang
	}
};

export default connect(mapStateToProps, {
	setLang,
})(Header);