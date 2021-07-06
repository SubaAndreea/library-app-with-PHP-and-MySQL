<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Profile</title>
     <style type="text/css">
      body
      {
        background-image: url("poze/1.jpg");
        background-repeat: no-repeat;
        background-size: 1600px;
      }
      .wrapper
 		{
            width: 400px;
            height: 580px;
 			margin: 0 auto;
            color: black;
            background-color: #ffffe6;  
            opacity: .8;
 		}
      </style>
 </head>
 <body>
    <div class="container">
        <form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 90px;" name="submit1">Edit profile</button>
        </form>
        <div class="wrapper">
            <?php
                $q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]' ;");
            ?>
            <h2 style="text-align: center;">My Profile</h2>
            <?php
                $row=mysqli_fetch_assoc($q);
                echo "<div style='text-align: center'>
 					    <img class='img-circle profile-img' height=110 width=120 src='poze/".$_SESSION['pic']."'>
 				      </div>";
            ?>
            <div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
            </div>
            <?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['nume_admin'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['prenume_admin'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Address: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['adresa'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Phone number: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['nr_telefon'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email address: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['adresa_de_email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Username: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
                    echo "</tr>";
                     
                    echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";
 				echo "</table>";
 				echo "</b>";
 			?>
        </div>
    </div>
 </body>
 </html>