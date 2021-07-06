<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/jpg" href="poze/4.jpg">

    <style type="text/css">
        nav{
            float: right;
            word-spacing: 30px;
            padding: 30px;
            font-size: 20px;
        }

        nav li{
            display: inline-block;
            line-height: 80px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img class="logo-image" src="poze/logo.jpg">
                <h1 style="color:white;">Online Library</h1> 
            </div>

            <?php
                if(isset($_SESSION['login_user']))
                {
            ?>
                <nav>
                    <ul>
                        <li><a href="index.php">Library</a></li>
                        <li><a href="books.php">Books</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </nav>
            <?php
                } 
                else
		        {   
			?>
                <nav>
                    <ul>
                        <li><a href="index.php">Library</a></li>
                        <li><a href="books.php">Books</a></li>
                        <li><a href="admin-login.php">Login</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                    </ul>
                </nav>
            <?php
		        }
		    ?>
        </header>

        <section>
        <div class="section_img">
            <br><br><br>

            <h1 class="title">Welcome to our online library!</h1>

            <div class="container">
                <marquee behavior="alternate">
                    <img src="poze/1.jpg">
                    <img src="poze/2.jpg">
                    <img src="poze/5.jpg">
                    <img src="poze/4.jpg">
                    <img src="poze/3.jpg">
                </marquee>
            </div>
        </div>
        </section>

        <footer>
            <p>
                <br><br><br><br><br><br><br>
                <div class="copyright">© 2020 Library. &nbsp All rights reserved.</div>
            </p>
        </footer>
    </div>
</body>
</html>