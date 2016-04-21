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
		$form="<form action='./search.php' method='post'>
		<table>
			<tr>
				<td>Movie Name: </td>
				<td><input type='text' name='movie'> </td>
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
				<td></td>
				<td><input type='submit' name='search' value='Search Movies'> </td>
			</tr>
		</table>
		</form>";
		echo "$userid";
	if($_POST['search']){
		$movie=$_POST['movie'];
		$category=$_POST['category'];
		$year=$_POST['year'];
		if($movie || $category || $year){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "root","project_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE movie_name LIKE '%".$movie."%' AND category LIKE '%".$category."%' AND year='$year'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				$dbrating=$row['rating'];
				$id=$row['movie_id'];
				
				echo "
				
           <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;' border='1' >
				<tr>
				<th>Movie Name</th>
				<th>Category</th>
				<th>Movie Id</th>
				<th>Released year</th>
				<th>Rating</th>
				<th>Give Rating</th>
				</tr>
                    <tr style ='height = 200px;'>
                       

                        <td style ='width = 300px;'>
                            
                            <div> $dbmovie </div>
                        </td>
                        <td style='width =200px'>
                           
                            <div> $dbcategory </div>
                        </td>
                         <td> $id </td>
                        <td> $dbyear </td>
						<td>$dbrating</td>
						<td><a href='./movie.php'>Rate it !!</a> </td>
                      
                    </tr>
					</table>
        ";
		echo"<img src='$id.jpg'  height='150' width='150'/>";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		/*else if($movie && $category){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "","practise_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE movie_name LIKE '%".$movie."%' AND category LIKE '%".$category."%'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;'>
                    <tr style ='height = 200px;'>
                        <td style ='width = 200px;'></td>

                        <td style ='width = 300px;'>
                            <div style ='180px'> $name </div>
                            <div> $dbmovie </div>
                        </td>

                        <td style='width =200px'>
                            <div style='height = 100px'> $current </div>
                            <div style='height = 50px'> $instant </div>
                            <div> $dbcategory </div>
                        </td>

                        <td> $dbyear </td>
                    </tr>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		else if($movie && $year){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "root","practise_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE movie_name LIKE '%".$movie."%' AND year='$year'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;'>
                    <tr style ='height = 200px;'>
                        <td style ='width = 200px;'></td>

                        <td style ='width = 300px;'>
                            <div style ='180px'> $name </div>
                            <div> $dbmovie </div>
                        </td>

                        <td style='width =200px'>
                            <div style='height = 100px'> $current </div>
                            <div style='height = 50px'> $instant </div>
                            <div> $dbcategory </div>
                        </td>

                        <td> $dbyear </td>
                    </tr>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		else if($category && $year){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "","practise_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE category LIKE '%".$category."%' AND year='$year'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;'>
                    <tr style ='height = 200px;'>
                        <td style ='width = 200px;'></td>

                        <td style ='width = 300px;'>
                            <div style ='180px'> $name </div>
                            <div> $dbmovie </div>
                        </td>

                        <td style='width =200px'>
                            <div style='height = 100px'> $current </div>
                            <div style='height = 50px'> $instant </div>
                            <div> $dbcategory </div>
                        </td>

                        <td> $dbyear </td>
                    </tr>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		else if($year){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "","practise_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE year='$year'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;'>
                    <tr style ='height = 200px;'>
                        <td style ='width = 200px;'></td>

                        <td style ='width = 300px;'>
                            <div style ='180px'> $name </div>
                            <div> $dbmovie </div>
                        </td>

                        <td style='width =200px'>
                            <div style='height = 100px'> $current </div>
                            <div style='height = 50px'> $instant </div>
                            <div> $dbcategory </div>
                        </td>

                        <td> $dbyear </td>
                    </tr>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		else if($category){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "","xampp_practice");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE category LIKE '%".$category."%'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;'>
                    <tr style ='height = 200px;'>
                        <td style ='width = 200px;'></td>

                        <td style ='width = 300px;'>
                            <div style ='180px'> $name </div>
                            <div> $dbmovie </div>
                        </td>

                        <td style='width =200px'>
                            <div style='height = 100px'> $current </div>
                            <div style='height = 50px'> $instant </div>
                            <div> $dbcategory </div>
                        </td>

                        <td> $dbyear </td>
                    </tr>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}
		else if($movie){
			require("connect.php");
			
			$con=mysqli_connect("localhost", "root", "root","project_database");
			$query=mysqli_query($con,"SELECT * FROM moviestable WHERE movie_name LIKE '%".$movie."%'");
			$numrows=mysqli_num_rows($query);
			if($numrows==0)
				echo "Sorry, your search did not return any results. Please <a href='./search.php'>Click here<a> to search again";
			else if($numrows>=1){
				
				while($numrows>=1)
				{
					$row=mysqli_fetch_array($query);
				$dbmovie=$row['movie_name'];
				$id=$row['movie_id'];
				$dbcategory=$row['category'];
				$dbyear=$row['year'];
				echo "
            <?xml version = '1.0' encoding = 'utf-8'?>
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org    /TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <title>Searched Movie Results</title>
            </head>

            <body>  
                <table style='width = 800px;' >
                    <tr style ='height = 200px;' >
                       
						
                        <td style ='width = 300px;'>
                            
                            <div> $dbmovie </div>
                        </td>
						 <td style ='width = 300px;'>
                            
                            <div> $id </div>
                        </td>
						 <td style ='width = 300px;'>
                            
                            <div> $dbcategory </div>
                        </td>
					 <td style ='width = 300px;'>
                            
                            <div> $dbyear </div>
                        </td>
						</tr>
						<td>
					<div><a href="">Rate The movie </a></div>
					</td>
        ";
			$numrows--;
			}
			}
			mysqli_close($con);
		}*/
		else
			echo "Please enter at least one field and search. $form";
	}
	else
		echo $form;
	?>
	
	
</body>
</html>