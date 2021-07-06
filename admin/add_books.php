<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css?v=<?php echo time(); ?>">
  <link rel="icon" type="image/jpg" href="poze/4.jpg">
  <title>Add Books</title>

  <style type="text/css">
    body {
      background-color: #ccccff;
      font-family: "Lato", sans-serif;
      transition: background-color .5s;
    }

    .sidenav {
      height: 100%;
      margin-top: 50px;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #222;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }

    .img-circle
    {
	    margin-left: 20px;
    }

    .h:hover
    {
      color: white;
      width: 300px;
      height: 50px;
      background-color: #00544c;
    }

    .book
    {
      width: 400px;
      margin: 0px auto;
    }

    .form-control
    {
      /*background-color: #080707;*/
      color: black;
      height: 40px;
    }
  </style>

</head>
<body>
  <!--___________________sidenav________________________-->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div style="color: white; margin-left: 60px; font-size: 20px;">
      <?php
          if(isset($_SESSION['login_user']))
          {
            echo "<img class='img-circle profile_img' height=120 width=120 src='poze/".$_SESSION['pic']."'>";
            echo "</br></br>";
            echo "Welcome ".$_SESSION['login_user']; 
          }
      ?>                        
    </div>
    <br><br> 

      <div class="h"><a href="add_books.php">Add books</a></div>
      <div class="h"><a href="delete_books.php">Delete books</a></div>
      <div class="h"><a href="request.php">Book Request</a></div>
      <div class="h"><a href="issue_info.php">Issue Information</a></div>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
        <div class="container" style="text-align: center;">
            <h2 style="color:black; font-family: Lucida Console; text-align: center; font-size:30px"><b>Add New Books</b></h2><br>
            <form class="book" action="" method="post">
                <input type="text" name="id_carte" class="form-control" placeholder="ID book" required=""><br>
                <input type="text" name="titlul_cartii" class="form-control" placeholder="Book name" required=""><br>
                <input type="text" name="autor_carte" class="form-control" placeholder="Authors name" required=""><br>
                <input type="text" name="editura" class="form-control" placeholder="Publishing house" required=""><br>
                <input type="text" name="categorie" class="form-control" placeholder="Category" required=""><br>
                <input type="text" name="an_aparitie" class="form-control" placeholder="Year" required=""><br>
                <input type="text" name="descriere_carte" class="form-control" placeholder="Book description"><br>
                <input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>

                <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Add Book</button>
            </form>
        </div>
        <?php
            if(isset($_POST['submit']))
            {
                if(isset($_SESSION['login_user']))
                {
                    mysqli_query($db,"INSERT INTO carte VALUES ('$_POST[id_carte]', '$_POST[titlul_cartii]', '$_POST[autor_carte]', 
                                '$_POST[editura]', '$_POST[categorie]', '$_POST[an_aparitie]', '$_POST[descriere_carte]', '$_POST[isbn]') ;");
                    ?>
                    <script type="text/javascript">
                        alert("Book Added Successfully.");
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <script type="text/javascript">
                        alert("You need to login first.");
                    </script>
                    <?php
                }
            }
        ?>
    </div>

    <script>
        function openNav() 
        {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() 
        {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "#ccccff";
        }
    </script>
</body>
</html>