import React from 'react';
import logo from '../assets/logo.png';

function Example() {
    return (
        <div className="sidebar-nav">
            <div className="logo">
                <img src={logo} />
            </div>
            <div className="side-links">
                <ul>
                    <li>Home</li>
                </ul>
            </div>
        </div>
    );
}

export default Example;
