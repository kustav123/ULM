document.getElementById("customer-mob").addEventListener("blur", function() {
  var mobile = document.getElementById("customer-mob").value;

  // make an AJAX request to a PHP script that queries the database to retrieve the name corresponding to the mobile number
  if (mobile.trim() != "") {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // when the AJAX request is complete, update the name field in the form with the data returned by the PHP script
        var data = JSON.parse(this.responseText);
        if (data.name == "No Data") {
          // if the response indicates no data, clear the name field
          window.location.href = "addmem.php?mob=" + mobile;
        } else {
          // if data is available, update the name field in the form
          document.getElementById("customer-name").value = data.name;
        //   document.getElementById("id").value = data.id;
          document.getElementById("customer-type").value = data.type;
          document.getElementById("customer-add").value = data.add;
        }
      }
    };
    xhttp.open("GET", "ajax/ajax.php?mob=" + mobile, true);
    xhttp.send();
  }
});
