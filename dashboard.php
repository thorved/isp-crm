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
//for clients group by core
$core = array(0,0,0,0,0);
$sql ="SELECT COUNT(clients.id), box_core FROM clients , boxes where clients.box = boxes.box_address GROUP BY boxes.box_core;";
$result = $connect->query($sql);
if ($result->num_rows > 0) {	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$core[$row["box_core"]] =  $row["COUNT(clients.id)"];
    }
} else {
    echo "0 results";
	
}


//for graph variable null safety
$rowcount=1;
while($rowcount<13){
	$monthClientAdded[$rowcount]=0;
	$monthClientLeft[$rowcount]=0;
	$rowcount++;
}
//for clients add by monthClientAdded
$sql ="SELECT MONTH(start_date),COUNT(id) FROM clients GROUP BY MONTH(start_date);";
$result = $connect->query($sql);
if ($result->num_rows > 0) {	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$monthClientAdded[$row["MONTH(start_date)"]] =  $row["COUNT(id)"];
    }
} else {
    echo "0 results";
	
}

//for clients add by monthClientLeft
$sql ="SELECT MONTH(expiry_date),COUNT(id) FROM clients WHERE status = 'In-Active' GROUP BY MONTH(expiry_date);";
$result = $connect->query($sql);
if ($result->num_rows > 0) {	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$monthClientLeft[$row["MONTH(expiry_date)"]] =  $row["COUNT(id)"];
    }
} else {
    echo "0 results";
	
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
	<!--<meta http-equiv="refresh" content="30" > -->
	<title>Admin Dashboard</title>

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
	
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawBarChart);

      function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Clients Added', 'Clients Left'],
          ['January', <?php echo htmlentities($monthClientAdded[1]);?>, <?php echo htmlentities($monthClientLeft[1]);?>],
          ['February', <?php echo htmlentities($monthClientAdded[2]);?>, <?php echo htmlentities($monthClientLeft[2]);?>],
          ['March', <?php echo htmlentities($monthClientAdded[3]);?>, <?php echo htmlentities($monthClientLeft[3]);?>],
		  ['April', <?php echo htmlentities($monthClientAdded[4]);?>, <?php echo htmlentities($monthClientLeft[4]);?>],
		  ['May', <?php echo htmlentities($monthClientAdded[5]);?>, <?php echo htmlentities($monthClientLeft[5]);?>],
		  ['June', <?php echo htmlentities($monthClientAdded[6]);?>, <?php echo htmlentities($monthClientLeft[6]);?>],
		  ['July', <?php echo htmlentities($monthClientAdded[7]);?>, <?php echo htmlentities($monthClientLeft[7]);?>],
		  ['August', <?php echo htmlentities($monthClientAdded[8]);?>, <?php echo htmlentities($monthClientLeft[8]);?>],
		  ['September', <?php echo htmlentities($monthClientAdded[9]);?>, <?php echo htmlentities($monthClientLeft[9]);?>],
		  ['October', <?php echo htmlentities($monthClientAdded[10]);?>, <?php echo htmlentities($monthClientLeft[10]);?>],
		  ['November', <?php echo htmlentities($monthClientAdded[11]);?>, <?php echo htmlentities($monthClientLeft[11]);?>],
          ['December', <?php echo htmlentities($monthClientAdded[12]);?>, <?php echo htmlentities($monthClientLeft[12]);?>]
        ]);

        var options = {
          chart: {
            title: 'Client Added',
            subtitle: 'Monthly',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
	  
	  
	  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawCoreChart);

      function drawCoreChart() {

        var data = google.visualization.arrayToDataTable([
          ['Core', 'Clients'],
          ['Office',     <?php echo htmlentities($core[0]);?>],
          ['Core 1',      <?php echo htmlentities($core[1]);?>],
          ['Core 2',  <?php echo htmlentities($core[2]);?>],
          ['Core 3', <?php echo htmlentities($core[3]);?>],
          ['Core 4',    <?php echo htmlentities($core[4]);?>]
        ]);

        var options = {
          title: 'Clients By Core'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql ="SELECT id from clients";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$bg=$query->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Total Clients</div>
												</div>
											</div>
											<a href="client_list.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
									
									
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

<?php 
$sql1 ="SELECT id from boxes";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Total Boxes</div>
												</div>
											</div>
											<a href="box_list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

													<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">

<?php 
$sql12 ="SELECT id from clients where expiry_date<='".date("Y-m-d")."' and status = 'Active'";
$query12 = $dbh -> prepare($sql12);;
$query12->execute();
$results12=$query12->fetchAll(PDO::FETCH_OBJ);
$regbd2=$query12->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Due Bill's</div>
												</div>
											</div>
											<a href="bill_list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

<?php 
$status = 'Active';
$sql6 ="SELECT id from clients where status = (:status) ";
$query6 = $dbh -> prepare($sql6);;
$query6-> bindParam(':status', $status, PDO::PARAM_STR);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Active Clients</div>
												</div>
											</div>
											<a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
									
											

		
							
											<div class="col-md-12">
    
        <div id="columnchart_material" style="height: 300px;"></div>
    
</div>
<div class="col-md-6">
    
        <div id="piechart" style=" height: 300px;"></div>
    
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>