<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$use_id_r = $_SESSION['use_id'];

	
	//หาเขตการขาย ของ Approver ที่login อยู่
	$sql_apv_login = " select * from tbluser where use_id={$use_id_r} ";
	$result_apv_login = mysql_query($sql_apv_login) or die(mysql_error());
	$record_apv_login = mysql_fetch_array($result_apv_login);
		$use_branid_apv_login = $record_apv_login['use_branid'];
		$use_appid_apv_login = $record_apv_login['use_appid'];
		//echo "{$use_id_r},{$use_branid_apv_login}";
		
	//ค้นหาเขตของ Approver ที่ login อยู่
	$sql_apv_consi = " select * from tblbrand where bran_id={$use_branid_apv_login} ";
	$result_apv_consi = mysql_query($sql_apv_consi) or die(mysql_error());
	$record_apv_consi = mysql_fetch_array($result_apv_consi);
		$bran_status_apv_consi = $record_apv_consi['bran_status']; //id ของ เขตการพิจารณา */
		

	$sqlcountall = " select count(crd2_id) as numofrca from tblcreditopen2 where crd2_consi_id={$bran_status_apv_consi} ";
	$resultcountall = mysql_query($sqlcountall) or die(mysql_error());
	if($resultcountall){
		if(mysql_num_rows($resultcountall)>0){
			$recordcountall = mysql_fetch_array($resultcountall);
			$numofrca = $recordcountall['numofrca'];
		}else{
			$numofrca = 0;
		}
	}

	$sqlcountapp = " select count(crd2_id) as numofrcaapp from tblcreditopen2  where crd2_status = '1' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultcountapp = mysql_query($sqlcountapp) or die(mysql_error());
	if($resultcountapp){
		if(mysql_num_rows($resultcountapp)>0){
			$recordcountapp = mysql_fetch_array($resultcountapp);
			$numofrcaapp = $recordcountapp['numofrcaapp'];
		}else{
			$numofrcaapp = 0;
		}
	}

	$sqlcountnotapp = " select count(crd2_id) as numofrcanotapp from tblcreditopen2  where crd2_status = '2' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultcountnotapp = mysql_query($sqlcountnotapp) or die(mysql_error());
	if($resultcountnotapp){
		if(mysql_num_rows($resultcountnotapp)>0){
			$recordcountnotapp = mysql_fetch_array($resultcountnotapp);
			$numofrcanotapp = $recordcountnotapp['numofrcanotapp'];
		}else{
			$numofrcanotapp = 0;
		}
	}


	$sqlcountwait = " select count(crd2_id) as numofrcawait from tblcreditopen2  where crd2_status = '0' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultcountwait = mysql_query($sqlcountwait) or die(mysql_error());
	if($resultcountwait){
		if(mysql_num_rows($resultcountwait)>0){
			$recordcountwait = mysql_fetch_array($resultcountwait);
			$numofrcawait = $recordcountwait['numofrcawait'];
		}else{
			$numofrcawait = 0;
		}
	}

	$sqlapv1n = " select count(crd2_id) as numofn from tblcreditopen2  where 	crd2_app3 = '0' and crd2_status = '0' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultapv1n = mysql_query($sqlapv1n) or die(mysql_error());
	if($resultapv1n){
		if(mysql_num_rows($resultapv1n)>0){
			$recordapv1n = mysql_fetch_array($resultapv1n);
			$numofapv1n = $recordapv1n['numofn'];
		}else{
			$numofapv1n = 0;
		}
	}

	$sqlapv1p = " select count(crd2_id) as numofp from tblcreditopen2  where crd2_app3 = '1' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultapv1p = mysql_query($sqlapv1p) or die(mysql_error());
	if($resultapv1p){
		if(mysql_num_rows($resultapv1p)>0){
			$recordapv1p = mysql_fetch_array($resultapv1p);
			$numofapv1p = $recordapv1p['numofp'];
		}else{
			$numofapv1p = 0;
		}
	}

	$sqlapv1np = " select count(crd2_id) as numofnp from tblcreditopen2  where crd2_app3 = '2' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultapv1np = mysql_query($sqlapv1np) or die(mysql_error());
	if($resultapv1np){
		if(mysql_num_rows($resultapv1np)>0){
			$recordapv1np = mysql_fetch_array($resultapv1np);
			$numofapv1np = $recordapv1np['numofnp'];
		}else{
			$numofapv1np = 0;
		}
	}

	$sqlapvstatus = " select count(crd2_id) as numofpsta from tblcreditopen2  where crd2_app3 = '0' and crd2_status = '1' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultapvstatus = mysql_query($sqlapvstatus) or die(mysql_error());
	if($resultapvstatus){
		if(mysql_num_rows($resultapvstatus)>0){
			$recordapvstatus = mysql_fetch_array($resultapvstatus);
			$numofapvstatus = $recordapvstatus['numofpsta'];
		}else{
			$numofapvstatus = 0;
		}
	}

	$sqlapvstatusp = " select count(crd2_id) as numofnpsta from tblcreditopen2  where crd2_app3 = '0' and crd2_status = '2' and crd2_consi_id={$bran_status_apv_consi} ";
	$resultapvstatusp = mysql_query($sqlapvstatusp) or die(mysql_error());
	if($resultapvstatusp){
		if(mysql_num_rows($resultapvstatusp)>0){
			$recordapvstatusp = mysql_fetch_array($resultapvstatusp);
			$numofapvstatusp = $recordapvstatusp['numofnpsta'];
		}else{
			$numofapvstatusp = 0;
		}
	}

?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<style>
.badge1 {
   position:relative;
}
.badge1[data-badge]:after {
   content:attr(data-badge);
   position:absolute;
   top:-10px;
   right:-10px;
   font-size:.7em;
   background:#F60; /*green;*/
   color:white;
   width:18px;height:18px;
   text-align:center;
   line-height:18px;
   border-radius:50%;
   box-shadow:0 0 1px #333;
}
</style>

<link rel="stylesheet" type="text/css" href="datatableexport/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="datatableexport/buttons.dataTables.min.css">

<!--<script src="datatableexport/jquery-1.12.3.js"></script>-->
<script src="datatableexport/jquery.dataTables.min.js"></script>
<script src="datatableexport/dataTables.buttons.min.js"></script>
<script src="datatableexport/buttons.flash.min.js"></script>
<script src="datatableexport/jszip.min.js"></script>
<script src="datatableexport/pdfmake.min.js"></script>
<script src="datatableexport/vfs_fonts.js"></script>
<script src="datatableexport/buttons.html5.min.js"></script>
<script src="datatableexport/buttons.print.min.js"></script>
<script src="datatableexport/dataTables.fixedHeader.min.js"></script>
<script src="datatableexport/buttons.colVis.min.js"></script>
<script src="datatableexport/dataTables.select.min.js"></script>

<script>
$('#pnrating').lobiPanel({
	sortable: true,
	reload: false,
    close: false,
	expand: false,
	unpin: false,
    editTitle: false
});
$('#pnrating').hide();

$(document).ready(function() {
	$('#requesttb').DataTable({
		// hidden column ---------------------------------------------------
		  	"columnDefs": [
            	{
                	"targets": [ 1 ],
                	"visible": false,
                	"searchable": false
            	},
				{
					"targets": [ 7 ],
                	"visible": false,
                	//"searchable": false
				},
				{
					"targets": [ 8 ],
                	"visible": false,
                	//"searchable": false
				},
				{
					"targets": [ 9 ],
                	"visible": false,
                	//"searchable": false
				},
				{
					"targets": [ 10 ],
                	"visible": false,
                	//"searchable": false
				}
        	 ],
			  //กำหนดรูปแบบแถว ตามเงื่อนไข
			 "createdRow": function ( row, data, index ) { //กำหนดเงือนไขเปลี่ยน style ของคอลัมน์หรือแถว
			 	//var str = data[6]";
				//var res = str.substring(1, 4);
				if ( data[10]=='0'  ) {
					$('td', row).eq(5).css({"background-color":"#FFFFD7"});
				}else
				if ( data[10]=='1' ) {
					$('td', row).eq(5).css({"background-color":"#CAFFD8"});
				}else
				if ( data[10]=='2' ) {
					$('td', row).eq(5).css({"background-color":"#FDD"});
				}

				//เปลี่ยนสีตัวอักษร
				if( data[9]=='0'){
					$('td', row).eq(6).css({"color":"#F00"});
				}else
				if( data[9]=='1'){
					$('td', row).eq(6).css({"color":"#03F"});
				}else
				if( data[9]=='2'){
					$('td', row).eq(6).css({"color":"#F60"});
				}


			 },
			  //กำหนดส่วนปุ่มคำลั่งเพิ่มเติม
            	//'copy', 'excel', 'print', 'colvis' //'csv','pdf',
              "dom": '<"toolbar">Bfrtip', //กำหนดส่วนหัวเอง
               lengthMenu: [
                   [ 10, 25, 50, 100, -1 ],
                   [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
               ],
               buttons: [{
                 extend: 'pageLength'
                 },
        {
                	extend: 'print',
					text: '<i class="ti-printer"></i> Print',
					exportOptions: {
						columns: [ 0, 2, 3, 4, 5, 6, 12, 13 ]
                    	//modifier: {
                        	//selected: true
                    	//}
					}
                },
                {
                    extend: 'excel',
					text: '<i class="ti-export"></i> Export to Excel',
					exportOptions: {
                    	columns: [ 0, 2, 3, 4, 5, 6, 12, 13 ]
                	}
                },
				{
					extend: 'colvis',
					text: '<i class="ti-layout"></i> Show/Hide Column',
					exportOptions: {
                    	columns: [ 0, 2, 3, 4, 5, 6, 12, 13 ]
                	}
				}
        	 ],
			 //กำหนดให้แสดงแถบสี ถ้ามีการเลือกแถว
			 select: true,
			 //กำหนดการจัดเรียง เริ่มต้น defale
			 order: [[ 0, "asc" ]]
		});

		//กำหนดข้อความส่วนหัว --------------------------------------------------
		$("div.toolbar").html('<br><p style="text-align:center;"><b>รายการขออนุมัติเครดิต (Credit Approval Request) </b></p>');
		//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#requesttb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='Result') && (title !='เอกสาร') && (title !='ประเมิน/อนุมัติ') && (title !='พิจารณา') ){
				$(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
			}else{
				$(this).html(' ');
			}
		} );
		//-------------------------------------------------------------
		// Apply the search ค้นหาจาก footer ------------------------
		$('#requesttb').DataTable().columns().every( function () {
			var that = this;
			//ค้นหาจาก footer
			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );
		//----------------------------------------------------------
		//ดับเบิลคลิ๊ก แถว
		var table = $('#requesttb').DataTable();

		//test filter-----------------
			$('#tfilter').click(function(){
				var regExSearch = '1'; // '^\\s' + myValue +'\\s*$';
				var columnNo = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
			});
		//----------------------------

		//ดับเบิลคลิ๊ก แถว
		//var table = $('#requesttb').DataTable();

		//click ca1 ------------------------
			$('#c1').click(function(){
				$("#a2").html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");
				$("#a2").load("approve/approve/data/show_appro1.php");
			});
		//----------------------------------
		//click ca2 ------------------------
			/*$('#c2').click(function(){
				var regExSearch = '1'; // '^\\s' + myValue +'\\s*$';
				var columnNo = 10;
				table.column(columnNo).search(regExSearch, true, false).draw();
			});
		//----------------------------------
		//click ca3 ------------------------
			$('#c3').click(function(){
				var regExSearch = '2'; // '^\\s' + myValue +'\\s*$';
				var columnNo = 10;
				table.column(columnNo).search(regExSearch, true, false).draw();
			});
		//----------------------------------
		//click ca0 ------------------------
			$('#c0').click(function(){
				var regExSearch = '0'; // '^\\s' + myValue +'\\s*$';
				var columnNo = 10;
				table.column(columnNo).search(regExSearch, true, false).draw();
			});*/
		//----------------------------------
		//click ca4 ------------------------
			$('#c4').click(function(){
				var regExSearch = '0'; // '^\\s' + myValue +'\\s*$';
				var regExSearch2 = '0';
				var columnNo = 10;
				var columnNo2 = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
				table.column(columnNo2).search(regExSearch2, true, false).draw();
			});
		//----------------------------------
		//click ca5 ------------------------
			$('#c5').click(function(){
				var regExSearch = ''; // '^\\s' + myValue +'\\s*$';
				var regExSearch2 = '1';
				var columnNo = 10;
				var columnNo2 = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
				table.column(columnNo2).search(regExSearch2, true, false).draw();
			});
			$('#c6').click(function(){
				var regExSearch = ''; // '^\\s' + myValue +'\\s*$';
				var regExSearch2 = '2';
				var columnNo = 10;
				var columnNo2 = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
				table.column(columnNo2).search(regExSearch2, true, false).draw();
			});

			$('#c7').click(function(){
				var regExSearch = '1'; // '^\\s' + myValue +'\\s*$';
				var regExSearch2 = '0';
				var columnNo = 10;
				var columnNo2 = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
				table.column(columnNo2).search(regExSearch2, true, false).draw();
			});
			$('#c8').click(function(){
				var regExSearch = '2'; // '^\\s' + myValue +'\\s*$';
				var regExSearch2 = '0';
				var columnNo = 10;
				var columnNo2 = 9;
				table.column(columnNo).search(regExSearch, true, false).draw();
				table.column(columnNo2).search(regExSearch2, true, false).draw();
			});
		//----------------------------------
		// double click row -----------------------------------------
		$('#requesttb tbody').on('dblclick', 'tr', function () {
			var rdata = table.row( this ).data();
			var dialogInstance1 = new BootstrapDialog({
			type: BootstrapDialog.TYPE_INFO,
			size: BootstrapDialog.SIZE_WIDE,
			title: "<i class='ti-clipboard'></i></font> รายละเอียดข้อมูลการขออนุมัติ",
			message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
			message: $('<div></div>').load("requester/opencd/data/from_show.php?reqid=" + rdata[1] + ""),
			draggable: true,
			closable: true,
			closeByBackdrop: false,
			closeByKeyboard: false,
			buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			}]

			});

			dialogInstance1.open();

			//-------------------------------------------------------------------------

		});
});
/*function (reqid){
	appdlg.setMessage($('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."));
	appdlg.setMessage($('<div></div>').load("approve/consider/data/consi1.php?reqid=" + reqid + ""));
	appdlg.open();
}*/
</script>

</head>

<body>
<div class="row">
	<div class="col-md-12">
    	<!--<button type="button" class="btn btn-info" id="tfilter">test filter</button>-->
        <div style="float:right;"><span id="c1" class="badge1" data-badge="<?=$numofrca?>" style="color:#03F; cursor:pointer; text-decoration:underline;"><b>รายการ ทั้งหมด</b></span>
        <!--&nbsp;&nbsp;&nbsp;   <span id="c0" class="badge1" data-badge="<?$numofrcawait?>" style="color:#FC0;"><b>กำลังดำเนินการ </b></span>
        &nbsp;&nbsp;&nbsp;   <span id="c2" class="badge1" data-badge="<?$numofrcaapp?>" style="color:#6F0;"><b>อนุมัติ </b></span>
        &nbsp;&nbsp;&nbsp;   <span id="c3" class="badge1" data-badge="<?$numofrcanotapp?>" style="color:#F00;"><b>ไม่อนุมัติ </b></span> -->
       		&nbsp;&nbsp;&nbsp;   <span id="c4" class="badge1" data-badge="<?=$numofapv1n?>" style="color:#F00; cursor:pointer;<? //if($_SESSION['search_exp']=='1'){ ?> text-decoration:underline; <? //} ?>" ><b>ยังไม่ประเมิน </b></span>
            &nbsp;&nbsp;&nbsp;   <span id="c5" class="badge1" data-badge="<?=$numofapv1p?>" style="color:#060; cursor:pointer;<? //if($_SESSION['search_exp']=='2'){ ?> text-decoration:underline; <? //} ?>"><b>อนุมัติ </b></span>
             &nbsp;&nbsp;&nbsp;   <span id="c6" class="badge1" data-badge="<?=$numofapv1np?>" style="color:#F30; cursor:pointer;<? //if($_SESSION['search_exp']=='3'){ ?> text-decoration:underline; <? //} ?>"><b>ไม่อนุมัติ </b></span>
						 &nbsp;&nbsp;&nbsp;   <span id="c7" class="badge1" data-badge="<?=$numofapvstatus?>" style="color:#6B8E23; cursor:pointer;<? //if($_SESSION['search_exp']=='3'){ ?> text-decoration:underline; <? //} ?>"><b>ยังไม่ประเมิน อนุมัติแล้ว </b></span>
						 &nbsp;&nbsp;&nbsp;   <span id="c8" class="badge1" data-badge="<?=$numofapvstatusp?>" style="color:#FA8072; cursor:pointer;<? //if($_SESSION['search_exp']=='3'){ ?> text-decoration:underline; <? //} ?>"><b>ยังไม่ประเมิน ไม่อนุมัติ </b></span>
		</div>
</div>

<div class="row">
	<div class="col-md-12">
<table id="requesttb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
                            	<thead>
                                      <tr>
                                          <th style="text-align:center;">ลำดับที่</th>
                                          <th>ID</th>
                                          <th>วันที่</th>
                                          <th>ชื่อกิจการ</th>
                                          <th>ชื่อผู้ติดต่อ</th>
                                          <th>โทรศัพท์</th>
                                          <th>สถานะ</th>
                                          <th>ผู้อนุมัติ1</th> <!--0=ไม่ login , 1= กำลัง login อยู่ -->
                                          <th>ผู้อนุมัติ2</th> <!-- admin , requestor, approver, visitor -->
                                          <th>ผู้อนุมัติ3</th> <!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
                                          <th>ผู้อนุมัติ4</th>
                                          <th style="text-align:center;">การประเมิน</th>
																					<th>เขตการพิจารณา</th>
                                           <th>พนักงานขาย</th>
                                          <th>สาขา</th>
                                          <th style="text-align:center;">Result</th>
                                          <th style="text-align:center;">เอกสาร</th>
                                          <th style="text-align:center;">ประเมิน/อนุมัติ</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th style="text-align:center;">ลำดับที่</th>
                                          <th>ID</th>
                                          <th>วันที่</th>
                                          <th>ชื่อกิจการ</th>
                                          <th>ชื่อผู้ติดต่อ</th>
                                          <th>โทรศัพท์</th>
                                          <th>สถานะ</th>
                                          <th>ผู้อนุมัติ1</th> <!--0=ไม่ login , 1= กำลัง login อยู่ -->
                                          <th>ผู้อนุมัติ2</th> <!-- admin , requestor, approver, visitor -->
                                          <th>ผู้อนุมัติ3</th> <!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
                                          <th>ผู้อนุมัติ4</th>
                                          <th>การประเมิน</th>
																					<th>เขตการพิจารณา</th>
                                          <th>พนักงานขาย</th>
                                          <th>สาขา</th>
                                          <th style="text-align:center;">Result</th>
                                          <th style="text-align:center;">เอกสาร</th>
                                          <th style="text-align:center;">ประเมิน/อนุมัติ</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                  	<?
										$sql="  SELECT * FROM tblcreditopen2, tblconsideration WHERE consi_id = crd2_consi_id AND crd2_consi_id={$bran_status_apv_consi} ORDER BY crd2_id DESC; ";
                                      	$result = mysql_query($sql) or die(mysql_error());
                                      	$rowint = 1;
                                      	while($record=mysql_fetch_array($result)){
  											$crd2_id = $record['crd2_id'];
                        $crd2_crd1 = $record['crd2_crd1id'];//IDใบขอเปิดหน้า 1
  											$use_id_rs = $record['crd2_useid']; //IDพนักงาน
                        $cus_id = $record['crd2_cusid']; //IDลูกค้า
												$consiname = $record['consi_name'];
												$sellname =	$record['crd2_sellname'];
  											$crd2_date = displaydate($record['crd2_dateopen']);  //วัวันที่ขอเปิด
  											$crd2_status = displaystatus($record['crd2_status']); //0:รอ, 1:อนุมัติ , 2:ไม่อนุมัติ
  											$crd2_status_apv1 = $record['crd2_app1']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
   											$crd2_status_apv2 = $record['crd2_app2'];  //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
  											$crd2_status_apv3 = $record['crd2_app3']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
  											$crd2_status_apv4 = $record['crd2_app4']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
  											$capnum = countapproval($crd2_status_apv1,$crd2_status_apv2,$crd2_status_apv3,$crd2_status_apv4);
                        $apv1result = displaystatusapv3($crd2_status_apv3);

                        $sql2 = "SELECT * FROM tblcustomer, tbluser WHERE cus_id = '$cus_id' AND use_id = '$use_id_rs'";
                              $result2 = mysql_query($sql2) or die(mysql_error());
                              while($record2 = mysql_fetch_array($result2)){
                                $cus_name = $record2['cus_name']; //ชื่อ
                                $cus_lname = $record2['cus_lname']; //นามสกุล
                                $cus_openoth = $record2['cus_openoth']; //ประเภทกิจการอื่นๆ
                                $cus_company = $record2['cus_company']; //ชื่อกิจการ
                                $cus_phone = $record2['cus_phoneno']; //เบอร์โทรศัพท์
                                $rca_sale_name = $record2['use_name']." ".$record2['use_lname']; //ชื่อพนักงาน
                                $record2['use_branid'];
                                $record2['cus_titid'];
                                $record2['cus_openid'];
                          $sql3 = "SELECT * FROM tbltitle, tbltypeopen, tblbrand WHERE tit_id = '".$record2['cus_titid']."' AND open_id = '".$record2['cus_openid']."' AND bran_id = '".$record2['use_branid']."'";
                          $result3 = mysql_query($sql3) or die(mysql_error());
                          while($record3 = mysql_fetch_array($result3)){
                            $title = $record3['tit_name'];
                            $type_busin = $record3['open_name'];
                            $rca_sale_branch = $record3['bran_name'];
									?>

                                  	<tr>
                                        <td style="text-align:center;"><?=$rowint?></td>
                                        <td><?=$crd2_id?></td>
                                        <td><?=$crd2_date?></td>
                                        <?php if ($record2['cus_openid'] == 6){ ?>
                                        <td><? echo "{$cus_openoth} {$cus_company}"; ?></td>
                                        <?php }else { ?>
                                        <td><? echo "{$type_busin} {$cus_company}"; ?></td>
                                        <?php } ?>
                                        <td><? echo "{$title}{$cus_name} {$cus_lname}"; ?></td>
                                        <td><?=$cus_phone?></td>
                                        <td><span class="badge1" data-badge="<?=$capnum?>"><?=$crd2_status?></span></td>
                                        <td><?=$crd2_status_apv1?></td> <!--0=ไม่ login , 1= กำลัง login อยู่ -->
                                        <td><?=$crd2_status_apv2?></td> <!-- admin , requestor, approver, visitor -->
                                        <td><?=$crd2_status_apv3?></td> <!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
                                        <td><?=$crd2_status_apv4?></td>

                                        <td style="text-align:center;"><?=$apv1result?></td>
										<td><?=$consiname?></td>
                                        <td><?=$sellname?></td>
                                        <td><?=$rca_sale_branch?></td>
                                        <td style="text-align:center; cursor:pointer;"><img src="images/doccheck1.png" width="16" height="16" onClick="resultreq('<?=$crd2_id?>');"></td>
                                        <td style="text-align:center; cursor:pointer;"><img src="images/attachment_icon.jpg" width="16" height="16" onClick="AttFile('<?=$crd2_id?>');"></td>
                                        <?php //if ($record2['cus_openid'] == 6){ ?>
                                        <!--<td style="text-align:center; "><button type="button" class="btn btn-primary" id="btnappreq" onClick="javascript:Approveq('<?$crd2_id?>','<?$cus_openoth?> <?$cus_company?>');"><img src="images/doccheck2.png" width="16" height="16">ประเมิน/อนุมัติ</button></td>-->
                                        <?php //}else { ?>
                                        <!--<td style="text-align:center; "><button type="button" class="btn btn-primary" id="btnappreq" onClick="javascript:Approveq('<?$crd2_id?>','<?$type_busin?> <?$cus_company?>');"><img src="images/doccheck2.png" width="16" height="16">ประเมิน/อนุมัติ</button></td>-->
                                        <?php //} ?>
                                        
                                         <?
											if(($use_appid_apv_login==4) && ($crd2_status_apv1 != 0)){
												$approved1 = "Y";	
											}else if(($use_appid_apv_login==5) && ($crd2_status_apv2 != 0)){
												$approved1 = "Y";
											}else if(($use_appid_apv_login==6) &&  ($crd2_status_apv3 != 0)){
												$approved1 = "Y";
											}else if(($use_appid_apv_login==7) &&  ($crd2_status_apv4 != 0)){
												$approved1 = "Y";
											}else{
												$approved1 = "N";
											}
										?>
                                        <td style="text-align:center; ">
                                        
                                        <button type="button" <? if($approved1=="Y"){ ?> disabled <? } ?> class="btn btn-primary" id="btnappreq" onClick="javascript:Approveq('<?=$crd2_id?>','<?=$cus_company?>');"><img src="images/doccheck2.png" width="16" height="16">ประเมิน/อนุมัติ</button>
                                        
                                        </td>
                                        
                                    </tr>
                                    <?
											$rowint = $rowint + 1;
										} } }//while
									?>
                                  </tbody>
                            </table>
     </div><!--col-->
 </div><!--row-->

 <div class="col-md-12">
     	<div id="pnrating" class="panel panel-info">
        	<div id="pnhrating" class="panel-heading"> <i class="ti-comments"></i><font id="httrating"> แบบประเมินความเสี่ยงลูกค้า (Credit Rating) </font><i class="glyphicon glyphicon-remove btn" onClick="HidePanel('#pnrating');" style="float:right;"></i></div>
                        <div class="panel-body">
                        	<div id="apnrt"></div>
                        </div>
                        <div class="panel-footer" style="text-align:right;">
                        	<div class="btn-group" role="group" aria-label="menufooterrating">
                            	<button type="button" id="Closefrmrating" class="btn btn-secondary" onClick="HidePanel('#pnrating');"><i class='glyphicon glyphicon-share'></i> Close</button>
                            </div>
                        </div>
                    </div><!-- pn2 -->
            	</div><!-- col -->

</body>
</html>
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
//--แสดงข้อความสถานะการอนุมัติ
function displaystatus($x){
	$st = "";

	if($x=="0"){
		$st = "อยู่ระหว่างการพิจารณา";
	}else
	if($x=="1"){
		$st = "อนุมัติ";
	}else
	if($x=="2"){
		$st = "ไม่อนุมัติ";
	}

	$displaystatus = $st; //substr($st,0,6); //อย , อน , ไม
	return $displaystatus;
}

function displaystatusapv3($x){
	$st = "";

	if($x=="0"){
		$st = "ยังไม่ประเมิน";
	}else
	if($x=="1"){
		$st = "อนุมัติ";
	}else
	if($x=="2"){
		$st = "ไมอนุมัติ";
	}

	$displaystatusapv3 = $st; //substr($st,0,6); //อย , อน , ไม
	return $displaystatusapv3;
}

function countapproval($p1,$p2,$p3,$p4){
	$capp = 0;
	if($p1!='0'){
		$capp = $capp + 1;
	}else{
		$capp = $capp;
	}
	if($p2!='0'){
		$capp = $capp + 1;
	}else{
		$capp = $capp;
	}
	if($p3!='0'){
		$capp = $capp + 1;
	}else{
		$capp = $capp;
	}
	if($p4!='0'){
		$capp = $capp + 1;
	}else{
		$capp = $capp;
	}
	$countapproval = $capp;
	return $countapproval;

}

	mysql_close($c); //close connection
?>
