import React, {useEffect, useState} from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSignOutAlt } from '@fortawesome/free-solid-svg-icons';
import { faEye, faTrash, faArrowLeft, faArrowRight } from '@fortawesome/free-solid-svg-icons';
import { truncate } from 'lodash';

function Partener(props) {
    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [polite, setPolite] = useState([]);
    const [politeSelectate, setPoliteSelectate] = useState([]);
    const [paginaCurenta, setPaginaCurenta] = useState(1);
    const [paginaAnterioara, setPaginaAnterioara] = useState(null);
    const [paginaUrmatoare, setPaginaUrmatoare] = useState(null);
    const [termeni, setTermeni] = useState('');
    const [link, setLink] = useState(site_url+'/polite/neplatite');
    const [vehicule, setVehicule] = useState(0);
    const [nrPolite, setNrPolite] = useState(0);
    const [vanzari, setVanzari] = useState(0);
    const [perioada, setPerioana] = useState('luna');
    const [loading, setLoading] = useState(0);
    const [comision, setComision] = useState(0);
    const [platit, setPlatit] = useState(false);
    const [neplatit, setNeplatit] = useState(true);


    const getPoliteNeplatite = (link = site_url+'/polite/neplatite', perioada, refresh = 0) => {
        let tmp_link = refresh ? link : link+'/'+perioada+'/'+props.partener.id;
        axios.get(tmp_link).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setPolite(res.data.data);
            setPaginaCurenta(res.data.current_page);
            setPaginaAnterioara(res.data.prev_page_url);
            setPaginaUrmatoare(res.data.next_page_url);
        })
    }


    const getPolitePlatite = (link = site_url+'/polite/platite', perioada, refresh = 0) => {
        let tmp_link = refresh ? link : link+'/'+perioada+'/'+props.partener.id;
        axios.get(tmp_link).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setPolite(res.data.data);
            setPaginaCurenta(res.data.current_page);
            setPaginaAnterioara(res.data.prev_page_url);
            setPaginaUrmatoare(res.data.next_page_url);
        })
    }


    const deletePolita = (id) => {
        axios.delete(site_url+'/polite/'+id).then(res => {
            getPoliteNeplatite(link, perioada);
            console.log(res);
        })
    }

    const schimbaPagina = (link) => {
        setLink(link);
        getPoliteNeplatite(link, perioada, 1);
    }

    const schimbarePerioada = (e) => {
        setPerioana(e.target.value);
        if(platit) {
            refresh(e.target.value, 'platite');
        } else {
            refresh(e.target.value, 'neplatite');
        }
    }

    const handleStatus = (tip, status, id = 0) => {
        if(tip == 'single') {
            axios.post(site_url+'/polite/comision/status', {
                ids: [id],
                status: status
            })
            .then(res => {
                console.log(res);
                setTab(status ? 'neplatit' : 'platit');
            })
        } else {
            axios.post(site_url+'/polite/comision/status', {
                ids: politeSelectate,
                status: status
            })
            .then(res => {
                console.log(res);
                setTab(status ? 'neplatit' : 'platit');
            })
        }
    }

    const cautare = (e) => {
        setTermeni(e.target.value);
        if(e.target.value){
            axios.get(site_url+'/polite/cautare/'+encodeURI(e.target.value)).then(res => {
                // console.log(res);
                setPolite(res.data);
            })
        } else {
            getPoliteNeplatite(link, perioada);
        }
    }

    const getComision = (perioada) => {
        axios.get(site_url+'/polite/comision/'+perioada+'/'+props.partener.id).then(res => {
            console.log(res);
            setComision(res.data);
        })
    }

    const getPolite = (perioada) => {
        axios.get(site_url+'/polite/date/'+perioada+'/'+props.partener.id).then(res => {
            console.log(res);
            setNrPolite(res.data);
        })
    }

    const getVanzari = (perioada) => {
        axios.get(site_url+'/vanzari/'+perioada+'/'+props.partener.id).then(res => {
            console.log(res);
            setVanzari(res.data);
        })
    }

    const setTab = (tab) => {
        if(tab == 'platit') {
            setPlatit(true);
            setNeplatit(false);
            setPoliteSelectate([]);
            setPaginaCurenta(1);
            setPaginaAnterioara(null);
            setPaginaUrmatoare(null);
            getPolitePlatite(site_url+'/polite/platite','luna');
        } else {
            setPlatit(false);
            setNeplatit(true);
            setPoliteSelectate([]);
            setPaginaCurenta(1);
            setPaginaAnterioara(null);
            setPaginaUrmatoare(null);
            getPoliteNeplatite(site_url+'/polite/neplatite','luna');
        }
    }

    const refresh = (perioada = 'luna', tip = 'neplatite') => {
        setLoading(1);
        // getUtilizatori(perioada);
        // getPoliteNeplatite();
        getPoliteNeplatite(site_url+'/polite/'+tip,perioada);
        // getAllPolite();
        // getAllVehicule();
        getComision(perioada);
        getPolite(perioada);
        getVanzari(perioada);
    }

    const selectRand = (e, id) => {
        console.log(e.target.checked);
        console.log(id);
        if(e.target.checked){
            setPoliteSelectate([...politeSelectate, id]);
        } else {
            setPoliteSelectate(politeSelectate.filter(polita => polita != id));
        }
        console.log(politeSelectate)
    }

    useEffect(() => { 
        setLoading(loading+1);
    }, [comision, polite, vanzari])


    useEffect(() => {
        refresh();
    }, []);

    // useEffect(() => {
    //     getPoliteNeplatite(site_url+'/oferte/all','luna');
    // }, []);

    return (
        <div className="partener">
            
            <div className="heading top-50"><h1>Parteneri</h1>
            <select value={perioada} onChange={(e) => schimbarePerioada(e)}>
                    <option value="azi">Azi</option>
                    <option value="luna">Luna trecuta</option>
                    <option value="an">Anul trecut</option>
                    <option value="total">Total</option>
                </select>
                <input type="text" value={termeni} onChange={(e)=>cautare(e)}/>
                </div>
                <div className="detalii">
                    <div><h3>Nume partener</h3>{props.partener.nume}</div>
                    <div><h3>Telefon</h3>{props.partener.telefon}</div>
                    <div><h3>Email</h3>{props.partener.email}</div>
                </div>
                {loading < 2 ? 
                <div className="placeholder"></div>
                :
                <div className="overview-container">
                    
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
                    <div className="overview-child" id="users-count">
                        <span className="count">
                            {comision} lei
                        </span>
                        <span className="text">
                            Comision total
                        </span>
                    </div>
                    <div className="overview-child" id="vehicule-count">
                        <span className="count">
                            {comision/2} lei
                        </span>
                        <span className="text">
                            Comision datorat
                        </span>
                    </div>
                </div>}
                <div className="wrapper-comision">
                    <div className="tab-navigation">
                        <button onClick={() => setTab('neplatit')} className={ neplatit ? 'activ' : ''}>Neplatite</button>
                        <button onClick={() => setTab('platit')} className={ platit ? 'activ' : ''}>Platite</button>
                    </div>
                    { neplatit ?
                    <div className="lista-utilizatori"> 
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
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
                                <td><input type="checkbox" onChange={(e) => selectRand(e, polita.id)}/></td>
                                <td>{polita.nr_inmatriculare}</td>
                                <td>{polita.nume_proprietar} {polita.prenume_proprietar}</td>
                                <td>{polita.telefon}</td>
                                <td>{polita.asigurator}</td>
                                <td>{polita.suma}</td>
                                <td>{polita.perioada} luni</td>
                                <td><div className="actiuni">
                                    <button id="delete" onClick={() => handleStatus('single', 1,polita.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                    <button id="delete" onClick={() => deletePolita(polita.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                    </div></td>
                            </tr>
                            )
                        }) : <tr><td colSpan="3">Fara polite</td></tr>}
                        </tbody>
                        </table>
                        {polite.length ? 
                            <div className="paginare">
                                <div className="multiple">
                                    {politeSelectate.length ?  <button id="delete" onClick={() => handleStatus('multi', 1)}>Seteaza ca platit <FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                                </div>
                                <div className="butoane">
                                    {paginaAnterioara ? <button id="delete" onClick={() => schimbaPagina(paginaAnterioara)}><FontAwesomeIcon icon={faArrowLeft} />Anterior</button> : ''}
                                    <div className="current-page">{paginaCurenta}</div>
                                    {paginaUrmatoare ?<button id="delete" onClick={() => schimbaPagina(paginaUrmatoare)}>Urmator<FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                                </div>
                            </div>
                        : ""}
                    </div> :
                    ''}
                    { platit ?
                    <div className="lista-utilizatori"> 
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
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
                                <td><input type="checkbox" onChange={(e) => selectRand(e, polita.id)}/></td>
                                <td>{polita.nr_inmatriculare}</td>
                                <td>{polita.nume_proprietar} {polita.prenume_proprietar}</td>
                                <td>{polita.telefon}</td>
                                <td>{polita.asigurator}</td>
                                <td>{polita.suma}</td>
                                <td>{polita.perioada} luni</td>
                                <td><div className="actiuni">
                                    <button id="delete" onClick={() => handleStatus('single', 0,polita.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                    <button id="delete" onClick={() => deletePolita(polita.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                    </div></td>
                            </tr>
                            )
                        }) : <tr><td colSpan="3">Fara polite</td></tr>}
                        </tbody>
                        </table>
                        {polite.length ? 
                            <div className="paginare">
                                <div className="multiple">
                                    {politeSelectate.length ?  <button id="delete" onClick={() => handleStatus('multi', 0)}>Seteaza ca neplatit <FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                                </div>
                                <div className="butoane">
                                    {paginaAnterioara ? <button id="delete" onClick={() => schimbaPagina(paginaAnterioara)}><FontAwesomeIcon icon={faArrowLeft} />Anterior</button> : ''}
                                    <div className="current-page">{paginaCurenta}</div>
                                    {paginaUrmatoare ?<button id="delete" onClick={() => schimbaPagina(paginaUrmatoare)}>Urmator<FontAwesomeIcon icon={faArrowRight} /></button> : ''}
                                </div>
                            </div>
                        : ""}
                    </div> :
                    ''}
                </div>
                
        </div>
    );
}

export default Partener;
