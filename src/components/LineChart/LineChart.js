import './LineChart.css';
import { useEffect, useState } from 'react';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from 'chart.js';
import {Line} from 'react-chartjs-2';

const LineChart = () => {
    const [chartLabels, setChartLabels] = useState();
    const [chartDataPoints, setChartDataPoints] = useState();

    useEffect(() => {
        fetch("https://dashboard.bytebro.de/api/getRevenueByDay.php")
            .then(res => res.json())
            .then(data => {
                var labels = [];
                var dataPoints = [];
                data.forEach(element => {
                    labels.push(element["transaction_date"]);
                    dataPoints.push(element["total"]);
                });
                setChartLabels(labels);
                setChartDataPoints(dataPoints);
            })
    }, []);


    ChartJS.register(
        CategoryScale,
        LinearScale,
        PointElement,
        LineElement,
        Title,
        Tooltip,
        Legend
    );

const options = {
    plugins: {
        legend: {
        position: 'top',
        },
        title: {
        display: true,
        text: 'Revenue per Day',
        },
    },
};


    return(
        <div className="line-chart">
            <Line
                data={{
                    labels: chartLabels,
                    datasets: [
                        {
                            label: 'Sales for 04/2019',
                            data: chartDataPoints,
                            fill: false,
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderColor: 'rgba(75, 192, 192, 0.2)',
                        },
                    ],
                }}
                options={options}
            />
        </div>
    );
}

export default LineChart;