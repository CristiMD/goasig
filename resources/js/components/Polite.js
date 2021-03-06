import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faTrash, faArrowLeft, faArrowRight } from '@fortawesome/free-solid-svg-icons';

function Polite() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [polite, setPolite] = useState([]);
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
    const [link, setLink] = useState(site_url+'/polite/all');

    const getAllUtilizatori = (link = site_url+'/polite/all', perioada, refresh = 0) => {
        let tmp_link = refresh ? link : link+'/'+perioada;
        axios.get(tmp_link).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setPolite(res.data.data);
            setPaginaCurenta(res.data.current_page);
            setPaginaAnterioara(res.data.prev_page_url);
            setPaginaUrmatoare(res.data.next_page_url);
        })
    }

    const viewPolita = (id) => {
        setEditing(true);
        setUser(id);
        // axios.get('/users/'+id).then(res => {
        axios.get(site_url+'/polite/'+id).then(res => {
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
        axios.delete(site_url+'/polite/'+id).then(res => {
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

    const cautare = (e) => {
        setTermeni(e.target.value);
        if(e.target.value){
            axios.get(site_url+'/polite/cautare/'+encodeURI(e.target.value)).then(res => {
                console.log(res);
                setPolite(res.data);
            })
        } else {
            getAllUtilizatori(link, perioada);
        }
    }

    useEffect(() => {
        getAllUtilizatori(site_url+'/polite/all','luna');
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                <div className="heading top-50"><h1>Polite</h1>
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
                    {polite.length ? 
                        <div className="paginare">
                            <div className="butoane">
                                {paginaAnterioara ? <button id="delete" onClick={() => schimbaPagina(paginaAnterioara)}><FontAwesomeIcon icon={faArrowLeft} />Anterior</button> : ''}
                                <div className="current-page">{paginaCurenta}</div>
                                {paginaUrmatoare ?<button id="delete" onClick={() => schimbaPagina(paginaUrmatoare)}>Urmator<FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                            </div>
                        </div>
                    : ""}
                </div> 
            </div>
        </div>
    );
}

export default Polite;

if (document.getElementById('polite')) {
    ReactDOM.render(<Polite />, document.getElementById('polite'));
}
