import React, { Component } from 'react';
import bell from './assets/images/bell-icon.png';
import PhoneButton from './PhoneButton.js';

class App extends React.Component {

  constructor( props ) {
    super( props );
    this.state = { clicks: 1 };
  }

  toggle = () => {
    let clicks = this.state.clicks;
    this.state.clicks = this.state.clicks + 1;
    if ( clicks % 2 == 0 ) {
      alert( 'hide now' );
      this.state.top = 'top: 3px; bottom: 3px;';
    } else {
      alert( 'show now' );
      this.state.top = 'top: -50px; bottom: 75px;';
    }
  }

  render() {
    return (
      <div>
          <PhoneButton style={this.state.top} />
          <div id="conciergewp-button" onClick={this.toggle}>
            <img id="conciergewp-button-image" src={bell} />
          </div>
      </div>
    );
  }
}

export default App;