import React from 'react';
import bell from './assets/images/bell-icon.png';

function App() {

    constructor(props){
        super(props);
        this.state = { key: value };
      }

    function toggle() {
        alert('toggled');
    }

    return(
        <div id="conciergewp-button" onClick={toggle}>
            <img id="conciergewp-button-image" src={bell} />
        </div>
    );
}
export default App;