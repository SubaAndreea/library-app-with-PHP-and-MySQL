<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Feedback</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="poze/4.jpg">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
      body
      {
        background-image: url("poze/1.jpg");
        background-repeat: no-repeat;
        background-size: 1600px;
      }
      .wrapper
      {
        padding: 10px;
    		margin: -20px auto;
        width: 900px;
        height: 670px;
        background-color: black;
        opacity: .8;
        color: white;
      }
      .form-control
    	{
    		height: 70px;
    		width: 60%;
      }
      .scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}
  </style>
</head>
<body>
  <div class="wrapper">
    <h4 style="text-align: center;">If you have any suggestion or question please comment below.</h4>
    <form style="margin-left: 250px;" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something here..."><br>	
			<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">		
    </form>
    
  <br><br>
  <div class="scroll">
    <?php
      if(isset($_POST['submit']))
      {
        $sql="INSERT INTO `comentarii` VALUES('', '$_SESSION[login_user]', '$_POST[comment]');";
        if(mysqli_query($db,$sql))
        {
          $q="SELECT * FROM `comentarii` ORDER BY `comentarii`.`id_comment` DESC";
          $res=mysqli_query($db,$q);

          echo "<table class='table table-bordered'>";
          while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				  echo "</table>";
        }
      }
      else
			{
				$q="SELECT * FROM `comentarii` ORDER BY `comentarii`.`id_comment` DESC"; 
				$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
        while ($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
    ?>
  </div>
</div> 
</body>
</html>