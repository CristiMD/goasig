import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faTrash } from '@fortawesome/free-solid-svg-icons';

function Polite() {

    const [polite, setPolite] = useState([]);
    const [nume, setNume] = useState('');
    const [email, setEmail] = useState('');
    const [telefon, setTelefon] = useState('');
    const [parola, setParola] = useState('');
    const [editing, setEditing] = useState(false);
    const [user, setUser] = useState('');

    const getAllUtilizatori = () => {
        axios.get('/polite/all').then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setPolite(res.data);
        })
    }

    const viewPolita = (id) => {
        setEditing(true);
        setUser(id);
        axios.get('/users/'+id).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setNume(res.data.nume);
            setEmail(res.data.email);
            setTelefon(res.data.telefon);
            setParola('');
            // setUtilizatori(res.data);
        })
    }

    const deletePolita = (id) => {
        axios.delete('/users/'+id).then(res => {
        // axios.delete('/platforma/public/users/'+id).then(res => {
            getAllUtilizatori();
            console.log(res);
        })
    }

    useEffect(() => {
        getAllUtilizatori();
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                <div className="heading top-50"><h1>Polite</h1></div>
                
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Numar inmatriculare</th>
                                <th>Nume proprietar</th>
                                <th>Telefon</th>
                                <th>Asigurator</th>
                                <th>Valoare</th>
                                <th>Perioada</th>
                                <th>Actiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                    {polite.length ? polite.map( polita => {
                        return(
                        <tr key={polita.id}>
                            <td>{polita.nr_inmatriculare}</td>
                            <td>{polita.nume_proprietar} {polita.prenume_proprietar}</td>
                            <td>{polita.telefon}</td>
                            <td>{polita.asigurator}</td>
                            <td>{polita.suma}</td>
                            <td>{polita.perioada} luni</td>
                            <td><div className="actiuni">
                                <a id="view" target="_blank" href={polita["link-polita"]}><FontAwesomeIcon icon={faEye} /></a>
                                <button id="delete" onClick={() => deletePolita(polita.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                </div></td>
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara polite</td></tr>}
                    </tbody>
                    </table>
                </div> 
            </div>
        </div>
    );
}

export default Polite;

if (document.getElementById('polite')) {
    ReactDOM.render(<Polite />, document.getElementById('polite'));
}
