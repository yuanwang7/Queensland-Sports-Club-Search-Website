<?php
require 'connectMySQL.php';
//connect to databse
$db = new MySQLDatabase();
$db->connect();

$query = "SELECT  distinct(DATE_FORMAT(`date`,'%Y')) `year` FROM test GROUP BY Year(date) DESC";
$result = $db->query($query);

// print_r($result);
// foreach($result as $row) 
// {
//     echo $row["year"];
// }

?>
<!DOCTYPE html>  
<html>  
    <head>  
    <title>physical activity visualistion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/visualisation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    </head>

    <body>
        
        <div class="wrapper"> 
            <header>
                <div class="container clearfix">
                    <h3>Physical Activity log </h3>
                </div>
            </header>
            <div id = "center" class="container clearfix "> 
                <div class="panel-heading">
                    <div class="row">
                        
                        <div class="col-md-12">
                          
                            <h3 class="panel-title"> Monthly physical dashboard </h3>

                        </div>

                       
                        <div id="select" class="col-md-7">
                            <select name="year" class="form-control" id="year">
                            
                                <option value=""> Select year </option>
                                <?php
                                //default value is 2019, load 2019 first
                                //load all the year from the backend
                                foreach($result as $row) 
                                {
                                    echo '<option value="'.$row[year].'">'.$row["year"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

               
                <div class="third widget line">
                    <div class="chart-legend">
                        <h3>Physical Activity duration monthly visualisation</h3>
                    </div>
                    <div class="canvas-container">
                        <canvas id="duration_chart"></canvas>
                    </div>
                </div>

                <div class="third widget line">
                    <div class="chart-legend">
                        <h3>BMI monthly visualisation</h3>
                    </div>
                    <div class="canvas-container">
                        <canvas id="bmi_chart"></canvas>
                    </div>
                </div>
                
                <div class="third widget">
                    <div class="chart-legend">
                        <h3>Sports Type Pie Chart</h3>
                    </div>
                    <div class="canvas-container">
                        <canvas id="sports_chart"></canvas>
                    </div>
                </div>
            </div>

        </div>
                                
    </body>
    </html>

    
    <script type="text/javascript">
   
    var barGraph, lineGraph ,pieGraph;
    //load the monthly duration data, and output the chart into the 
    
    function load_monthly_duration(year, title)
    {
        
        var temp_title = title + ' '+year+'';
        
        $.ajax({
            url:"physicalData.php",
            method:"POST",
            data:{year:year},
            dataType:"JSON",
            success:function(data)
            {
                //console.log(data)
                drawDurationChart(data, temp_title);
                
               
            }
           
        });
    }

    
    //draw the monthly duration chart
    function drawDurationChart(chart_data, chart_title)
    {
        
        var jsonData = chart_data;

        var month =[];
        var duration= [];
        for(var i in jsonData){
            month.push(jsonData[i].month);
            duration.push(jsonData[i].duration);
        }

        
        var chartdata ={
            labels:month,
            datasets:[
                {
                    label: 'monthly physical activity',
                    backgroundColor: 'rgba(200,200,200,0.75)',
                    borderColor: 'rgba(200,200,200,0.75)',
                    hoverBackgroundColor:  'rgba(200,200,200,1)',
                    data: duration
                }
            ]
          
        }

        var ctx=$("#duration_chart");

        if(window.bar != undefined){
            window.bar.destroy();
        }
            
        window.bar = new Chart(ctx,{
            type: 'bar',
            data: chartdata,
            options : {
                scales: {
                    yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Duration'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                    }],
                    xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                    }],
                }
             }
        })
    }





    //load bmi
    function load_bmi(year, title)
    {
        
        var temp_title = title + ' '+year+'';
       
        $.ajax({
            url:"BMIdata.php",
            method:"POST",
            data:{year:year},
            dataType:"JSON",
            success:function(data)
            {
                
                drawlineChart(data, temp_title);
              // alert("test");
            }
           
        });
    }

    //draw bmi
    function drawlineChart(chart_data, chart_title)
    {
        //alert("test");
        var jsonData = chart_data;
        
        var date =[];
        var bmi= [];
        alert(jsonData);
        for(var i in jsonData){
            date.push(jsonData[i].date);
            bmi.push(jsonData[i].bmi);
        }
        //alert(jsonData);
        var chartdata ={
            labels:date,
            datasets:[
                {
                    label: 'BMI Line chart',
                    backgroundColor: 'rgba(200,200,200,0.75)',
                    borderColor: 'rgba(200,200,200,0.75)',
                    hoverBackgroundColor:  'rgba(200,200,200,1)',
                    data: bmi
                }
            ]
          
        }

        var ctx=$("#bmi_chart");

        if(window.line != undefined){
            window.line.destroy();
        }
            
        window.line = new Chart(ctx,{
            type: 'line',
            data: chartdata,
        })
    }




    //load sports pie chart data
    function load_sports_duration(year, title)
    {
        
        var temp_title = title + ' '+year+'';
        //alert("test");
        $.ajax({
            url:"sportsType.php",
            method:"POST",
            data:{year:year},
            dataType:"JSON",
            success:function(data)
            {
            
                drawPieChart(data, temp_title);
                
               
            }
           
        });
    }

    //draw the pie chart
    function drawPieChart(chart_data, chart_title)
    {
        var jsonData = chart_data;
        var sports =[];
        var duration= [];
        //alert(jsonData);
        for(var i in jsonData){
            sports.push(jsonData[i].sports);
            duration.push(jsonData[i].duration);
        }

        var chartdata ={
            labels:sports,
            datasets:[
                {
                    label: 'sports pie chart',
                    //backgroundColor: 'rgba(200,200,200,0.75)',
                    //borderColor: 'rgba(200,200,200,0.75)',
                    //hoverBackgroundColor:  'rgba(200,200,200,1)',
                    data: duration
                }
            ]
          
        }

        var ctx=$("#sports_chart");

        if(window.pie != undefined){
            window.pie.destroy();
        }
            
        window.pie=new Chart(ctx,{
            type: 'doughnut',
            data: chartdata,
        })
    }

    $(document).ready(function(){
        //alert("what");

        //load_monthly_duration(2019, 'Month activity Data For');

        load_monthly_duration('2019', 'what?');

        load_bmi('2019','linechart');

        load_sports_duration('2019', 'HAHA');

        

        $('#year').change(function(){
            var year = $(this).val();
            if(year != '')
            {
                load_monthly_duration(year, 'Month activity Data For');
                load_sports_duration(year, 'HAHA');
                load_bmi(year,'linechart')
            }
        });
    
    });
   
    //draw the monthly duration chart
    function drawDurationChart2(chart_data, chart_title)
    {
       
        var jsonData = chart_data;
       
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'duration');
        $.each(jsonData, function(i, jsonData){
            var month = jsonData.month;
            alert(month);
            var duration = jsonData.duration;
            alert(duration);
            data.addRows([[month, duration]]);

        });
        alert(data);
        var options = {
            title:chart_title,
            hAxis: {
                title: "Months"
            },
            vAxis: {
                title: 'duration'
            }
        };

        //draw the chart on the chart_area id div
        var chart = new google.visualization.LineChart(document.getElementById('line_chart_area'));
        chart.draw(data, options);
    }

  
</script>



