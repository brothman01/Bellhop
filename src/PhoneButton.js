import React, { Component } from 'react';

class PhoneButton extends React.Component {

  constructor( props ) {
    super( props );
  }

  render() {
    const style = this.props.clicks % 2 == 0 ? { transition: 'left .3s ease, right .3s ease', left: '3px', right: '3px' } : { transition: 'left .3s ease, right .3s ease', left: '-75px', right: '75px' }
    const displ = this.props.clicks % 2 == 0 ? 'hidden' : 'showing_phone';
    return (
      <div id="conciergewp-phone-button" onClick={() => alert('test')} className={displ} >
        {/* style={style} */}
        Phone
      </div>
    );
  }
}

export default PhoneButton;
