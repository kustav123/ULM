
<head>
<style>
     #notificationTable {
        width: 100% !important;
      }
      div.dataTables_filter,
div.dataTables_length {
  display: inline-block;
  margin-left: 1em;
}
      .dataTables_length, .dataTables_filter {
            display: flex;
            align-items: center;
            gap: 10px;
}
.chat-time {
  color: #05226F ;
}

.chat-user {
  color: #168F07;
}

.chat-msg {
  color: #6F0631;
}
.modal-header {
    background-color: #6c5ce7;
    color: white;
  }
  .modal-body {
    background-color: #dfe6e9;
    color: black;
  }
  #chat-message {
    background-color: #ffffff;
    color: black;
  }
  .btn-primary {
    background-color: #ff7675;
    border-color: #ff7675;
  }
   
</style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sales Report</title>
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- <link href="https://use.fontawesome.com/releases/v6.1.0/css/all.css" rel="stylesheet"> -->




</head>
    
<body>
        <!-- Modal chat-->

<div class="modal fade" id="chat-modal" tabindex="-1" role="dialog" aria-labelledby="chat-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="chat-modal-label">Group Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="chat-box"></div>
        <form id="chat-form">
          <div class="input-group">
            <input type="text" id="chat-message" class="form-control" placeholder="Type your message here...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Send</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
       <!-- Modal failed login-->
<div class="modal fade" id="inboxModal" tabindex="-1" aria-labelledby="inboxModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inboxModalLabel">Inbox Messages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
  <table id="notificationTable" class="table" >
    <thead>
      <tr>
        <th scope="col">Sender</th>
        <th scope="col">Subject</th>
        <th scope="col">Date</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<script>
$(document).ready(function() {
  // Load chat history when the modal is opened
  function longPoll() {
  $.ajax({
    url: '/ulm/ajax.php?type=1',
    type: 'GET',
    success: function(data) {
      // Parse the JSON response
      var messages = JSON.parse(data);
      $('#chat-box').empty();

      // Format the chat messages and append them to the chat box
      for (var i = 0; i < messages.length; i++) {
        var message = messages[i];
        var formattedMessage = '<div class="chat-message">';
        formattedMessage += '<span class="chat-time">' + message.time +'</span>';
        formattedMessage += ' -- ';
        formattedMessage += '<span class="chat-user">' + message.user + '</span>';
        formattedMessage += ' -- ';
        formattedMessage += '<span class="chat-msg">' + message.msg + '</span>';
        formattedMessage += '</div>';
        $('#chat-box').append(formattedMessage);
      }

      // Long-poll again after receiving the response
      longPoll();
    },
    error: function(xhr, status, error) {
      console.log(error);

      // Long-poll again after an error
      longPoll();
    }
  });
}

// Start the long-polling process when the modal is shown
$('#chat-modal').on('shown.bs.modal', function() {
  $('#chat-box').empty();
  longPoll();
});

  // Submit new chat message
  $('#chat-form').submit(function(e) {
    e.preventDefault();

    // Get the chat message from the input field
    var chatMessage = $('#chat-message').val();

    // Send the chat message to the server using AJAX
    $.ajax({
      url: '/ulm/submit-chat-message.php',
      type: 'POST',
      data: { message: chatMessage },
      success: function(data) {
        // Clear the input field after the message is sent
        $('#chat-message').val('');

        // Append the new message to the chat box
        $('#chat-box').append(data);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
  $('.modal-header button.close').click(function() {
    $('#chat-modal').modal('hide');
  });
});

</script>
<script>
$(document).ready(function() {


    function checkUnreadNotifications() {
        var username = '<?php echo $_SESSION['username'] ?>';
        $.ajax({
            type: "GET",
            url: "ajax.php",
            data: {nusername: username },
            success: function(response){
                if (response > 0) {
                    $('#inboxModalBtn').html('<i class="fas fa-bell"></i> <span class="badge bg-danger">'+response+'</span>');
                } else {
                    $('#inboxModalBtn').html('<i class="fas fa-bell"></i>');
                }
            }
        });
    }

    // Call the function on page load
    checkUnreadNotifications();

    // Set interval to call the function every 5 seconds
    setInterval(checkUnreadNotifications, 5000);
    
    var table = $('#notificationTable').DataTable( {

        "ajax": {
            "url": "ajax.php",
            "dataSrc": "" ,
            data: {lusername: '<?php echo $_SESSION['username'] ?>' } ,
        },
        "columns": [
            { "data": "fromuser" },
            { "data": "sub" },
            { "data": "time" },
            {
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": '<i class="fas fa-book-reader"></i>',
                "render": function (data, type, row, meta) {
                        if ( !row.ack.includes('<?php echo $_SESSION['username'] ?>')) {
                            return '<i class="fas fa-envelope fa-fw text-danger"></i>'; // add text-danger class to display red envelope icon
                        } else {
                            return '<i class="fas fa-envelope-open fa-fw text-success"></i>'; // use regular envelope icon for messages that have been read
                        }
                    }
            },
            { "data": "msg", "visible": false }
        ],
        "order": [[ 2, "desc" ]]
    } );


    // Add event listener for opening and closing details
    $('#notificationTable tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');

            // Mark notification as read
            var ack = '<?php echo $_SESSION['username'] ?>';
            var id = row.data().id;
            $.ajax({
                type: "GET",
                url: "ajax.php",
                data: {nid: id, ack: ack},
                success: function(response){
                    console.log(response);
                }
            });
            $(this).html('<i class="fas fa-check fa-fw text-success"></i>');

        }
    } );
} );

// Format child row
function format ( d ) {
    // Check if message is empty
    if (d.msg.trim() === '') {
        return '<div class="child-row">No message available</div>';
    }
    
    // Otherwise, display message
    return '<div class="child-row">'+d.msg+'</div>';
}
</script>

      </div>
    </div>
  </div>
</div>

<nav class="sb-topnav navbar navbar-expand navbar-dark text-white">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="in.php">Vasundhara</a>
    
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-lg-0">
        <li class="nav-item">
            <div class="input-group">
            <button class="btn btn-link" type="button" id="groupChatModalBtn" data-bs-toggle="modal" data-bs-target="#chat-modal"><i class="fas fa-comments"></i></button>
            <button class="btn btn-link" type="button" id="inboxModalBtn" data-bs-toggle="modal" data-bs-target="#inboxModal"><i class="fas fa-bell"></i></button>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw  text-white"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="activity.php">Activity Log</a></li>
                <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
        <!-- Sidebar Toggle-->
        <li class="nav-item">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </li>
    </ul>
</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading  text-white"><?php  echo "Loged in as  ". $_SESSION["username"]?></div>
                            <div class="sb-sidenav-menu-heading text-white">For C.R.E</div>
                            <!-- <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> -->
                            
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Entry
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Coustomer
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="addcus.php">Add Coustomer</a>
                                           
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Sales
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="in.php">Sales Start</a>
                                            <a class="nav-link" href="out.php">Sales End</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->
                            <a class="nav-link" href="addcus.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                Add Coustomer
                            </a>
                            <a class="nav-link" href="in.php">
                                <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-store"></i></div>
                                Sales Start
                            </a>
                            <a class="nav-link" href="out.php">
                                <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-cart-shopping"></i></div>
                                Sales End
                            </a>
                            <a class="nav-link" href="fup.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-phone-volume"></i></div>
                                Follow Up
                            </a>
                            
                    </div>
                    <a class="nav-link" href="mess.php">Send Notification</a>

                </nav>
            </div>