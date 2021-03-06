<?php
    require('mysqli_oop_connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST["username"];
        $message = $_POST["message"];
        if(strlen($username) > 0 && strlen($message) > 0) {
            $query = "INSERT INTO siddharthrathi_message_board.messages VALUES(null, ?, ?)";
            $statement = $mysqli -> prepare($query);
            $statement -> bind_param("ss", $username, $message);
            $statement -> execute();
            if($statement) {
                $data = "Success";
                header('Content-Type: application/json');
                echo json_encode($data);
            } else {
                $data = "Failure";
                header('Content-Type: application/json');
                echo json_encode($data);
            }
        } else {
            $data = "All Fields mandatory";
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }
?>