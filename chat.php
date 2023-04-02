<?php 
  include_once "config.php";
  session_start();
?>

<style>
  .wrapper {
    display: flex;
    /* justify-content: center; */
    /* align-items: center; */
    /* height: 100vh; */
  }

  .users {
    width: 270px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
  }

  .users header {
    display: flex;
    align-items: center;
    padding: 0;
    background-color: #f1f1f1;
    height: 50px;
  }

  .users header .content {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
    flex: 1; /* add this line */
  }

  .users header .content span {
    font-size: 18px;
    font-weight: bold;
  }

  .users header .content p {
    font-size: 8px;
    color: #666;
    margin: 0;
  }

  .users header .back-icon {
    color: #666;
    text-decoration: none;
    margin-right: 10px;    
  }

  .users header .back-icon:hover {
    color: #000;
  }

  .chat-box {
    height: 224px !important;
    overflow-y: scroll;
    flex: 1; /* add this line */
    padding: 0; /* change from 10px to 0 */
  }

  .typing-area {
    display: flex;
    align-items: center;
    padding: 0; /* change from 10px to 0 */
    background-color: #f1f1f1;
  }

  .typing-area .input-field {
    flex: 1;
    margin-right: 10px;
    padding: 5px;
    border: none;
    border-radius: 20px;
    outline: none;
  }

  .typing-area button {
    background-color: #0084ff;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }

  .typing-area button:hover {
    background-color: #0073e6;
  }

  .chat-back-arrow{
    cursor: pointer;
  }

</style>
<head>
<link href="https://use.fontawesome.com/releases/v6.1.0/css/all.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
      
        <?php 
          $user_id = mysqli_real_escape_string($link, $_GET['user_id']);
          $sql = mysqli_query($link, "SELECT * FROM users WHERE id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <!-- <a href="users.php" class="back-icon"> -->
        <span>
            <i class="fas fa-arrow-left chat-back-arrow" onclick = "chat_back_arrow()"></i>
            <?php echo ucfirst($row['fname']). " " . ucfirst($row['lname']) ?>
            <?php 
                ($row['status'] == "1") ? $status_class = "online" : $status_class = "offline"; 
                echo '<div class="status-dot '. $status_class .'" style="display: inline-block;"></div>';
            ?>
            
        </span>
        <!-- </a> -->
        

        <!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
        <div class="details">
          <!-- <span><?php //echo $row['fname']. " " . $row['lname'] ?></span> -->
          <!-- <p><?php //echo $row['status']; ?></p> -->
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fa fa-paper-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="chat/chat.js"></script>

</body>
</html>
