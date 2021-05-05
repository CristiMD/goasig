import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';

function Index() {

    const [utilizatori, setUtilizatori] = useState(0);
    const [vehicule, setVehicule] = useState(0);
    const [polite, setPolite] = useState(0);
    const [vanzari, setVanzari] = useState(0);

    const getUtilizatori = () => {
        axios.get('/platforma/public/users').then(res => {
            console.log(res);
            setUtilizatori(res.data);
        })
    }

    const getAllUtilizatori = () => {
        axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            // setUtilizatori(res.data);
        })
    }

    const getVehicule = () => {
        axios.get('/platforma/public/vehicule').then(res => {
            console.log(res);
            setVehicule(res.data);
        })
    }

    const getPolite = () => {
        axios.get('/platforma/public/polite').then(res => {
            console.log(res);
            setPolite(res.data);
        })
    }

    const getVanzari = () => {
        axios.get('/platforma/public/vanzari').then(res => {
            console.log(res);
            setVanzari(res.data);
        })
    }

    useEffect(() => {
        getUtilizatori();
        getAllUtilizatori();
        getVehicule();
        getPolite();
        getVanzari();
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                <h1>Prezentare generala</h1>
                <div className="overview-container">
                    <div className="overview-child" id="users-count">
                        <span className="count">
                            {utilizatori}
                        </span>
                        <span className="text">
                            Utilizatori inregistrati
                        </span>
                    </div>
                    <div className="overview-child" id="vehicule-count">
                        <span className="count">
                            {vehicule}
                        </span>
                        <span className="text">
                            Vehicule inregistrate
                        </span>
                    </div>
                    <div className="overview-child" id="polite-count">
                        <span className="count">
                            {polite}
                        </span>
                        <span className="text">
                            Polite generate
                        </span>
                    </div>
                    <div className="overview-child" id="total-vanzari">
                        <span className="count">
                            {vanzari}
                        </span>
                        <span className="text">
                            Total vanzari
                        </span>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Index;

if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}
