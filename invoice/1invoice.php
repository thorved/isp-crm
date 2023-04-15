<?php
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
		
		$start_date=$_GET['start_date'];
		$payment_date=$_GET['payment_date'];
		$next_payment_date=$_GET['next_payment_date'];
		$plan=$_GET['plan'];
		$plan_cost=$_GET['plan_cost'];
		$client_name=$_GET['client_name'];
		$client_number=$_GET['client_number'];
		$client_address=$_GET['client_address'];
		$installation_charges=$_GET['installation_charges'];
		$router_charges=$_GET['router_charges'];
		$bill=$_GET['bill'];
		$outstanding_cost=$_GET['outstanding_cost'];
		$other_charges=$_GET['other_charges'];
		$total_bill=$plan_cost+$installation_charges+$router_charges+$outstanding_cost+$other_charges;
		
	}
	
}    
?>


<html>
<head>
<title>Invoice</title>
<style type="text/css">
<!--
body { font-family: Arial; font-size: 24.2px }
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
<div class="pos" id="_355:54" style="top:54;left:355">
<span id="_19.3" style="font-weight:bold; font-family:Arial; font-size:19.3px; color:#000000">
INTERNET BILL</span>
</div>
<div class="pos" id="_554:80" style="top:80;left:554">
<span id="_13.2" style="font-weight:bold; font-family:Arial; font-size:13.2px; color:#000000">
iLINE-X PRO INTERNET SERVICES </span>
</div>
<div class="pos" id="_554:99" style="top:99;left:554">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
WE-156, First Floor, Government </span>
</div>
<div class="pos" id="_554:118" style="top:118;left:554">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
School Road, Mohan Garden</span>
</div>
<div class="pos" id="_554:136" style="top:136;left:554">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
Uttam Nagar, New Delhi-110059</span>
</div>
<div class="pos" id="_554:155" style="top:155;left:554">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
9310392901</span>
</div>
<div class="pos" id="_554:174" style="top:174;left:554">
<span id="_13.8" style="font-weight:bold; font-family:Arial; font-size:13.8px; color:#000000">
ilinexpro@gmail.com</span>
</div>
<div class="pos" id="_100:234" style="top:234;left:100">
<span id="_17.6" style="font-weight:bold; font-family:Arial; font-size:17.6px; color:#000000">
Plan Start Date <?php echo htmlentities($start_date); ?> <br>                   Payment Date <?php echo htmlentities($payment_date); ?> &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Next Payment Date:- <?php echo htmlentities($next_payment_date); ?> </span>
</div>
<div class="pos" id="_319:277" style="top:277;left:319">
<span id="_17.6" style="font-weight:bold; font-family:Arial; font-size:17.6px; color:#000000">
Internet Speed <?php echo htmlentities($plan); ?> </span>
</div>
<div class="pos" id="_100:322" style="top:322;left:100">
<span id="_17.0" style="font-weight:bold; font-family:Arial; font-size:17.0px; color:#000000">
<?php echo htmlentities($client_name); ?></span>
</div>
<div class="pos" id="_100:346" style="top:346;left:100">
<span id="_17.0" style="font-weight:bold; font-family:Arial; font-size:17.0px; color:#000000">
<?php echo htmlentities($client_number); ?></span>
</div>
<div class="pos" id="_100:369" style="top:369;left:100">
<span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
<?php echo htmlentities($client_address); ?></span>
</div>
<div class="pos" id="_100:390" style="top:390;left:100">
<span id="_15.3" style=" font-family:Arial; font-size:15.3px; color:#000000">
Uttam Nagar</span>
</div>
<div class="pos" id="_480:374" style="top:374;left:480">
<span id="_24.6" style="font-weight:bold; font-family:Arial; font-size:24.6px; color:#000000">
Total Bill:- <?php echo htmlentities($total_bill); ?>/-</span>
</div>
<div class="pos" id="_100:411" style="top:411;left:100">
<span id="_15.3" style=" font-family:Arial; font-size:15.3px; color:#000000">
New Delhi 110059</span>
</div>
<div class="pos" id="_356:476" style="top:476;left:356">
<span id="_13.1" style="font-weight:bold; font-family:Arial; font-size:13.1px; color:#000000">
CURRENT BILL DETAILS</span>
</div>
<div class="pos" id="_100:512" style="top:512;left:100">
<span id="_16.7" style="font-weight:bold; font-family:Arial; font-size:16.7px; color:#000000">
Subscription Charges(<?php echo htmlentities($plan); ?>):- <?php echo htmlentities($plan_cost); ?></span>
</div>
<div class="pos" id="_400:512" style="top:512;left:400">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
   </span>
</div>
<div class="pos" id="_550:512" style="top:512;left:550">
<?php if($other_charges!=0){?>
<span id="_17.2" style="font-weight:bold; font-family:Arial; font-size:17.2px; color:#000000">
Other Charges:- <?php echo htmlentities($other_charges); ?></span>
<?php }?>
</div>
<div class="pos" id="_100:536" style="top:536;left:100">
<?php if($installation_charges!=0){?>
<span id="_17.2" style="font-weight:bold; font-family:Arial; font-size:17.2px; color:#000000">
Installation Charges(One Time):- <?php echo htmlentities($installation_charges); ?> </span>
<?php }?>
</div>
<div class="pos" id="_100:562" style="top:562;left:100">

<?php if($router_charges!=0){?><span id="_17.2" style="font-weight:bold; font-family:Arial; font-size:17.2px; color:#000000">
Router Charges:- <?php echo htmlentities($router_charges); ?> </span> <?php }?>


</div>
<div class="pos" id="_549:556" style="top:556;left:549">
<span id="_21.8" style="font-weight:bold; font-family:Arial; font-size:21.8px; color:#000000">
BILL:- <?php echo htmlentities($bill); ?><span id="_27.2" style=" font-size:27.2px; color:#0d0d0d"> </span></span>
</div>
<div class="pos" id="_150:587" style="top:587;left:150">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#0d0d0d">
 </span>
</div>
<div class="pos" id="_548:587" style="top:587;left:548">

<?php if($outstanding_cost!=0){?>
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#0d0d0d">
Outstanding Amount:- <?php echo htmlentities($outstanding_cost); ?></span>
<?php }?>

</div>
<div class="pos" id="_100:651" style="top:651;left:100">
<span id="_14.9" style=" font-family:Arial; font-size:14.9px; color:#000000">
For Billing, Renewals or Technical queries Call on <span style="font-weight:bold"> 9310392901</span>  or mail on <span style="font-weight:bold"> ilinex@gmail.com</span></span>
</div>
<div class="pos" id="_258:672" style="top:672;left:258">
<span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
   </span>
</div>
<div class="pos" id="_349:755" style="top:755;left:349">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
  </span>
</div>
<div class="pos" id="_499:773" style="top:773;left:499">
<span id="_17.1" style="font-weight:bold; font-family:Arial; font-size:17.1px; color:#000000">
(NITISH CHHIKARA)</span>
</div>
<div class="pos" id="_199:818" style="top:818;left:199">
<span id="_17.1" style="font-weight:bold; font-family:Arial; font-size:17.1px; color:#000000">
                </span>
</div>
<div class="pos" id="_350:820" style="top:820;left:350">
<span id="_16.0" style="font-weight:bold; font-family:Arial; font-size:16.0px; color:#000000">
Authorized Signature for iLINE-X Pro Internet </span>
</div>
<div class="pos" id="_99:840" style="top:840;left:99">
<span id="_16.0" style="font-weight:bold; font-family:Arial; font-size:16.0px; color:#000000">
Services</span>
</div>
<div class="pos" id="_310:1012" style="top:1012;left:310">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
TOTAL COMPUTER SOLUTION</span>
</div>
<div class="pos" id="_328:1032" style="top:1032;left:328">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ff0000">
POWERED BY LINE-X Pro</span>
</div>
<div class="pos" id="_275:1052" style="top:1052;left:275">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
All type of Laptop/Desktop/Accessories</span>
</div>
<div class="pos" id="_326:1073" style="top:1073;left:326">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
SALE/PURCHASE/REPAIR</span>
</div>
<div class="pos" id="_262:1093" style="top:1093;left:262">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
GET FREE SERVICES FOR LINE-X CUSTOMERS</span>
</div>
<div class="pos" id="_297:1114" style="top:1114;left:297">
<span id="_14.5" style="font-weight:bold; font-family:Arial; font-size:14.5px; color:#ffffff">
9868610589(USE CODE:- LINECAT</span>
</div>
</nowrap></nobr>

</div>
</body>
</html>

