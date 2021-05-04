import * as React from "react";
import { render } from 'react-dom';
import axios from 'axios';

function App() {
    return (
        <h1>Admin</h1>
    );
}

export default App;

if (document.getElementById('react-admin')) {
    render(<App />
    , document.getElementById('react-admin'));
}
