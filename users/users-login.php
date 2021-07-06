<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <link rel="icon" type="image/jpg" href="poze/4.jpg">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
      section
      {
        margin-top: -20px;
      }
    </style>
</head>
<body>
    <section style="height: 500px;">
        <div class="login_img">
            <br><br><br>

            <div class="box1">
                <h1 style="text-align: center; font-size: 35px; font-family: Arial, Helvetica, sans-serif;">User Login Form</h1>
                <br>
                <form  name="login" action="" method="post">
                    <div class="login">
                      <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                      <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                      <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
                    </div>
                
                <p style="color: white; padding-left: 15px;">
                    <br><br>
                    <a style="color:white; text-decoration: none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp
                    New to this website?<a style="color: white; text-decoration: none;" href="registration.php">&nbsp Sign Up</a>
                </p>
                </form>
            </div>
        </div>    
    </section>

    <?php
      if(isset($_POST['submit']))
      {
        $count=0;
        $res=mysqli_query($db,"SELECT * FROM `cititor` WHERE username='$_POST[username]' && password='$_POST[password]';");
        $row= mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);

        if($count==0)
        {
    ?>
        <div class="alert alert-danger" style="width: 600px; margin-left: 470px; background-color: #de1313; color: white">
          <strong>The username and password doesn't match</strong>
        </div>

    <?php
        }
        else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic']= $row['pic'];

    ?>
        <script type="text/javascript">
          window.location="index.php"
        </script>
    <?php
      }
    }
    ?>
</body>
</html>