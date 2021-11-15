<!--
Nicholas Brown, Duy Pham and Minh Vu
30032159 , 30038701 and ..
Movie Rad
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin Page</title>
</head>

<header>
        <div class="text-center pt-3">
            <h1>Admin Page</h1>
        </div>
        
        <nav class="d-lg-block sidebar bg-white px-5">

            <ul class="c-sidebar-nav">
                <h2>
                    <li class="c-sidebar-nav-item">
                        <a href="topten.php">Top 10</a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a href="index.php">Movie Search</a>
                    </li>
                	<li class="c-sidebar-nav-item">
                        <a href="membership.php">Membership Page</a>
                    </li>
                	<li class="c-sidebar-nav-item">
                        <a href="admin.php">Admin</a>
                    </li>
                </h2>
            </ul>

        </nav>
    </header>

<body>
<div class="px-5 pt-5">
        <?php
        require "connect.php";

        $email = $_POST["email"];
        $newsletter = $_POST["newsletterBox"];
        $newsflash = $_POST["newsflashBox"];

        //initialise an empty string so we can add to it if needed
        $error_msg = "";

        //get the last name
        if (!empty($email)) {
            $email = filter_var($email, FILTER_SANITIZE_STRING);
        } else {
            $error_msg .= "<p>Email is required</p>";
        }

        //ClientId	FirstName	Email	Newsletter	Newsflash
        if (!empty($error_msg)) {
            echo "<p>Error: </p>" . $error_msg;
        } else {
            $sql = "UPDATE Client 
                        SET 
                        Newsletter = '$newsletter', 
                        Newsflash = '$newsflash'
                        WHERE Email = '$email'";
            $smt = $conn->prepare($sql);

            if ($smt->execute()) {
                echo "<p>Client have been updated!</p>";
            }
            //run the query
        }
        ?> 
	
		<?php include "clientlist.php"; ?>
</div>
</body>