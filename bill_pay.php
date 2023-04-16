<?php
ob_start();
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['bill']))
	{
		$id=$_GET['bill'];
	}


	
if(isset($_POST['submit']))
  {
	//for null safety
	$client_name = "client_name";
	$client_number = "client_number";
	$start_date = "start_date";
	$payment_date = date("d-m-Y");
	$next_payment_date = "next_payment_date";
	$plan = "plan";
	$plan_cost = 0;
	$client_address = "client_address";
	$installation_charges = 0;
	$router_charges = 0;
	$amount_paid = 0;
	$outstanding_cost = 0;
	$other_charges = 0;
	
	if($_POST['client_name']!=null){$client_name=$_POST['client_name'];}
	if($_POST['client_number']!=null){$client_number=$_POST['client_number'];}
	if($_POST['start_date']!=null){$start_date=$_POST['start_date'];}
	//if($_POST['payment_date']!=null){$payment_date=$_POST['payment_date'];}
	if($_POST['next_expiry_date']!=null){$next_payment_date=$_POST['next_expiry_date'];}
	if($_POST['plan']!=null){$plan=$_POST['plan'];}
	if($_POST['cost']!=null){$plan_cost=$_POST['cost'];}
	if($_POST['client_address']!=null){$client_address=$_POST['client_address'];}
	if($_POST['installation_charges']!=null){$installation_charges=$_POST['installation_charges'];}
	if($_POST['router_charges']!=null){$router_charges=$_POST['router_charges'];}
	if($_POST['amount_received']!=null){$amount_paid=$_POST['amount_received'];}
	if($_POST['new_outstanding_cost']!=null){$outstanding_cost=$_POST['new_outstanding_cost'];}
	if($_POST['other_charges']!=null){$other_charges=$_POST['other_charges'];}
	
	
	//________________
	
	$amount_received=$_POST['amount_received'];
	$next_expiry_date=$_POST['next_expiry_date'];
	$new_outstanding_cost=$_POST['new_outstanding_cost'];
	$new_remark=$_POST['new_remark'];

		

	$sql="UPDATE clients SET expiry_date=(:next_expiry_date), outstanding_cost=(:new_outstanding_cost), remark=(:new_remark)    WHERE id=(:id)";
	
	$query = $dbh->prepare($sql);
	$query-> bindParam(':next_expiry_date', $next_expiry_date, PDO::PARAM_STR);
	$query-> bindParam(':new_outstanding_cost', $new_outstanding_cost, PDO::PARAM_STR);
	$query-> bindParam(':new_remark', $new_remark, PDO::PARAM_STR);
	
	
	$query-> bindParam(':id', $id, PDO::PARAM_INT);
	if($query->execute())
	{
		header('Location:invoice.php?client_name='.$client_name
		.'&client_number='.$client_number
		.'&start_date='.$start_date
		.'&payment_date='.$payment_date
		.'&next_payment_date='.$next_payment_date
		.'&plan='.$plan
		.'&plan_cost='.$plan_cost
		.'&client_address='.$client_address
		.'&installation_charges='.$installation_charges
		.'&router_charges='.$router_charges
		.'&amount_paid='.$amount_paid
		.'&outstanding_cost='.$outstanding_cost
		.'&other_charges='.$other_charges); 
	
	$msg="Bill Paid Successfully"; 
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
	
	<title>Pay Bill</title>

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
		$sql = "SELECT * from clients where id = :id";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
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
						<h3 class="page-title"><i class="fa fa-user"></i> Client : <?php echo htmlentities($result->client_name); ?></h3>
						<h4 class="page-title"><i class="fa fa-usd"></i> Cost : <?php echo htmlentities($result->cost); ?><br>
								
									<?php if($result->outstanding_cost!=0){?><br><i class="fa fa-balance-scale"></i> Outstanding Cost : <span style="color:red"><?php echo htmlentities($result->outstanding_cost); ?></span> <?php }?>
						</h4>
						<h4 class="page-title"><i class="fa fa-clock-o"></i> Expiry Date : <?php echo htmlentities($result->expiry_date); ?></h4>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Bill Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">







<!-- _______________________________________________________________________________________________________________ -->

<div class="form-group">
<label class="col-sm-2 control-label">Amount Received<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="amount_received" class="form-control"  required value="">
</div>
<label class="col-sm-2 control-label">Next Expiry Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="next_expiry_date" class="form-control" required value="<?php echo htmlentities($result->expiry_date);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Outstanding Cost</label>
<div class="col-sm-4">
<input type="text" name="new_outstanding_cost" class="form-control"   value="<?php echo htmlentities($result->outstanding_cost);?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Installation Charges </label>
<div class="col-sm-4">
<input type="text" name="installation_charges" class="form-control"   value="0">
</div>
<label class="col-sm-2 control-label">Router Charges </label>
<div class="col-sm-4">
<input type="text" name="router_charges" class="form-control"   value="0">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Other Charges</label>
<div class="col-sm-4">
<input type="text" name="other_charges" class="form-control"   value="0">
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Remark</label>
<div class="col-sm-4">
<textarea rows="3"  name="new_remark" class="form-control" value=""><?php echo htmlentities($result->remark);?></textarea>
</div>
</div>



<!-- _______________________________________________________________________________________________________________ -->








<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary " name="submit" type="submit">Pay Bill</button>
	</div>
</div>







									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row">
					<div class="col-md-12">
						
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Details</div>


									<div class="panel-body">








<!-- _______________________________________________________________________________________________________________ -->
<div class="form-group">
<label class="col-sm-2 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="client_name" class="form-control" required readonly value="<?php echo htmlentities($result->client_name);?>">
</div>
<label class="col-sm-2 control-label">Client Id</label>
<div class="col-sm-4">
<input type="text" name="client_id" class="form-control" readonly required value="<?php echo htmlentities($result->client_id);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">client Password</label>
<div class="col-sm-4">
<input type="text" name="client_pass" class="form-control" readonly required value="<?php echo htmlentities($result->client_pass);?>">
</div>
<label class="col-sm-2 control-label">Client Number</label>
<div class="col-sm-4">
<input type="text" name="client_number" class="form-control" readonly required value="<?php echo htmlentities($result->client_number);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Client Address</label>
<div class="col-sm-4">
<textarea rows="4"  name="client_address" class="form-control" readonly required value=""><?php echo htmlentities($result->client_address);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Plan</label>
<div class="col-sm-4">
<input type="text" name="plan" class="form-control" readonly required value="<?php echo htmlentities($result->plan);?>">
</div>
<label class="col-sm-2 control-label">Cost</label>
<div class="col-sm-4">
<input type="text" name="cost" class="form-control" readonly required value="<?php echo htmlentities($result->cost);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Outstanding Cost</label>
<div class="col-sm-4">
<input type="text" name="outstanding_cost" class="form-control" readonly required value="<?php echo htmlentities($result->outstanding_cost);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Box</label>
<div class="col-sm-4">
<input type="text" name="box" class="form-control" readonly required value="<?php echo htmlentities($result->box);?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Start Date</label>
<div class="col-sm-4">
<input type="text" name="start_date" class="form-control" readonly required value="<?php $formatstart_date = new DateTime($result->start_date); echo htmlentities($formatstart_date->format('d-m-Y'));?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Expiry Date</label>
<div class="col-sm-4">
<input type="text" name="expiry_date" class="form-control" readonly required value="<?php $formatexpiry_date = new DateTime($result->expiry_date); echo htmlentities($formatexpiry_date->format('d-m-Y'));?>">
</div>
<label class="col-sm-2 control-label">Status</label>
<div class="col-sm-4">
<input type="text" name="status" class="form-control" readonly required value="<?php echo htmlentities($result->status);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Remark</label>
<div class="col-sm-4">

<textarea rows="3"  name="remark" class="form-control" readonly required value=""><?php echo htmlentities($result->remark);?></textarea>
</div>

</div>

<!-- _______________________________________________________________________________________________________________ -->














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