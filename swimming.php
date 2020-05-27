<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swimming</title>
    <!-- Bootstrap 4 CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Local CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="style/basketball.css"> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- YouTube API -->
    <!-- <script src="https://apis.google.com/js/api.js"></script>
    <script src = 'js/load.js'></script> -->
    <!-- HTML5 Gallery Plugin -->
    <script type="text/javascript" src="html5gallery/jquery.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/a243bedf71.js"></script>    

</head>
<body>
    <!-- Navigation Bar -->
    <?php include("header.php"); ?>
<!-- 
    <div class = "container">
        <button type="button" class="btn btn-primary" onclick = "sortByDate()">Date</button>
    </div> -->
    <!-- body -->
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div id = "swimmingVideoDisplay" class="html5gallery" data-skin="horizontal" data-width="480" data-height="272" 
            data-responsivefullscreen="true" data-responsive = 'true' style="display:none;" >
                <!-- Add Youtube video to Gallery -->
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <?php include('footer.php'); ?>

</body>
<script src = 'js/swimming.js'></script>

</html>