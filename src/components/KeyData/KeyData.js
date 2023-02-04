import './KeyData.css';
import { useState, useEffect } from 'react';
import DataField from './DataField';

const KeyData = () => {
    const [totalRevenue, setTotalRevenue] = useState([]);
    const [totalOrders, setTotalOrders] = useState([]);
    const [inHouseOrders, setInHouseOrders] = useState([]);

    useEffect(() => {
        fetch('https://dashboard.bytebro.de/api/getTotalRevenue.php')
            .then(res => res.json())
            .then(data => setTotalRevenue(data))
        
        fetch('https://dashboard.bytebro.de/api/getTotalOrders.php')
            .then(res => res.json())
            .then(data => setTotalOrders(data))

        fetch('https://dashboard.bytebro.de/api/getInstoreSales.php')
            .then(res => res.json())
            .then(data => setInHouseOrders(data))
    }, []);

    return (
        <div className="key-data">
            <DataField data={totalRevenue +"€"} label="Total Revenue" />
            <DataField data={totalOrders} label="Total Orders" />
            <DataField data={inHouseOrders} label="In House Orders" />

        </div>
    );
}

export default KeyData;