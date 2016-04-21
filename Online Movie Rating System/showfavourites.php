
<?php
session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
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

$sql = "SELECT * FROM favourites where user_id='".$userid."'";
$result = $conn->query($sql);



if ($result->num_rows>0) {
	$i=0;
    // output data of each row
	
	echo " <h3> Favourite movies list</h3><br>";
	echo "  <div class=\"row\">";
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["movie_id"]. " - Name: " . $row["movie_name"]. " " . $row["rating"]. "<br>";
		$sql1="SELECT * FROM moviestable where movie_id=" .$row["movie_id"]."";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();
		echo "<div class=\"col-sm-4\">
      <p class=\"text-center\"><strong>".$row1["movie_name"]."</strong></p><br>
      <a href=\"#demo".$i."\" data-toggle=\"collapse\">
        <img src=\"".$row["movie_id"].".jpg\" class=\"img-circle person\" alt=\" ".$row1["movie_name"]." \" width=\"255\" height=\"255\">
      </a>
   
    </div>"; 		
		$i++;
    }
	echo "</div>";
	
} else {
    echo "0 results";
	echo $user_id;
}

$conn->close();	
?>