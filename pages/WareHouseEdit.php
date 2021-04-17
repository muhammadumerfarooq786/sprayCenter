<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){

  	$wid = mysqli_real_escape_string($mysqli, $_POST['WareHouseId']);
  	$wname = mysqli_real_escape_string($mysqli, $_POST['WareHouseName']);
  	$wph1 = mysqli_real_escape_string($mysqli, $_POST['WareHousePhone1']);
  	$wph2 = mysqli_real_escape_string($mysqli, $_POST['WareHousePhone2']);
  	$winc = mysqli_real_escape_string($mysqli, $_POST['WareHouseIncharge']);
  	$waddr = mysqli_real_escape_string($mysqli, $_POST['WareHouseAddress']);

  	if(empty($wid) || empty($wname) || empty($wph1)|| empty($wph2) || empty($winc) || empty($waddr) ) {
        echo "error";
  	} else {
      $compareid=$_GET['id'];
      $updatewh = mysqli_query($mysqli, "UPDATE WareHouse SET WareHouseId='$wid',WareHouseName='$wname',WareHousePhone1='$wph1',WareHousePhone2='$wph2',WareHouseIncharge='$winc',WareHouseAddress='$waddr' WHERE WareHouseId=$compareid");
  		if(!$updatewh){
  				echo '<script>alert("Data Not Updated")</script>';
  		}
      $mysqli->close();
      header("Location: addingNew.php");
  	}
  }

  ?>




<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM WareHouse WHERE WareHouseId='$id'");

while($wres = mysqli_fetch_array($result)){
  $id=$wres['WareHouseId'];
  $name=$wres['WareHouseName'];
  $ph1=$wres['WareHousePhone1'];
  $ph2=$wres['WareHousePhone2'];
  $winc=$wres['WareHouseIncharge'];
  $waddr=$wres['WareHouseAddress'];
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

  <h1> WareHouse</h1>






  <form id="WareHouseupdateForm" method="post" name="WareHouseupdateForm">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>WareHouse ID : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="WareHouseId" value="<?php echo $id;?>"><br><br >
      </div>


      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>WareHouse Name : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="WareHouseName" value="<?php echo $name;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>WareHouse Phone1 : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="WareHousePhone1" value="<?php echo $ph1;?>">
          <br><br >
      </div>



  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>WareHouse Phone2 : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="WareHousePhone2" value="<?php echo $ph2;?>">
          <br><br >
      </div>



  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>WareHouse Incharge : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="WareHouseIncharge" value="<?php echo $winc;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
  				<b>WareHouse Address : </b>
  		</div>
  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<input required type="text" name="WareHouseAddress" value="<?php echo $waddr;?>">
  				<br><br >
  		</div>




    </div>

    <button type="submit" class="btn btn-dark btn-md" name="update" >Submit</button>

  </form>








  </div>

  </section>





</body>
</html>
