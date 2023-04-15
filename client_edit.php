<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {
	
	
	$client_name=$_POST['client_name'];
	$client_id=$_POST['client_id'];
	$client_pass=$_POST['client_pass'];
	$client_number=$_POST['client_number'];
	$client_address=$_POST['client_address'];
	$plan=$_POST['plan'];
	$cost=$_POST['cost'];
	$outstanding_cost=$_POST['outstanding_cost'];
	$box=$_POST['box'];
	$start_date=$_POST['start_date'];
	$expiry_date=$_POST['expiry_date'];
	$status=$_POST['status'];
	$remark=$_POST['remark'];
		

	$sql="UPDATE clients SET client_name=(:client_name), client_id=(:client_id), client_pass=(:client_pass), client_number=(:client_number), client_address=(:client_address), plan=(:plan),
			cost=(:cost),outstanding_cost=(:outstanding_cost),box=(:box),start_date=(:start_date),expiry_date=(:expiry_date),
			status=(:status),remark=(:remark)     WHERE id=(:idedit)";
	
	$query = $dbh->prepare($sql);
	$query-> bindParam(':client_name', $client_name, PDO::PARAM_STR);
	$query-> bindParam(':client_id', $client_id, PDO::PARAM_STR);
	$query-> bindParam(':client_pass', $client_pass, PDO::PARAM_STR);
	$query-> bindParam(':client_number', $client_number, PDO::PARAM_STR);
	$query-> bindParam(':client_address', $client_address, PDO::PARAM_STR);
	$query-> bindParam(':plan', $plan, PDO::PARAM_STR);
	$query-> bindParam(':cost', $cost, PDO::PARAM_STR);
	$query-> bindParam(':outstanding_cost', $outstanding_cost, PDO::PARAM_STR);
	$query-> bindParam(':box', $box, PDO::PARAM_STR);
	$query-> bindParam(':start_date', $start_date, PDO::PARAM_STR);
	$query-> bindParam(':expiry_date', $expiry_date, PDO::PARAM_STR);
	$query-> bindParam(':status', $status, PDO::PARAM_STR);
	$query-> bindParam(':remark', $remark, PDO::PARAM_STR);
	
	
	
	
	
	
	$query-> bindParam(':idedit', $editid, PDO::PARAM_INT);
	if($query->execute())
	{
	$msg="Client Updated Successfully"; 
	}else {$error="error"; } 
}    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Edit Client</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
<?php
		$sql = "SELECT * from clients where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Edit Client : <?php echo htmlentities($result->client_name); ?></h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">







<!-- _______________________________________________________________________________________________________________ -->
<div class="form-group">
<label class="col-sm-2 control-label">Client Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="client_name" class="form-control" required value="<?php echo htmlentities($result->client_name);?>">
</div>
<label class="col-sm-2 control-label">Client Number<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="client_number" class="form-control" required value="<?php echo htmlentities($result->client_number);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Client Id<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="client_id" class="form-control" required value="<?php echo htmlentities($result->client_id);?>">
</div>
<label class="col-sm-2 control-label">Client Password<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="client_pass" class="form-control" required value="<?php echo htmlentities($result->client_pass);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Client address<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea rows="3"  name="client_address" class="form-control" required value=""><?php echo htmlentities($result->client_address);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Plan<span style="color:red">*</span></label>

<div class="col-sm-4">
										<select id="plan" name="plan" class="form-control" required>

											
													<option value="all">Select Plan</option>

											<?php $sql = "SELECT plan_name from plans";
											$query = $dbh->prepare($sql);
											$query->execute();
											$resultsPlan = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($resultsPlan as $resultPlan) {				?>
													<option <?php if ($result->plan== $resultPlan->plan_name) echo "selected='selected'";?> value="<?php echo htmlentities($resultPlan->plan_name); ?>"><?php echo htmlentities($resultPlan->plan_name); ?></option>
											<?php 
												}
											} ?>


										</select>

									</div>



<label class="col-sm-2 control-label">Cost<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="cost" class="form-control" required value="<?php echo htmlentities($result->cost);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Outstanding Cost</label>
<div class="col-sm-4">
<input type="text" name="outstanding_cost" class="form-control" value="<?php echo htmlentities($result->outstanding_cost);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Box<span style="color:red">*</span></label>
<div class="col-sm-4">
										<select id="box" name="box" class="form-control" required>

											
													<option value="all">Select Box</option>

											<?php $sql = "SELECT box_address from boxes";
											$query = $dbh->prepare($sql);
											$query->execute();
											$resultsBox = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($resultsBox as $resultBox) {				?>
													<option <?php if ($result->box == $resultBox->box_address) echo "selected='selected'";?> value="<?php echo htmlentities($resultBox->box_address); ?>"><?php echo htmlentities($resultBox->box_address); ?></option>
											<?php 
												}
											} ?>


										</select>

									</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Start Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="start_date" class="form-control" required value="<?php echo htmlentities($result->start_date);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Expiry Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="expiry_date" class="form-control" required value="<?php echo htmlentities($result->expiry_date);?>">
</div>
<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
<div class="col-sm-4">
										<select name="status" class="form-control" required>
												<option <?php if ($result->status == "Active") echo "selected='selected'";?> value="Active">Active</option>
												<option <?php if ($result->status == "In-Active") echo "selected='selected'";?> value="In-Active">In-Active</option>
												
										</select>
									</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Remark</label>
<div class="col-sm-4">
<textarea rows="3"  name="remark" class="form-control" value=""><?php echo htmlentities($result->remark);?></textarea>
</div>
</div>



<!-- _______________________________________________________________________________________________________________ -->








<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
	</div>
</div>






</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?php } ?>