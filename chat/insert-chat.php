<?php 
    require_once ("../navbar.php");
    session_start();

    if(isset($_SESSION['id'])){
        include_once "../config.php";
        $outgoing_id = $_SESSION['id'];
        echo $outgoing_id ;
        $incoming_id = mysqli_real_escape_string($link, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($link, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($link, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>