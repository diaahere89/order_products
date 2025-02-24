import { useContext, useEffect, useState } from 'react';
import { AppContext } from '../../context/context';
import { Link } from 'react-router-dom';

export default function Orders () {
    const { token } = useContext(AppContext);
    const [ orders, setOrders ] = useState([]);

    async function getOrders() {
        const res = await fetch('/api/v1/orders', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
            },
        });
        const data = await res.json();

        if (data.errors) {
            console.log(data.errors);
        }
        
        if (res.ok) {
            const list = data.data.sort((a, b) => b.id - a.id);
            setOrders(list);
        }
    }

    useEffect(() => {
        getOrders();
    }, []);

    async function handleDelete(e) {
        e.preventDefault();
        if (!window.confirm('Are you sure you want to delete this order?')) {
            return;
        }
        const res = await fetch(`/api/v1/orders/${e.target.id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
        
        const data = await res.json();
        console.log(data);
    }


    const ucwords = (str) => {
        return str.replace(/\b\w/g, char => char.toUpperCase());
    };

    const formatDate = (dateStr) => {
        const date = new Date(dateStr);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    };

    const getStatusText = (status) => {
        switch (status) {
            case 'F':
                return 'Fulfilled';
            case 'C':
                return 'Cancelled';
            case 'P':
                return 'Pending';
            default:
                return status;
        }
    };

    return (
      <>
          <div>
          <h1 className="title">List of Orders !</h1>
          </div>
            <div className="grid grid-cols-3 gap-4">
                {orders.map(order => (
                    <div key={order.id} className="card">
                        <h2 className="card-title font-bold">
                            {ucwords(order.attributes.name)}
                            
                            <span className="badge badge-primary mx-2 float-right">
                                <Link to={`/orders/${order.id}`}>Show | </Link>
                                <Link to={`/orders/${order.id}/edit`}>Edit | </Link>
                                <form onSubmit={handleDelete} id={order.id}>
                                    <button type='submit' className='nav-link'>Del</button>
                                </form>
                            </span>
                        </h2>
                        
                        <p className="card-text">Status: {getStatusText(order.attributes.status)}</p>
                        <p className="card-text">Date: {formatDate(order.attributes.date)}</p>
                        <table className="table-auto w-full">
                            <thead>
                                <tr>
                                    <th className="px-4 py-2">Product</th>
                                    <th className="px-4 py-2">Price</th>
                                    <th className="px-4 py-2">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                {order.relationships.products.map(product => (
                                    <tr key={product.id}>
                                        <td className="border px-4 py-2">{product.name}</td>
                                        <td className="border px-4 py-2">€{product.price}</td>
                                        <td className="border px-4 py-2">{product.pivot.quantity}</td>
                                    </tr>
                                ))}
                                <tr>
                                    <td className="border px-4 py-2 font-bold">Total</td>
                                    <td className="border px-4 py-2 font-bold">€{order.relationships.products.reduce((total, product) => total + product.price * product.pivot.quantity, 0).toFixed(2)}</td>
                                    <td className="border px-4 py-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                ))}
            </div>
      </>
    );
}