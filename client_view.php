<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['cid']))
	{
		$cid=$_GET['cid'];
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
	
	<title>Detail's</title>

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
		$sql = "SELECT * from clients where id = :cid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':cid',$cid,PDO::PARAM_INT);
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
						<h3 class="page-title">Client Detail: <?php echo htmlentities($result->client_name); ?></h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Details</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">







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