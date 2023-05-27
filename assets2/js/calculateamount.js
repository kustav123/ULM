function calculateAmount(item) {
    // Get the values of the input fields
    var qty = parseInt(document.getElementById(item + "-qty").value);
    var rate = parseFloat(document.getElementById(item + "-rate").value);
  
    // Calculate the total amount
    var amount = qty * rate;
  
    // Update the amount input field with the calculated amount
    document.getElementById(item + "-amount").value = amount.toFixed(2);
  
    // Recalculate the subtotal
    updatetotal();
  }
  function updatetotal() {
    // Initialize the subtotal
    var subtotal = 0;
  
    // Loop through all items and add up the amounts
    var items = ["cpu", "motherboard", "hard-disk", "ssd", "ram" , "smps" , "monitor", "keyboard" , "mouse" , "ups" , "printer" , "gcard" , "pendrive" , "router"]; // Replace with your actual item names
    for (var i = 0; i < items.length; i++) {
      var item = items[i];
      var amountInput = document.getElementById(item + "-amount");
      if (amountInput) {
        var amount = parseFloat(amountInput.value);
        if (!isNaN(amount)) {
          subtotal += amount;
        }
      }
    }
  
    var cgst = subtotal* 0.09
    var sgst = subtotal* 0.09
    var total = subtotal + cgst + sgst
    // Update the subtotal input field with the calculated subtotal
    document.getElementById("subtotal").value = subtotal.toFixed(2);
    document.getElementById("cgst").value = cgst.toFixed(2);
    document.getElementById("sgst").value = sgst.toFixed(2);
    document.getElementById("total-amount").value = total.toFixed(2);


  }
  
    