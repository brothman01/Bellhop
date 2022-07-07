import React from 'react';
import bell from './assets/images/bell-icon.png';

class App extends React.Component {

    constructor(props) {
        super(props);
        this.state = {date: new Date()};
      }

    function toggle() {
        alert('toggled');
    }

    render() {
        return (
        <div id="conciergewp-button" onClick={toggle}>
            <img id="conciergewp-button-image" src={bell} />
        </div>
      );
    }
  }
export default App;