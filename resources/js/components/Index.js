import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';

function Index() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [utilizatori, setUtilizatori] = useState([]);
    const [polite, setPolite] = useState([]);
    const [vehiculeLista, setVehiculeLista] = useState([]);
    const [nrUtilizatori, setNrUtilizatori] = useState(0);
    const [vehicule, setVehicule] = useState(0);
    const [nrPolite, setNrPolite] = useState(0);
    const [vanzari, setVanzari] = useState(0);
    const [perioada, setPerioana] = useState('luna');
    const [loading, setLoading] = useState(0);

    const getUtilizatori = (perioada) => {
        axios.get(site_url+'/users/date/'+perioada).then(res => {
            console.log(res);
            setNrUtilizatori(res.data);
        })
    }

    const getAllUtilizatori = () => {
        axios.get(site_url+'/users/all').then(res => {
            console.log(res);
            setUtilizatori(res.data.slice(0,5));
        })
    }

    const getAllPolite = () => {
        axios.get(site_url+'/polite/all').then(res => {
            console.log(res);
            setPolite(res.data.data.slice(0,5));
        })
    }

    const getAllVehicule = () => {
        axios.get(site_url+'/vehicule/all').then(res => {
            console.log(res);
            setVehiculeLista(res.data.slice(0,5));
        })
    }

    const getVehicule = (perioada) => {
        axios.get(site_url+'/vehicule/date/'+perioada).then(res => {
            console.log(res);
            setVehicule(res.data);
        })
    }

    const getPolite = (perioada) => {
        axios.get(site_url+'/polite/date/'+perioada).then(res => {
            console.log(res);
            setNrPolite(res.data);
        })
    }

    const getVanzari = (perioada) => {
        axios.get(site_url+'/vanzari/'+perioada).then(res => {
            console.log(res);
            setVanzari(res.data);
        })
    }

    const schimbarePerioada = (e) => {
        setPerioana(e.target.value);
        refresh(e.target.value);
    }

    const refresh = (perioada = 'luna') => {
        setLoading(1);
        getUtilizatori(perioada);
        getAllUtilizatori();
        getAllPolite();
        getAllVehicule();
        getVehicule(perioada);
        getPolite(perioada);
        getVanzari(perioada);
    }

    useEffect(() => { 
        setLoading(loading+1);
    }, [nrUtilizatori, vehicule, polite, vanzari])


    useEffect(() => {
        refresh();
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                <div className="heading top-50"><h1>Prezentare generala</h1>
                <select value={perioada} onChange={(e) => schimbarePerioada(e)}>
                    <option value="azi">Azi</option>
                    <option value="luna">Luna trecuta</option>
                    <option value="an">Anul trecut</option>
                    <option value="total">Total</option>
                </select>
                </div>
                {loading < 4 ? 
                <div className="placeholder"></div>
                :
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
                </div>}

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

                <h1 className="top-50">Vehicule adaugate recente</h1>
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Numar inmatriculare</th>
                                <th>Marca</th>
                                <th>Model</th>
                                <th>Proprietar</th>
                            </tr>
                        </thead>
                        <tbody>
                    {vehiculeLista.length ? vehiculeLista.map( vehicul => {
                        return(
                        <tr key={vehicul.nr_inmatriculare}>
                            <td>{vehicul.nr_inmatriculare}</td>
                            <td>{vehicul.marca}</td>
                            <td>{vehicul.model}</td>
                            <td>{vehicul.nume}</td>
                        </tr>
                        )
                    }) : <tr><td colSpan="4">Fara vehicule</td></tr>}
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
