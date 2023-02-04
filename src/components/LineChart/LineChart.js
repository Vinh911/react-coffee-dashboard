import './LineChart.css';
import { useState, useEffect } from 'react';

const LineChart = () => {
    const [chartData, setChartData] = useState([]);

    return(
        <div className="line-chart">
            <h2>Line Chart</h2>
        </div>
    );
}

export default LineChart;