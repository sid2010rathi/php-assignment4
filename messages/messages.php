<?php
    require('mysqli_oop_connect.php');

    $query = "select * from siddharthrathi_message_board.messages";
    $data = array();
    
    if($result = $mysqli -> query($query)) {
        while($row = $result->fetch_array()) {
            $id = $row['id'];
            $username = $row['username'];
            $message = $row['message'];
            $data[] = array("id" => $id, "username" => $username, "message" => $message);
        }
        echo json_encode($data);
    } else {
        echo json_encode($mysqli -> error);
    }
?>