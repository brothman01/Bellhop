import React, { Component } from 'react';
import phone from './assets/images/phone-icon.png';

class PhoneButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const displ = this.props.clicks % 2 == 0 ? 'hidden' : 'showing_phone';
    return (
      <div id="conciergewp-phone-button" onClick={() => alert('test')} className={`sub-button ${displ}`} >
        <img id="conciergewp-button-image" src={phone} />
      </div>
    );
  }
}

export default PhoneButton;
