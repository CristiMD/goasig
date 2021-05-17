import React from 'react';
import logo from '../assets/logo.png';

function Example() {
    return (
        <div className="sidebar-nav">
            <div className="logo">
                <img src='https://goasig.ro/platforma/public/images/logo/logo.png' />
            </div>
            <div className="side-links">
                <ul>
                    <li><a href="/platforma/public/admin">Home</a></li>
                    <li><a href="/platforma/public/admin/users">Utilizatori</a></li>
                    <li><a href="/platforma/public/admin/polite">Polite</a></li>
                </ul>
            </div>
        </div>
    );
}

export default Example;
