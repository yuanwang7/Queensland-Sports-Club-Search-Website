<?php
    if (isset($_SESSION["email"])) {
                    
        $email = $_SESSION["email"];

    }
?>
<!-- navigation bar -->
<style>
.dropdown-menu{
    float:right;
    
}
.dropdown-item {
    color: #004e64;
}

</style>
<div class="p-3 px-md-4 mb-3 border-bottom shadow-sm">
    <nav class="navbar navbar-expand-lg bg-white navbar-light my-2 my-md-0 mr-md-3">  
        <a class="navbar-brand" href="homepage.php" style="font-size: 1.2em; font-weight: bold; color: Tomato;">Sport</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="my-tooltip nav-link px-2" data-toggle="tooltip" data-placement="top"  title="Go to the main page" href="homepage.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="my-tooltip nav-link px-2" data-toggle="tooltip"  title="Search sports clubs on the map"  href="search3.php?sports=none"><i class="fas fa-search" ></i> Search</a>
                </li>
                <li class="nav-item">
                    <a class="my-tooltip nav-link px-2" data-toggle="tooltip"  title="Plan or record your physical activity on a calendar, and view your sports activity dashboard!"  href="log.php"><i class="fas fa-chart-line"></i> Schedule</a>
                </li>      
            
            <?php if (isset($_SESSION["username"])): ?>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link px-2" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false "><i class="far fa-user" style="font-size: 1.2em; color: Tomato;"></i> <?php echo $_SESSION["username"];?> </a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item" href="BMI.php">BMI Calculator</a>
                        <a class="dropdown-item" href="login.php?logout">logout</a>
                    </div>
                </li>
            <?php else: ?>
                    <a class="nav-link px-2" href="login.php"><i class="far fa-user" style="font-size: 1.2em; color: Tomato;"></i> Login</a>
            <?php endif;?>
            </ul>
            </span>
        </div>
    </nav>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- Universal style -->
<style>
    /*tooltip customize*/

    .tooltip .tooltip-inner {
        background-color: #004E64;
        color: #FFF;
        min-width: 250px;
        border-radius: 1px;
        font-size: 1.1em;
    }

    .bs-tooltip-auto[x-placement^=bottom] .arrow::before,
    .bs-tooltip-bottom .arrow::before {
    border-bottom-color: #004E64;
    }

    .bs-tooltip-auto[x-placement^=top] .arrow::before,
    .bs-tooltip-top .arrow::before {
    border-top-color: #004E64;
    }
    /* Universal header style */
    
    .navbar-light .nav-link, .navbar-light .navbar-nav .nav-link{
        font-size: 1.2rem;
        color: #004E64;
    }
    .nav-link:hover {
        border-color: #004e64;
        font-weight: bold;
        letter-spacing: 0.05em;
        border-radius: 0;
        border-width: 3px;
    }

    .nav-link:active:hover {/*mouse down event*/
        box-shadow: 0px 0px 5px #004e64;
    }
    /* Universal header style */

    /* Universal button style */
    .btn-primary {
    color: #004E64;
    background-color: #ffffff;
    border-color: #004E64;
    font-weight: bold;
    letter-spacing: 0.05em;
    border-radius: 0;
    border-width:3px;
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    .btn-primary.active {
    background: #004E64;
    color: #ffffff;
    border-color: #004E64;
    }

    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle
    .btn-primary:active:hover .btn-primary:active:hover:active:focus{
        box-shadow: 0px 0px 5px #004e64;
        color: inherit;
    }
    
    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
        background: #004E64;
        color: #ffffff;
        border-color: #004E64;
    }

    .btn-danger {    
    color: #dc3545;
    background-color: #ffffff;
    border-color: #dc3545;
    font-weight: bold;
    letter-spacing: 0.05em;
    border-radius: 0;
    border-width:3px;
    }

    .btn-default {
        color: #547754;
        background-color: #ffffff;
        border-color: #547754;
        font-weight: bold;
        letter-spacing: 0.05em;
        border-radius: 0;
        border-width:3px;
    }
    .btn-default:hover {
        color: #ffffff;        
        background: #547754;
    }
    /* Universal button style end */

    
    /* Universal modal style */
    .modal-dialog {
        position: relative;
        top: 30%;
        transform: translateY(-30%);
        border-radius:1px;
    }

    .modal-content{
        box-shadow: 6px 6px 20px 1px;
        border-radius: 1px;
    }
    /* Universal modal style end */
</style>