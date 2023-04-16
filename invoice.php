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
	
	if(isset($_GET['client_name']))
	{
		if($_GET['client_name']!=null){$client_name=$_GET['client_name'];}
	}
	if(isset($_GET['start_date']))
	{
		if($_GET['start_date']!=null){$start_date=$_GET['start_date'];}
	}
	if(isset($_GET['payment_date']))
	{
		if($_GET['payment_date']!=null){$payment_date=$_GET['payment_date'];}
	}
	if(isset($_GET['next_payment_date']))
	{
		if($_GET['next_payment_date']!=null){$next_payment_date=$_GET['next_payment_date'];}
	}
	if(isset($_GET['plan']))
	{
		if($_GET['plan']!=null){$plan=$_GET['plan'];}
	}
	if(isset($_GET['plan_cost']))
	{
		if($_GET['plan_cost']!=null){$plan_cost=$_GET['plan_cost'];}
		else {$plan_cost=0;}
	}
	if(isset($_GET['client_number']))
	{
		if($_GET['client_number']!=null){$client_number=$_GET['client_number'];}
	}
	if(isset($_GET['client_address']))
	{
		if($_GET['client_address']!=null){$client_address=$_GET['client_address'];}
	}
	if(isset($_GET['installation_charges']))
	{
		if($_GET['installation_charges']!=null){$installation_charges=$_GET['installation_charges'];}
			else {$installation_charges=0;}
	}
	if(isset($_GET['router_charges']))
	{	if($_GET['router_charges']!=null){$router_charges=$_GET['router_charges'];}
			else {$router_charges=0;}
		
	}
	if(isset($_GET['amount_paid']))
	{	if($_GET['amount_paid']!=null){$amount_paid=$_GET['amount_paid'];}
			else {$amount_paid=0;}
	}
	if(isset($_GET['outstanding_cost']))
	{	if($_GET['outstanding_cost']!=null){$outstanding_cost=$_GET['outstanding_cost'];}
			else {$outstanding_cost=0;}
		
	}
	if(isset($_GET['other_charges']))
	{	if($_GET['other_charges']!=null){$other_charges=$_GET['other_charges'];}
			else {$other_charges=0;}
	}
	
		
		$total_bill=$plan_cost+$installation_charges+$router_charges+$outstanding_cost+$other_charges;
	
}    
?>



<html>
<head>
<title><?php echo htmlentities($client_name); ?>(<?php echo htmlentities($payment_date); ?>)</title>
<style type="text/css">
<!--
body { font-family: Arial; font-size: 24.4px }
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }
-->
</style>
<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</head>
<body onload="printDiv('maincontainer')">
<div class="maincontainer" id="maincontainer">
<nobr><nowrap>
<div class="pos" id="_0:0" style="top:0">
<img name="_1170:827" src="page_001.jpg" height="1170" width="827" border="0" usemap="#Map"></div>
<div class="pos" id="_348:63" style="top:63;left:348">
<span id="_19.3" style="font-weight:bold; font-family:Arial; font-size:19.3px; color:#000000">
INTERNET BILL</span>
</div>
<div class="pos" id="_539:80" style="top:80;left:539">
<span id="_13.2" style="font-weight:bold; font-family:Arial; font-size:13.2px; color:#000000">
iLINE-X PRO INTERNET SERVICES </span>
</div>
<div class="pos" id="_539:99" style="top:99;left:539">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
WE-156, First Floor, Government </span>
</div>
<div class="pos" id="_539:118" style="top:118;left:539">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
School Road, Mohan Garden</span>
</div>
<div class="pos" id="_539:136" style="top:136;left:539">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
Uttam Nagar, New Delhi-110059</span>
</div>
<div class="pos" id="_539:155" style="top:155;left:539">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
9310392901</span>
</div>
<div class="pos" id="_539:174" style="top:174;left:539">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
ilinexpro@gmail.com</span>
</div>
<div class="pos" id="_62:254" style="top:254;left:62">
<span id="_15.1" style="font-weight:bold; font-family:Arial; font-size:15.1px; color:#000000">
Plan Start Date :- <span id="_17.6" style=" font-size:17.6px"> <?php echo htmlentities($start_date); ?></span>   Payment Date :- <span id="_17.6" style=" font-size:17.6px"> <?php echo htmlentities($payment_date); ?></span>   Next Payment Date:- <span id="_17.6" style=" font-size:17.6px"> <?php $formatnext_payment_date = new DateTime($next_payment_date); echo htmlentities($formatnext_payment_date->format('d-m-Y'));?></span></span>
</div>
<div class="pos" id="_300:297" style="top:297;left:300">
<span id="_17.6" style="font-weight:bold; font-family:Arial; font-size:17.6px; color:#000000">
Internet Speed &#150; <?php echo htmlentities($plan); ?></span>
</div>
<div class="pos" id="_102:350" style="top:350;left:102">
<span id="_16.9" style="font-weight:bold; font-family:Arial; font-size:16.9px; color:#000000">
<?php echo htmlentities($client_name); ?></span>
</div>
<div class="pos" id="_102:374" style="top:374;left:102">
<span id="_17.5" style="font-weight:bold; font-family:Arial; font-size:17.5px; color:#000000">
<?php echo htmlentities($client_number); ?></span>
</div>
<div class="pos" id="_102:397" style="top:397;left:102">
<span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
<?php echo htmlentities($client_address); ?></span>
</div>
<div class="pos" id="_560:394" style="top:394;left:560">
<span id="_24.8" style="font-weight:bold; font-family:Arial; font-size:24.8px; color:#000000">
Total Bill:- <?php echo htmlentities($total_bill); ?>/-</span>
</div>
<div class="pos" id="_102:418" style="top:418;left:102">
<span id="_14.9" style=" font-family:Arial; font-size:14.9px; color:#000000">
Uttam Nagar</span>
</div>
<div class="pos" id="_102:438" style="top:438;left:102">
<span id="_14.9" style=" font-family:Arial; font-size:14.9px; color:#000000">
New Delhi 110059</span>
</div>
<div class="pos" id="_315:493" style="top:493;left:315">
<span id="_16.7" style="font-weight:bold; font-family:Arial; font-size:16.7px; color:#000000">
CURRENT BILL DETAILS</span>
</div>
<div class="pos" id="_102:549" style="top:549;left:102">
<span id="_16.7" style="font-weight:bold; font-family:Arial; font-size:16.7px; color:#000000">
Subscription Charges( <?php echo htmlentities($plan); ?> ):- <?php echo htmlentities($plan_cost); ?></span>
</div>
<div class="pos" id="_150:552" style="top:552;left:150">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
   </span>
</div>
<div class="pos" id="_102:573" style="top:573;left:102">
<?php if($installation_charges!=0){?>
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#000000">
Installation Charges(One Time):- <?php echo htmlentities($installation_charges); ?> </span>
<?php }?>
</div>
<div class="pos" id="_503:563" style="top:563;left:503">
<span id="_19.8" style="font-weight:bold; font-family:Arial; font-size:19.8px; color:#000000">
Amount Paid:-<span id="_24.8" style=" font-size:24.8px; color:#0d0d0d"> <?php echo htmlentities($amount_paid); ?></span></span>
</div>
<div class="pos" id="_102:597" style="top:597;left:102">
<?php if($router_charges!=0){?><span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#000000">
Router Charges:- <?php echo htmlentities($router_charges); ?> </span> <?php }?>
</div>
<div class="pos" id="_503:596" style="top:596;left:503">
<?php if($outstanding_cost!=0){?>
<span id="_19.8" style="font-weight:bold; font-family:Arial; font-size:19.8px; color:#0d0d0d">
Outstanding Amount:- <?php echo htmlentities($outstanding_cost); ?></span>
<?php }?>
</div>
<div class="pos" id="_102:621" style="top:621;left:102">
<?php if($other_charges!=0){?>
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#000000">
Other Charges:- <?php echo htmlentities($other_charges); ?></span>
<?php }?>
</div>
<div class="pos" id="_150:627" style="top:627;left:150">
<span id="_16.7" style="font-weight:bold; font-family:Arial; font-size:16.7px; color:#0d0d0d">
                                                                           </span>
</div>
<div class="pos" id="_100:691" style="top:691;left:100">
<span id="_15.0" style=" font-family:Arial; font-size:15.0px; color:#000000">
For Billing, Renewals or Technical queries Call on <span style="font-weight:bold"> 9310392901</span>  or mail on <span style="font-weight:bold"> ilinex@gmail.com</span></span>
</div>
<div class="pos" id="_258:712" style="top:712;left:258">
<span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
   </span>
</div>
<div class="pos" id="_349:795" style="top:795;left:349">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
  </span>
</div>
<div class="pos" id="_499:813" style="top:813;left:499">
<span id="_17.1" style="font-weight:bold; font-family:Arial; font-size:17.1px; color:#000000">
(NITISH CHHIKARA)</span>
</div>
<div class="pos" id="_199:858" style="top:858;left:199">
<span id="_17.1" style="font-weight:bold; font-family:Arial; font-size:17.1px; color:#000000">
                </span>
</div>
<div class="pos" id="_350:860" style="top:860;left:350">
<span id="_16.0" style="font-weight:bold; font-family:Arial; font-size:16.0px; color:#000000">
Authorized Signature for iLINE-X Pro Internet Services</span>
</div>
<div class="pos" id="_310:993" style="top:993;left:310">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
TOTAL COMPUTER SOLUTION</span>
</div>
<div class="pos" id="_327:1013" style="top:1013;left:327">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ff0000">
POWERED BY LINE-X Pro</span>
</div>
<div class="pos" id="_275:1034" style="top:1034;left:275">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
All type of Laptop/Desktop/Accessories</span>
</div>
<div class="pos" id="_326:1054" style="top:1054;left:326">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
SALE/PURCHASE/REPAIR</span>
</div>
<div class="pos" id="_260:1074" style="top:1074;left:260">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
GET FREE SERVICES FOR LINE-X CUSTOMERS</span>
</div>
<div class="pos" id="_370:1095" style="top:1095;left:370">
<span id="_15.4" style="font-weight:bold; font-family:Arial; font-size:15.4px; color:#ffffff">
9868610589</span>
</div>
</nowrap></nobr>

</div>
</body>
</html>
