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
        <h1 className="title">List of Orders !</h1>
        <div className="filters border border-spacing-4 border-gray-200 rounded-lg p-4">
            <div className="flex justify-between items-center mb-4">
                <h2 className="text-lg font-bold">Filters</h2>
                <button onClick={getOrders} className="btn btn-primary">Reset</button>
            </div>
            <div className="flex">
                <div className="flex flex-col gap-2">
                    <label className="label">
                        <span className="label-text">Search Order name/description</span>
                    </label>
                    <input 
                        type="text" 
                        placeholder="Search by product name or description" 
                        onChange={(e) => {
                            e.preventDefault();
                            const searchTerm = e.target.value;
                            
                            if (searchTerm.trim() !== '') {
                                setOrders(prevOrders => prevOrders.filter(order => 
                                    order.attributes.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                                    order.attributes.description.toLowerCase().includes(searchTerm.toLowerCase())
                                ));
                            } else {
                                getOrders();
                                return;
                            }
                        }} 
                        className="input input-bordered w-full max-w-xs mb-4"
                    />
                </div>
                <div className="flex flex-col gap-2 ml-4">
                    <label className="label">
                        <span className="label-text">Search Products</span>
                    </label>
                    <input 
                        type="text" 
                        placeholder="Search by product name or description" 
                        onChange={(e) => {
                            e.preventDefault();
                            const searchTerm = e.target.value;
                            
                            if (searchTerm.trim() !== '') {
                                setOrders(prevOrders => prevOrders.filter(order => 
                                    order.relationships.products.some(product => 
                                        product.name.toLowerCase().includes(searchTerm.toLowerCase()) 
                                        // || product.description.toLowerCase().includes(searchTerm.toLowerCase())
                                    )
                                ));
                            } else {
                                getOrders();
                                return;
                            }
                        }} 
                        className="input input-bordered w-full max-w-xs mb-4"
                    />
                </div>
                <div className="flex flex-col gap-2 ml-4 flex-grow">
                    <label className="label">
                        <span className="label-text">Filter by status</span>
                    </label>
                    <select
                        onChange={(e) => {
                            e.preventDefault();
                            const status = e.target.value;
                            if (status === 'all') {
                                getOrders();
                                return;
                            }
                            setOrders(prevOrders => prevOrders.filter(order => order.attributes.status === status));
                        }}
                        className="select select-bordered w-full max-w-xs">
                            <option value="all">All</option>
                            <option value="F">Fulfilled</option>
                            <option value="C">Cancelled</option>
                            <option value="P">Pending</option>
                    </select>
                </div>
            </div>

        </div>

        <hr className='mb-8' />

        <div className="border border-spacing-4 border-gray-200 rounded-lg p-4">
            {orders.map(order => (
                <div key={order.id} className="card w-full mb-8">
                {/* Flex container for the title and buttons */}
                <div className="flex justify-between items-center mb-4">
                    {/* Order Name */}
                    <h1 className="card-title font-bold text-3xl">{ucwords(order.attributes.name)}</h1>
            
                    {/* Action Buttons */}
                    <div className="flex space-x-2">
                        {/* Show Button */}
                        <Link to={`/orders/${order.id}`} className="nav-link primary-btn flex items-center space-x-1">Show</Link>
            
                        {/* Edit Button */}
                        <Link to={`/orders/${order.id}/edit`} className="nav-link primary-btn flex items-center space-x-1">Edit</Link>
            
                        {/* Delete Button */}
                        <form onSubmit={handleDelete} id={order.id} className="inline">
                            <button type="submit" className="nav-link primary-btn flex items-center space-x-1">Delete</button>
                        </form>
                    </div>
                </div>
            
                {/* Flex container for the 2/3 and 1/3 layout */}
                <div className="flex">
                    {/* Left Section (2/3 of the page) */}
                    <div className="w-2/3 pr-4">
                        {/* Image and Description */}
                        <div className="flex">
                            {/* Placeholder Image */}
                            <div className="w-1/3">
                                <img
                                    src={`https://source.unsplash.com/random/300x300?${order.id}`}
                                    alt="Order Image"
                                    className="w-full h-auto rounded-lg"
                                />
                            </div>
            
                            {/* Order Description */}
                            <div className="w-2/3 pl-4">
                                <p className="card-text">{getStatusText(order.attributes.description)}</p>
                            </div>
                        </div>
            
                        {/* Additional Details */}
                        <div className="mt-4">
                            {/* Status Badge */}
                            <p className="card-text">
                                <span
                                    className={`inline-block px-3 py-1 rounded-full text-sm font-semibold ${
                                        order.attributes.status === "C"
                                            ? "bg-red-100 text-red-800" // Red for canceled
                                            : order.attributes.status === "F"
                                            ? "bg-green-100 text-green-800" // Green for fulfilled
                                            : "bg-yellow-100 text-yellow-800" // Yellow for pending
                                    }`}
                                    >
                                    {getStatusText(order.attributes.status)}
                                </span>
                                <br />
                                <span className="text-gray-600">{formatDate(order.attributes.date)}</span>
                            </p>
                        </div>
                    </div>
            
                    {/* Right Section (1/3 of the page) */}
                    <div className="w-1/3">
                        {/* Product Details Table */}
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
                </div>
            </div>
            ))}
        </div>
      </>
    );
}