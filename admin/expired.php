<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expired List</title>

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
            color:white;
            width: 300px;
            height: 50px;
            background-color: #00544c;
        }

        .container
        {
            height: 800px;
            width: 85%;
            background-color: black;
            opacity: .7;
            color: white;
            margin-top: -65px;
        }

        .srch
        {
            padding-left: 850px;
        }

        .form-control
		{
			width: 250px;
			height: 40px;
			/*background-color: black;*/
			color: white;
        }
        
        .scroll
        {
            width: 100%;
            height: 400px;
            overflow: auto;
        }

        th,td
        {
            width: 10%;
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

        <div class="h"><a href="books.php">Books</a></div>
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

        <div class="container">
            <?php
                if(isset($_SESSION['login_user']))
                {
            ?>
                    <div class="srch">
                        <br>
                        <form method="post" action="" name="form1">
                            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                            <input type="text" name="id_carte" class="form-control" placeholder="ID book" required=""><br>
                            <button class="btn btn-default" name="submit" type="submit">Submit</button><br>
                        </form>
                    </div>
            <?php
                    if(isset($_POST['submit']))
                    {
                        $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
                        mysqli_query($db,"UPDATE imprumut2 SET aprobare='$var1' where username='$_POST[username]' and id_carte='$_POST[id_carte]' ;");
                    }
                }
            ?>
            <h3 style="text-align: center;">Date expired list</h3><br>
            <?php
                $c=0;
                if(isset($_SESSION['login_user']))
                {
                    $sql="SELECT cititor.username,id_cititor, carte.id_carte,titlul_cartii,autor_carte,editura,categorie, imprumut2.aprobare,data_imprumut,data_returnarii FROM `cititor` INNER JOIN `imprumut2` ON cititor.username=imprumut2.username INNER JOIN carte ON imprumut2.id_carte=carte.id_carte 
                          WHERE imprumut2.aprobare != '' and imprumut2.aprobare != 'Yes' ORDER BY `imprumut2`.`data_returnarii` ASC";
                    $res=mysqli_query($db,$sql);

                    echo "<table class='table table-bordered' style='width:100%;' >";
                    echo "<tr style='background-color: #6db6b9e6;'>";
                        //Table header
                        echo "<th>"; echo "Username";  echo "</th>";
                        echo "<th>"; echo "ID users";  echo "</th>";
                        echo "<th>"; echo "ID book";  echo "</th>";
                        echo "<th>"; echo "Book name";  echo "</th>";
                        echo "<th>"; echo "Authors name";  echo "</th>";
                        echo "<th>"; echo "Publishing house";  echo "</th>";
                        echo "<th>"; echo "Category";  echo "</th>";
                        echo "<th>"; echo "Approve Status";  echo "</th>";
                        echo "<th>"; echo "Issue date";  echo "</th>";
                        echo "<th>"; echo "Return date";  echo "</th>";
                    echo "</tr>";
                    echo "</table>";	

                    echo "<div class='scroll'>";
                    echo "<table class='table table-bordered' >";
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['username']; echo "</td>";
                            echo "<td>"; echo $row['id_cititor']; echo "</td>";
                            echo "<td>"; echo $row['id_carte']; echo "</td>";
                            echo "<td>"; echo $row['titlul_cartii']; echo "</td>";
                            echo "<td>"; echo $row['autor_carte']; echo "</td>";
                            echo "<td>"; echo $row['editura']; echo "</td>";
                            echo "<td>"; echo $row['categorie']; echo "</td>";
                            echo "<td>"; echo $row['aprobare']; echo "</td>";
                            echo "<td>"; echo $row['data_imprumut']; echo "</td>";
                            echo "<td>"; echo $row['data_returnarii']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                else
                {
                    ?>
                        <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>