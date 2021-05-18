import React from 'react';
import logo from '../assets/logo.png';

function Example() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }
    return (
        <div className="sidebar-nav">
            <div className="logo">
                <img src={site_url+'/images/logo/logo.png'} />
            </div>
            <div className="side-links">
                <ul>
                    <li><a href={site_url+"/admin"}>Home</a></li>
                    <li><a href={site_url+"/admin/users"}>Utilizatori</a></li>
                    <li><a href={site_url+"/admin/polite"}>Polite</a></li>
                </ul>
            </div>
        </div>
    );
}

export default Example;
