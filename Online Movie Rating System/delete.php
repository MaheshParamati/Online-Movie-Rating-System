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
$movie_id=$_REQUEST[id];
//$rate=$_REQUEST[r];
$sql ="DELETE FROM moviestable where movie_id='".$movie_id."'";
//$sql = "INSERT INTO ratings_table VALUES('".$movie_id."','".$userid."','".$rate."')";
if($conn->query($sql)=== TRUE){
	echo "Deleted Successfully";
	
}
else{
	echo "First select the movie you want to delete";
}




?>