<?php
require 'connectMySQL.php';

if(isset($_POST["year"]))
{
    $year=$_POST["year"];
    $db = new MySQLDatabase();
    $db->connect();
    $query = "SELECT
    DATE_FORMAT(`date`,'%M') `month`,
    SUM(duration) `duration`
    FROM test
    WHERE userID = 1 AND YEAR(date)=".$year."
    GROUP BY MONTH(date)
    ORDER BY Month(date);";

    $result = $db->query($query);

    foreach($result as $row)
    {
        $output[] = array(
         'month'   => $row["month"],
         'duration'  => intval($row["duration"])
        );
    }
    
    echo json_encode($output);
   
}
?>