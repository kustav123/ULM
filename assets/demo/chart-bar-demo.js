// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Initialize bar chart
var ctx = document.getElementById("myBarChart");
if (ctx) { // check if ctx exists
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
        label: "Unhappy",
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
            max: 40,
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
}

// Fetch data from API and update chart
function fetchData(daylimit, store) {
  fetch(`fetch_data.php?daylimit=${daylimit}&store=${store}`)
    .then(response => response.json())
    .then(data => {
      myBarChart.data.labels = data.labelsx;
      myBarChart.data.datasets[0].data = data.datax1;
      myBarChart.data.datasets[1].data = data.datax2;
      myBarChart.update();
    })
    .catch(error => console.error(error));
}

// Handle dropdown change event for day limit and store
var daylimitDropdown = document.getElementById("daylimitx");
var storeDropdown = document.getElementById("storex");
if (daylimitDropdown && storeDropdown) { // check if both dropdowns exist
  daylimitDropdown.addEventListener("change", function() {
    var selectedDaylimit = daylimitDropdown.value;
    var selectedStore = storeDropdown.value;
    fetchData(selectedDaylimit, selectedStore);
  });

  storeDropdown.addEventListener("change", function() {
    var selectedDaylimit = daylimitDropdown.value;
    var selectedStore = storeDropdown.value;
    fetchData(selectedDaylimit, selectedStore);
  });

  // Initial data fetch
  fetchData(daylimitDropdown.value, storeDropdown.value);
}
