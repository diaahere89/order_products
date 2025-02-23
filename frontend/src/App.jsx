import  { BrowserRouter, Routes, Route } from 'react-router-dom'
import './App.css'
import Layout from './pages/Layout';
import Home from './pages/Home';
import Login from './pages/auth/login';
import { useContext } from 'react';
import { AppContext } from './context/context';
import Orders from './pages/orders/index';

export default function App() {
  const { user } = useContext(AppContext);
  

  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path='/orders' element={ user ? <Orders /> : <Login /> } />
          <Route path='/login' element={ user ? <Home /> : <Login /> } />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

