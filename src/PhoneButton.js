import React, { Component } from 'react';

class PhoneButton extends React.Component {

  constructor( props ) {
    super( props );
    this.state = { clicks: 1 };
  }

  toggle = () => {
    let clicks = this.state.clicks;
    this.state.clicks = this.state.clicks + 1;
    if ( clicks % 2 == 0 ) {
      alert( 'hide now' );
    } else {
      alert( 'show now' );
    }
  }

  render() {
    return (
      <div id="conciergewp-phone-button" onClick={this.toggle}>
        Phone
      </div>
    );
  }
}

export default PhoneButton;