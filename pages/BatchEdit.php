<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){

  $bid = mysqli_real_escape_string($mysqli, $_POST['BatchId']);
	$bname = mysqli_real_escape_string($mysqli, $_POST['BatchNumber']);
	$bprodname = mysqli_real_escape_string($mysqli, $_POST['ProductsName']);
	$bexpdate = mysqli_real_escape_string($mysqli, $_POST['BatchExpDate']);
	$bstatus = mysqli_real_escape_string($mysqli, $_POST['Batchstatus']);


	// checking empty fields
  if(empty($bid) || empty($bname) || empty($bprodname) ) {
      echo "error";
  } else {
    $compareid=$_GET['id'];
		if($bstatus=="byes"){
      		$update = mysqli_query($mysqli, "UPDATE Batch SET BatchId='$bid',BatchNumber='$bname',ProductId='$bprodname',BatchExpDate='$bexpdate',Status=1 WHERE BatchId=$compareid");
     }
    else {
      		$update = mysqli_query($mysqli, "UPDATE Batch SET BatchId='$bid',BatchNumber='$bname',ProductId='$bprodname',BatchExpDate='$bexpdate',Status=0 WHERE BatchId=$compareid");
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
$result = mysqli_query($mysqli, "SELECT * FROM Batch WHERE BatchId=$id");

while($batres = mysqli_fetch_array($result)){
  $id=$batres['BatchId'];
  $num=$batres['BatchNumber'];
  $pid=$batres['ProductId'];
  $bed=$batres['BatchExpDate'];
  $st=$batres['Status'];
}
$mysqli->close();
?>

<?php
$productssqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$productsresult = mysqli_query($productssqli, "SELECT ProductId,ProductName FROM Product;");
$allprodsid=[];
$allprodsname=[];
while($listprods = mysqli_fetch_array($productsresult)) {
	array_push($allprodsid, $listprods['ProductId']);
	array_push($allprodsname,$listprods['ProductName']);
}
$productssqli->close();
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

  <h1> Update Batch</h1>


  <form id="BatchUpdateForm" method="post" name="BatchUpdateForm">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Batch ID : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="BatchId" value="<?php echo $id;?>"><br><br >
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Batch Number : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="BatchNumber" value="<?php echo $num;?>"><br><br >
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product : </b>
      </div>
  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="ProductsName" id="ProdName">
  				<?php
  				for ($x = 0; $x < sizeof($allprodsid); $x++) {
  					?>
    					<option value="<?php echo $allprodsid[$x]; ?>"><?php echo $allprodsname[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br><br>
  		</div>


      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Batch Exp Date : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12" >
        <input required type="text" name="BatchExpDate" value="<?php echo $bed;?>">
          <br><br >
      </div>



      <div class="col-lg-6 col-md-12 col-sm-12">
            <b>Status : </b>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <select required name="Batchstatus" id="Byesno">
            <option value="byes">Yes</option>
            <option value="bno">No</option>
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
