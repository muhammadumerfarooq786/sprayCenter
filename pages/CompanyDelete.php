<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Company WHERE CompanyId=$id");

$mysqli->close();

//redirecting to the display page (index.php in our case)
header("Location:addingNew.php");
header("Refresh:0");
?>
