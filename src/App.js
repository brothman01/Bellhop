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
    const phonenum = bh_settings.phonenumber;
    const email = bh_settings.emailaddress;
    return (
      <div>
        <PhoneButton clicks={this.state.clicks} phonenumber={phonenum} />
        <EmailButton clicks={this.state.clicks} email={email}/>
        <div id="bellhop-button" onClick={this.toggle}>
          <img id="bellhop-button-image" src={bell} />

        </div>
      </div>
    );
  }
}

export default App;
