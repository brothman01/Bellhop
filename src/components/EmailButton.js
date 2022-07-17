import React, { Component } from 'react';
import email from '../assets/images/email-icon.png';

class EmailButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { transition: 'left .3s ease, right .3s ease', left: '3px', right: '3px' } : { transition: 'left .3s ease, right .3s ease', left: '-155px', right: '155px' }
    const displ = this.props.clicks % 2 == 0 ? 'hidden' : 'showing_email';
    return (
      <div id="conciergewp-email-button" onClick={() => alert('test')} className={`sub-button ${displ}`}>
        <img id="conciergewp-button-image" src={email} />
      </div>
    );
  }
}

export default EmailButton;
