<!--
Nicholas Brown, Duy Pham and Minh Vu
30032159 , 30038701 and ..
Movie Rad
-->

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>Movie Search Page</title>
</head>

<nav>
        <h2>
        <a href="topten.php">Top 10</a>        
        <a href="index.php">Movie Search</a>
                
        </h2>
</nav>

<body>

        <header>
                <h1>Movie List</h1>
        </header>


		<table class="table">
        	<thead>
            	<tr>
                	<th scope ="col">Title</th>
                	<th scope ="col">Genre</th>
                	<th scope ="col">Rating</th>
                	<th scope ="col">Release Year</th>
            	</tr>
            </thead>
        
			<tbody>
                <?php
                $title = $_POST["textsearchterm"];
                $genre = $_POST["genres"];
                $releaseyear = (int)$_POST["yearsearchterm"];
                $rating = $_POST["ratings"];
                $yearoperator = $_POST["greater_less_year"];


                require("connect.php");


                if($yearoperator == "Higher_than"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` > $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if($yearoperator == "Lower_than"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` < $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                if($yearoperator == "At_year"){
                        $results = $conn->query("SELECT Title, Genre, ReleaseYear, Rating FROM `Movies_DVDs` WHERE (`Title` LIKE \"%$title%\" AND `Genre` LIKE \"%$genre%\" AND `Rating` LIKE \"%$rating%\" AND (`ReleaseYear` = $releaseyear))")->fetchAll(PDO::FETCH_ASSOC);
                }
                
	

                for ($i = 0; true; $i++) {
                		echo "<tr>";
                
                        echo "<td>".$results[$i]['Title'] ."</td>";
                
                		echo "<td>". $results[$i]['Genre'] ."</td>";
                
                		echo "<td>". $results[$i]['Rating'] ."</td>";
                
                		echo "<td>". $results[$i]['ReleaseYear'] ."</td>";
                
                        $id = $results[$i]['id'];
                        
                        echo "</tr>";

                        if ($results[$i + 1] == null) {
                                break;
                        }
                }
                ?>
			</tbody>
        </table>     
</body>