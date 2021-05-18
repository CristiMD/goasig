import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';

function Index() {

    const [utilizatori, setUtilizatori] = useState([]);
    const [polite, setPolite] = useState([]);
    const [nrUtilizatori, setNrUtilizatori] = useState(0);
    const [vehicule, setVehicule] = useState(0);
    const [nrPolite, setNrPolite] = useState(0);
    const [vanzari, setVanzari] = useState(0);

    const getUtilizatori = () => {
        // axios.get('/users').then(res => {
        axios.get('/users').then(res => {
            console.log(res);
            setNrUtilizatori(res.data);
        })
    }

    const getAllUtilizatori = () => {
        // axios.get('/users/all').then(res => {
        axios.get('/users/all').then(res => {
            console.log(res);
            setUtilizatori(res.data.slice(0,5));
        })
    }

    const getAllPolite = () => {
        // axios.get('/polite/all').then(res => {
        axios.get('/polite/all').then(res => {
            console.log(res);
            setPolite(res.data.data.slice(0,5));
        })
    }

    const getVehicule = () => {
        // axios.get('/vehicule').then(res => {
        axios.get('/vehicule').then(res => {
            console.log(res);
            setVehicule(res.data);
        })
    }

    const getPolite = () => {
        // axios.get('/polite').then(res => {
        axios.get('/polite').then(res => {
            console.log(res);
            setNrPolite(res.data);
        })
    }

    const getVanzari = () => {
        // axios.get('/vanzari').then(res => {
        axios.get('/vanzari').then(res => {
            console.log(res);
            setVanzari(res.data);
        })
    }

    useEffect(() => {
        getUtilizatori();
        getAllUtilizatori();
        getAllPolite();
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
                            {nrUtilizatori}
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
                            {nrPolite}
                        </span>
                        <span className="text">
                            Polite generate
                        </span>
                    </div>
                    <div className="overview-child" id="total-vanzari">
                        <span className="count">
                            {vanzari} lei
                        </span>
                        <span className="text">
                            Total vanzari
                        </span>
                    </div>
                </div>

                <h1 className="top-50">Utilizatori</h1>
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Nume</th>
                                <th>Email</th>
                                <th>Telefon</th>
                            </tr>
                        </thead>
                        <tbody>
                    {utilizatori.length ? utilizatori.map( user => {
                        return(
                        <tr key={user.id}>
                            <td>{user.nume}</td>
                            <td>{user.email}</td>
                            <td>{user.telefon}</td>
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara utilizatori</td></tr>}
                    </tbody>
                    </table>
                </div>

                <h1 className="top-50">Polite recente</h1>
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Numar inmatriculare</th>
                                <th>Asigurator</th>
                                <th>Valoare</th>
                                <th>Perioada</th>
                            </tr>
                        </thead>
                        <tbody>
                    {polite.length ? polite.map( polita => {
                        return(
                        <tr key={polita.id}>
                            <td>{polita.nr_inmatriculare}</td>
                            <td>{polita.asigurator}</td>
                            <td>{polita.suma} lei</td>
                            <td>{polita.perioada} luni</td>
                        </tr>
                        )
                    }) : <tr><td colSpan="4">Fara polite</td></tr>}
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}

export default Index;

if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}
