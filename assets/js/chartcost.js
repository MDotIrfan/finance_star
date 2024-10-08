var ctx = document.getElementById("cost").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Cost",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#0A9F82",
            borderColor: "#0A9F82",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: total_cost
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
                    callback: function(value, index, values) {
                        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                }
            }],
            xAxes: [{
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                }
            }]
        },
    }
});