// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [],
    datasets: [{
      label: "Happy",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [],
      borderWidth: 1
    },
    {
      label: "UnHappy",
      backgroundColor: "rgba(255, 99, 132, 1)",
      borderColor: "rgba(255, 99, 132, 1)",
      data: [],
      borderWidth: 1
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 60
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 20,
          maxTicksLimit: 50
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});

// Fetch data from API and update chart
fetch('fetch_data')
  .then(response => response.json())
  .then(data => {
    myBarChart.data.labels = data.labelsx;
    myBarChart.data.datasets[0].data = data.datax1;
    myBarChart.data.datasets[1].data = data.datax2;
    myBarChart.update();
  });
