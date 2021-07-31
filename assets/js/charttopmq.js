var ctx = document.getElementById("quotation").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Berhasil",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#3C8DBC",
            borderColor: "#3C8DBC",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: [1, 2, 5, 10, 4, 6, 8]
        },
        {
            label: "Tidak",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#E36E66",
            borderColor: "#E36E66",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: [3, 4, 2, 9, 5, 7, 6]
        },
    ]
};

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