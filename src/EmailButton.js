import React, { Component } from 'react';

class EmailButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { left: '3px', right: '3px' } : { left: '-155px', right: '155px' }
    return (
      <div id="conciergewp-email-button" onClick={() => alert('test')} style={style}>
        Email
      </div>
    );
  }
}

export default EmailButton;
