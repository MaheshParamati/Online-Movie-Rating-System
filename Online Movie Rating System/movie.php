<?php

error_reporting(E_ALL ^ E_NOTICE);

session_start();
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html> 

<body>

<?php
		$con=mysqli_connect("localhost", "root", "","xampp_practice");
			$query=mysqli_query($con,"SELECT permissions FROM userstable WHERE id='$userid'");
			$row=mysqli_fetch_array($query);
				$dbpermissions=$row['permissions'];
				if($dbpermissions=="admin"){
		$form="<form action='./movie.php' method='post'>
		<table>
			<tr>
				<td>Movie Name: </td>
				<td><input type='text' name='movie_name'> </td>
			</tr>
			<tr>
				<td>Category: </td>
				<td><input type='text' name='category'> </td>
			</tr>
			<tr>
				<td>Year: </td>
				<td><input type='text' name='year'> </td>
			</tr>

			<tr>
				<td><input type='submit' name='addbtn' value='Add'> </td>
				<td><input type='submit' name='delete' value='Delete'> </td>
				<td><input type='submit' name='update' value='Update'> </td>
			</tr>
		</table>
				</form>";}
				else if($dbpermissions=="add"){
		$form="<form action='./movie.php' method='post'>
		<table>
			<tr>
				<td>Movie Name: </td>
				<td><input type='text' name='movie_name'> </td>
			</tr>
			<tr>
				<td>Category: </td>
				<td><input type='text' name='category'> </td>
			</tr>
			<tr>
				<td>Year: </td>
				<td><input type='text' name='year'> </td>
			</tr>

			<tr>
				<td><input type='submit' name='addbtn' value='Add'> </td>
				
				
			</tr>
		</table>
				</form>";}
				else if($dbpermissions=="delete"){
		$form="<form action='./movie.php' method='post'>
		<table>
			<tr>
				<td>Movie Name: </td>
				<td><input type='text' name='movie_name'> </td>
			</tr>
			<tr>
				<td>Category: </td>
				<td><input type='text' name='category'> </td>
			</tr>
			<tr>
				<td>Year: </td>
				<td><input type='text' name='year'> </td>
			</tr>

			<tr>
				
				<td><input type='submit' name='delete' value='Delete'> </td>
				
			</tr>
		</table>
				</form>";}
				else if($dbpermissions=="update"){
		$form="<form action='./movie.php' method='post'>
		<table>
			<tr>
				<td>Movie Name: </td>
				<td><input type='text' name='movie_name'> </td>
			</tr>
			<tr>
				<td>Category: </td>
				<td><input type='text' name='category'> </td>
			</tr>
			<tr>
				<td>Year: </td>
				<td><input type='text' name='year'> </td>
			</tr>

			<tr>
				
				
				<td><input type='submit' name='update' value='Update'> </td>
			</tr>
		</table>
				</form>";}
	if($_POST['addbtn']){
		$movie=$_POST['movie_name'];
		$category=$_POST['category'];
		$year=$_POST['year'];
		
		if($movie && $category && $year){
			require("connect.php");
			//$password=md5(md5("safe".$password."password"));
			//echo "$password";
			$con=mysqli_connect("localhost", "root", "","xampp_practice");
			//$query=mysqli_query($con,"SELECT * FROM userstable WHERE username='$user' AND permissions='$permission'");
			//$numrows=mysqli_num_rows($query);
			//if($numrows>0){
			//	echo "Username with those credentials already exist. Please <a href='./admin.php'>Click here<a> to try with different credentials.";
			//}
			//else{
			$sql="INSERT INTO movies (movie_name,category,year) VALUES ('$movie','$category','$year')";
			$query=mysqli_query($con,$sql);
			if ($query) {
				echo "New Movie Added.";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			mysqli_close($con);
			$_SESSION['username']=$dbuser;
						$_SESSION['userid']=$dbid;
						
						echo "<a href='./admin.php'>Enter add a Admin or User page<a>";
						echo "<a href='./movie.php'>Enter add Movie page<a>";
			//echo "<a href='./admin.php'>Click here<a> to Add another Admin or user.";
			
		}
		else
			echo "One or more fields are missing. $form";
	}
	//update
	
	else if($_POST['update']){
		$movie=$_POST['movie_name'];
		$category=$_POST['category'];
		$year=$_POST['year'];
		
		if($movie && $category && $year){
			require("connect.php");
			//$password=md5(md5("safe".$password."password"));
			//echo "$password";
			$con=mysqli_connect("localhost", "root", "","xampp_practice");
			//$query=mysqli_query($con,"SELECT * FROM userstable WHERE username='$user' AND permissions='$permission'");
			//$numrows=mysqli_num_rows($query);
			//if($numrows>0){
			//	echo "Username with those credentials already exist. Please <a href='./admin.php'>Click here<a> to try with different credentials.";
			//}
			//else{
			$sql="SELECT *FROM movies WHERE movie_name='$movie'";
			$query=mysqli_query($con,$sql);
			$numrows=mysqli_num_rows($query);
			if($numrows>=1)
			{
				$sql="UPDATE movies SET movie_name='$movie',category='$category',year='$year' WHERE movie_name='$movie'";
			$query=mysqli_query($con,$sql);
			if ($query) {
				echo "Movie Updated.<br><br>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			mysqli_close($con);
			$_SESSION['username']=$dbuser;
						$_SESSION['userid']=$dbid;
						
						echo "<a href='./admin.php'>Enter User page<a><br>";
						echo "<a href='./movie.php'>Enter Movie page<a>";
			//echo "<a href='./admin.php'>Click here<a> to Add another Admin or user.";
			}
			else
				echo "No movie exists with the given name<br> <br> <a href='./movie.php'>Click here<a> to try again with other movie name";
		}
		else
			echo "One or more fields are missing. $form";
	}
	//update
	
	else if($_POST['delete']){
		$movie=$_POST['movie_name'];
		$category=$_POST['category'];
		$year=$_POST['year'];
		
		if($movie && $category && $year){
			require("connect.php");
			//$password=md5(md5("safe".$password."password"));
			//echo "$password";
			$con=mysqli_connect("localhost", "root", "","xampp_practice");
			//$query=mysqli_query($con,"SELECT * FROM userstable WHERE username='$user' AND permissions='$permission'");
			//$numrows=mysqli_num_rows($query);
			//if($numrows>0){
			//	echo "Username with those credentials already exist. Please <a href='./admin.php'>Click here<a> to try with different credentials.";
			//}
			//else{
			$sql="SELECT *FROM movies WHERE movie_name='$movie'";
			$query=mysqli_query($con,$sql);
			$numrows=mysqli_num_rows($query);
			if($numrows>=1)
			{$sql="DELETE FROM movies WHERE movie_name='$movie' AND category='$category' AND year='$year'";
			$query=mysqli_query($con,$sql);
			if ($query) {
				echo "Movie Deleted.<br><br>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			mysqli_close($con);
			$_SESSION['username']=$dbuser;
						$_SESSION['userid']=$dbid;
						
						echo "<a href='./admin.php'>Enter User page<a><br>";
						echo "<a href='./movie.php'>Enter Movie page<a>";
			//echo "<a href='./admin.php'>Click here<a> to Add another Admin or user.";
			}
			else
				echo "No movie exists with the given name<br> <br> <a href='./movie.php'>Click here<a> to try again with other movie name";
		}
		else
			echo "One or more fields are missing. $form";
	}
	else
		echo $form;

	
	
	
	
?>
</body>
</html>