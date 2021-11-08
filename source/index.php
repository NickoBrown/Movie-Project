<!--
Nicholas Brown
30032159
Activity 3
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Movie Search Page</title>
</head>



<body>




<header>
        <h1>Movie Search</h1>
    <nav class="collapse d-lg-block sidebar collapse bg-white">

	<ul class="c-sidebar-nav">
    <h2>
    <li class="c-sidebar-nav-item">
        <a href="topten.php">Top 10</a>
        </li>
        <li class="c-sidebar-nav-item">
        <a href="index.php">Movie Search</a>
        </li>
    </h2>
</ul>

	</nav>
</header>


    <form action="searchscr.php" method="POST">

        <div class="container row mx-1 mt-1">

            <div class="col-sm-3">
                <h4>Search movies by name:</h4>
                <input type="text" name="textsearchterm" id="textsearchterm" />

            </div>


            <div class="col-sm-3">
                <h4>Search movies by rating:</h4>

                <select name="ratings" id="ratings">
                    <option value=""></option>
                    <?php
                    require("connect.php");
                    $statement = $conn->prepare("SELECT DISTINCT `Rating` FROM `Movies_DVDs`");
                    $statement->execute();
                    $output = $statement->fetchAll(PDO::FETCH_ASSOC);


                    for ($i = 0; true; $i++) {
                        echo "<option value=\"" . $output[$i]['Rating'] . "\">" . $output[$i]['Rating'] . "</option>";
                        if ($output[$i + 1] == null) {
                            break;
                        }
                    }
                    ?>
                </select>
            </div>



            <div class="col-sm-3">
                <h4>Search movies by year:</h4>
                <input type="radio" id="Higher_than" name="greater_less_year" value="Higher_than" checked="checked">
                <label for="Higher_than">After</label><br>
                <input type="radio" id="Lower_than" name="greater_less_year" value="Lower_than">
                <label for="Lower_than">Before</label><br>
                <input type="radio" id="At_year" name="greater_less_year" value="At_year">
                <label for="At_year">Exactly</label><br>
                <input type="number" max="2001" min="1930" name="yearsearchterm" id="yearsearchterm" />

            </div>


            <div class="col-sm-3">
                <h4>Search movies by genre:</h4>
                <select name="genres" id="genres">
                    <option value=""></option>
                    <?php
                    require("connect.php");

                    $statement = $conn->prepare("SELECT DISTINCT `Genre` FROM `Movies_DVDs`");
                    $statement->execute();
                    $output = $statement->fetchAll(PDO::FETCH_ASSOC);


                    for ($i = 0; true; $i++) {
                        echo "<option value=\"" . $output[$i]['Genre'] . "\">" . $output[$i]['Genre'] . "</option>";
                        if ($output[$i + 1] == null) {
                            break;
                        }
                    }
                    ?>
                </select>
            </div>

        </div>
        </div>

        <div class="px-md-3 clearfix">

            <input type="submit" value="Search">

        </div>


    </form>






</body>