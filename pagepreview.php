<?
 session_start();
 date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
 include "Connections/connect_mysql.php";
 
 $crd2id = $_GET['crd2id'];
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Print Preview</title>

<link rel="stylesheet" type="text/css" href="dist/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.css">

<style type="text/css">
	body{
		font-family: thcharmau;
		font-size:30px;
		color:#00C;
		padding:0;
    	margin:0;
		background: rgb(204,204,204); 
	}
	page {
  		background: white;
  		display: block;
  		margin: 0 auto;
  		margin-bottom: 0.5cm;
  		box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	}
	page[size="AA"] { 
  		background: white;
  		width: 21cm;
  		height: 29.7cm;
  		display: block;
  		margin: 0 auto;
  		margin-bottom: 0.1cm;
  		margin-top: 0.1cm;
  		box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  		padding-left:0.5cm;
  		padding-right:0.5cm;
  		padding-top:0.5cm;
  		padding-bottom:0.5cm;
  		background-image:url(images/YH_01_Web-1.png);
  		background-repeat:no-repeat;
  		background-size: 21.95cm 30.59cm;
	}
	/*page {
  		background: white;
  		display: block;
  		margin: 0 auto;
  		background-image: url("../images/Form PO YH-11.jpg");
  		background-size: 21cm 29.7cm;
	}
	page[size="A4"] {  
  		width: 21cm;
  		height: 29.7cm; 
	}*/
	/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
	@media all
	{
    	.page-break { display:none; }
    	.page-break-no{ display:none; }
	}
	@media print
	{

    	.page-break { /* ขึ้นหน้าใหม่ แบบหน้า ถัดไป */
			display:block;
			height:1px;
			page-break-before:always;
		}
    	.page-break-no{ /* ขึ้นหน้าใหม่ แบบหน้า หน้าแรก */
	 		display:block;
			height:1px;
			page-break-after:avoid;
		}

		@page { /* จัดการเกี่ยวกับหน้ากระดาษ */
			margin: 0;
			size: 21cm 29.53cm;
			margin-bottom: 0.5;
			margin-top: 0;
			background: white;
		}

  		#buttonp{ display:none; }
		#buttonbk{ display:none; }
	}
	
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.notes {
    background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-size: 100% 100%, 100% 100%, 100% 31px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    line-height: 31px;
    font-family: Arial, Helvetica, Sans-serif;
    padding: 8px;
}

.notes:focus {
    outline: none;
}

/* style data position */

.dateopen{
	position:absolute;
	font-size:16px;
	margin-top:0.05cm;
	margin-left:15.25cm;
	width:4.00cm;
	text-align:center;
}
.companyname{
	position:absolute;
	font-size:16px;
	margin-top:0.90cm;
	margin-left:3.80cm;
	width:15.50cm;
	text-align:left;	
}

.contactname{
	position:absolute;
	font-size:16px;
	margin-top:1.70cm;
	margin-left:4.0cm;
	width:7.80cm;
	text-align:center;	
}

.position{
	position:absolute;
	font-size:16px;
	margin-top:1.72cm;
	margin-left:13.20cm;
	width:6.30cm;
	text-align:center;		
}

.depname{
	position:absolute;
	font-size:16px;
	margin-top:2.55cm;
	margin-left:3.90cm;
	width:7.96cm;
	text-align:center;		
}

.phonenum{
	position:absolute;
	font-size:16px;
	margin-top:2.55cm;
	margin-left:13.20cm;
	width:6.30cm;
	text-align:center;	
}

.salename{
	position:absolute;
	font-size:16px;
	margin-top:3.35cm;
	margin-left:5.10cm;
	width:7.40cm;
	text-align:center;	
}

.brachname{
	position:absolute;
	font-size:16px;
	margin-top:3.35cm;
	margin-left:13.20cm;
	width:6.30cm;
	text-align:center;	
}

.remark1{
	position:absolute;
	font-size:14px;
	margin-top:5.05cm;
	margin-left:1.85cm;
	padding:0.1cm,0.1cm,0.1cm,0.1cm;
	width:8.60cm;
	height:3.00cm;
	text-align:left;
	/*text-decoration:underline;*/	
	line-height: 21px;
	/*text-decoration:underline;
	text-decoration-color: #999;*/
	/*display:inline-block;
    border-bottom:1px solid black;
    padding-bottom:2px;*/
}

.signager1{
	position:absolute;
	margin-top:3.30cm;
	margin-left:12.99cm;
}

.reqname{
	position:absolute;
	font-size:16px;
	margin-top:7.29cm;
	margin-left:11.80cm;
	width:5.95cm;
	text-align:center;	
}

.remark2{
	position:absolute;
	font-size:14px;
	margin-top:9.80cm;
	margin-left:1.19cm;
	padding:0.1cm,0.1cm,0.1cm,0.1cm;
	width:8.60cm;
	height:3.00cm;
	text-align:left;
	/*text-decoration:underline;*/	
	line-height: 21px;
}

.remark3{
	position:absolute;
	font-size:14px;
	margin-top:9.80cm;
	margin-left:11.19cm;
	padding:0.1cm,0.1cm,0.1cm,0.1cm;
	width:8.60cm;
	height:3.00cm;
	text-align:left;
	/*text-decoration:underline;*/	
	line-height: 21px;
}

.signager2{
	position:absolute;
	margin-top:9.30cm;
	margin-left:2.99cm;
}

.signager3{
	position:absolute;
	margin-top:9.30cm;
	margin-left:13.50cm;
}

.apvname1{
	position:absolute;
	font-size:16px;
	margin-top:13.35cm;
	margin-left:12.40cm;
	width:5.95cm;
	text-align:center;	
}

.apvname2{
	position:absolute;
	font-size:16px;
	margin-top:13.35cm;
	margin-left:1.60cm;
	width:5.95cm;
	text-align:center;	
}

.chkbox1{
	position:absolute;
	font-size:18px;
	color:#090;
	margin-top:16.70cm;
	margin-left:1.30cm;	
}

.chkbox2{
	position:absolute;
	font-size:18px;
	color:#F00;
	margin-top:16.70cm;
	margin-left:4.00cm;	
}

.rest1{
	position:absolute;
	font-size:16px;
	margin-top:16.59cm;
	margin-left:7.90cm;
	width:12.50cm;		
}

.condate1{
	position:absolute;
	font-size:18px;
	margin-top:17.40cm;
	margin-left:4.60cm;
	width:4.50cm;
	/*border-style:solid;*/
	text-align:center;
}

.mony1{
	position:absolute;
	font-size:18px;
	margin-top:18.30cm;
	margin-left:1.60cm;
	width:7.40cm;
	/*border-style:solid;*/
	text-align:center;	
}

.remark4{
	position:absolute;
	font-size:14px;
	margin-top:19.80cm;
	margin-left:1.00cm;
	padding:0.1cm,0.1cm,0.1cm,0.1cm;
	width:8.60cm;
	height:3.00cm;
	text-align:left;
	/*text-decoration:underline;*/	
	line-height: 21px;
}

.signager4{
	position:absolute;
	margin-top:16.45cm;
	margin-left:13.50cm;
}

.apvname3{
	position:absolute;
	font-size:16px;
	margin-top:20.29cm;
	margin-left:12.00cm;
	width:5.95cm;
	text-align:center;	
}

.chkbox3{
	position:absolute;
	font-size:18px;
	color:#090;
	margin-top:23.15cm;
	margin-left:1.30cm;	
}

.chkbox4{
	position:absolute;
	font-size:18px;
	color:#F00;
	margin-top:23.15cm;
	margin-left:4.00cm;	
}

.rest2{
	position:absolute;
	font-size:16px;
	margin-top:23.07cm;
	margin-left:7.90cm;
	width:12.50cm;		
}

.condate2{
	position:absolute;
	font-size:18px;
	margin-top:23.90cm;
	margin-left:4.60cm;
	width:4.50cm;
	/*border-style:solid;*/
	text-align:center;
}

.mony2{
	position:absolute;
	font-size:18px;
	margin-top:24.75cm;
	margin-left:1.60cm;
	width:7.40cm;
	/*border-style:solid;*/
	text-align:center;	
}

.remark5{
	position:absolute;
	font-size:14px;
	margin-top:26.30cm;
	margin-left:1.00cm;
	padding:0.1cm,0.1cm,0.1cm,0.1cm;
	width:8.60cm;
	height:3.00cm;
	text-align:left;
	/*text-decoration:underline;*/	
	line-height: 21px;
}

.signager5{
	position:absolute;
	margin-top:22.85cm;
	margin-left:13.50cm;
}

.apvname4{
	position:absolute;
	font-size:16px;
	margin-top:26.80cm;
	margin-left:12.00cm;
	width:5.95cm;
	text-align:center;	
}
/* //------- */
</style>
<script type="text/javascript">
function back() {
      window.location.href = "index.php";
  }
</script>
</head>

<body>
<?
//==== ดึงข้อมูลการร้องขออนุมัติวงเงินเครดิต จากตาราง tblcreditopen1 ชุดที่ 1 ==========================//
	$sql_op1 = "select * from tblcreditopen1 where crd1_id = {$crd2id} ";
	$result_op1 = mysql_query($sql_op1) or die(mysql_error());
	$record_op1 = mysql_fetch_array($result_op1);
		$crd1_cusid_op1 = $record_op1['crd1_cusid']; 	
		$crd1_dateopen_op1 = $record_op1['crd1_dateopen'];
		
	$sql_custop = "select * from tblcustomer where cus_id ={$crd1_cusid_op1}";
	$result_custop = mysql_query($sql_custop) or die(mysql_error());
	$record_custop = mysql_fetch_array($result_custop);
		$cus_company_custop = $record_custop['cus_company']; 
		$cus_titid_custop = $record_custop['cus_titid'];
		
			$sql_tt1 = "select * from tbltitle where tit_id={$cus_titid_custop}";
			$result_tt1 = mysql_query($sql_tt1) or die(mysql_error());
			$record_tt1 = mysql_fetch_array($result_tt1);
				$tit_name_tt1 = $record_tt1['tit_name']; 
				
		$cus_name_custop = $record_custop['cus_name'];
		$cus_lname_custop = $record_custop['cus_lname'];
		$cus_idcard_custop = $record_custop['cus_idcard'];
		$cus_position_custop = $record_custop['cus_position'];
		$cus_department_custop = $record_custop['cus_department'];
		$cus_phoneno_custop = $record_custop['cus_phoneno'];
	
	$sql_op2 = "select * from tblcreditopen2 where crd2_id={$crd2id}";
	$result_op2 = mysql_query($sql_op2) or die(mysql_error());
	$record_op2 = mysql_fetch_array($result_op2);
		$crd2_sellname_op2 = $record_op2['crd2_sellname'];
		$crd2_sellbranid_op2 = $record_op2['crd2_sellbranid'];
		
			$sql_brch1 = " select * from tblbrand where bran_id={$crd2_sellbranid_op2} ";
			$result_brch1 = mysql_query($sql_brch1) or die(mysql_error());
			$record_brch1 = mysql_fetch_array($result_brch1);
				$bran_name_brch1 = $record_brch1['bran_name'];
		
		$crd2_comment_op2 = $record_op2['crd2_comment'];
		$crd2_useid_op2 = $record_op2['crd2_useid']; 		 
			
			$sql_usersign = " select * from tbluser where use_id={$crd2_useid_op2} ";
			$result_usersign = mysql_query($sql_usersign) or die(mysql_error());
			$record_usersign = mysql_fetch_array($result_usersign);
				$use_signature_usersign = $record_usersign['use_signature']; 
				$use_titid_usersign = $record_usersign['use_titid'];
				$use_name_usersign = $record_usersign['use_name'];
				$use_lname_usersign = $record_usersign['use_lname'];
				
//======================================================================================================================//	

//=============================== ข้อมูลชุดที่ 2 =============================================================================//
	$sql_apv1 = " select * from tblapprove where app_crd2id={$crd2id} and app_useappid=4";
	$result_apv1 = mysql_query($sql_apv1) or die(mysql_error());
	$record_apv1 = mysql_fetch_array($result_apv1);
		$app_id_apv1 = $record_apv1['app_id']; //ลำดับ
		$app_date_apv1 = $record_apv1['app_date']; //	วันที่อนุมัติ
		$app_crd2id_apv1 = $record_apv1['app_crd2id']; //ID การขอเปิด
		$app_useid_apv1 = $record_apv1['app_useid'];//ID ผู้อนุมัติ
		$app_useappid_apv1 = $record_apv1['app_useappid'];//ระดับการอนุมัติ
		$app_result_apv1 = $record_apv1['app_result'];//ผลการอนุมัติ
		$app_comment_apv1 = $record_apv1['app_comment'];//ความคิดเห็น
		$app_monlimit_apv1 = $record_apv1['app_monlimit'];//วงเงินสูงสุด
		$app_monday_apv1 = $record_apv1['app_monday'];//จำนวนวันที่ต้องจ่าย	
		$app_proother_apv1 = $record_apv1['app_proother'];//เงื่อนไขอื่นๆ
		$app_status_apv1 = $record_apv1['app_status'];//	สถานะ 1. ปกติ
		
		if($app_useid_apv1){
			$sql_usersign2 = " select * from tbluser where use_id={$app_useid_apv1} ";
			$result_usersign2 = mysql_query($sql_usersign2) or die(mysql_error());
			$record_usersign2 = mysql_fetch_array($result_usersign2);
				$use_signature_usersign2 = $record_usersign2['use_signature']; 
				$use_titid_usersign2 = $record_usersign2['use_titid'];
				$use_name_usersign2 = $record_usersign2['use_name'];
				$use_lname_usersign2 = $record_usersign2['use_lname'];
		}
		
//=======================================================================================================================//	
//=============================== ข้อมูลชุดที่ 3 =============================================================================//
	$sql_apv3 = " select * from tblapprove where app_crd2id={$crd2id} and app_useappid=5";
	$result_apv3 = mysql_query($sql_apv3) or die(mysql_error());
	$record_apv3 = mysql_fetch_array($result_apv3);
		$app_id_apv3 = $record_apv3['app_id']; //ลำดับ
		$app_date_apv3 = $record_apv3['app_date']; //	วันที่อนุมัติ
		$app_crd2id_apv3 = $record_apv3['app_crd2id']; //ID การขอเปิด
		$app_useid_apv3 = $record_apv3['app_useid'];//ID ผู้อนุมัติ
		$app_useappid_apv3 = $record_apv3['app_useappid'];//ระดับการอนุมัติ
		$app_result_apv3 = $record_apv3['app_result'];//ผลการอนุมัติ
		$app_comment_apv3 = $record_apv3['app_comment'];//ความคิดเห็น
		$app_monlimit_apv3 = $record_apv3['app_monlimit'];//วงเงินสูงสุด
		$app_monday_apv3 = $record_apv3['app_monday'];//จำนวนวันที่ต้องจ่าย	
		$app_proother_apv3 = $record_apv3['app_proother'];//เงื่อนไขอื่นๆ
		$app_status_apv3 = $record_apv3['app_status'];//	สถานะ 1. ปกติ
		
		
		if($app_useid_apv3){
			$sql_usersign3 = " select * from tbluser where use_id={$app_useid_apv3} ";
			$result_usersign3 = mysql_query($sql_usersign3) or die(mysql_error());
			$record_usersign3 = mysql_fetch_array($result_usersign3);
				$use_signature_usersign3 = $record_usersign3['use_signature']; 
				$use_titid_usersign3 = $record_usersign3['use_titid'];
				$use_name_usersign3 = $record_usersign3['use_name'];
				$use_lname_usersign3 = $record_usersign3['use_lname'];
		}
//=======================================================================================================================//	
//=============================== ข้อมูลชุดที่ 4 =============================================================================//
	$sql_apv4 = " select * from tblapprove where app_crd2id={$crd2id} and app_useappid=6";
	$result_apv4 = mysql_query($sql_apv4) or die(mysql_error());
	$record_apv4 = mysql_fetch_array($result_apv4);
		$app_id_apv4 = $record_apv4['app_id']; //ลำดับ
		$app_date_apv4 = $record_apv4['app_date']; //	วันที่อนุมัติ
		$app_crd2id_apv4 = $record_apv4['app_crd2id']; //ID การขอเปิด
		$app_useid_apv4 = $record_apv4['app_useid'];//ID ผู้อนุมัติ
		$app_useappid_apv4 = $record_apv4['app_useappid'];//ระดับการอนุมัติ
		$app_result_apv4 = $record_apv4['app_result'];//ผลการอนุมัติ
		$app_comment_apv4 = $record_apv4['app_comment'];//ความคิดเห็น
		$app_monlimit_apv4 = $record_apv4['app_monlimit'];//วงเงินสูงสุด
		$app_monday_apv4 = $record_apv4['app_monday'];//จำนวนวันที่ต้องจ่าย	
		$app_proother_apv4 = $record_apv4['app_proother'];//เงื่อนไขอื่นๆ
		$app_status_apv4 = $record_apv4['app_status'];//	สถานะ 1. ปกติ
		
		if($app_useid_apv4){
			$sql_usersign4 = " select * from tbluser where use_id={$app_useid_apv4} ";
			$result_usersign4 = mysql_query($sql_usersign4) or die(mysql_error());
			$record_usersign4 = mysql_fetch_array($result_usersign4);
				$use_signature_usersign4 = $record_usersign4['use_signature']; 
				$use_titid_usersign4 = $record_usersign4['use_titid'];
				$use_name_usersign4 = $record_usersign4['use_name'];
				$use_lname_usersign4 = $record_usersign4['use_lname'];
		}
//=======================================================================================================================//	
//=============================== ข้อมูลชุดที่ 5 =============================================================================//
	$sql_apv5 = " select * from tblapprove where app_crd2id={$crd2id} and app_useappid=7";
	$result_apv5 = mysql_query($sql_apv5) or die(mysql_error());
	$record_apv5 = mysql_fetch_array($result_apv5);
		$app_id_apv5 = $record_apv5['app_id']; //ลำดับ
		$app_date_apv5 = $record_apv5['app_date']; //	วันที่อนุมัติ
		$app_crd2id_apv5 = $record_apv5['app_crd2id']; //ID การขอเปิด
		$app_useid_apv5 = $record_apv5['app_useid'];//ID ผู้อนุมัติ
		$app_useappid_apv5 = $record_apv5['app_useappid'];//ระดับการอนุมัติ
		$app_result_apv5 = $record_apv5['app_result'];//ผลการอนุมัติ
		$app_comment_apv5 = $record_apv5['app_comment'];//ความคิดเห็น
		$app_monlimit_apv5 = $record_apv5['app_monlimit'];//วงเงินสูงสุด
		$app_monday_apv5 = $record_apv5['app_monday'];//จำนวนวันที่ต้องจ่าย	
		$app_proother_apv5 = $record_apv5['app_proother'];//เงื่อนไขอื่นๆ
		$app_status_apv5 = $record_apv5['app_status'];//	สถานะ 1. ปกติ
		
		if($app_useid_apv5){
			$sql_usersign5 = " select * from tbluser where use_id={$app_useid_apv5} ";
			$result_usersign5 = mysql_query($sql_usersign5) or die(mysql_error());
			$record_usersign5 = mysql_fetch_array($result_usersign5);
				$use_signature_usersign5 = $record_usersign5['use_signature']; 
				$use_titid_usersign5 = $record_usersign5['use_titid'];
				$use_name_usersign5 = $record_usersign5['use_name'];
				$use_lname_usersign5 = $record_usersign5['use_lname'];
		}
//=======================================================================================================================//	
	 
	 	
?>
<div id="a1">
	<div style="text-align:center" id="btnprint">
    	<button class="button button2 " type="button" name="buttonbk" id="buttonbk"  onClick="back();"><i class="fa fa-reply"></i> ย้อนกลับ</button>
    	<button class="button button2" type="button" id="buttonp" onClick="javascript:window.print();"><i class="fa fa-print"></i> พิมพ์ </button>
    </div>
    <page size="AA">
    	<div class="dateopen"> 
			<?=displaydate($crd1_dateopen_op1)?>
		</div>
        
        <!-- ข้อมูลชุดที่ 1 -->
        <div class="companyname">
        	<?=$cus_company_custop?>
        </div>
        <div class="contactname">
        	<?=$tit_name_tt1?><?=$cus_name_custop?>&nbsp;&nbsp;<?=$cus_lname_custop?>
        </div>
        <div class="position">
        	<?=$cus_position_custop?>
        </div>
        <div class="depname">
        	<?=$cus_department_custop?>
        </div>
        <div class="phonenum">
        	<?=$cus_phoneno_custop?>
        </div>
        <div class="salename">
        	<?=$crd2_sellname_op2?>
        </div>
        <div class="brachname">
        	<?=$bran_name_brch1?>
        </div>
        <div class="remark1">
        	<?=nl2br($crd2_comment_op2)?>
        </div>
        <? if($use_signature_usersign){ ?>
        	<img id="imgsgn1" class="signager1" src="uploads/<?=$use_signature_usersign?>" width="180" height="220">
        <? } ?>
        
        <div class="reqname">
        	<?=$use_name_usersign?>&nbsp;&nbsp;<?=$use_lname_usersign?>
        </div>
        
        
        <!-- ข้อมูลชุดที่ 2 -->
        <div class="remark2">
        	<?=nl2br($app_comment_apv1)?>
        </div>
        
        <? if($use_signature_usersign2){ ?>
        	<img id="imgsgn2" class="signager2" src="uploads/<?=$use_signature_usersign2?>" width="180" height="220">
        <? } ?>
        
        <div class="apvname2">
        	<?=$use_name_usersign2?>&nbsp;&nbsp;<?=$use_lname_usersign2?>
        </div>
        
        <!-- ข้อมูลชุดที่ 3 -->
        <div class="remark3">
        	<?=nl2br($app_comment_apv3)?>
        </div>
        <? if($use_signature_usersign3){ ?>
        	<img id="imgsgn3" class="signager3" src="uploads/<?=$use_signature_usersign3?>" width="180" height="220">
        <? } ?>
        <div class="apvname1">
        	<?=$use_name_usersign3?>&nbsp;&nbsp;<?=$use_lname_usersign3?>
        </div>
        
        <!-- ข้อมูลชุดที่ 4 -->
        <div class="chkbox1">
        	<? 
				if($app_result_apv4){
					if($app_result_apv4=="อนุมัติ"){
			?>
        		<i class="fa fa-check"></i>
            <?
					}//if
				}//if
			?>
        </div>
        <div class="chkbox2">
        	<? 
				if($app_result_apv4){
					if($app_result_apv4=="ไม่อนุมัติ"){
			?>
        		<i class="fa fa-check"></i>
            <?
					}//if
				}//if
			?>
        </div>
        <div class="rest1">
        	<?=$app_comment_apv4?>
        </div>
        <div class="condate1">
        	<?=$app_monday_apv4?>
        </div>
        <div class="mony1">
        	<?
        		$number = $app_monlimit_apv4;
				echo number_format((float)$number, 0, '.', ',');
			?>
        </div>
         <div class="remark4">
        	<?=$app_proother_apv4?>
        </div>
        <? if($use_signature_usersign4){ ?>
        <img id="imgsgn4" class="signager4" src="uploads/<?=$use_signature_usersign4?>" width="180" height="220">
        <? } ?>
        <div class="apvname3">
        	<?=$use_name_usersign4?>&nbsp;&nbsp;<?=$use_lname_usersign4?>
        </div>
        
        <!-- ข้อมูลชุดที่ 5 -->
        <div class="chkbox3">
        	<? 
				if($app_result_apv5){
					if($app_result_apv5=="อนุมัติ"){
			?>
        	<i class="fa fa-check"></i>
            <?
					}//if
				}//if
			?>
        </div>
        <div class="chkbox4">
        	<? 
				if($app_result_apv5){
					if($app_result_apv5=="ไม่อนุมัติ"){
			?>
        	<i class="fa fa-check"></i>
            <?
					}//if
				}//if
			?>
        </div>
        <div class="rest2">
        	<?=$app_comment_apv5?>
        </div>
        <div class="condate2">
        	<?=$app_monday_apv5?>
        </div>
        <div class="mony2">
        	<?
        		$number = $app_monlimit_apv5;
				echo number_format((float)$number, 0, '.', ',');
			?>
        </div>
         <div class="remark5" >
        	<?=$app_proother_apv5?>
        </div>
        <? if($use_signature_usersign5){ ?>
        	<img id="imgsgn5" class="signager5" src="uploads/<?=$use_signature_usersign5?>" width="180" height="220">
        <? } ?>
        <div class="apvname4">
        	<?=$use_name_usersign5?>&nbsp;&nbsp;<?=$use_lname_usersign5?>
        </div>
        
    </page>
</div>
</body>
</html>
<?
	mysql_close($c);
?>
<?
	 // --- แสดงวันที่แบบไทย --- //
  function  displaydate($x){
  	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

  	$date_array=explode("-",$x);
  	$y=$date_array[0]+543;
  	$m=$date_array[1]-1;
  	$d=substr($date_array[2], 0, 2);

  	$m=$date_m[$m];

  	$displaydate="$d $m $y";
  	return $displaydate;
  }
  
?>