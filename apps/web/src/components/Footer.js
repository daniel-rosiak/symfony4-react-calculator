import React from 'react';
import {FormattedMessage} from 'react-intl';


const Footer = () => (
	<footer>
        <div className="content">
          <div className="info">
            <FormattedMessage id="footer.info"/>
          </div>
        </div>
      </footer>
);

export default Footer;