<?php
    /*
    This PHP file is used to load all the log into the calendar when the calendar is set.
    */
    require 'connectMySQL.php';
    // Connect to databse
    $db = new MySQLDatabase();
    $db->connect();

    $query = "SELECT * FROM test WHERE userID = 1";
    $result = $db->query($query);

    while($row = $result->fetch_assoc()) {
        $data[] = array(
        'id'    => $row["eventID"],
        'title'   => $row["sports"],
        'start'   => $row["start"],
        'end'   => $row["end"]
        );
    }

    echo json_encode($data);

?>