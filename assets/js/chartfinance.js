var ctx = document.getElementById("finance").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Project",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#0A9F82",
            borderColor: "#0A9F82",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: [1, 2, 5, 10, 4, 6, 8]
        }
    ]
};

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
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