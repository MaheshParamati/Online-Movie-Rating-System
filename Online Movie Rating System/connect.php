<?php

$con=mysqli_connect("localhost", "root", "","project_database");
mysqli_select_db($con,"project_database");
mysqli_close($con);
?>