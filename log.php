
<?php
    require 'connectMySQL.php';

    session_start();
    //connect to databse
    $db = new MySQLDatabase();
    $db->connect();

    $query = "SELECT  distinct(DATE_FORMAT(`date`,'%Y')) `year` FROM test GROUP BY Year(date) DESC";
    $result = $db->query($query);
    
	//check if the logout is requested by the client
    if (isset($_GET["logout"])) {
		//destroy the session = log out
        session_destroy();
		
		//redirect to the index-done.php page
        header("Location: homepage.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log page</title>

        <!-- Bootstrap core CSS & Javascript -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- FullCalendar library CSS & Javascript -->
        <link rel="stylesheet" href="fullcalendar-4.2.0/packages/core/main.css">
        <link rel="stylesheet" href="fullcalendar-4.2.0/packages/daygrid/main.css">
        <link rel="stylesheet" href="fullcalendar-4.2.0/packages/timegrid/main.css">
        <link rel="stylesheet" href="fullcalendar-4.2.0/packages/list/main.css">
        <script src='fullcalendar-4.2.0/packages/core/main.js'></script>
        <script src='fullcalendar-4.2.0/packages/daygrid/main.js'></script>
        <script src='fullcalendar-4.2.0/packages/timegrid/main.js'></script>
        <script src='fullcalendar-4.2.0/packages/interaction/main.js'></script>
        <script src='fullcalendar-4.2.0/packages/list/main.js'></script>
        
        <!-- Date Time Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

        <!-- Chart -->
        <script type="text/javascript" src="js/Chart.min.js"></script>

        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a243bedf71.js"></script>
        
        <!-- Tooltips -->
        <script src="https://unpkg.com/tooltip.js"></script>

        <!-- Custom JS & CSS -->
        <link rel="stylesheet" type="text/css" href="CSS/log.css">
        <link rel="stylesheet" type="text/css" href="CSS/visualisation.css">

    </head>

    <body>

        <!-- Navigation bar -->
        <?php require 'header.php';?>

        <!-- content --> 
        <div class="container py-5">

            <!-- Navs to calendar or visualization -->
            <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-calendar-tab" data-toggle="pill" href="#calendar" role="tab" aria-controls="pills-home" aria-selected="true" data-container="body">Calendar</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-analysis-tab" data-toggle="pill"  href="#analysis" role="tab" aria-controls="pills-profile" aria-selected="false">Visualization</a>
                </li>
            </ul>

            <!-- The calendar and visualization chart -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id='calendar' role="tabpanel" aria-labelledby="pills-home-tab">
                    <!--FullCalendar plugin will go into here-->
                </div>
                
                <div class="tab-pane fade clearfix" id = "analysis" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <div class="row my-5">

                        <div class="col-lg-5">
                        
                            <h2 class="card-title"> Monthly physical dashboard </h3>

                        </div>

                    
                        <div id="select" class="col-lg-5">
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


                
                    <div class="third widget line">
                        <div class="chart-legend">
                            <h3>Physical Activity duration monthly visualisation</h3>
                        </div>
                        <div class="canvas-container">
                            <canvas id="duration_chart"></canvas>
                        </div>
                    </div>

                    <div class="third widget line BMI">
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
        </div>
 
        <!-- Date Click Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="date_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mx-left">Record your sports activity now!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form" method="POST">
                            <div class="row mb-1 form-label-group">
                                    <label class="col-sm-4" for="title">Sport type</label>
                                    <input type="text" class="form-control col-sm-5" type="text" name="title" id="title" placeholder="The sport you play" />
                            </div>
                            <div class="row mb-1 form-label-group ">
                                    <label class="col-sm-4" for="starts_at">Starts at</label>
                                    <input type="text" class="form-control datetimepicker-input col-sm-5" id="starts_at" name="starts_at" data-toggle="datetimepicker" data-target="#starts_at"/>
                            </div>
                            <div class="row mb-1 form-label-group">
                                    <label class="col-sm-4" for="ends_at">Ends at</label>
                                    <input type="text" class="form-control datetimepicker-input col-sm-5" id="ends_at" name="ends_at" data-toggle="datetimepicker" data-target="#ends_at"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_event">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Event Click Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="event_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mx-left">View activity</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-1">
                                <label class="col-sm-4" for="title">Sport type</label>
                                <p class="col-sm-5" type="text" name="title" id="title"> </p>
                        </div>
                        <div class="row mb-1">
                                <label class="col-sm-4" for="starts_at">Starts at</label>
                                <p class="col-sm-5" id="starts_at" name="starts_at" data-target="#starts_at"> </p>
                        </div>
                        <div class="row mb-1">
                                <label class="col-sm-4" for="ends_at">Ends at</label>
                                <p class="col-sm-5" id="ends_at" name="ends_at" data-target="#ends_at"> </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="delete_event">Delete</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </body>

    <?php require 'footer.php'; ?>

</html>

<!-- auto load visualization page and scroll to BMI chart -->
<?php if (isset($_GET["visualization"]) && $_GET["visualization"] == "true"): ?>
<script>
    $(document).ready(function () {
        $('.nav-pills li:last-child a').tab('show');
        setTimeout(function(){
        $("html, body").animate({
            scrollTop: $('.BMI').offset().top}, 300);
        }, 1000);
    })
</script>

<?php endif; ?>

<!-- Calendar script -->
<script type="text/javascript">

    
    // Initialize the calender
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
            defaultView: 'dayGridMonth',
            header: {
            left: 'prev',
            center: 'title',
            right:'next'
            },
            footer: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                center: '',
                right:'today'
            },
            eventClick: function(info) {
                // Modal pop up
                $('#event_modal').modal('show');
                localStorage.setItem('id', info.event.id);
                // Load the title, start, end time to the modal
                start = moment(info.event.start, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                end = moment(info.event.end, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                
                $('#event_modal').find('#title').html(info.event.title);
                $('#event_modal').find('#starts_at').html(start);
                $('#event_modal').find('#ends_at').html(end);
                // change the border color after the physical log is clicked 
                info.el.style.borderColor = 'rgb(91, 137, 150)';
            },
            dateClick: function(info) {
                // Modal pop up
                $('#date_modal').modal('show');         
                $('#date_modal').find('#starts_at').val(info.dateStr + " 12:00");
                $('#date_modal').find('#ends_at').val(info.dateStr + " 13:00");
            },
            editable: true,
            // Trigger when dragging an activity log in the week/day view to change the time
            eventResize: function(info) {
                var start = moment(info.event.start, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                var end = moment(info.event.end, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                var id = info.event.id;
                if (!confirm("Record: " + info.event.title + "\nEnd is now: " + end + "\nIs this okay?")) {
                    info.revert();
                } else {
                    var duration = (moment(info.event.end, 'YYYY-MM-DDTHH:mm') - moment(info.event.start, 'YYYY-MM-DDTHH:mm'))/3600000; // convert to hour
                    $.ajax({
                        url:"updateLog.php",
                        type:"POST",
                        data:{start:start, end:end, id:id, duration:duration},
                        success:function(){
                            alert('Event Updated');
                        }
                    })
                }
            },

            // Trigger when drag the an activity log in the month/week view to change the date
            eventDrop: function(info) {
                var start = moment(info.event.start, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                var end = moment(info.event.end, 'YYYY-MM-DDTHH:mm').format('YYYY-MM-DD HH:mm');
                var id = info.event.id;
                if (!confirm("Record: " + info.event.title + "\nStart is now: " + start + "\nEnd is now: " + end + "\nIs this okay?")) {
                    info.revert();
                } else {
                    var duration = (moment(info.event.end, 'YYYY-MM-DDTHH:mm') - moment(info.event.start, 'YYYY-MM-DDTHH:mm'))/3600000; // convert to hour
                    $.ajax({
                        url:"updateLog.php",
                        type:"POST",
                        data:{start:start, end:end, id:id, duration:duration},
                        success:function(){
                            alert('Event Updated');
                        }
                    })
                }
            },
            // Tooltips for hovering at an activity log
            eventRender: function(info) {
                // Remove(!importent) then show tooltip when event is rendered 
                $('.tooltip').hide();
                var startTime = moment(info.event.start, 'YYYY-MM-DDTHH:mm').format('HH:mm');
                var endTime = moment(info.event.end, 'YYYY-MM-DDTHH:mm').format('HH:mm');
                $(info.el).tooltip({
                    title: info.event.title + ": from " + startTime + " to " + endTime + "\n DRAG me to edit date and time",
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
            },
            // Tooltips for hovering at a date grid
            dayRender: function(info) {
                $(info.el).tooltip({
                    title: "Click to create a log now!",
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
            },
            // customButtons: {
            //     custom1: {
            //         text: 'analysis',
            //         click: function() {
            //             document.location.href = "analysis_chart.php";
            //         }
            //     }
            // },
            
            events: 'loadLogs.php',
            
        });
        if ($(window).width() < 1000) {
            calendar.setOption('height', 650);
        } 
        
        calendar.render();
        
        // When user clicks "save" button in the date modal 
        $('#save_event').on('click', function() {
            var title = $('#title').val();
            if (title) {
                var duration =(new Date($('#ends_at').val()) - new Date($('#starts_at').val()))/3600000; // convert to hour  
                var eventData = {
                    title: title,
                    start: $('#starts_at').val(),
                    end: $('#ends_at').val()
                };
                $.ajax({
                    url: "createLog.php",
                    type: "POST",
                    data: {title:title, start:$('#starts_at').val(), end:$('#ends_at').val(), duration:duration},
                    success: function() {                        
                        calendar.refetchEvents();
                        alert("Success!");
                    }
                });
            }
            calendar.unselect();

            // Clear modal inputs
            $('#date_modal').find('input').val('').end();

            // hide modal
            $('#date_modal').modal('hide');
        });

        // When user clicks "delete" button in the event modal 
        $('#delete_event').on('click', function() {
            var id = localStorage.getItem('id');
            
            if(confirm("Are you sure you want to remove this log?")) {
                $.ajax({
                    url: "deleteLog.php",
                    type: "POST",
                    data: {id:id},
                    success: function() {
                        calendar.getEventById(id).remove();
                        alert("Removed!");
                    }
                });
            }
            calendar.unselect();

            // hide modal
            $('#event_modal').modal('hide');
        });        

    });

    // modal hide trigger 
    $("#event_modal").on("hidden.bs.modal", function () {
        // Clear modal inputs
        $('#event_modal').find('input').val('');
        localStorage.removeItem("id");
    });

    $("#date_modal").on("hidden.bs.modal", function () {
        // Clear modal inputs
        $('#date_modal').find('input').val('').end();
    });

    // Link the start and end time and set constraint: start < end
    $(function () {
        $('#starts_at').datetimepicker({
            format: "YYYY-MM-DD HH:mm", 

        });
        $('#ends_at').datetimepicker({
            useCurrent: false,            
            format: "YYYY-MM-DD HH:mm",
        });
        $("#starts_at").on("change.datetimepicker", function (e) {
            $('#ends_at').datetimepicker('minDate', e.date);
        });
        $("#ends_at").on("change.datetimepicker", function (e) {
            $('#starts_at').datetimepicker('maxDate', e.date);
        });
    });

</script>

<!-- Chart script -->
<script type="text/javascript">
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
                   backgroundColor: 'rgba(102,102,102,0.75)',
                   borderColor: 'rgba(200,200,200,0.75)',
                   hoverBackgroundColor:  'rgba(102,102,102,1)',
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
                   backgroundColor: 'rgba(102,102,102,0.75)',
                   borderColor: 'rgba(200,200,200,0.75)',
                   hoverBackgroundColor:  'rgba(102,102,102,1)',
                   data: bmi
               }
           ]
         
       }

       var ctx=$("#bmi_chart");
        if(window.line != undefined){
            window.line.destroy();
        }
            
        window.line  = new Chart(ctx,{
           type: 'line',
           data: chartdata,
           options : {
               scales: {
                   yAxes: [{
                   scaleLabel: {
                       display: true,
                       labelString: 'BMI'
                   },
                   ticks: {
                       beginAtZero: true
                   }
                   }],
                   xAxes: [{
                   scaleLabel: {
                       display: true,
                       labelString: 'date'
                   }
                   }],
               }
            }
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
                   backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                   data: duration
               }
           ]
         
       }

       var ctx=$("#sports_chart");
       if(window.pie != undefined){
            window.pie.destroy();
        }
            
        window.pie = new Chart(ctx,{
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