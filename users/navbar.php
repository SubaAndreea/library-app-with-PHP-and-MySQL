<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Delius+Swash+Caps&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="poze/4.jpg">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
       <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">Online Library</a> 
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Library</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
            <?php
                if(isset($_SESSION['login_user']))
                {
            ?>
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">Profile</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">
                        <div style="color: white">
                            <?php
                                echo "<img class='img-circle profile_img' height=30 width=30 src='poze/".$_SESSION['pic']."'>";
                                echo " ".$_SESSION['login_user']; 
                            ?>
                        </div> 
                    </a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                </ul>
            <?php    
                }
                else
                {
            ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="users-login.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                        <li><a href="registration.php"><span class="glyphicon glyphicon-user"> Sign up</span></a></li>
                    </ul> 
            <?php
                }
            ?> 
       </div> 
    </nav>
</body>
</html>