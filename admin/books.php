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
  <title>Books</title>

  <style type="text/css">
    body {
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

		.srch
		{
			padding-left: 1100px;
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
      <div class="h"><a href="request.php">Book Request</a></div>
      <div class="h"><a href="issue_info.php">Issue Information</a></div>
      <div class="h"><a href="expired.php">Expired List</a></div>
    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
        document.body.style.backgroundColor = "white";
    }
    </script>
    
  <!--___________________search bar_____________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
				<input class="form-control" type="text" name="search" placeholder="Search books..." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
        </button>
		</form>
    <form class="navbar-form" method="post" name="form1">
				<input class="form-control" type="text" name="id_carte" placeholder="Enter book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">
					Delete
        </button>
		</form>
  </div>
  
  <h2 style="font-size: 30px;">List Of Books</h2>
  <?php
    if(isset($_POST['submit']))
    {
      $q=mysqli_query($db,"SELECT * from carte WHERE titlul_cartii like '%$_POST[search]%' ");
      if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
      }
      else
      {
        echo "<table class='table table-bordered table-hover';>";
          echo "<tr style='background-color: #6db6b9e6;'>";
          //Table header
          echo "<th>"; echo "ID book";	echo "</th>";
          echo "<th>"; echo "Book name";  echo "</th>";
          echo "<th>"; echo "Authors name";  echo "</th>";
          echo "<th>"; echo "Publishing house";  echo "</th>";
          echo "<th>"; echo "Category";  echo "</th>";
          echo "<th>"; echo "Year";  echo "</th>";
          echo "<th>"; echo "Book description";  echo "</th>";
          echo "<th>"; echo "ISBN";  echo "</th>";
        echo "</tr>";

      while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
          echo "<td>"; echo $row['id_carte']; echo "</td>";
          echo "<td>"; echo $row['titlul_cartii']; echo "</td>";
          echo "<td>"; echo $row['autor_carte']; echo "</td>";
          echo "<td>"; echo $row['editura']; echo "</td>";
          echo "<td>"; echo $row['categorie']; echo "</td>";
          echo "<td>"; echo $row['an_aparitie']; echo "</td>";
          echo "<td>"; echo $row['descriere_carte']; echo "</td>";
          echo "<td>"; echo $row['isbn']; echo "</td>";
				echo "</tr>";
			}
		    echo "</table>";
      }
    }
    /*if button is not pressed.*/
		else
		{
      $res=mysqli_query($db,"SELECT * FROM `carte` ORDER BY `carte`.`id_carte` ASC;");

      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color: #6db6b9e6;'>";
          //Table header
          echo "<th>"; echo "ID book";	echo "</th>";
          echo "<th>"; echo "Book name";  echo "</th>";
          echo "<th>"; echo "Authors name";  echo "</th>";
          echo "<th>"; echo "Publishing house";  echo "</th>";
          echo "<th>"; echo "Category";  echo "</th>";
          echo "<th>"; echo "Year";  echo "</th>";
          echo "<th>"; echo "Book description";  echo "</th>";
          echo "<th>"; echo "ISBN";  echo "</th>";
      echo "</tr>";

      while($row=mysqli_fetch_assoc($res))
        {
          echo "<tr>";
            echo "<td>"; echo $row['id_carte']; echo "</td>";
            echo "<td>"; echo $row['titlul_cartii']; echo "</td>";
            echo "<td>"; echo $row['autor_carte']; echo "</td>";
            echo "<td>"; echo $row['editura']; echo "</td>";
            echo "<td>"; echo $row['categorie']; echo "</td>";
            echo "<td>"; echo $row['an_aparitie']; echo "</td>";
            echo "<td>"; echo $row['descriere_carte']; echo "</td>";
            echo "<td>"; echo $row['isbn']; echo "</td>";
          echo "</tr>";
        }
        echo "</table>";
      }
      if(isset($_POST['submit1']))
      {
          if(isset($_SESSION['login_user']))
          {
            mysqli_query($db,"DELETE from carte where id_carte = '$_POST[id_carte]'; ");
            ?>
              <script type="text/javascript">
                alert("Delete Successful.");
              </script>
            <?php
          }
          else
          {
            ?>
              <script type="text/javascript">
                alert("Please Login First.");
              </script>
            <?php
          }
      }
  ?>
  </div>
</body>
</html>