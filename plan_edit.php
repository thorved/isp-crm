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
	
	
	$plan_name=$_POST['plan_name'];
	$plan_cost=$_POST['plan_cost'];
	$remark=$_POST['remark'];
		
		
	$sql1="UPDATE clients,plans SET plan=(:plan_name) WHERE plans.id=(:idedit) and clients.plan=plans.plan_name;";
	
	$query1 = $dbh->prepare($sql1);
	$query1-> bindParam(':plan_name', $plan_name, PDO::PARAM_STR);
	$query1-> bindParam(':idedit', $editid, PDO::PARAM_INT);
	

	$sql="UPDATE plans SET plan_name=(:plan_name), plan_cost=(:plan_cost), remark=(:remark)    WHERE id=(:idedit);";
	
	$query = $dbh->prepare($sql);
	$query-> bindParam(':plan_name', $plan_name, PDO::PARAM_STR);
	$query-> bindParam(':plan_cost', $plan_cost, PDO::PARAM_STR);
	$query-> bindParam(':remark', $remark, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $editid, PDO::PARAM_INT);
	
	
	
	
	if($query1->execute()&&$query->execute())
	{
	$msg="Plan Updated Successfully"; 
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
	
	<title>Edit Plan</title>

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
		$sql = "SELECT * from plans where id = :editid";
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
						<h3 class="page-title">Edit Plan : <?php echo htmlentities($result->plan_name); ?></h3>
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
<label class="col-sm-2 control-label">Plan Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="plan_name" class="form-control" required value="<?php echo htmlentities($result->plan_name);?>">
</div>
<label class="col-sm-2 control-label">Plan Cost<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="plan_cost" class="form-control" required value="<?php echo htmlentities($result->plan_cost);?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Remark</label>
<div class="col-sm-4">
<textarea rows="3"  name="remark" class="form-control"  value=""><?php echo htmlentities($result->remark);?></textarea>
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