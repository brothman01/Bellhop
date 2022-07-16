import React, { Component } from 'react';
import bell from './assets/images/bell-icon.png';

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
    } else {
      alert( 'show now' );
    }
  }

  render() {
    return (
      <div id="conciergewp-button" onClick={this.toggle}>
        <img id="conciergewp-button-image" src={bell} />
      </div>
    );
  }
}

export default App;