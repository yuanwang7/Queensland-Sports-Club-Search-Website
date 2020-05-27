
<?php
    require 'connectMySQL.php';
    //connect to databse
    session_start();
	//check if the logout is requested by the client
    if (isset($_GET["logout"])) {
		//destroy the session = log out
        session_destroy();
		
		//redirect to the index-done.php page
        header("Location: homepage.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
    <head>
        <meta content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>

        <!-- Bootstrap core CSS & Javascript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a243bedf71.js"></script>

        <!-- Custom styles -->
        <link href="homepage.css" rel="stylesheet">
    </head>
    
        

        <body data-gr-c-s-loaded="true">
          <!-- navigation bar -->
          <?php require('header.php'); ?>

          <!-- Carousel gallery -->
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <!-- First carousel item -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <a href="login.php">
                    <div class="carousel-caption d-none d-md-block">
                      <h1 class="text-left"> <b>Find Sports </b></h1>
                        <p class="text-left"> About this website:</p>
                        <p class="text-left"> - Recommend sports for teenagers (14-19)</p>
                        <p class="text-left"> - Map location </p>
                        <p class="text-left"> - Real-time air quality </p>
                        <p class="text-left"> - On-line sports instruction </p>
                        <p class="text-left"> - Physical activity log </p>
                    </div>
                    <img class="d-block w-100 h-30" src="https://deco7180-c02t07.uqcloud.net/sport_img/yacht_back.jpg"  alt="First slide">
                  </a>
                </div>
                <!-- Second carousel item -->
                <div class="carousel-item">
                  <a href="log.php">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-top"> <b>Want to Try something NEW ? </b></h3>
                    </div>
                      <img class="d-block w-100 h-35" src="https://deco7180-c02t07.uqcloud.net/sport_img/background_2.jpg" alt="Second slide">
                    </div>
                 </a>
                 <!-- Third carousel item -->
                <div class="carousel-item">
                  <a href="search3.php">
                    <div class="carousel-caption d-none d-md-block">
                        <h6 class="text-top"> <b>Get Started now! </b></h6>
                    </div>
                  <img class="d-block w-100 h-25" src="https://deco7180-c02t07.uqcloud.net/sport_img/background_3.jpg" alt="Third slide">
                  </div>
                 </a>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
           
           <!-- card image -->
           <div class="container">
             <h3>You might Like</h3>
              <div class="card-deck">
                <div class="row">
                  <!-- First card image -->
                  <div class="col-lg-4 mb-3 p-0">
                    <div class="card text-center p-1">
                        <div class="embed-responsive embed-responsive-4by3 card_image ">
                          <img class="card-img-top embed-responsive-item" src="https://deco7180-c02t07.uqcloud.net/sport_img/badminton.jpg" alt="Card image">
                          <div class="overlay row m-0">
                            <div class="col-12 p-0 border-bottom">
                              <a href="search3.php?sports=Badminton">
                                <span class="">Find a badminton club</span>
                              </a>
                            </div>
                            <div class="col-12 p-0">
                              <a href="badminton.php">
                                <span>Watch some videos </span>
                              </a>
                            </div>  
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">Badminton</h4>
                          <p class="card-text">Badminton is a Healthy Active Sport, teenagers would benefit from it in respect of Brain Development. <b><a href="search3.php?sports=Badminton" target="_blank">Find out Clubs !</a></b></p>
                          <button  class="btn btn-primary1" onclick = "window.location.href = 'badminton.php'" data-toggle="tooltip" data-placement="bottom" title="Watch badminton videos now!">Watch Video</button>
                          <button  class="btn btn-primary2" onclick = "window.location.href = 'search3.php?sports=Badminton'" data-toggle="tooltip" data-placement="bottom" title="Find badminton clubs now!">Find Club</button>
                          
                        </div>
                    </div> 
                  </div>

                  <!-- Second card image -->
                  <div class="col-lg-4 mb-3 p-0">
                    <div class="card text-center p-1">
                        <div class="embed-responsive embed-responsive-4by3 card_image">
                          <img class="card-img-top embed-responsive-item" src="https://deco7180-c02t07.uqcloud.net/sport_img/cricket2.jpg" alt="Card image">
                          <div class="overlay row m-0">
                            <div class="col-12 p-0 border-bottom">
                              <a href="search3.php?sports=Cricket"> 
                                <span>Find a cricket club</span>
                              </a>
                            </div>
                            <div class="col-12 p-0">
                              <a href="cricket.php">
                                <span>Watch some videos </span>
                              </a>
                            </div>  
                          </div>
                        </div>
                        <div class="card-body">
                          <h4 class="card-title">Cricket</h4>
                          <p class="card-text"> Cricket is one of the most popular sports, it can develop teenagers’ Physical Health, Social and Team Skills. <b><a href="search3.php?sports=Cricket" target="_blank">Find out Clubs !</a></b></p>
                          <button class="btn btn-primary1" onclick = "window.location.href = 'cricket.php'" data-toggle="tooltip" data-placement="bottom" title="Watch cricket videos now!">Watch Video</button>
                          <button class="btn btn-primary2" onclick = "window.location.href = 'search3?sports=Cricket.php'" data-toggle="tooltip" data-placement="bottom" title="Find cricket clubs now!">Find Club</button>
                        </div>
                    </div>
                  </div>

                  
                  <div class="col-lg-4 mb-3 p-0">  
                    <div class="card text-center p-1">
                      <div class="embed-responsive embed-responsive-4by3 card_image">
                        <img class="card-img-top embed-responsive-item" src="https://deco7180-c02t07.uqcloud.net/sport_img/baseball3.jpg" alt="Card image">
                        <div class="overlay row m-0">
                          <div class="col-12 p-0 border-bottom">
                            <a href="search3.php?sports=Baseball">
                              <span>Find a baseball club</span>
                            </a>
                          </div>
                          <div class="col-12 p-0">
                            <a href="baseball.php">
                              <span>Watch some videos </span>
                            </a>
                          </div>  
                        </div>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title">Baseball</h4>
                        <p class="card-text"> Playing baseball is a Great full-body Cardiovascular Workout. Teenagers benefit physically and mentally. <b><a href="search3.php?sports=Baseball" target="_blank">Find out Clubs !</a></b></p>
                        <button class="btn btn-primary1" onclick = "window.location.href = 'baseball.php'" data-toggle="tooltip" data-placement="bottom" title="Watch baseball videos now!">Watch Video</button>
                        <button class="btn btn-primary2" onclick = "window.location.href = 'search3.php?sports=Baseball'" data-toggle="tooltip" data-placement="bottom" title="Find baseball clubs now!">Find Club</button>
                      </div>
                    </div>
                  </div>
                </div>
               <div id="moreContent"></div>
               <div class="pt-5 w-100 text-center">
                <a class="active classloader " href="#" onclick="return false;">View More</a>
               </div>
            </div>
   
   
          <!-- footer -->
          <?php require('footer.php'); ?>            
    </body>
</html>

<script>
  $(document).ready(function(){
    // When the "View more" button is clicked, load more content to the homepage
    $('.classloader').click(function(){
        $.ajax({url: "moreSports.php", success: function(result){
          $("#moreContent").html(result);
          $('.classloader').hide();
        }});
    });

    // When "Watch Video" button is clicked, navigate to the video page.
    /* Currently we have only one page of videos: soccer */
    // $(".btn").click(function(){
    //   document.location.href = "soccer.php";
    // });
})
</script>