import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faTrash, faArrowLeft, faArrowRight } from '@fortawesome/free-solid-svg-icons';

function Oferte() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [oferte, setPolite] = useState([]);
    const [paginaCurenta, setPaginaCurenta] = useState(1);
    const [paginaAnterioara, setPaginaAnterioara] = useState(null);
    const [paginaUrmatoare, setPaginaUrmatoare] = useState(null);
    const [perioada, setPerioana] = useState('luna');
    const [termeni, setTermeni] = useState('');
    const [link, setLink] = useState(site_url+'/oferte/all');

    const getAllUtilizatori = (link = site_url+'/oferte/all', perioada, refresh = 0) => {
        let tmp_link = refresh ? link : link+'/'+perioada;
        axios.get(tmp_link).then(res => {
            if(res.data.data) {
                setPolite(res.data.data);
                setPaginaCurenta(res.data.current_page);
                setPaginaAnterioara(res.data.prev_page_url);
                setPaginaUrmatoare(res.data.next_page_url);
            } else {
                setPolite([]);
                setPaginaCurenta('');
                setPaginaAnterioara('');
                setPaginaUrmatoare('');
            }
            
        })
    }

    const deletePolita = (id) => {
        axios.delete(site_url+'/oferte/'+id).then(res => {
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
        getAllUtilizatori(link,e.target.value);
    }

    const cautare = (e) => {
        setTermeni(e.target.value);
        if(e.target.value){
            axios.get(site_url+'/oferte/cautare/'+encodeURI(e.target.value)).then(res => {
                // console.log(res);
                setPolite(res.data);
            })
        } else {
            getAllUtilizatori(link, perioada);
        }
    }

    useEffect(() => {
        getAllUtilizatori(site_url+'/oferte/all','luna');
    }, []);

    return (
        <div className="container">
            <div className="side">
                <Navbar />
            </div>
            <div className="page">
                <div className="heading top-50"><h1>Oferte</h1>
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
                    {oferte.length ? oferte.map( oferta => {
                        return(
                        <tr key={oferta.id}>
                            <td>{oferta.nr_inmatriculare}</td>
                            <td>{oferta.nume_proprietar} {oferta.prenume_proprietar}</td>
                            <td>{oferta.telefon}</td>
                            <td>{oferta.asigurator}</td>
                            <td>{oferta.suma}</td>
                            <td>{oferta.perioada} luni</td>
                            <td><div className="actiuni">
                                {/* <a id="view" target="_blank" href={polita["link-polita"]}><FontAwesomeIcon icon={faEye} /></a> */}
                                <button id="delete" onClick={() => deletePolita(oferta.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                </div></td>
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara oferte</td></tr>}
                    </tbody>
                    </table>
                    {oferte.length ? 
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

export default Oferte;

if (document.getElementById('oferte')) {
    ReactDOM.render(<Oferte />, document.getElementById('oferte'));
}
