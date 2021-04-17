<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])){

  $prodid = mysqli_real_escape_string($mysqli, $_POST['ProductId']);
	$prodname = mysqli_real_escape_string($mysqli, $_POST['ProductName']);
	$prodpac = mysqli_real_escape_string($mysqli, $_POST['ProductPacking']);
	$produnit = mysqli_real_escape_string($mysqli, $_POST['ProductUnit']);
	$prodpacunit=$prodpac + $produnit;
	$prodcompany = mysqli_real_escape_string($mysqli, $_POST['ProductCompanyId']);
	$prodprodid = mysqli_real_escape_string($mysqli, $_POST['ProductTypeId']);
	$prodppc = mysqli_real_escape_string($mysqli, $_POST['PPC']);
	$prodprodprice = mysqli_real_escape_string($mysqli, $_POST['ProductPrice']);
	$prodstkprc = mysqli_real_escape_string($mysqli, $_POST['StockPrice']);
	$prodstat = mysqli_real_escape_string($mysqli, $_POST['ProductStatus']);
	$prodminstk = mysqli_real_escape_string($mysqli, $_POST['MinimumStock']);
	$prodcatid = mysqli_real_escape_string($mysqli, $_POST['ProductCatId']);



	// checking empty fields
  if(empty($prodid) || empty($prodname) || empty($prodpac) ) {
      echo "error";
  } else {
    $compareid=$_GET['id'];
    if($prodstat=='pyes'){
      $update = mysqli_query($mysqli, "UPDATE Product SET ProductId='$prodid',ProductName='$prodname',ProductPacking='$prodpac',ProductUnit='$produnit',ProductPackingUnit='$prodpacunit',CompanyId='$prodcompany',ProductTypeId='$prodprodid',PPC='$prodppc',ProductPrice='$prodprodprice',StockPrice='$prodstkprc',Status=1,MinimumStock='$prodminstk',CategoryId='$prodcatid' WHERE ProductId=$compareid" );
     }
    else {
      $update = mysqli_query($mysqli, "UPDATE Product SET ProductId='$prodid',ProductName='$prodname',ProductPacking='$prodpac',ProductUnit='$produnit',ProductPackingUnit='$prodpacunit',CompanyId='$prodcompany',ProductTypeId='$prodprodid',PPC='$prodppc',ProductPrice='$prodprodprice',StockPrice='$prodstkprc',Status=0,MinimumStock='$prodminstk',CategoryId='$prodcatid' WHERE ProductId=$compareid");
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
$result = mysqli_query($mysqli, "SELECT * FROM Product WHERE ProductId=$id");

while($pres = mysqli_fetch_array($result)){

  $pprodid =  $pres['ProductId'];
	$pprodname =  $pres['ProductName'];
	$pprodpac =  $pres['ProductPacking'];
	$pprodunit = $pres['ProductUnit'];
	$pprodpacunit=$pres['ProductPackingUnit'];
	$pprodcompany =  $pres['CompanyId'];
	$pprodprodid =  $pres['ProductTypeId'];
	$pprodppc =  $pres['PPC'];
	$pprodprodprice =  $pres['ProductPrice'];
	$pprodstkprc =  $pres['StockPrice'];
	$pprodstat =  $pres['Status'];
	$pprodminstk =  $pres['MinimumStock'];
	$pprodcatid = $pres['CategoryId'];
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
$productCompsqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$productComp = mysqli_query($productCompsqli, "SELECT CompanyId,CompanyName FROM Company;");
$allcomp=[];
$allCompname=[];
while($listcomp = mysqli_fetch_array($productComp)) {
	array_push($allcomp, $listcomp['CompanyId']);
	array_push($allCompname,$listcomp['CompanyName']);
}
$productCompsqli->close();
?>



<?php
$producttypeidsqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$producttypeid = mysqli_query($producttypeidsqli, "SELECT ProductTypeId,ProductTypeName FROM ProductType;");
$allprodtypeid=[];
$allprodtypename=[];
while($listprodtype = mysqli_fetch_array($producttypeid)) {
	array_push($allprodtypeid, $listprodtype['ProductTypeId']);
	array_push($allprodtypename,$listprodtype['ProductTypeName']);
}
$producttypeidsqli->close();
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

  <h1> Update Product</h1>





  <form id="UpdateProductForm" method="post" name="UpdateProductForm">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product ID : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="ProductId" value="<?php echo $pprodid;?>"><br><br >
      </div>


      <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product Name : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="ProductName" value="<?php echo $pprodname;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product Packing : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="ProductPacking" value="<?php echo $pprodpac;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product Unit : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="ProductUnit" value="<?php echo $pprodunit;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Company Name : </b>
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="ProductCompanyId" id="ProdCompanyId">
  				<?php
  				for ($x = 0; $x < sizeof($allcomp); $x++) {
  					?>
    					<option value="<?php echo $allcomp[$x]; ?>"><?php echo $allCompname[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br><br>
  		</div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Type Name : </b>
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="ProductTypeId" id="ProdTypeId">
  				<?php
  				for ($x = 0; $x < sizeof($allprodtypeid); $x++) {
  					?>
    					<option value="<?php echo $allprodtypeid[$x]; ?>"><?php echo $allprodtypename[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br><br>
  		</div>







  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>PPC : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="PPC" value="<?php echo $pprodppc;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product Price : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="ProductPrice" value="<?php echo $pprodprodprice;?>"><br><br >
      </div>



  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Stock Price : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
          <input required type="number" name="StockPrice" value="<?php echo $pprodstkprc;?>"><br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
  					<b>Product Status : </b>
  		</div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="ProductStatus" id="productyesno">
  					<option value="pyes">Yes</option>
  					<option value="pno">No</option>
  			</select>
  			<br ><br>
  		</div>



  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Minimum Stock : </b>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="text" name="MinimumStock" value="<?php echo $pprodminstk;?>">
          <br><br >
      </div>


  		<div class="col-lg-6 col-md-12 col-sm-12">
          <b>Category Id : </b>
      </div>

  		<div class="col-lg-6 col-md-12 col-sm-12">
  			<select required name="ProductCatId" id="ProdCatId">
  				<?php
  				for ($x = 0; $x < sizeof($allcat); $x++) {
  					?>
    					<option value="<?php echo $allcat[$x]; ?>"><?php echo $allsubCat[$x]; ?></option>
  						<?php
  					}
  				?>
  			</select>
  			<br><br>
  		</div>

  	</div>





    <button type="submit" class="btn btn-dark btn-md" name="update">Submit</button>

  </form>


  </div>

  </section>





</body>
</html>
