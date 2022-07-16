import React, { Component } from 'react';

class PhoneButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { left: '3px', right: '3px' } : { left: '-75px', right: '75px' }
    return (
      <div id="conciergewp-phone-button" onClick={() => alert('test')} style={style}>
        Phone
      </div>
    );
  }
}

export default PhoneButton;
