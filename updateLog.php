<?php

    /*
    This PHP file is used to update the log date/time when the user drag and drop a log item.
    */


    if(isset($_POST["id"])) {
        // connect to database 
        $connect = new PDO('mysql:host=localhost;dbname=deco7180', 'root', '4e810d065ea25596');
        $query = "UPDATE test SET start=:start_event, end=:end_event, duration=:duration WHERE eventId=:id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end'],
            ':id'   => $_POST['id'],
            ':duration'   => $_POST['duration']
            )
        );
    }

?>
