// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Define myLineChart variable
var myLineChart;

// Get the daylimit and store elements and add event listeners
var daylimit = document.getElementById('daylimit');
var store = document.getElementById('store');
daylimit.addEventListener('change', fetchDataAndUpdateChart);
store.addEventListener('change', fetchDataAndUpdateChart);

// Fetch data from database and create chart with default day limit and store
fetchDataAndUpdateChart();

function fetchDataAndUpdateChart() {
  // Fetch data from database with the selected day limit and store
  var selectedDayLimit = daylimit.value;
  var selectedStore = store.value;
  fetch('fetch_data.php?daylimit=' + selectedDayLimit + '&store=' + selectedStore)
    .then(response => response.json())
    .then(data => {
      // Update chart with fetched data
      myLineChart.data.labels = data.labels;
      myLineChart.data.datasets[0].data = data.data;
      myLineChart.update();
    })
    .catch(error => console.error(error));
}

// Create chart with fetched data
var ctx = document.getElementById("myAreaChart");
myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Customer",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [],
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
          maxTicksLimit: 40
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 40,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
