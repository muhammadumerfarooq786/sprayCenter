<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){
  $accCode = mysqli_real_escape_string($mysqli, $_POST['AccountCode']);
  $accCatId = mysqli_real_escape_string($mysqli, $_POST['AccountCatId']);
  $accAreaId = mysqli_real_escape_string($mysqli, $_POST['AccountAreaId']);
  $accAcc = mysqli_real_escape_string($mysqli, $_POST['AccountAccount']);
  $accAddr = mysqli_real_escape_string($mysqli, $_POST['AccountAddress']);
  $accPho = mysqli_real_escape_string($mysqli, $_POST['AccountPhone']);
  $accStatus = mysqli_real_escape_string($mysqli, $_POST['Accountstatus']);
  if(empty($accCode) || empty($accAcc) || empty($accAddr) ) {
      echo "error";
  } else {
    $compareid=$_GET['id'];
    if($accStatus=='accyes'){
      $Accountupdate = mysqli_query($mysqli, "UPDATE Accounts SET AccountsId='$accCode',CategoryId='$accCatId',Account='$accAcc', Address='$accAddr', PhoneNumber='$accPho',Status=1,AreaId='$accAreaId' WHERE AccountsId=$compareid");

    }
    else{
      $Accountupdate = mysqli_query($mysqli, "UPDATE Accounts SET AccountsId='$accCode',CategoryId='$accCatId',Account='$accAcc', Address='$accAddr', PhoneNumber='$accPho',Status=0,AreaId='$accAreaId' WHERE AccountsId=$compareid");
    }

      if(!$Accountupdate){
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
$result = mysqli_query($mysqli, "SELECT * FROM Accounts WHERE AccountsId=$id");

while($res = mysqli_fetch_array($result)){
	$id = $res['AccountsId'];
  $catId=$res['CategoryId'];
	$name = $res['Account'];
  $addr = $res['Address'];
  $phone = $res['PhoneNumber'];
	$status = $res['Status'];
  $areais=$res['AreaId'];
}
$mysqli->close();
?>




<?php
$accountCat = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$accountCatResult = mysqli_query($accountCat, "SELECT CategoryId,SubCategory FROM Category;");
$allcat=[];
$allsubCat=[];
while($listCat = mysqli_fetch_array($accountCatResult)) {
	array_push($allcat, $listCat['CategoryId']);
	array_push($allsubCat,$listCat['SubCategory']);
}
$accountCat->close();
?>


<?php
$accountArea = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$accountAreaResult = mysqli_query($accountArea, "SELECT AreaId,AreaName FROM Area;");
$allareas=[];
$allareaname=[];
while($listCat = mysqli_fetch_array($accountAreaResult)) {
	array_push($allareas, $listCat['AreaId']);
	array_push($allareaname, $listCat['AreaName']);
}
$accountArea->close();

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


  <section class="white-section" id="account">
    <div class="container-fluid">

  <h1> Update Accounts</h1>



  <form id="AccountForm" method="post" name="AccountForm">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Code : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="AccountCode" value="<?php echo $id;?>"><br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Category Id : </b>
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="AccountCatId" id="AccCatId">
  				<?php
  				for ($x = 0; $x < sizeof($allcat); $x++) {
  					?>
    					<option value="<?php echo $allcat[$x]; ?>"><?php echo $allsubCat[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br ><br>
  		</div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Area Id : </b>
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="AccountAreaId" id="AccAreaId">
  				<?php
  				for ($x = 0; $x < sizeof($allareas); $x++) {
  					?>
  						<option value="<?php echo $allareas[$x]; ?>"><?php echo $allareaname[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br ><br>
  		</div>



      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Account : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="AccountAccount" value="<?php echo $name;?>">
          <br><br >
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Address: </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="AccountAddress" value="<?php echo $addr;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
  				<b>Phone No: </b>
  		</div>
  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<input required type="text" name="AccountPhone" value="<?php echo $phone;?>">
  				<br><br >
  		</div>


      <div class="col-lg-6 col-md-12 col-sm-12">
            <b>Account Status : </b>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <select required name="Accountstatus" id="Accyesno">
            <option value="accyes">Yes</option>
            <option value="accno">No</option>
        </select>
        <br ><br>
      </div>
    </div>




    <button type="submit" class="btn btn-dark btn-md" name="update" id="AccountSubmit">Submit</button>

  </form>








  </div>

  </section>





</body>
</html>
