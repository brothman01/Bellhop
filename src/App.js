import React, { Component } from 'react';
import bell from './assets/images/bell-icon.png';
import PhoneButton from './components/PhoneButton.js';
import EmailButton from './components/EmailButton.js';

class App extends React.Component {

  constructor( props ) {
    super( props );
    this.state = {
      clicks: 0
    };
  }

  toggle = () => {
    this.setState( ( prevState ) => ( {
      clicks: prevState.clicks + 1
    } ) );
  }

  render() {
    return (
      <div>
        <PhoneButton clicks={this.state.clicks} />
        <EmailButton clicks={this.state.clicks} />
        <div id="conciergewp-button" onClick={this.toggle}>
          <img id="conciergewp-button-image" src={bell} />
          {php.var1}
        </div>
      </div>
    );
  }
}

export default App;
