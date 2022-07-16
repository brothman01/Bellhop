import React, { Component } from 'react';
import bell from './assets/images/bell-icon.png';
import PhoneButton from './PhoneButton.js';

class App extends React.Component {

  constructor( props ) {
    super( props );
    this.state = {
      clicks: 1
    };
  }

  toggle = () => {
    this.setState( ( prevState, props ) => ( {
      clicks: prevState.clicks + 1
    } ) );
  }

  render() {
    return (
      <div>
          <PhoneButton clicks={this.state.clicks} />
          <div id="conciergewp-button" onClick={this.toggle}>
            <img id="conciergewp-button-image" src={bell} />
          </div>
      </div>
    );
  }
}

export default App;
