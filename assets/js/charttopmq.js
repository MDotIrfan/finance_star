var ctx = document.getElementById("quotation").getContext("2d");
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
        {
            label: "Cost",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#3C8DBC",
            borderColor: "#3C8DBC",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: total_cost
        },
        {
            label: "Revenue",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#E36E66",
            borderColor: "#E36E66",
            pointHoverBackgroundColor: "#29B0D0",
            pointHoverBorderColor: "#29B0D0",
            data: total_revenue
        },
    ]
};

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        responsive: true,
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
        }
    },
    plugins: {
        tooltip: {
          callbacks: {
              
            label : function(tooltipItem, data){
                console.log(tooltipItem);
                var label = myBarChart.data.labels[tooltipItem.dataIndex];
                var value = myBarChart.data.datasets[tooltipItem.datasetIndex].data[tooltipItem.dataIndex];
                return label + ': Testing Cuy ' + value;
            }
          }
        }
      }
});