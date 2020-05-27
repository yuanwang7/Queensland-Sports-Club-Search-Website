<?php
require 'connectMySQL.php';

if(isset($_POST["year"]))
{
    $year=$_POST["year"];
    $db = new MySQLDatabase();
    $db->connect();
    $query = "SELECT  userID, 
    sports,
    SUM(duration) `duration`
    FROM test
    WHERE userID = 1 AND YEAR(date)=".$year."
    GROUP BY sports
    ORDER BY SUM(duration)";

    $result = $db->query($query);

    foreach($result as $row)
    {
        $output[] = array(
         'sports'   => $row["sports"],
         'duration'  => intval($row["duration"])
        );
    }
    
    echo json_encode($output);
   
}
?>