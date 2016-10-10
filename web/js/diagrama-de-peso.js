/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016"],
    datasets: [{
        label: 'Nivel de conocimientos',
        data: [0, 1, 1, 3, 2, 3, 5, 7, 8, 7, 8, 10],
        backgroundColor: 'rgba(248,148,6, 0.1)',
        borderColor: 'rgba(248,148,6,1)',
        borderWidth: 5,
        pointRadius: 5,
        pointBackgroundColor: "rgba(248,148,6,1)",
        pointBorderWidth: 0,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(200,200,200,1)",
        pointHoverBorderColor: "rgba(200,200,200,1)",
        pointHoverBorderWidth: 0,
        pointHitRadius: 5,
        showLine: true,
        fill: true,
        //lineTension: 0.5,
      }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
    }
  }
});

