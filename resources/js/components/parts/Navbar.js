import React from 'react';
import logo from '../assets/logo.png';

function Example() {
    return (
        <div className="sidebar-nav">
            <div className="logo">
                <img src='/images/logo/logo.png' />
            </div>
            <div className="side-links">
                <ul>
                    <li><a href="/admin">Home</a></li>
                    <li><a href="/admin/users">Utilizatori</a></li>
                    <li><a href="/admin/polite">Polite</a></li>
                </ul>
            </div>
        </div>
    );
}

export default Example;
