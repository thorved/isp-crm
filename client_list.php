<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];


$sql = "delete from clients WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();



$msg="Data Deleted successfully";
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
	
	<title>Manage Clients</title>

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

						<h2 class="page-title"><i class="fa fa-users"></i> &nbsp;Manage Clients</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">List Clients</div>
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
												<th scope="col">Box</th>
												<th scope="col">Core</th>
                                                
                                                
											<th scope="col">Action</th>	
										</tr>
									</thead>
									
									<tbody>

<?php $sql = "SELECT clients.id as ClientID,client_name,client_id,client_number,plan,cost,expiry_date,status,boxes.box_address,boxes.box_core,boxes.id as BoxID from clients,boxes where box=box_address ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td data-label="#"><?php echo htmlentities($cnt);?></td>
											 
														<td data-label="Name"><a <?php if ($result->status == "In-Active") echo 'style="color:red"';?> href="client_view.php?cid=<?php echo $result->ClientID;?>">
														<?php echo htmlentities($result->client_name); ?></a></td>
                                            <td data-label="Client Id"><?php echo htmlentities($result->client_id);?></td>
                                            <td data-label="Client No."><?php echo htmlentities($result->client_number);?></td>
											<td data-label="Plan"><?php echo htmlentities($result->plan);?></td>
                                            <td data-label="Cost"><?php echo htmlentities($result->cost);?></td>
                                            <td data-label="Expiry Date"><?php $formatexpiry_date = new DateTime($result->expiry_date); echo htmlentities($formatexpiry_date->format('d-m-Y'));?></td>
											
											<td data-label="Box"><a href="box_view.php?cid=<?php echo $result->BoxID;?>">
														<?php echo htmlentities($result->box_address); ?></a></td>
											 <td data-label="Core"><?php echo htmlentities($result->box_core);?></td>			
											
                             
											
<td data-label="Action">
<a href="client_edit.php?edit=<?php echo $result->ClientID;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="client_list.php?del=<?php echo $result->ClientID;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
