import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSignOutAlt } from '@fortawesome/free-solid-svg-icons';

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
                    <li><a href={site_url+"/admin/oferte"}>Oferte</a></li>
                    <li><a href={site_url+"/admin/parteneri"}>Parteneri</a></li>
                </ul>
            </div>
            <div className="side-links bottom-links">
                <ul>
                    <li><a href={site_url+"/"}><FontAwesomeIcon icon={faSignOutAlt} /> Inapoi in site</a></li>
                </ul>
            </div>
        </div>
    );
}

export default Example;
