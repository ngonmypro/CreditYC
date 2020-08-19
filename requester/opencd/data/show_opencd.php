<?php
    session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
	$use_id_r = $_SESSION['use_id'];

	$sqlcountall = " select count(crd2_id) as numofrca from tblcreditopen2 where crd2_useid='$use_id_r' ";
	$resultcountall = mysql_query($sqlcountall) or die(mysql_error());
	if($resultcountall){
		if(mysql_num_rows($resultcountall)>0){
			$recordcountall = mysql_fetch_array($resultcountall);
			$numofrca = $recordcountall['numofrca'];
		}else{
			$numofrca = 0;
		}
	}

	$sqlcountapp = " select count(crd2_id) as numofrcaapp from tblcreditopen2  where crd2_useid='$use_id_r' and crd2_status = '1' ";
	$resultcountapp = mysql_query($sqlcountapp) or die(mysql_error());
	if($resultcountapp){
		if(mysql_num_rows($resultcountapp)>0){
			$recordcountapp = mysql_fetch_array($resultcountapp);
			$numofrcaapp = $recordcountapp['numofrcaapp'];
		}else{
			$numofrcaapp = 0;
		}
	}

	$sqlcountnotapp = " select count(crd2_id) as numofrcanotapp from tblcreditopen2  where crd2_useid='$use_id_r' and crd2_status = '2'";
	$resultcountnotapp = mysql_query($sqlcountnotapp) or die(mysql_error());
	if($resultcountnotapp){
		if(mysql_num_rows($resultcountnotapp)>0){
			$recordcountnotapp = mysql_fetch_array($resultcountnotapp);
			$numofrcanotapp = $recordcountnotapp['numofrcanotapp'];
		}else{
			$numofrcanotapp = 0;
		}
	}


	$sqlcountwait = " select count(crd2_id) as numofrcawait from tblcreditopen2  where crd2_useid='$use_id_r' and crd2_status = '0'";
	$resultcountwait = mysql_query($sqlcountwait) or die(mysql_error());
	if($resultcountwait){
		if(mysql_num_rows($resultcountwait)>0){
			$recordcountwait = mysql_fetch_array($resultcountwait);
			$numofrcawait = $recordcountwait['numofrcawait'];
		}else{
			$numofrcawait = 0;
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<!-- w3.css -->
<!--<link rel="stylesheet" type="text/css" href="dist/css/w3.css">-->
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
				//อย , อน , ไม
				if ( data[10]=='0'  ) {
					//$('td', row).eq(6).addClass('highlight'); //กำหนดสีของ คอลัมน์ที่ 5 ตาม style class ขื่อ highlight
					//$(row).addClass('redClass');
					//$(row).css({"background-color":"#FFFFD7"});
					$('td', row).eq(5).css({"background-color":"#FFFFD7"});
				}else
				if ( data[10]=='1' ) {
					$('td', row).eq(5).css({"background-color":"#CAFFD8"});
				}else
				if ( data[10]=='2' ) {
					$('td', row).eq(5).css({"background-color":"#FDD"});
				}

			 },
			 //กำหนดส่วนปุ่มคำลั่งเพิ่มเติม
			 "dom": '<"toolbar">Bfrtip', //กำหนดส่วนหัวเอง
        lengthMenu: [
            [ 10, 25, 50, 100, -1 ],
            [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
        ],
        buttons: [{
          extend: 'pageLength'
          },

            	//'copy', 'excel', 'print', 'colvis' //'csv','pdf',
				{
                	extend: 'print',
					text: '<i class="ti-printer"></i> Print',
					exportOptions: {
						columns: [ 0, 2, 3, 4, 5, 6 ]
                    	//modifier: {
                        	//selected: true
                    	//}
					}
                },
                {
                    extend: 'excel',
					text: '<i class="ti-export"></i> Export to Excel',
					exportOptions: {
                    	columns: [ 0, 2, 3, 4, 5, 6 ]
                	}
                },
				{
					extend: 'colvis',
					text: '<i class="ti-layout"></i> Show/Hide Column',
					exportOptions: {
                    	columns: [ 0, 2, 3, 4, 5, 6 ]
                	}
				}
      ],
           select: true,
           order: [[ 0, "asc" ]]
		});
		//กำหนดข้อความส่วนหัว --------------------------------------------------
		$("div.toolbar").html('<p style="text-align:center;"><b>รายการขออนุมัติเครดิต (Credit Approval Request) </b></p>');
		//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
		$('#requesttb tfoot th').each( function () {
			var title = $(this).text();
			if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') && (title !='Result') && (title !='เอกสาร') ){
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

    //คลิกปุ่มลบ
      $('#DelReq').click( function () {
      var rdata = table.row('.selected').data();
      reqdel(rdata[1],rdata[4]);
      } );

    //คลิกปุ่มแก้ไข
    $('#EditReq').click( function () {
      var rdata = table.row('.selected').data();
      reqedit(rdata[1]);
    } );

		//test filter-----------------
			$('#tfilter').click(function(){
				var regExSearch = '1'; // '^\\s' + myValue +'\\s*$';
				var columnNo = 7;
				table.column(columnNo).search(regExSearch, true, false).draw();
			});
		//----------------------------
		//click ca1 ------------------------
			$('#c1').click(function(){
				$("#a2").html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");
				$("#a2").load("requester/opencd/data/show_opencd.php");
				//var regExSearch = '0'; // '^\\s' + myValue +'\\s*$';
				//var columnNo = 0;
				//table.column(columnNo).search(regExSearch, true, false).draw();
			});
		//----------------------------------
		//click ca2 ------------------------
			$('#c2').click(function(){
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
			});
		//----------------------------------

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

		});

});


</script>

</head>

<body>
<div class="row">
	<div class="col-md-12">
    	<!--<button type="button" class="btn btn-info" id="tfilter">test filter</button>-->
        <div style="float:right;"><span id="c1" class="badge1" data-badge="<?=$numofrca?>" style="color:#03F; cursor:pointer">รายการ ทั้งหมด</span>
        &nbsp;&nbsp;&nbsp;   <span id="c0" class="badge1" data-badge="<?=$numofrcawait?>" style="color:#FC0; cursor:pointer">กำลังดำเนินการ </span>
        &nbsp;&nbsp;&nbsp;   <span id="c2" class="badge1" data-badge="<?=$numofrcaapp?>" style="color:#6F0; cursor:pointer">อนุมัติ </span>
        &nbsp;&nbsp;&nbsp;   <span id="c3" class="badge1" data-badge="<?=$numofrcanotapp?>" style="color:#F00; cursor:pointer">ไม่อนุมัติ </span></div>
    </div>
</div>
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
                                          <th>ผู้อนุมัติ1</th>
                                          <th>ผู้อนุมัติ2</th>
                                          <th>ผู้อนุมัติ3</th>
                                          <th>ผู้อนุมัติ4</th>
                                          <th style="text-align:center;">Result</th>
                                          <th style="text-align:center;">เอกสาร</th>
                                          <th style="text-align:center;">แก้ไข</th>
                                          <th style="text-align:center;">ลบ</th>
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
                                          <th>ผู้อนุมัติ1</th>
                                          <th>ผู้อนุมัติ2</th>
                                          <th>ผู้อนุมัติ3</th>
                                          <th>ผู้อนุมัติ4</th>
                                          <th style="text-align:center;">Result</th>
                                          <th style="text-align:center;">เอกสาร</th>
                                          <th style="text-align:center;">แก้ไข</th>
                                          <th style="text-align:center;">ลบ</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                  	<?
										$sql=" SELECT * FROM tblcreditopen2 WHERE crd2_useid={$use_id_r} ORDER BY crd2_id DESC; ";
                                      	$result = mysql_query($sql) or die(mysql_error());
                                      	$rowint = 1;
                                      	while($record=mysql_fetch_array($result)){
											$crd2_id = $record['crd2_id'];
                      $crd2_crd1 = $record['crd2_crd1id'];//IDใบขอเปิดหน้า 1
											$use_id_rs = $record['crd2_useid']; //IDพนักงาน
                      $cus_id = $record['crd2_cusid']; //IDลูกค้า
											$crd2_date = displaydate($record['crd2_dateopen']);  //วันที่ขอเปิด
											$crd2_status = displaystatus($record['crd2_status']); //0:รอ, 1:อนุมัติ , 2:ไม่อนุมัติ
											$crd2_status_apv1 = $record['crd2_app1']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
 											$crd2_status_apv2 = $record['crd2_app2'];  //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
											$crd2_status_apv3 = $record['crd2_app3']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
											$crd2_status_apv4 = $record['crd2_app4']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
											$capnum = countapproval($crd2_status_apv1,$crd2_status_apv2,$crd2_status_apv3,$crd2_status_apv4);
                      $sql2 = "SELECT * FROM tblcustomer WHERE cus_id = '$cus_id'";
                            $result2 = mysql_query($sql2) or die(mysql_error());
                            while($record2 = mysql_fetch_array($result2)){
                              $cus_name = $record2['cus_name']; //ชื่อ
                              $cus_lname = $record2['cus_lname']; //นามสกุล
                              $cus_openoth = $record2['cus_openoth']; //ประเภทกิจการอื่นๆ
                              $cus_company = $record2['cus_company']; //ชื่อกิจการ
                              $cus_phone = $record2['cus_phoneno']; //เบอร์โทรศัพท์
                              $record2['cus_titid'];
                              $record2['cus_openid'];
                        $sql3 = "SELECT * FROM tbltitle, tbltypeopen WHERE tit_id = '".$record2['cus_titid']."' AND open_id = '".$record2['cus_openid']."'";
                        $result3 = mysql_query($sql3) or die(mysql_error());
                        while($record3 = mysql_fetch_array($result3)){
                          $title = $record3['tit_name'];
                          $type_busin = $record3['open_name'];
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
                                        <td><?=$crd2_status_apv1?></td>
                                        <td><?=$crd2_status_apv2?></td>
                                        <td><?=$crd2_status_apv3?></td>
                                        <td><?=$crd2_status_apv4?></td>
                                        <td style="text-align:center;"><img src="images/doccheck1.png" width="16" height="16" style="cursor:pointer" onClick="resultreq(<?=$crd2_id?>);"></td>
                                        <td style="text-align:center;"><img src="images/attachment_icon.jpg" width="16" height="16" style="cursor:pointer" onClick="AttFile('<?=$crd2_id?>');"></td>
                                        <td style="text-align:center;" >
                                        <?php if($crd2_status_apv1=='0' && $crd2_status_apv2=='0' && $crd2_status_apv3=='0' && $crd2_status_apv4=='0'){ ?>
                                        <img src="images/b_edit.png" width="16" height="16" style="cursor:pointer" onClick="reqedit('<?=$crd2_id?>');">
                                      <?php } ?>
                                        </td>
                                        <td style="text-align:center;" >
                                        <?php if($crd2_status_apv1=='0' && $crd2_status_apv2=='0' && $crd2_status_apv3=='0' && $crd2_status_apv4=='0'){ ?>
                                        <img src="images/b_drop.png" width="16" height="16" style="cursor:pointer" onClick="reqdel('<?=$crd2_id?>','<?=$title?><?=$cus_name?> <?=$cus_lname?>');">
                                      <?php } ?>
                                        </td>
                                    </tr>

                                    <?php
											$rowint = $rowint + 1;
										}}}//while
									?>
                                  </tbody>
                            </table>
</body>
</html>
<?php
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
