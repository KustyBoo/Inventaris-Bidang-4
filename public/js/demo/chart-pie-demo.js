document.addEventListener('DOMContentLoaded', function () {
  var chartDataElement = document.getElementById('chartData');
  var chartData = JSON.parse(chartDataElement.getAttribute('data-chartdata'));
  
  var ctx = document.getElementById("myPieChart");

  var datapotong = chartData.barangmasuk.slice(-3);

  var datapotong1 = chartData.barangsemua.slice(-3);


  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: datapotong.map(item => item.nama_jenis_barang),
      datasets: [{
        data: datapotong1.map(item => item.banyak_barang),
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 20,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
});
