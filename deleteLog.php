<?php
    /*
    This PHP file is used to delete the log when the user click the 'delete' button
    */
    require 'connectMySQL.php';
    // Connect to databse
    $db = new MySQLDatabase();
    $db->connect();

    // Insert the log to database
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        /* note: id has not been set */
        $query = "DELETE from test WHERE eventID='$id'";
        $result = $db->query($query);
    }
    
?>