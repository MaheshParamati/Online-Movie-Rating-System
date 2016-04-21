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
$sql = "INSERT INTO favourites VALUES('".$userid."','".$movie_id."')";
if($conn->query($sql)=== TRUE){
	echo "Added as your favourite!!";
}
else{
	echo "It is already in your favourites";
}




?>