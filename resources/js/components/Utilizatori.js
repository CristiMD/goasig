import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Navbar from './parts/Navbar';
import axios from 'axios';

function Utilizatori() {

    const [utilizatori, setUtilizatori] = useState([]);
    const [nume, setNume] = useState('');
    const [email, setEmail] = useState('');
    const [telefon, setTelefon] = useState('');
    const [parola, setParola] = useState('');
    const [editing, setEditing] = useState(false);

    const getAllUtilizatori = () => {
        axios.get('/users/all').then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            setUtilizatori(res.data);
        })
    }

    const editUser = (id) => {
        setEditing(true);
    }

    const adaugaUser = (e) => {
        e.preventDefault();
        axios.post('/admin/users', {
            nume,
            email,
            telefon,
            parola
        }).then(res => {
        // axios.get('/platforma/public/users/all').then(res => {
            console.log(res);
            getAllUtilizatori();
        })
    }

    const deleteUser = (id) => {
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
                <h1 className="top-50">Utilizatori</h1>
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
                                <button id="edit" onClick={() => editUser(user.id)}>Edit</button>
                                <button id="delete" onClick={() => deleteUser(user.id)}>Delete</button>
                                </div></td>
                        </tr>
                        )
                    }) : <tr><td colSpan="3">Fara utilizatori</td></tr>}
                    </tbody>
                    </table>
                </div>
                <div className="add-form">
                    <form id="add-user" onSubmit={(e)=>adaugaUser(e)}>
                        <input type="text" name="nume" onChange={(e) => setNume(e.target.value)}/>
                        <input type="text" name="email"  onChange={(e) => setEmail(e.target.value)}/>
                        <input type="text" name="telefon"  onChange={(e) => setTelefon(e.target.value)}/>
                        <input type="password" name="parola"  onChange={(e) => setParola(e.target.value)}/>
                        <button type='submit'>Adauga</button>
                    </form>
                </div>
                {editing ? 
                <div className="add-form">
                    <form id="add-user" onSubmit={(e)=>adaugaUser(e)}>
                        <input type="text" name="nume" value={nume} onChange={(e) => setNume(e.target.value)}/>
                        <input type="text" name="email" value={email}  onChange={(e) => setEmail(e.target.value)}/>
                        <input type="text" name="telefon" value={telefon}  onChange={(e) => setTelefon(e.target.value)}/>
                        <input type="password" name="parola"  onChange={(e) => setParola(e.target.value)}/>
                        <button type='submit'>Editeaza</button>
                    </form>
                </div> : '' }
            </div>
        </div>
    );
}

export default Utilizatori;

if (document.getElementById('utilizatori')) {
    ReactDOM.render(<Utilizatori />, document.getElementById('utilizatori'));
}
