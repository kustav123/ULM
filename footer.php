<style>
    .chat-btn {
		position: absolute;
		right: 14px;
		bottom: 65px;
		cursor: pointer
	}


	.chat-btn i {
		transition: all 0.9s ease
	}

	#check:checked~.chat-btn i {
		display: block;
		pointer-events: auto;
		transform: rotate(180deg)
	}

	#check:checked~.chat-btn .comment {
		display: none
	}

	.chat-btn i {
		font-size: 22px;
		color: #fff !important
	}

	.chatmodal {
	display: none;
	position: fixed;
	right: 59px;
	bottom: 98px;
	margin: 0 auto;
	z-index: 999;
	width: 300px;
	height: 400px;
	background-color: #fff;
	border-radius: 5px;
	}

	.chat-btn {
	position: fixed;
	right: 14px;
	bottom: 65px;
	cursor: pointer;
	z-index: 1000;
	width: 50px;
	height: 50px;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50px;
	background-color: blue;
	color: #fff;
	font-size: 22px;
	border: none  
	} 

	

	.wrapper {
		/* position: absolute;
		right: 20px;
		bottom: 100px;
		width: 300px;
		background-color: #fff;
		border-radius: 5px;
		opacity: 0;
		transition: all 0.4s */
	}

	#check:checked~.wrapper {
		opacity: 1
	}
	.chatmodal-header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	background-color: #f1f1f1;
	padding: 10px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	}

	.chatmodal-title {
	margin: 0;
	}

	.close {
	font-size: 1.5rem;
	color: #888;
	cursor: pointer;
	}
	.header {
		padding: 13px;
		background-color: blue;
		border-radius: 5px 5px 0px 0px;
		margin-bottom: 10px;
		color: #fff
	}

	.chat-form {
		padding: 15px
	}

	.chat-form input,
	textarea,
	button {
		margin-bottom: 10px
	}

	.chat-form textarea {
		resize: none
	}

	.form-control:focus,
	.btn:focus {
		box-shadow: none
	}


	#check {
		display: none !important
	}
	.chatcontent {
	display: flex;
	align-items: center;
	padding: 0px;
	/* border-bottom: 1px solid #ddd; */
	}

	.chatcontent img {
	width: 50px;
	height: 50px;
	object-fit: cover;
	border-radius: 50%;
	margin-right: 10px;
	}

	.chatcontent .details {
	flex: 1;
	}

	.chatcontent .details span {
	font-size: 16px;
	font-weight: bold;
	}

	.chatcontent .details p {
	font-size: 14px;
	color: #666;
	}

	.users-list {
		padding: 10px;
		max-height: 345px;
		overflow-y: scroll;
	}

	.users-list a:not(:last-child) {
		display: flex;
		align-items: center;
		padding: 0px 10px;
		border-bottom: 1px solid #ddd;
		cursor: pointer;
		text-decoration: none;
	}

	.users-list a:last-child {
		display: flex;
		align-items: center;
		padding: 0px 10px;		
		cursor: pointer;
		text-decoration: none;
	}

	.users-list a:hover {
		background-color: #f2f2f2;
		box-shadow: 5px 5px 5px 2px rgba(0, 0, 0, 0.2);
	}

	.users-list .content {
	flex: 1;
	}

	.users-list .content .details {
	flex: 1;
	}

	.users-list .content .details span {
	font-size: 16px;
	font-weight: bold;
	}

	.users-list .content .details p {
	font-size: 12px;
	color: #666;
	}

	.users-list .status-dot {
	width: 10px;
	height: 10px;
	border-radius: 50%;
	margin-left: 10px;
	}

	.users-list .status-dot.offline {
	background-color: #bbb;
	}

	.users-list .status-dot.online {
	background-color: #07e896;
	}

	.users-list .status-dot.offline .fas {
	color: #bbb;
	}

	.users-list .status-dot.online .fas {
	color: #07e896;
	}
	.no-message-para{
		margin-bottom:5px !important;
	}
	.chat-user-name{
		/* padding:10px; */
		font-size:20px;
		color: blue;
	}

	.text{
		font-size:12px;
		padding : 10px;
	}

	.outgoing{
		text-align:end;
		padding-right : 10px;
		margin-bottom : 5px;
	}

	.incoming{
		padding-left : 10px;
		margin-bottom : 5px;
	}

	.inbox-chat-para{
		background-color: lightgray;
		display: inline;
		padding: 5px 10px;
		border-radius: 7px;
		font-style: italic;
		font-weight: 600;
	}
</style>



<div id="chatModal" class="chatmodal">
  	<div class="chatmodal-content">
    	<section class="chatusers">
      		<header>
				<?php 
					$sql = mysqli_query($link, "SELECT * FROM users WHERE id = {$_SESSION['id']}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
      			<div class="chatmodal-header">
    				<h3 class="chatmodal-title"> 
						<span class="chat-user-name"><?php echo  ucfirst($row['fname']). " " . ucfirst($row['lname'])  ?></span>
					</h3>
  				</div>
        
				<div class="chatcontent">
					<!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
          
					<!-- <div class="details"> -->
            			<!-- <span class="chat-user-name"><?php echo ucfirst($row['fname']). " " . ucfirst($row['lname']) ?></span> -->
            			<!-- <p><?php echo $row['status']; ?></p> -->
          			<!-- </div> -->
        		</div>
        		<!-- <a href="php/logout.php?logout_id=<?php echo $row['id']; ?>" class="logout">Logout</a> -->
      		</header>
      
			<!-- <div class="search">
        		<span class="text">Select an user to start chat</span>
        		<input type="text" placeholder="Enter name to search...">
        		<button><i class="fas fa-search"></i></button>
      		</div> -->
      	
			<div class="users-list" id="usersList">
				<div class="users-list-main">
					<?php
						$outgoing_id = $_SESSION['id'];
						$sql = "SELECT * FROM users WHERE NOT id = {$outgoing_id} ORDER BY onstatus DESC";
						$query = mysqli_query($link, $sql);
						
						$output = "";
						
						if(mysqli_num_rows($query) == 0){
							$output .= "No users are available to chat";
						}elseif(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_assoc($query)){
								$sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['id']}
										OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$outgoing_id} 
										OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

								$query2 = mysqli_query($link, $sql2);

								$row2 = mysqli_fetch_assoc($query2);

								(mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
								(strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
								if(isset($row2['outgoing_msg_id'])){
									($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
								}else{
									$you = "";
								}
								($row['onstatus'] == "1") ? $status_class = "online" : $status_class = "offline";
								($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";
					
								$output .= 
									'<a href="#" class="openChat" data-userid="'. $row['id'] .'">
										<div class="content">
											<div class="details">
												<span>'. ucfirst($row['fname']). " " . ucfirst($row['lname']) .'</span>
												<p class="no-message-para">'. $you . $msg .'</p>
											</div>
										</div>
										<div class="status-dot '. $status_class .'"><i class=""></i></div>
									</a>';
							}
						}
						echo $output;
						
					?>
				</div>
				<div class="chatcontent">
					<div id="chatWindow"></div>
				</div>
      		</div>
    	</section>
  	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<footer class="py-4 bg-black mt-auto">
    <div class="container-fluid px-4">
		<input type="checkbox" id="check">
		<label class="chat-btn" for="check">
  			<i class="fas fa-comment-dots"></i>
  			<!-- <i class="fa fa-close close"></i> -->
		</label>
  		<!-- <script src="chat/users.js"></script> -->
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Vasundhara 2023</div>
			
		</div>
	</div>
</footer>

<script>
	const modal = document.getElementById("chatModal");
	const btn = document.getElementById("check");

	btn.onclick = function() {
	if (modal.style.display == "none") {
		modal.style.display = "block";
	} else {
	modal.style.display = "none";
	}
	}

	// window.onclick = function(event) {
	//   if (event.target == modal || modal.contains(event.target)) {
	//     // do nothing, user clicked inside modal
	//   } else {
	//     // user clicked outside modal, hide modal
	//     modal.style.display = "none";
	//   }
	// }


	$(document).ready(function(){
		$('.openChat').click(function(e){
			e.preventDefault();
			var userId = $(this).data('userid');
			$.ajax({
				url: 'chat.php',
				type: 'GET',
				data: {
				user_id: userId
			},
			success: function(response){
				$('#chatWindow').html(response);
				$(".users-list-main").hide();
			}
			});
		});
	});

	function chat_back_arrow(){
		$('#chatWindow').html("");
		$(".users-list-main").show();
	}
  </script>