<?php
    require('mysqli_oop_connect.php');

    $query = "select username, message from siddharthrathi_message_board.messages";
    
    if($result = $mysqli -> query($query)) {
        while($row = $result->fetch_object()) {
            echo "Username: " . $username . ". Message: " . $message
        }
    } else {
        echo "SQL error " . $mysqli -> error;
    }
?>