
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$moviename=$_REQUEST[val];
$sql = "SELECT * FROM moviestable WHERE movie_name LIKE '%".$moviename."%'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
	$i=0;
    // output data of each row
	
	echo " Related movies you searched for ";
	echo "  <div class=\"row\">";
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["movie_id"]. " - Name: " . $row["movie_name"]. " " . $row["rating"]. "<br>";
		$sql1="SELECT AVG(rating) AS movie_rating FROM ratings_table where movie_id=" .$row["movie_id"]."";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
		echo "<div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>".$row["movie_name"]."</strong></p><br>
      <a href=\"#demo".$i."\" data-toggle=\"collapse\">
        <img src=\"".$row["movie_id"].".jpg\" class=\"img-circle person\" alt=\" ".$row["movie_name"]." \" width=\"255\" height=\"255\">
      </a>
      <div id=\"demo".$i."\" class=\"collapse\">
	  <label>Rating:".$row1["movie_rating"]."</label>
        <input class=\"form-control\" id=\"name".$row["movie_id"]."\" name=\"Rating\" placeholder=\"Rating(1-5)\" type=\"text\" required><br>
		<input align=\"left\" class=\"btn btn-warning\" type=\"button\" value=\"Favourite\" onclick=\"favourite(".$row["movie_id"].")\" />
		<input align=\"right\" class=\"btn btn-warning\" type=\"button\" value=\"Rate It!\" onclick=\"rating(".$row["movie_id"].")\" /><br><br>
		
      </div>
    </div>"; 		
		$i++;
    }
	echo "</div>";
	
} else {
    echo "0 results";
}

$conn->close();	
?>