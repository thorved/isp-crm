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
	<!-- For Responsive Table -->
	<link rel="stylesheet" href="css/table.css">

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
		$sql = "SELECT * from plans where id = :cid";
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
						<h3 class="page-title">Plan Detail: <?php echo htmlentities($result->plan_name); ?></h3>
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
<label class="col-sm-2 control-label">Plan Name</label>
<div class="col-sm-4">
<input type="text" name="plan_name" class="form-control" required readonly value="<?php echo htmlentities($result->plan_name);?>">
</div>
<label class="col-sm-2 control-label">Plan Cost</label>
<div class="col-sm-4">
<input type="text" name="plan_cost" class="form-control" readonly required value="<?php echo htmlentities($result->plan_cost);?>">
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
			
			<!--_____________________________________________________________-->

			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Clients Connected to This Box</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th scope="col">#</th>
											<!--	//<th>Image</th>-->
                                                <th scope="col">Name</th>
                                                <th scope="col">Client Id</th>
												<th scope="col">Client No.</th>
												<th scope="col">Plan</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Expiry Date</th>
												
                                                
                                                
											<th scope="col">Action</th>	
										</tr>
									</thead>
									
									<tbody>

<?php $sql = "SELECT clients.id,client_name,client_id,client_number,plan,cost,expiry_date from clients,plans WHERE clients.plan = plans.plan_name and plans.id = :cid";
$query = $dbh -> prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_INT);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td data-label="#"><?php echo htmlentities($cnt);?></td>
											
														<td data-label="Name"><a href="client_view.php?cid=<?php echo $result->id;?>">
														<?php echo htmlentities($result->client_name); ?></a></td>
                                            <td data-label="Client Id"><?php echo htmlentities($result->client_id);?></td>
                                            <td data-label="Client No."><?php echo htmlentities($result->client_number);?></td>
											<td data-label="Plan"><?php echo htmlentities($result->plan);?></td>
                                            <td data-label="Cost"><?php echo htmlentities($result->cost);?></td>
                                            <td data-label="Expiry Date"><?php $formatexpiry_date = new DateTime($result->expiry_date); echo htmlentities($formatexpiry_date->format('d-m-Y'));?></td>
											
											
                             
											
<td data-label="Action">
<a href="client_edit.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<!--____________________________________________________________________-->
			
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