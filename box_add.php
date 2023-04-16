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


	
if(isset($_POST['submit']))
  {
	
	
	$box_address=$_POST['box_address'];
	$box_core=$_POST['box_core'];
	$onu_mac=$_POST['onu_mac'];
	$Installation_date=$_POST['Installation_date'];
	$remark=$_POST['remark'];
	
	

	$sql="Insert into boxes (box_address,box_core,onu_mac,Installation_date,remark)
values ((:box_address),(:box_core),(:onu_mac),(:Installation_date),(:remark))";
			
	$query = $dbh->prepare($sql);
	$query-> bindParam(':box_address', $box_address, PDO::PARAM_STR);
	$query-> bindParam(':box_core', $box_core, PDO::PARAM_STR);
	$query-> bindParam(':onu_mac', $onu_mac, PDO::PARAM_STR);
	$query-> bindParam(':Installation_date', $Installation_date, PDO::PARAM_STR);
	$query-> bindParam(':remark', $remark, PDO::PARAM_STR);
	

	
	
	
	
	

	if($query->execute())
	{
	$msg="Box Added Successfully"; 
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
	
	<title>Add Box</title>

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

	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title"><i class="fa fa-sitemap" aria-hidden="true"></i>&nbsp;Add Box</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add Box</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">







<!-- _______________________________________________________________________________________________________________ -->
<div class="form-group">
<label class="col-sm-2 control-label">Box Address<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea rows="2"  name="box_address" class="form-control" required value=""></textarea>
</div>
<label class="col-sm-2 control-label">Box Core<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="box_core" class="form-control" required value="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Onu Mac<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="onu_mac" class="form-control" required value="">
</div>
<label class="col-sm-2 control-label">Installation Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="Installation_date" class="form-control" required value="<?php echo date("Y-m-d");?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Remark</label>
<div class="col-sm-4">
<textarea rows="4"  name="remark" class="form-control" value=""></textarea>
</div>
</div>


<!-- _______________________________________________________________________________________________________________ -->








<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Add Box</button>
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