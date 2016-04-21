<?php  
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

$name = $_REQUEST["name"];

//alert($name);
if($name)
{
$sql="SELECT user_name FROM userstable WHERE user_name = '".$name."'";
$result = $conn->query($sql);

}



if ($result->num_rows > 0) {
    echo "no";
} else {
    echo "ok";
}

$conn->close();
?>