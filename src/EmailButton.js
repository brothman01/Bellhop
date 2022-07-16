import React, { Component } from 'react';

class EmailButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { transition: 'left .3s ease, right .3s ease', left: '3px', right: '3px' } : { transition: 'left .3s ease, right .3s ease', left: '-155px', right: '155px' }
    const displ = this.props.clicks % 2 == 0 ? 'hidden' : 'showing_email';
    return (
      <div id="conciergewp-email-button" onClick={() => alert('test')} className={displ}>
        Email
      </div>
    );
  }
}

export default EmailButton;
