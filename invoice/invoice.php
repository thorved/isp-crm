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
<title>D:\uploadedFiles\709bf4ab3c9d2c3c1e82a0166c5f6229-45c14b108bc07a4\p1eqg57s2d1k8cdr91mbh1uhc17184.pdf</title>
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
Plan Start Date :- <span id="_17.6" style=" font-size:17.6px"> 01/12/2020</span>   Payment Date :- <span id="_17.6" style=" font-size:17.6px"> 26/12/2020</span>   Next Payment Date:- <span id="_17.6" style=" font-size:17.6px"> 26/01/2021</span></span>
</div>
<div class="pos" id="_300:297" style="top:297;left:300">
<span id="_17.6" style="font-weight:bold; font-family:Arial; font-size:17.6px; color:#000000">
Internet Speed &#150; 200 MBPS</span>
</div>
<div class="pos" id="_102:350" style="top:350;left:102">
<span id="_16.9" style="font-weight:bold; font-family:Arial; font-size:16.9px; color:#000000">
VED PARKASH</span>
</div>
<div class="pos" id="_102:374" style="top:374;left:102">
<span id="_17.5" style="font-weight:bold; font-family:Arial; font-size:17.5px; color:#000000">
0000000000</span>
</div>
<div class="pos" id="_150:366" style="top:366;left:150">
<span id="_14.2" style=" font-family:Arial; font-size:14.2px; color:#000000">
                </span>
</div>
<div class="pos" id="_102:397" style="top:397;left:102">
<span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
ADDRESS</span>
</div>
<div class="pos" id="_560:394" style="top:394;left:560">
<span id="_24.8" style="font-weight:bold; font-family:Arial; font-size:24.8px; color:#000000">
Total Bill:-  500 </span>
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
Subscription Charges( 200 MBPS):-  500</span>
</div>
<div class="pos" id="_150:552" style="top:552;left:150">
<span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
   </span>
</div>
<div class="pos" id="_102:573" style="top:573;left:102">
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#000000">
Installation Charges(One Time):- N/A</span>
</div>
<div class="pos" id="_503:563" style="top:563;left:503">
<span id="_19.8" style="font-weight:bold; font-family:Arial; font-size:19.8px; color:#000000">
Amount Paid:-<span id="_24.8" style=" font-size:24.8px; color:#0d0d0d"> 400</span></span>
</div>
<div class="pos" id="_102:597" style="top:597;left:102">
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#000000">
Router Charges:-   N/A</span>
</div>
<div class="pos" id="_503:596" style="top:596;left:503">
<span id="_19.8" style="font-weight:bold; font-family:Arial; font-size:19.8px; color:#0d0d0d">
Outstanding Amount:- 100</span>
</div>
<div class="pos" id="_102:621" style="top:621;left:102">
<span id="_17.4" style="font-weight:bold; font-family:Arial; font-size:17.4px; color:#0d0d0d">
Other Charges:-    N/A                                             </span>
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
Authorized Signature for iLINE-X Pro Internet </span>
</div>
<div class="pos" id="_99:881" style="top:881;left:99">
<span id="_16.0" style="font-weight:bold; font-family:Arial; font-size:16.0px; color:#000000">
Services</span>
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
