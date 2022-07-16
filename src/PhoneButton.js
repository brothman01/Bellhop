import React, { Component } from 'react';

class PhoneButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { top: '3px', bottom: '3px' } : { top: '-50px', bottom: '75px' }
    return (
      <div id="conciergewp-phone-button" onClick={() => alert('test')} style={style}>
        Phone
      </div>
    );
  }
}

export default PhoneButton;
