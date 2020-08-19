<?php session_start(); ?>
<script type="text/javascript">
//-----------------------------------------------------------------------------------------------
  $('#custb').DataTable({
  "createdRow": function ( row, data, index ) { //กำหนดเงือนไขเปลี่ยน style ของคอลัมน์หรือแถว

    if ( data[5]=='0' ) {
      $('td', row).eq(5).addClass('highlight'); //กำหนดสีของ คอลัมน์ที่ 5 ตาม style class ขื่อ highlight
    }
  },
  "columnDefs": [
          {
              "targets": [ 1 ],
              "visible": false,
              "searchable": false
          },
          {
              "targets": [ 2 ],
              "visible": false,
              "searchable": false
          }],

  dom: 'Bfrtip',
    lengthMenu: [
        [ 25, 50, 100, -1 ],
        [ '25 rows', '50 rows', '100 rows', 'Show all' ]
    ],
    buttons: [{
      extend: 'pageLength'
      },
    {
          extend: 'print',
          text: '<i class="ti-printer"></i> Print',
          exportOptions: {
            columns: [ 0, 2, 3, 4, 5 ]
      }
            },
            {
              extend: 'excel',
              text: '<i class="ti-export"></i> Export to Excel',
              exportOptions: {
                columns: [ 0, 2, 3, 4, 5 ]
              }
            },
    {
      extend: 'colvis',
      text: '<i class="ti-layout"></i> Show/Hide Column',
      exportOptions: {
                  columns: [ 0, 2, 3, 4, 5 ]
              }
    }
  ],
  //responsive: true,
  //colReorder: true,
  //autoFill: true,
  select: true

});

//กำหนดข้อความส่วนหัว --------------------------------------------------
  $("div.toolbar").html('<b>รายการผู้ใช้งานระบบ (User Detail) </b>');
//------------------------------------------------------------------

//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
$('#custb tfoot th').each( function () {
  var title = $(this).text();
  if((title != 'แก้ไข') && (title !='ลบ') && (title !='แบล็คลิสต์') ){
    $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
  }else{
    $(this).html(' ');
  }
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#custb').DataTable().columns().every( function () {
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

// delete row ----------------------------------------------
 var table = $('#custb').DataTable();

//คลิกปุ่มลบ
  $('#AdminbtnDel').click( function () {
  var rdata = table.row('.selected').data();
  udelete(rdata[1],rdata[3],rdata[4],rdata[5],rdata[7]);
  } );

//คลิกปุ่มแก้ไข
$('#AdminbtnEdit').click( function () {
  //var id= $(this).attr('name');
  var rdata = table.row('.selected').data();
  uedit(rdata[1]);
} );

//----------------------------------------------------------

$('#custb tbody').on('dblclick', 'tr', function () {
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
} );
//});

//--End of Customize Function -------------------------
function changeCursor(el, cursor)
{
el.style.cursor = cursor;
}

function OpenAdminAddForm(){
}
</script>
<table id="custb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%"> <!--display nowrap-->
    <thead>
        <tr>
            <th style="text-align:center;">ลำดับที่</th>
            <th style="text-align:center;">ลำดับการเปิด</th>
            <th style="text-align:center;">ลำดับลูกค้า</th>
            <th style="text-align:center;">รหัสลูกค้า</th>
            <th style="text-align:center;">คำนำหน้า</th>
            <th style="text-align:center;">ชื่อ</th>
            <th style="text-align:center;">นามสกุล</th>
            <th style="text-align:center;">รหัสบัตรประชาชน</th>
            <th style="text-align:center;">ชื่อบริษัท</th>
            <th style="text-align:center;">เบอร์โทรศัพท์</th>
            <th style="text-align:center;">กรรมการบริษัท</th>
            <th style="text-align:center;">รหัสบัตรประชาชน กรรมการบริษัท</th>
            <th style="text-align:center;">สถานะอนุมัติ</th>
            <?php if ($_SESSION['use_tuseid'] != 3) { ?>
            <th style="text-align:center;">จำนวนวันชำระ</th>
            <th style="text-align:center;">วงเงิน</th>
            <?php } ?>
            <th style="text-align:center;">สถานะแบล็คลิสต์</th>
            <?php if ($_SESSION['use_tuseid']== 1 || $_SESSION['use_tuseid'] == 2) { ?>
            <th style="text-align:center;">เอกสาร</th>
            <th style="text-align:center;">แก้ไข</th>
            <th style="text-align:center;">แบล็คลิสต์</th>
            <th style="text-align:center;">Preview</th>
          <?php } ?>
        </tr>
    </thead>
    <tfoot>
      <tr>
          <th>ลำดับที่</th>
          <th>ลำดับการเปิด</th>
          <th>ลำดับลูกค้า</th>
          <th>รหัสลูกค้า</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>รหัสบัตรประชาชน</th>
          <th>ชื่อบริษัท</th>
          <th>เบอร์โทรศัพท์</th>
          <th>กรรมการบริษัท</th>
          <th>รหัสบัตรประชาชน กรรมการบริษัท</th>
          <th>สถานะอนุมัติ</th>
          <?php if ($_SESSION['use_tuseid'] != 3) { ?>
          <th>จำนวนวันชำระ</th>
          <th>วงเงิน</th>
          <?php } ?>
          <th>สถานะแบล็คลิสต์</th>
          <?php if ($_SESSION['use_tuseid']== 1 || $_SESSION['use_tuseid'] == 2) { ?>
            <th style="text-align:center;">เอกสาร</th>
          <th style="text-align:center;">แก้ไข</th>
          <th style="text-align:center;">แบล็คลิสต์</th>
          <th>Preview</th>
        <?php } ?>
      </tr>
    </tfoot>
    <tbody>

    <?php include "../../Connections/connect_mysql.php";


        $sql= " SELECT * FROM tblcustomer order by cus_id desc ";
        $result = mysql_query($sql) or die(mysql_error());
        $rowint = 1;
        while($record=mysql_fetch_array($result)){

            $cus_id = $record['cus_id'];
            $cus_code = $record['cus_code'];
            $cus_name = $record['cus_name'];
            $cus_lname = $record['cus_lname'];
            $cus_idcard = $record['cus_idcard'];
            $cus_companyname = $record['cus_company'];
            $cus_phone = $record['cus_phoneno'];
            $cus_backlist = $record['cus_backlist'];
            $cus_openoth = $record['cus_openoth'];
            $name1 = $record['cus_name1']. ' ' .$record['cus_lname1'];
            $name2 = ','.$record['cus_name2']. ' ' .$record['cus_lname2'];
            $name3 = ','.$record['cus_name3']. ' ' .$record['cus_lname3'];
            $idcard = $record['cus_idcard1']. ' ,' .$record['cus_idcard2']. ' ,' .$record['cus_idcard3'];
            $record['cus_titid'];
            $record['cus_openid'];
			$cus_greadid5 = $record['cus_greadid'];
			//ค้นหาชื่อเกรด ลูกค้า
			if($cus_greadid5){
				$sql_greadname = "SELECT * FROM tblgread WHERE gread_id={$cus_greadid5} ";
				$result_greadname = mysql_query($sql_greadname) or die(mysql_error());
				$record_greadname=mysql_fetch_array($result_greadname);
					$gread_name5 = $record_greadname['gread_name'];
			}else{
				$gread_name5 = "-";
			}

            $sqlc = "SELECT * FROM tblcreditopen2 WHERE crd2_cusid = '$cus_id'";
            $resultc = mysql_query($sqlc) or die(mysql_error());
            while($recordc=mysql_fetch_array($resultc)){
                $crd2id = $recordc['crd2_id'];
                $recordc['crd2_useid'];
                $status = displaystatus($recordc['crd2_status']);
                $numstatus = $recordc['crd2_status'];

            $sqla = "SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' and app_useappid = '7'";
            $resulta = mysql_query($sqla) or die(mysql_error());
            while($recorda=mysql_fetch_array($resulta)){
                $limitday = $recorda['app_monday'];
                $limitmon = number_format($recorda['app_monlimit'] , 2);

$sql_s = "SELECT * FROM tbltitle, tbltypeopen WHERE tit_id = '".$record['cus_titid']."' AND open_id = '".$record['cus_openid']."' ";
$result_s = mysql_query($sql_s) or die(mysql_error());
while($record_s = mysql_fetch_array($result_s)){
$cus_titname = $record_s['tit_name'];
$cus_openname = $record_s['open_name'];
}

    ?>
        <tr style="cursor:pointer;">
            <td style="text-align:center;"><?=$rowint?></td>
            <td><?=$crd2id?></td>
            <td><?=$cus_id?></td>
            <td><?=$cus_code?></td>
            <td><?=$cus_titname?></td>
            <td><?=$cus_name?></td>
            <td><?=$cus_lname?></td>
            <td><?=$cus_idcard?></td>
            <?php if ($record['cus_openid'] != 6) { ?>
              <td><?=$cus_openname?> <?=$cus_companyname?></td>
            <?php }else { ?>
              <td><?=$cus_openoth?> <?=$cus_companyname?></td>
            <?php } ?>
            <td><?=$cus_phone?></td>
            <td><?#=$titname1?><?=$name1?> <?#=$titname2?><?=$name2?> <?#=$titname3?><?=$name3?></td>
            <td><?=$idcard?></td>
          <?php if ($numstatus == 0 ) { ?>
          <td style="text-align:center; background:#FFFFD7;"><?=$status?></td>
        <?php } elseif ($numstatus == 1 ) { ?>
          <td style="text-align:center; background:#CAFFD8;"><?=$status?></td>
        <?php } elseif ($numstatus == 2 ) { ?>
          <td style="text-align:center; background:#FDD;"><?=$status?></td>
          <?php } ?>
          <?php if ($_SESSION['use_tuseid'] != 3) { ?>
          <td><?=$limitday?> วัน</td>
          <td><?=$limitmon?> บาท</td>
          <?php } ?>
          <?php if ($cus_backlist == 'A') { ?>
          <td style="text-align:center; background:#ADFF2F;"><span class="badge1"><?php  echo "Active"; ?> (<?=$gread_name5?>)</span></td>
          <?php }else { ?>
          <td style="text-align:center; background:#FF4500;"><span class="badge1"><?php echo "Blacklist"; ?></span></td>
        <?php } ?>
<?php if ($_SESSION['use_tuseid'] == 1 || $_SESSION['use_tuseid'] == 2) { ?>
<td style="text-align:center;"><img src="images/attachment_icon.jpg" width="16" height="16" style="cursor:pointer" onClick="AttFile('<?=$crd2id?>');"></td>
<td style="text-align:center;" onClick="cusedit('<?=$cus_id?>');"><img src="images/b_edit.png" width="20" height="20" onMouseOver="changeCursor(this,'pointer');"></td>
<?php if($cus_backlist == 'A') { ?>
<td style="text-align:center;" onClick="backlist('<?=$cus_id?>','<?=$cus_titname?><?=$cus_name?> <?=$cus_lname?>');" ><img src="images/lock.png" width="20" height="20" onMouseOver="changeCursor(this,'pointer');"></td>
<?php } else { ?>
<td style="text-align:center;" onClick="upbacklist('<?=$cus_id?>','<?=$cus_titname?><?=$cus_name?> <?=$cus_lname?>');" ><img src="images/unlock.png" width="20" height="20" onMouseOver="changeCursor(this,'pointer');"></td>
<?php }?>
<td style="text-align:center;" onClick="preview('<?=$crd2id?>');" ><img src="images/Actions-document-print-preview-icon.png" width="20" height="20" onMouseOver="changeCursor(this,'pointer');"></td>
<?php } ?>
        </tr>
      <?php $rowint = $rowint + 1;

      }}}//while ?>

    </tbody>
</table>

<?php
function displaystatus($x){
	$st = "";

	if($x=="0"){
		$st = "อยู่ระหว่างการพิจารณา";
	}else
	if($x=="1"){
		$st = "ผ่านอนุมัติ";
	}else
	if($x=="2"){
		$st = "ไม่อนุมัติ";
	}
  $displaystatus = $st; //substr($st,0,6); //อย , อน , ไม
	return $displaystatus;
}
	mysql_close($c); //close connection
?>
