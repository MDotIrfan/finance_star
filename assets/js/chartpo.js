
var ctx = document.getElementById("po").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Purchase Order",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#009900",
            borderColor: "#009900",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: total_po
        }
    ]
};

//mons

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        legend: {
            display: true
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