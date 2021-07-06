<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css?v=<?php echo time(); ?>">
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
        <div class="registration_img">
            <div class="box2">
                <h1 style="text-align: center; font-size: 35px;font-family: Arial, Helvetica, sans-serif;">User Registration Form</h1>

                <form  name="Registration" action="" method="post">
                    <br>
                    <div class="login">
                      <input class="form-control" type="text" name="id_cititor" placeholder="Id" required=""> <br>
                      <input class="form-control" type="text" name="nume_cititor" placeholder="Nume" required=""> <br>
                      <input class="form-control" type="text" name="prenume_cititor" placeholder="Prenume" required=""> <br>
                      <input class="form-control" type="text" name="adresa" placeholder="Adresa" required=""><br>
                      <input class="form-control" type="text" name="nr_telefon" placeholder="Numar de telefon" required=""><br>
                      <input class="form-control" type="text" name="adresa_de_email" placeholder="Email" required=""><br>
                      <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                      <input class="form-control" type="password" name="password" placeholder="Parola" required=""> <br>

                      <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 75px; height: 30px">
                    </div>
                </form>
            </div>
        </div>    
    </section>

    <?php
      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `cititor`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
        mysqli_query($db,"INSERT INTO `CITITOR` VALUES('$_POST[id_cititor]', 
        '$_POST[nume_cititor]', '$_POST[prenume_cititor]', '$_POST[adresa]', 
        '$_POST[nr_telefon]', '$_POST[adresa_de_email]', '$_POST[username]', 
        '$_POST[password]', 'p.jpg');");
    ?>
    <script type="text/javascript">
      alert("Registration successful");
    </script>
    <?php
        }
        else
        {
    ?>
    <script type="text/javascript">
      alert("The username already exist.");
    </script>
    <?php
        }
      }
    ?>
</body>
</html>