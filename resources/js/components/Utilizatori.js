import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPencilAlt, faTrash, faPlusCircle, faCaretSquareUp } from '@fortawesome/free-solid-svg-icons';

function Utilizatori() {

    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
        site_url = "https://goasig.ro/platforma/public";
    }

    const [utilizatori, setUtilizatori] = useState([]);
    const [nume, setNume] = useState('');
    const [email, setEmail] = useState('');
    const [telefon, setTelefon] = useState('');
    const [parola, setParola] = useState('');
    const [editing, setEditing] = useState(false);
    const [adding, setAdding] = useState(false);
    const [mesaj, setMesaj] = useState('');
    const [user, setUser] = useState('');
    const [rol, setRol] = useState('');
    const [perioada, setPerioana] = useState('luna');
    const [termeni, setTermeni] = useState('');
    const [confirmare, setConfirmare] = useState(false);
    // const [site_url, setSite_url] = useState("http://127.0.0.1:8000");

    const getAllUtilizatori = () => {
        // axios.get('/users/all').then(res => {
        axios.get(site_url+'/users/all/'+perioada).then(res => {
            console.log(res);
            setUtilizatori(res.data);
        })
    }

    const editUser = (id) => {
        setEditing(true);
        setUser(id);
        // axios.get('/users/'+id).then(res => {
        axios.get(site_url+'/users/'+id).then(res => {
            console.log(res);
            setNume(res.data.nume);
            setEmail(res.data.email);
            setTelefon(res.data.telefon);
            setRol(res.data.role);
            setParola('');
            // setUtilizatori(res.data);
        })
    }

    const adaugaUser = (e) => {
        e.preventDefault();
        // axios.post('/admin/users', {
        axios.post(site_url+'/admin/users', {
            nume,
            email,
            telefon,
            rol,
            parola
        }).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            if(res.data.created == false){
                // console.log('email invalid');
                setMesaj('Emailul este deja asociat unui alt cont');
                setTimeout(() => {
                    setMesaj('');
                }, 3000);

            } else {
                getAllUtilizatori();
                cancelForm();
            }
            
        })
    }

    const confirmEditare = (e) => {
        e.preventDefault();
        setConfirmare(true);
    }

    const editareUser = (e) => {
        // e.preventDefault();
        // axios.post('/admin/users/'+user,{ 
        setConfirmare(false);
        axios.post(site_url+'/admin/users/'+user,{ 
            nume,
            email,
            telefon,
            rol,
            parola
        }).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res.data.edit);
            if(res.data.edit == false){
                // console.log('email invalid');
                setMesaj('Emailul este deja asociat unui alt cont');
                setTimeout(() => {
                    setMesaj('');
                }, 3000);
                setUser('');
            } else {
                getAllUtilizatori();
                cancelForm();
            }
        })
    }

    const deleteUser = (id) => {
        // axios.delete('/users/'+id).then(res => {
        axios.delete(site_url+'/users/'+id).then(res => {
            getAllUtilizatori();
            console.log(res);
        })
    }

    const schimbarePerioada = (e) => {
        setPerioana(e.target.value);
        axios.get(site_url+'/users/all/'+e.target.value).then(res => {
            console.log(res);
            setUtilizatori(res.data);
        })
    }

    const addUser = () => {
        setAdding(true);
    }

    const cancelForm = () => {
        setEditing(false);
        setAdding(false);
        setNume('');
        setEmail('');
        setParola('');
        setRol('');
        setTelefon('');
        setConfirmare(false);
    }

    const cautare = (e) => {
        setTermeni(e.target.value);
        if(e.target.value){
            axios.get(site_url+'/users/cautare/'+encodeURI(e.target.value)).then(res => {
                console.log(res);
                setUtilizatori(res.data);
            })
        } else {
            getAllUtilizatori();
        }
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
                <div className="heading top-50"><h1>Utilizatori</h1>
                <select value={perioada} onChange={(e) => schimbarePerioada(e)}>
                    <option value="azi">Azi</option>
                    <option value="luna">Luna trecuta</option>
                    <option value="an">Anul trecut</option>
                    <option value="total">Total</option>
                </select>
                <input type="text" value={termeni} onChange={(e)=>cautare(e)}/>

                {!adding && !editing ? <button id="add" onClick={() => addUser()}><FontAwesomeIcon icon={faPlusCircle} /></button> : '' }</div>
                
                {!adding && !editing ? 
                <div className="lista-utilizatori">
                    <table>
                        <thead>
                            <tr>
                                <th>Nume</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Actiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                    {utilizatori.length ? utilizatori.map( user => {
                        return(
                        <tr key={user.id}>
                            <td>{user.nume}</td>
                            <td>{user.email}</td>
                            <td>{user.telefon}</td>
                            <td><div className="actiuni">
                                <button id="edit" onClick={() => editUser(user.id)}><FontAwesomeIcon icon={faPencilAlt} /></button>
                                <button id="delete" onClick={() => deleteUser(user.id)}><FontAwesomeIcon icon={faTrash} /></button>
                                </div></td>
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara utilizatori</td></tr>}
                    </tbody>
                    </table>
                </div> : ''}
                {adding ? 
                <div className="add-form">
                    {mesaj.length ? <div className="mesaj-wrapper">{mesaj}</div> : ''}
                    <form id="add-user" onSubmit={(e)=>adaugaUser(e)}>
                        <label htmlFor="nume">Nume
                        <input type="text" name="nume" onChange={(e) => setNume(e.target.value)}/>
                        </label>
                        <label htmlFor="nume">Email
                        <input type="text" name="email"  onChange={(e) => setEmail(e.target.value)}/>
                        </label>
                        <label htmlFor="nume">Telefon
                        <input type="text" name="telefon"  onChange={(e) => setTelefon(e.target.value)}/>
                        </label>
                        <label htmlFor="rol">Rol
                        <select value={rol} onChange={(e) => setRol(e.target.value)}>
                            <option value="admin">Administrator</option>
                            <option value="partener">Partener</option>
                            <option value="user">Utilizator</option>
                        </select>
                        </label>
                        <label htmlFor="nume">Parola
                        <input type="password" name="parola"  onChange={(e) => setParola(e.target.value)}/>
                        </label>
                        <div className="actiuni">
                            <button type='submit'>Adauga</button>
                            <button type='button' onClick={()=> cancelForm()}>Cancel</button>
                        </div>
                        
                    </form>
                </div> : '' }
                {editing ? 
                <div className="add-form">
                    {mesaj.length ? <div className="mesaj-wrapper">{mesaj}</div> : ''}
                    
                    <form id="add-user" onSubmit={(e)=>confirmEditare(e)}>
                        <label htmlFor="nume">Nume
                        <input type="text" name="nume" value={nume} onChange={(e) => setNume(e.target.value)}/>
                        </label>
                        <label htmlFor="nume">Email
                        <input type="text" name="email" value={email}  onChange={(e) => setEmail(e.target.value)}/>
                        </label>
                        <label htmlFor="nume">Telefon
                        <input type="text" name="telefon" value={telefon}  onChange={(e) => setTelefon(e.target.value)}/>
                        </label>
                        <label htmlFor="rol">Rol
                        <select value={rol} onChange={(e) => setRol(e.target.value)}>
                            <option value="admin">Administrator</option>
                            <option value="partener">Partener</option>
                            <option value="user">Utilizator</option>
                        </select>
                        </label>
                        <label htmlFor="nume">Parola
                        <input type="password" autoComplete="new-password" name="parola"  onChange={(e) => setParola(e.target.value)}/>
                        </label>
                        <div className="actiuni">
                        <button type='submit'>Editeaza</button>
                        <button type='button' onClick={()=> cancelForm()}>Cancel</button>
                        </div>
                    </form>
                </div> : '' }
                {confirmare ? <div className="overlay"><div className="form-confirmare">
                    <h2>Esti sigur ca vrei sa editezi utilizatorul?</h2>
                    <div className="butoane-confirmare">
                        <button className="confirma" onClick={()=>editareUser()}>Editeaza</button>
                        <button className="renunta" onClick={()=> cancelForm()}>Renunta</button>
                    </div>
                </div></div> : ''}
            </div>
        </div>
    );
}

export default Utilizatori;

if (document.getElementById('utilizatori')) {
    ReactDOM.render(<Utilizatori />, document.getElementById('utilizatori'));
}
