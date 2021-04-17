<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){

  $pid = mysqli_real_escape_string($mysqli, $_POST['SchemeId']);
	$pname = mysqli_real_escape_string($mysqli, $_POST['SchemeName']);
	$pdetail = mysqli_real_escape_string($mysqli, $_POST['SchemeDetails']);
	$pstdate = mysqli_real_escape_string($mysqli, $_POST['StartDate']);
	$pendate = mysqli_real_escape_string($mysqli, $_POST['EndDate']);
	$pyear = mysqli_real_escape_string($mysqli, $_POST['Year']);
	$pamount = mysqli_real_escape_string($mysqli, $_POST['Amount']);
	$pdisc = mysqli_real_escape_string($mysqli, $_POST['SchemeDiscout']);
	$ppst = mysqli_real_escape_string($mysqli, $_POST['PST']);


	// checking empty fields
  if(empty($pid) || empty($pname) || empty($pdetail) ) {
      echo "error";
  } else {
    $compareid=$_GET['id'];
		$update = mysqli_query($mysqli, "UPDATE Scheme SET SchemeId='$pid',SchemeName='$pname',SchemeDetails='$pdetail',StartDate='$pstdate',EndDate='$pendate',Year='$pyear',Amount='$pamount',SchemeDiscout='$pdisc',PST='$ppst' WHERE SchemeId=$compareid");
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
$result = mysqli_query($mysqli, "SELECT * FROM Scheme WHERE SchemeId=$id");

while($pres = mysqli_fetch_array($result)){
  $id =  $pres['SchemeId'];
	$name =  $pres['SchemeName'];
	$detail = $pres['SchemeDetails'];
	$stdate =  $pres['StartDate'];
	$endate = $pres['EndDate'];
	$year =  $pres['Year'];
	$amount =  $pres['Amount'];
	$disc =  $pres['SchemeDiscout'];
	$pst =  $pres['PST'];

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

  <h1> Policy</h1>




  <form id="PolicyForm" method="post" name="PolicyForm">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Policy Id : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="SchemeId" value="<?php echo $id;?>"><br><br >
      </div>


      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Policy Name : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="SchemeName" value="<?php echo $name;?>">
          <br><br >
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Policy Details : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="SchemeDetails" value="<?php echo $detail;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Start Date : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="StartDate" value="<?php echo $stdate;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>End Date : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="EndDate" value="<?php echo $endate;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Year : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="Year" value="<?php echo $year;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Amount : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="Amount" value="<?php echo $amount;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Policy Discount : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="SchemeDiscout" value="<?php echo $disc;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>PST : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="PST" value="<?php echo $pst;?>">
          <br><br >
      </div>




    </div>

    <button type="submit" class="btn btn-dark btn-md" name="update" >Submit</button>

  </form>








  </div>

  </section>





</body>
</html>
