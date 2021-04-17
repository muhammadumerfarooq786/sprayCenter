<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$result = mysqli_query($mysqli, "SELECT * FROM Area WHERE Status=1 ORDER BY AreaId;");

if(isset($_POST['areaSubmitted'])){

	$id = mysqli_real_escape_string($mysqli, $_POST['AreaId']);
	$name = mysqli_real_escape_string($mysqli, $_POST['AreaName']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);

	if(empty($name) || empty($name) || empty($status) ) {
      echo "error";
	} else {
    if($status=="yes"){
          $newArea = mysqli_query($mysqli, "INSERT INTO Area(AreaId,AreaName,Status) VALUES('$id','$name',1)");
    }
    else {
          $newArea = mysqli_query($mysqli, "INSERT INTO Area(AreaId,AreaName,Status) VALUES('$id','$name',0)");
    }
		if(!$newArea){
			echo '<script>alert("Area Id Already Exist. Data Not inserted")</script>';
		}

    $mysqli->close();
    header("Refresh:0");

	}
}

?>


<!-- accounts -->

<?php
$accountsqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$accountResult = mysqli_query($accountsqli, "SELECT * FROM Accounts WHERE Status=1 ORDER BY Account;");
if(isset($_POST['accountSubmitted'])){

	$accCode = mysqli_real_escape_string($accountsqli, $_POST['AccountCode']);
	$accCatId = mysqli_real_escape_string($accountsqli, $_POST['AccountCatId']);
	$accAreaId = mysqli_real_escape_string($accountsqli, $_POST['AccountAreaId']);
	$accAcc = mysqli_real_escape_string($accountsqli, $_POST['AccountAccount']);
	$accAddr = mysqli_real_escape_string($accountsqli, $_POST['AccountAddress']);
	$accPho = mysqli_real_escape_string($accountsqli, $_POST['AccountPhone']);
	$accStatus = mysqli_real_escape_string($accountsqli, $_POST['Accountstatus']);
	if(empty($accCode) || empty($accAcc) || empty($accAddr) ) {
      echo "error";
	} else {
		if($accStatus=='accyes'){
			$newAccount = mysqli_query($accountsqli, "INSERT INTO Accounts(AccountsId,CategoryId,Account,Address,PhoneNumber,Status,AreaId) VALUES('$accCode','$accCatId','$accAcc','$accAddr','$accPho',1,'$accAreaId')");
		}
		else{
			$newAccount = mysqli_query($accountsqli, "INSERT INTO Accounts(AccountsId,CategoryId,Account,Address,PhoneNumber,Status,AreaId) VALUES('$accCode','$accCatId','$accAcc','$accAddr','$accPho',0,'$accAreaId')");
		}

		  if(!$newAccount){
				echo '<script>alert("Account Id Already Exist. Data Not inserted")</script>';
		  }


    $accountsqli->close();
    header("Refresh:0");

	}
}



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




<!-- warehouse -->
<?php
$warehousesqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$warehouseResult = mysqli_query($warehousesqli, "SELECT * FROM WareHouse ORDER BY WareHouseName;");


if(isset($_POST['warehouseSubmitted'])){

	$wid = mysqli_real_escape_string($warehousesqli, $_POST['WareHouseId']);
	$wname = mysqli_real_escape_string($warehousesqli, $_POST['WareHouseName']);
	$wph1 = mysqli_real_escape_string($warehousesqli, $_POST['WareHousePhone1']);
	$wph2 = mysqli_real_escape_string($warehousesqli, $_POST['WareHousePhone2']);
	$winc = mysqli_real_escape_string($warehousesqli, $_POST['WareHouseIncharge']);
	$waddr = mysqli_real_escape_string($warehousesqli, $_POST['WareHouseAddress']);

	if(empty($wid) || empty($wname) || empty($wph1)|| empty($wph2) || empty($winc) || empty($waddr) ) {
      echo "error";
	} else {
        $newWareHouse = mysqli_query($warehousesqli, "INSERT INTO WareHouse(WareHouseId,WareHouseName,WareHousePhone1,WareHousePhone2,WareHouseIncharge,WareHouseAddress) VALUES('$wid','$wname','$wph1','$wph2','$winc','$waddr')");
		    if(!$newWareHouse){
						echo '<script>alert("WareHouse with same Id Already Exist. Data Not inserted")</script>';
					}

    		$warehousesqli->close();
    		header("Refresh:0");

	}
}

?>


<!-- policy -->
<?php
$policysqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$policyresult = mysqli_query($policysqli, "SELECT * FROM Scheme ORDER BY Year;");
if(isset($_POST['policySubmitted'])){

	$pid = mysqli_real_escape_string($policysqli, $_POST['SchemeId']);
	$pname = mysqli_real_escape_string($policysqli, $_POST['SchemeName']);
	$pdetail = mysqli_real_escape_string($policysqli, $_POST['SchemeDetails']);
	$pstdate = mysqli_real_escape_string($policysqli, $_POST['StartDate']);
	$pendate = mysqli_real_escape_string($policysqli, $_POST['EndDate']);
	$pyear = mysqli_real_escape_string($policysqli, $_POST['Year']);
	$pamount = mysqli_real_escape_string($policysqli, $_POST['Amount']);
	$pdisc = mysqli_real_escape_string($policysqli, $_POST['SchemeDiscout']);
	$ppst = mysqli_real_escape_string($policysqli, $_POST['PST']);

	if(empty($pid) || empty($pname) || empty($pdetail) ) {
      echo "error";
	} else {
  	$newpolicy = mysqli_query($mysqli, "INSERT INTO Scheme(SchemeId,SchemeName,SchemeDetails,StartDate,EndDate,Year,Amount,SchemeDiscout,PST) VALUES('$pid','$pname','$pdetail','$pstdate','$pendate','$pyear','$pamount','$pdisc','$ppst')");
		if(!$newpolicy){
			echo '<script>alert("Policy Id Already Exist. Data Not inserted")</script>';
		}

    $policysqli->close();
    header("Refresh:0");

	}
}


?>


<!-- company -->

<?php
$comapnysqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$companyresult = mysqli_query($comapnysqli, "SELECT * FROM Company WHERE CompanyStatus=1 ORDER BY CompanyId;");

if(isset($_POST['companySubmitted'])){

	$comid = mysqli_real_escape_string($comapnysqli, $_POST['CompanyId']);
	$comname = mysqli_real_escape_string($comapnysqli, $_POST['CompanyName']);
	$comstatus = mysqli_real_escape_string($comapnysqli, $_POST['CompanyStatus']);

	if(empty($comid) || empty($comname) || empty($comstatus) ) {
      echo "error";
	} else {
    if($comstatus=="compyes"){
          $newcompany = mysqli_query($comapnysqli, "INSERT INTO Company(CompanyId,CompanyName,CompanyStatus) VALUES('$comid','$comname',1)");
    }
    else {
          $newcompany = mysqli_query($comapnysqli, "INSERT INTO Company(CompanyId,CompanyName,CompanyStatus) VALUES('$comid','$comname',0)");
    }
		if(!$newcompany){
			echo '<script>alert("Company Id Already Exist. Data Not inserted")</script>';
		}

    $comapnysqli->close();
    header("Refresh:0");

	}
}

?>


<!-- product type -->


<?php
$producttypesqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$ptresult = mysqli_query($producttypesqli, "SELECT * FROM ProductType WHERE Status=1 ORDER BY ProductTypeId;");

if(isset($_POST['producttypeSubmitted'])){

	$ptid = mysqli_real_escape_string($producttypesqli, $_POST['ProductTypeId']);
	$ptname = mysqli_real_escape_string($producttypesqli, $_POST['ProductTypeName']);
	$ptstatus = mysqli_real_escape_string($producttypesqli, $_POST['ProductTypeStatus']);

	if(empty($ptid) || empty($ptname) || empty($ptstatus) ) {
      echo "error";
	} else {
    if($ptstatus=="ptyes"){
          $newprodType = mysqli_query($producttypesqli, "INSERT INTO ProductType(ProductTypeId,ProductTypeName,Status) VALUES('$ptid','$ptname',1)");
    }
    else {
          $newprodType = mysqli_query($producttypesqli, "INSERT INTO ProductType(ProductTypeId,ProductTypeName,Status) VALUES('$ptid','$ptname',0)");
    }
		if(!$newprodType){
			echo '<script>alert("Product Type Id Already Exist. Data Not inserted")</script>';
		}

    $producttypesqli->close();
    header("Refresh:0");

	}
}

?>


<!-- product -->

<?php
$productsqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$productResult = mysqli_query($productsqli, "SELECT * FROM Product WHERE Status=1 ORDER BY ProductName;");
if(isset($_POST['productSubmitted'])){

	$prodid = mysqli_real_escape_string($productsqli, $_POST['ProductId']);
	$prodname = mysqli_real_escape_string($productsqli, $_POST['ProductName']);
	$prodpac = mysqli_real_escape_string($productsqli, $_POST['ProductPacking']);
	$produnit = mysqli_real_escape_string($productsqli, $_POST['ProductUnit']);
	$prodpacunit=$prodpac+$produnit;
	$prodcompany = mysqli_real_escape_string($productsqli, $_POST['ProductCompanyId']);
	$prodprodid = mysqli_real_escape_string($productsqli, $_POST['ProductTypeId']);
	$prodppc = mysqli_real_escape_string($productsqli, $_POST['PPC']);
	$prodprodprice = mysqli_real_escape_string($productsqli, $_POST['ProductPrice']);
	$prodstkprc = mysqli_real_escape_string($productsqli, $_POST['StockPrice']);
	$prodstat = mysqli_real_escape_string($productsqli, $_POST['ProductStatus']);
	$prodminstk = mysqli_real_escape_string($productsqli, $_POST['MinimumStock']);
	$prodcatid = mysqli_real_escape_string($productsqli, $_POST['ProductCatId']);

	if(empty($prodid) || empty($prodname) || empty($prodpac) ) {
      echo "error";
	} else {
		if($prodstat=='pyes'){
			$newProduct = mysqli_query($productsqli, "INSERT INTO Product(ProductId,ProductName,ProductPacking,ProductUnit,ProductPackingUnit,CompanyId,ProductTypeId,PPC,ProductPrice,StockPrice,Status,MinimumStock,CategoryId) VALUES('$prodid','$prodname','$prodpac','$produnit','$prodpacunit','$prodcompany','$prodprodid','$prodppc','$prodprodprice','$prodstkprc',1,'$prodminstk','$prodcatid')");
		}
		else{
			$newProduct = mysqli_query($productsqli, "INSERT INTO Product(ProductId,ProductName,ProductPacking,ProductUnit,ProductPackingUnit,CompanyId,ProductTypeId,PPC,ProductPrice,StockPrice,Status,MinimumStock,CategoryId) VALUES('$prodid','$prodname','$prodpac','$produnit','$prodpacunit','$prodcompany','$prodprodid','$prodppc','$prodprodprice','$prodstkprc',0,'$prodminstk','$prodcatid')");
		}

		  if(!$newProduct){
				echo '<script>alert("Product Id Already Exist. Data Not inserted")</script>';
		  }


    $productsqli->close();
    header("Refresh:0");

	}
}



?>


<!-- batch -->

<?php
$batchsqli = mysqli_connect('localhost', 'root', '', 'sprayCenter');
$batchresult = mysqli_query($batchsqli, "SELECT * FROM Batch WHERE Status=1 ORDER BY BatchNumber;");

if(isset($_POST['batchSubmitted'])){

	$bid = mysqli_real_escape_string($batchsqli, $_POST['BatchId']);
	$bname = mysqli_real_escape_string($batchsqli, $_POST['BatchNumber']);
	$bprodname = mysqli_real_escape_string($batchsqli, $_POST['ProductsName']);
	$bexpdate = mysqli_real_escape_string($batchsqli, $_POST['BatchExpDate']);
	$bstatus = mysqli_real_escape_string($batchsqli, $_POST['Batchstatus']);

	if(empty($bid) || empty($bname) || empty($bprodname) ) {
      echo "error";
	} else {
    if($bstatus=="byes"){
          $newBatch = mysqli_query($batchsqli, "INSERT INTO Batch(BatchId,BatchNumber,ProductId,BatchExpDate,Status) VALUES('$bid','$bname','$bprodname','$bexpdate',1)");
    }
    else {
					$newBatch = mysqli_query($batchsqli, "INSERT INTO Batch(BatchId,BatchNumber,ProductId,BatchExpDate,Status) VALUES('$bid','$bname','$bprodname','$bexpdate',0)");
		}
		if(!$newBatch){
			echo '<script>alert("Batch Id Already Exist. Data Not inserted")</script>';
		}

    $batchsqli->close();
    header("Refresh:0");

	}
}

?>

<html>

<head>
  <meta charset="utf-8">
  <title>Adding New</title>
  <link rel="shortcut icon" type="image/ico" href="../images/favicon.ico"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="addingNew.css">
	<link rel="stylesheet" href="../javascript/accounttoggle.css">
	<link rel="stylesheet" href="../javascript/warehousetoggle.css">
	<link rel="stylesheet" href="../javascript/policytoggle.css">
	<link rel="stylesheet" href="../javascript/companytoggle.css">
	<link rel="stylesheet" href="../javascript/ProductTypetoggle.css">
	<link rel="stylesheet" href="../javascript/producttoggle.css">
	<link rel="stylesheet" href="../javascript/batchtoggle.css">



  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script type="text/javascript" src="../javascript/addingnew.js"></script>
	<script type="text/javascript" src="../javascript/accounttoggle.js"></script>
	<script type="text/javascript" src="../javascript/warehousetoggle.js"></script>
	<script type="text/javascript" src="../javascript/policytoggle.js"></script>
	<script type="text/javascript" src="../javascript/companytoggle.js"></script>
	<script type="text/javascript" src="../javascript/ProductTypetoggle.js"></script>
	<script type="text/javascript" src="../javascript/producttoggle.js"></script>
	<script type="text/javascript" src="../javascript/batchtoggle.js"></script>

</head>


<body>
  <section class="colored-section" id="title">

  <div class="container-fluid">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#area">Area</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#account">Accounts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#warehouse">Warehouse</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#policy">Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#company">Company</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="#productType">Subtypes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#product">Products</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#batch">Batch No.</a>
          </li>
        </ul>

      </div>
    </nav>

  </div>

</section>


<section class="white-section" id="area">
  <div class="container-fluid">

<h1> Area</h1>
<button type="button" id="AreaButton" class="btn btn-dark btn-md add-area-button">Add New Area</button>



<form id="AreaForm" method="post" name="AreaForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Area ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="AreaId" ><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Area Name : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="AreaName">
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

  <button type="submit" class="btn btn-dark btn-md" name="areaSubmitted" id="AreaSubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Area ID</th>
		<th>Area Name</th>
		<th>Update</th>
	</tr>
	<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['AreaId']."</td>";
			echo "<td>".$res['AreaName']."</td>";
			echo "<td><a href=\"AreaEdit.php?id=$res[AreaId]\">Edit</a> | <a href=\"AreaDelete.php?id=$res[AreaId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $mysqli->close();

	?>
	</table>

</div>

</section>





<section class="white-section" id="account">
  <div class="container-fluid">

<h1> Account</h1>
<button type="button" id="AccountButton" class="btn btn-dark btn-md add-area-button">Add New Account</button>



<form id="AccountForm" method="post" name="AccountForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Code : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="AccountCode"><br><br >
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
      <input required type="text" name="AccountAccount">
        <br><br >
    </div>

		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Address: </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="AccountAddress">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
				<b>Phone No: </b>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12">
			<input required type="text" name="AccountPhone">
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




  <button type="submit" class="btn btn-dark btn-md" name="accountSubmitted" id="AccountSubmit">Submit</button>

</form>



<table>

	<tr>
		<th>Code</th>
		<th>Account</th>
		<th>Address</th>
		<th>Phone No.</th>
		<th>Area</th>
		<th>Update</th>
	</tr>
	<?php
		function getNewArea($newaread,$arr){
			for($x=0; $x<sizeof($arr);$x++){
				if((int)$arr[$x]===(int)$newaread){
					return $x;
				}
			}
			return 0;
		}

		while($accResult = mysqli_fetch_array($accountResult)) {
			echo "<tr>";
			echo "<td>".$accResult['AccountsId']."</td>";
			echo "<td>".$accResult['Account']."</td>";
			echo "<td>".$accResult['Address']."</td>";
			echo "<td>".$accResult['PhoneNumber']."</td>";
			echo "<td>".$allareaname[getNewArea($accResult['AreaId'],$allareas)]."</td>";
			echo "<td><a href=\"AccountEdit.php?id=$accResult[AccountsId]\">Edit</a> | <a href=\"AccountDelete.php?id=$accResult[AccountsId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $accountsqli->close();

	?>
	</table>






</div>

</section>





<section class="white-section" id="warehouse">
  <div class="container-fluid">

<h1> WareHouse</h1>
<button type="button" id="WareHouseButton" class="btn btn-dark btn-md add-area-button">Add New WareHouse</button>



<form id="WareHouseForm" method="post" name="WareHouseForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>WareHouse ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="WareHouseId"><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>WareHouse Name : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="WareHouseName">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>WareHouse Phone1 : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="WareHousePhone1">
        <br><br >
    </div>



		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>WareHouse Phone2 : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="WareHousePhone2">
        <br><br >
    </div>



		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>WareHouse Incharge : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="WareHouseIncharge">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
				<b>WareHouse Address : </b>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12">
			<input required type="text" name="WareHouseAddress">
				<br><br >
		</div>




  </div>

  <button type="submit" class="btn btn-dark btn-md" name="warehouseSubmitted" id="WareHouseSubmit">Submit</button>

</form>




<table>

	<tr>
		<th>WareHouse ID</th>
		<th>WareHouse Name</th>
		<th>WareHouse Phone1</th>
		<th>WareHouse Phone2</th>
		<th>WareHouse Incharge</th>
		<th>WareHouse Address</th>
		<th>Update</th>
	</tr>
	<?php
		while($wres = mysqli_fetch_array($warehouseResult)) {
			echo "<tr>";
			echo "<td>".$wres['WareHouseId']."</td>";
			echo "<td>".$wres['WareHouseName']."</td>";
			echo "<td>".$wres['WareHousePhone1']."</td>";
			echo "<td>".$wres['WareHousePhone2']."</td>";
			echo "<td>".$wres['WareHouseIncharge']."</td>";
			echo "<td>".$wres['WareHouseAddress']."</td>";
			echo "<td><a href=\"WareHouseEdit.php?id=$wres[WareHouseId]\">Edit</a> | <a href=\"WareHouseDelete.php?id=$wres[WareHouseId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $warehousesqli->close();

	?>
	</table>

</div>

</section>




<section class="white-section" id="policy">
  <div class="container-fluid">

<h1> Policies</h1>
<button type="button" id="PolicyButton" class="btn btn-dark btn-md add-area-button">Add New Policy</button>



<form id="PolicyForm" method="post" name="PolicyForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Policy Id : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="SchemeId"><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Policy Name : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="SchemeName">
        <br><br >
    </div>

		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Policy Details : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="SchemeDetails">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Start Date : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="StartDate">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>End Date : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="EndDate">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Year : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="number" name="Year">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Amount : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="number" name="Amount">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Policy Discount : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="number" name="SchemeDiscout">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>PST : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="PST">
        <br><br >
    </div>




  </div>

  <button type="submit" class="btn btn-dark btn-md" name="policySubmitted" id="PolicySubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Policy Id</th>
		<th>Policy Name</th>
		<th>Policy Details </th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Year</th>
		<th>Amount</th>
		<th>Policy Discount</th>
		<th>PST</th>
		<th>Update</th>
	</tr>
	<?php
		while($pres = mysqli_fetch_array($policyresult)) {
			echo "<tr>";
			echo "<td>".$pres['SchemeId']."</td>";
			echo "<td>".$pres['SchemeName']."</td>";
			echo "<td>".$pres['SchemeDetails']."</td>";
			echo "<td>".$pres['StartDate']."</td>";
			echo "<td>".$pres['EndDate']."</td>";
			echo "<td>".$pres['Year']."</td>";
			echo "<td>".$pres['Amount']."</td>";
			echo "<td>".$pres['SchemeDiscout']."</td>";
			echo "<td>".$pres['PST']."</td>";
			echo "<td><a href=\"PolicyEdit.php?id=$pres[SchemeId]\">Edit</a> | <a href=\"PolicyDelete.php?id=$pres[SchemeId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $policysqli->close();

	?>
	</table>

</div>

</section>




<section class="white-section" id="company">
  <div class="container-fluid">

<h1> Company</h1>
<button type="button" id="CompanyButton" class="btn btn-dark btn-md add-area-button">Add New Company</button>



<form id="CompanyForm" method="post" name="CompanyForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Company ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="CompanyId"><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Company Name : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="CompanyName">
        <br><br >
    </div>



    <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Company Status : </b>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
      <select required name="CompanyStatus" id="companyyesno">
          <option value="compyes">Yes</option>
          <option value="compno">No</option>
      </select>




      <br ><br>
    </div>
  </div>

  <button type="submit" class="btn btn-dark btn-md" name="companySubmitted" id="CompanySubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Company ID</th>
		<th>Company Name</th>
		<th>Update</th>
	</tr>
	<?php
		while($comres = mysqli_fetch_array($companyresult)) {
			echo "<tr>";
			echo "<td>".$comres['CompanyId']."</td>";
			echo "<td>".$comres['CompanyName']."</td>";
			echo "<td><a href=\"CompanyEdit.php?id=$comres[CompanyId]\">Edit</a> | <a href=\"CompanyDelete.php?id=$comres[CompanyId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $comapnysqli->close();

	?>
	</table>

</div>

</section>





<section class="white-section" id="productType">
  <div class="container-fluid">

<h1> Product Type</h1>
<button type="button" id="ProductTypeButton" class="btn btn-dark btn-md add-area-button">Add New Product Type</button>



<form id="ProductTypeForm" method="post" name="ProductTypeForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Type ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="ProductTypeId"><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Type : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="ProductTypeName">
        <br><br >
    </div>



    <div class="col-lg-6 col-md-12 col-sm-12">
          <b>Product Type Status : </b>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
      <select required name="ProductTypeStatus" id="productTypeyesno">
          <option value="ptyes">Yes</option>
          <option value="ptno">No</option>
      </select>




      <br ><br>
    </div>
  </div>

  <button type="submit" class="btn btn-dark btn-md" name="producttypeSubmitted" id="ProductTypeSubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Product Type ID</th>
		<th>Product Type Name</th>
		<th>Update</th>
	</tr>
	<?php
		while($ptres = mysqli_fetch_array($ptresult)) {
			echo "<tr>";
			echo "<td>".$ptres['ProductTypeId']."</td>";
			echo "<td>".$ptres['ProductTypeName']."</td>";
			echo "<td><a href=\"ProdTypeEdit.php?id=$ptres[ProductTypeId]\">Edit</a> | <a href=\"ProdTypeDelete.php?id=$ptres[ProductTypeId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $producttypesqli->close();

	?>
	</table>

</div>

</section>






<section class="white-section" id="product">
  <div class="container-fluid">

<h1> Products</h1>
<button type="button" id="ProductButton" class="btn btn-dark btn-md add-area-button">Add New Product</button>



<form id="ProductForm" method="post" name="ProductForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="ProductId"><br><br >
    </div>


    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Name : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="ProductName">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Packing : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="ProductPacking">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Unit : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="ProductUnit">
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
      <input required type="text" name="PPC">
        <br><br >
    </div>


		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Product Price : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="ProductPrice"><br><br >
    </div>



		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Stock Price : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="StockPrice"><br><br >
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
      <input required type="text" name="MinimumStock">
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





  <button type="submit" class="btn btn-dark btn-md" name="productSubmitted" id="ProductSubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Product ID</th>
		<th>Product Name</th>
		<th>Product Packing</th>
		<th>Product Unit</th>
		<th>Company</th>
		<th>Product Type</th>
		<th>PPC</th>
		<th>Product Price</th>
		<th>Min Stock</th>
		<th>Update</th>
	</tr>
	<?php


		function getComp($newaread,$arr){
			for($x=0; $x<sizeof($arr);$x++){
				if((int)$arr[$x]===(int)$newaread){
					return $x;
				}
			}
			return 0;
		}


		while($pres = mysqli_fetch_array($productResult)) {
			echo "<tr>";
			echo "<td>".$pres['ProductId']."</td>";
			echo "<td>".$pres['ProductName']."</td>";
			echo "<td>".$pres['ProductPacking']."</td>";
			echo "<td>".$pres['ProductUnit']."</td>";
			echo "<td>".$allCompname[getComp($pres['CompanyId'],$allcomp)]."</td>";
			echo "<td>".$allprodtypename[getComp($pres['ProductTypeId'],$allprodtypeid)]."</td>";
			echo "<td>".$pres['PPC']."</td>";
			echo "<td>".$pres['ProductPrice']."</td>";
			echo "<td>".$pres['MinimumStock']."</td>";
			echo "<td><a href=\"ProductEdit.php?id=$pres[ProductId]\">Edit</a> | <a href=\"ProductDelete.php?id=$pres[ProductId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $productsqli->close();

	?>
	</table>

</div>

</section>








<section class="white-section" id="batch">
  <div class="container-fluid">

<h1> Batch</h1>
<button type="button" id="BatchButton" class="btn btn-dark btn-md add-area-button">Add New Batch</button>



<form id="BatchForm" method="post" name="BatchForm">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <b>Batch ID : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="BatchId" ><br><br >
    </div>

		<div class="col-lg-6 col-md-12 col-sm-12">
        <b>Batch Number : </b>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <input required type="number" name="BatchNumber" ><br><br >
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
    <div class="col-lg-6 col-md-12 col-sm-12">
      <input required type="text" name="BatchExpDate">
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

  <button type="submit" class="btn btn-dark btn-md" name="batchSubmitted" id="BatchSubmit">Submit</button>

</form>




<table>

	<tr>
		<th>Batch ID</th>
		<th>Batch Number</th>
		<th>Product</th>
		<th>Batch Expiry Date</th>
		<th>Status</th>
		<th>Update</th>
	</tr>
	<?php

		function getProds($newaread,$arr){
			for($x=0; $x<sizeof($arr);$x++){
				if((int)$arr[$x]===(int)$newaread){
					return $x;
				}
			}
			return 0;
		}
		while($batres = mysqli_fetch_array($batchresult)) {
			echo "<tr>";
			echo "<td>".$batres['BatchId']."</td>";
			echo "<td>".$batres['BatchNumber']."</td>";
			echo "<td>".$allprodsname[getProds($batres['ProductId'],$allprodsid)]."</td>";
			echo "<td>".$batres['BatchExpDate']."</td>";
			echo "<td>".$batres['Status']."</td>";

			echo "<td><a href=\"BatchEdit.php?id=$batres[BatchId]\">Edit</a> | <a href=\"BatchDelete.php?id=$batres[BatchId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
		}
    $batchsqli->close();

	?>
	</table>

</div>

</section>












</body>

</html>
