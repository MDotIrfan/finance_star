var ctx = document.getElementById("revenue").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Revenue",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#0A9F82",
            borderColor: "#0A9F82",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: total_revenue
        }
    ]
};

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        legend: {
            display: false
        },
        barValueSpacing: 20,
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                }
            }]
        }
    }
});