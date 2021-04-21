import * as React from "react";
import { render } from 'react-dom';
import { fetchUtils, Admin, Resource } from 'react-admin';
import restProvider from 'ra-data-simple-rest';
import jsonServerProvider from 'ra-data-json-server';


import { PostList, PostEdit, PostCreate, PostIcon } from './posts';

const httpClient = (url, options = {}) => {
    if (!options.headers) {
        options.headers = new Headers({ Accept: 'application/json' });
    }
    // add your own headers here
    options.headers.set('Access-Control-Expose-Headers', 'X-Total-Count'); //<----see here
    return fetchUtils.fetchJson(url, options);
};
const dataProvider = jsonServerProvider('http://jsonplaceholder.typicode.com', httpClient);


function App() {
    return (
        <Admin dataProvider={dataProvider}>
            <Resource name="posts" list={PostList} edit={PostEdit} create={PostCreate} icon={PostIcon} />
        </Admin>
    );
}

export default App;

if (document.getElementById('react-admin')) {
    render(<App />
    , document.getElementById('react-admin'));
}
