<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){

	$id = mysqli_real_escape_string($mysqli, $_POST['AreaId']);
	$name = mysqli_real_escape_string($mysqli, $_POST['AreaName']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);


	// checking empty fields
	if( empty($id)|| empty($name)  || empty($status)) {

		echo "error";

	} else {
    $compareid=$_GET['id'];
		// $AllArea='SELECT AreaId from Area';
		// if($AllArea.contains($id)){
		// 	echo '<script>alert("Area Id Already Exist. Data Not inserted")</script>';
		// }
		//updating the table
    if($status=="yes"){
      		$update = mysqli_query($mysqli, "UPDATE Area SET AreaId='$id',AreaName='$name',Status=1 WHERE AreaId=$compareid");
     }
    else {
      		$update = mysqli_query($mysqli, "UPDATE Area SET AreaId='$id',AreaName='$name',Status=0 WHERE AreaId=$compareid");
    }
		if(!$update){
			echo '<script>alert("Data Not Updated")</script>';
		}
		$mysqli->close();
		//redirectig to the display page. In our case, it is index.php
		header("Location: addingNew.php");
	}
}
?>


<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Area WHERE AreaId=$id");

while($res = mysqli_fetch_array($result)){
	$id = $res['AreaId'];
	$name = $res['AreaName'];
	$status = $res['Status'];
}
$mysqli->close();
?>


<html>
<head>
	<title>Update Data</title>
  <link rel="shortcut icon" type="image/ico" href="../images/favicon.ico"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="addingNew.css">

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</head>

<body>


  <section class="white-section" id="area">
    <div class="container-fluid">

  <h1> Area</h1>



  <form id="AreaUpdateForm" method="post">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Area ID : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="AreaId" value="<?php echo $id;?>"><br><br >
      </div>


      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Area Name : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="AreaName" value="<?php echo $name;?>">
          <br><br >
      </div>



      <div class="col-lg-6 col-md-12 col-sm-12">
            <b>Area Status : </b>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <select required name="status" id="yesno">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>




        <br ><br>
      </div>
    </div>

    <button type="submit" class="btn btn-dark btn-md" name="update">Submit</button>

  </form>






  </div>

  </section>





</body>
</html>
