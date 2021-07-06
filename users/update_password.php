<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style type="text/css">
		body
		{
			height: 650px;
			background-image: url("poze/2.jpg");
            background-repeat: no-repeat;
            background-size: 1536px 750px;
        }
        .wrapper
		{
			width: 400px;
			height: 400px;
			margin: 100px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding: 27px 15px;
        }
        .form-control
		{
			width: 300px;
		}
    </style>
</head>
<body>
    <div class="wrapper">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1>
		</div>
		<div style="padding-left: 30px; ">
            <form action="" method="post" >
                <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                <input type="text" name="adresa_de_email" class="form-control" placeholder="Email address" required=""><br>
                <input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
                <button class="btn btn-default" type="submit" name="submit" >Update</button>
            </form>
        </div>
    <?php
        if(isset($_POST['submit']))
		{
		    if(mysqli_query($db,"UPDATE cititor SET password='$_POST[password]' WHERE username='$_POST[username]' AND adresa_de_email='$_POST[adresa_de_email]' ;"))
			{
	?>
				<script type="text/javascript">
                    alert("The Password Updated Successfully.");
                </script> 
	<?php
			}
		}
    ?>
    </div>
</body>
</html>