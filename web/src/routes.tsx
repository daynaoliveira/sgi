import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Login from './views/Login';
import Landing from './views/Landing';
import RetrievePassword from './views/RetrievePassword';

function Rotas(){
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Landing />}/>
                <Route path='/login' element={<Login />} />
                <Route path='/retrieve-password' element={<RetrievePassword />} />
            </Routes>
        </BrowserRouter>
    );
}

export default Rotas;