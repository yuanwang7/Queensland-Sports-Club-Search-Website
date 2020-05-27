<?php
    /*
    This PHP file is used to insert new logs to the database.
    */
    

    // Insert the log to database
    if (isset($_POST['title'])) {
        // connect to database 
        $connect = new PDO('mysql:host=localhost;dbname=deco7180', 'root', '4e810d065ea25596');
        $start = $_POST['start'];
        $end = $_POST['end'];
        $duration = $_POST['duration'];
        $title = $_POST['title'];
        $date = explode(" ", $start)[0];
        /* note: id has not been set */
        $query = "INSERT INTO test (userID, start, end, date, duration, sports) VALUES ('1', ?, ?, ?, ?, ?)";
        $statement = $connect->prepare($query);
        $statement->execute([$start, $end, $date, $duration, $title]) ;
        
    }
    
?>