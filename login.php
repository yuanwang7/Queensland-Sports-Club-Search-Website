
<?php
    require 'connectMySQL.php';
    //connect to databse
    session_start();
	$error = "";
    if (isset($_POST["username"]) && isset($_POST["password"])) {

        // Check in DB
        $db = new MySQLDatabase();
        $db->connect();
        $username = $_POST["username"];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $db->query($query);
        
        /*while($row = mysqli_fetch_array($result)) {
            print "Name: {$row['username']} has ID: {$row['userId']}";
        }*/
        if ($row = mysqli_fetch_array($result)) {
            if ($_POST['password'] === $row['password']) {
                $_SESSION["username"] = $_POST["username"];
                header("Location: homepage.php");
                echo($_POST["username"]);
            } else {
                $error= 'Incorrect Password!';
            } 
        } else {
            $error= 'Username not found';
        }
        $db->disconnect();

    }
	//log out
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
        <title>Login page</title>
        
        <!-- Date Time Picker -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Chart -->
        <script type="text/javascript" src="js/Chart.min.js"></script>

        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a243bedf71.js"></script>
        
        <!-- Custom JS & CSS -->
    
        <link rel="stylesheet" type="text/css" href="CSS/login.css">

    </head>
    <!-- Navigation bar -->
    <body>

        <?php require 'header.php';?>
    
        <div id="container-login" class="primary mt-5 pxy-5 mxy-5 container">
            <div class=" primary mt-1 pxy-5 mxy-5 container">
                <br><br>
                <div class="col-6 mx-auto">
                    <h1 class="text-center">Login</h1>
                    <form id="form-login"  action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username-input" class="shift-right">username:</label><span class="error"></span> 
                            <input id="email-input" type="text" name="username" placeholder="enter username" class="form-control">
                    
                            <label class="shift-right mt-4">Password:</label> <span class="error"><?php echo $error ?></span>
                            <input id="password-input" type="password" name= "password" placeholder="Enter password" class="form-control">
                        </div>
                    
                        <div class="text-center">
                
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>

    <?php require 'footer.php'; ?>

</html>