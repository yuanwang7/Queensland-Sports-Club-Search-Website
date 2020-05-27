<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8">
    
        <title>User Profile page</title>

        <!-- Bootstrap core CSS & Javascript -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a243bedf71.js"></script>
        <!-- Custom js -->
        <script src="js/log.js"></script>
        <style>
            /* Record card start */
            .singleClub {
                text-align: center;
                padding: 20px;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            }
            .clubTitle h4 {
                font-size: 24px;
                text-transform: uppercase;
                font-weight: 600;
            }
            /* Record card end */
        </style>
        <!-- Custom styles for this template -->
        <link href="CSS/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navigation bar -->
        <?php require 'header.php';?>

        <!-- content --> 
        <div class="container" id="edit">
            <div>
                <p> Hi <?php echo $username?>, Your BMI is <?php echo $username?>. You can update them by changing your height or weight!
            </div>
            <form id="form-update" action="UserProfile.php" method="POST">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="firstname" type="text" value="<?php echo $firstname; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="lastname" type="text" value="<?php echo $lastname; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Height</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="height" type="text" value="<?php echo $height; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Weight</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="phone" type="text" value="<?php echo $weight; ?>">
                    </div>
                </div>

                <!-- BMI result --> 
                <div id="bmi">
                </div>
                <div class="form-group row">
                
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" name="submit" value="update">
                    </div>
                </div>
            </form>
        </div>
    </body>

    <?php require 'footer.php'; ?>

</html>
<script>
    
</script>