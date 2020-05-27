<?php
require 'connectMySQL.php';

if(isset($_POST["year"]))
{
    $year=$_POST["year"];
    $db = new MySQLDatabase();
    $db->connect();
    $query = "SELECT  userID, 
    bmi,
    date
    FROM bmi
    WHERE userID = 1 AND YEAR(date)=".$year.";";

    $result = $db->query($query);
    
    foreach($result as $row)
    {
        $output[] = array(
         'date'   => $row["date"],
         'bmi'  => intval($row["bmi"])
        );
    }
    
    echo json_encode($output);
   
}
?>