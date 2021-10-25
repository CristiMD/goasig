import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import Partener from './parts/Partener';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faTrash, faArrowLeft, faArrowRight } from '@fortawesome/free-solid-svg-icons';

function Parteneri() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [parteneri, setParteneri] = useState([]);
    const [paginaCurenta, setPaginaCurenta] = useState(1);
    const [paginaAnterioara, setPaginaAnterioara] = useState(null);
    const [paginaUrmatoare, setPaginaUrmatoare] = useState(null);
    const [email, setEmail] = useState('');
    const [telefon, setTelefon] = useState('');
    const [parola, setParola] = useState('');
    const [editing, setEditing] = useState(false);
    const [user, setUser] = useState('');
    const [perioada, setPerioana] = useState('luna');
    const [loading, setLoading] = useState(0);
    const [termeni, setTermeni] = useState('');
    const [link, setLink] = useState(site_url+'/parteneri/all');
    const [partener, setPartener] = useState({});
    const [detaliiPartener, setDetaliiPartener] = useState(false);

    const getAllUtilizatori = (link = site_url+'/parteneri/all', perioada, refresh = 0) => {
        let tmp_link = refresh ? link : link+'/'+perioada;
        axios.get(tmp_link).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            if(res.data) {
                setParteneri(res.data);
                // setPaginaCurenta(res.data.current_page);
                // setPaginaAnterioara(res.data.prev_page_url);
                // setPaginaUrmatoare(res.data.next_page_url);
            } else {
                setParteneri([]);
                // setPaginaCurenta('');
                // setPaginaAnterioara('');
                // setPaginaUrmatoare('');
            }
            
        })
    }

    const viewPolita = (id) => {
        setEditing(true);
        setUser(id);
        // axios.get('/users/'+id).then(res => {
        axios.get(site_url+'/parteneri/'+id).then(res => {
            console.log(res);
            setNume(res.data.nume);
            setEmail(res.data.email);
            setTelefon(res.data.telefon);
            setParola('');
            // setUtilizatori(res.data);
        })
    }

    const deletePolita = (id) => {
        // axios.delete('/users/'+id).then(res => {
        axios.delete(site_url+'/parteneri/'+id).then(res => {
            getAllUtilizatori(link, perioada);
            console.log(res);
        })
    }

    const schimbaPagina = (link) => {
        setLink(link);
        getAllUtilizatori(link, perioada, 1);
    }

    const schimbarePerioada = (e) => {
        setPerioana(e.target.value);
        // axios.get(site_url+'/users/all/'+e.target.value).then(res => {
            console.log();
            getAllUtilizatori(link,e.target.value);
            // setUtilizatori(res.data);
        // })
    }

    const openDetalii = (partener) => {
        console.log(partener)
        setPartener(partener);
        setDetaliiPartener(true);
    }

    const cautare = (e) => {
        setTermeni(e.target.value);
        if(e.target.value){
            axios.get(site_url+'/parteneri/cautare/'+encodeURI(e.target.value)).then(res => {
                console.log(res);
                setParteneri(res.data);
            })
        } else {
            getAllUtilizatori(link, perioada);
        }
    }

    useEffect(() => {
        getAllUtilizatori(site_url+'/parteneri/all','luna');
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                {!detaliiPartener ? <>
                <div className="heading top-50"><h1>Parteneri</h1>
                <select value={perioada} onChange={(e) => schimbarePerioada(e)}>
                    <option value="azi">Azi</option>
                    <option value="luna">Luna trecuta</option>
                    <option value="an">Anul trecut</option>
                    <option value="total">Total</option>
                </select>
                <input type="text" value={termeni} onChange={(e)=>cautare(e)}/>
                </div>
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Nume</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Actiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                    {parteneri.length ? parteneri.map( partener => {
                        return(
                        <tr key={partener.id}>
                            <td>{partener.nume}</td>
                            <td>{partener.telefon}</td>
                            <td>{partener.email}</td>
                            <td><div className="actiuni">
                                <button id="view" onClick={() => openDetalii(partener)}><FontAwesomeIcon icon={faEye} /></button>
                                <button id="delete" onClick={() => deletePolita(partener.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                </div>
                            </td> 
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara oferte</td></tr>}
                    </tbody>
                    </table>
                    {parteneri.length ? 
                        <div className="paginare">
                            <div className="butoane">
                                {paginaAnterioara ? <button id="delete" onClick={() => schimbaPagina(paginaAnterioara)}><FontAwesomeIcon icon={faArrowLeft} />Anterior</button> : ''}
                                <div className="current-page">{paginaCurenta}</div>
                                {paginaUrmatoare ?<button id="delete" onClick={() => schimbaPagina(paginaUrmatoare)}>Urmator<FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                            </div>
                        </div>
                    : ""}
                    
                </div> 
                </>
                : <Partener partener = {partener} />}
            </div>
        </div>
    );
}

export default Parteneri;

if (document.getElementById('parteneri')) {
    ReactDOM.render(<Parteneri />, document.getElementById('parteneri'));
}
