<script type="text/javascript">
//-----------------------------------------------------------------------------------------------
  $('#usertb').DataTable({
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
$('#usertb tfoot th').each( function () {
  var title = $(this).text();
  if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') ){
    $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
  }else{
    $(this).html(' ');
  }
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#usertb').DataTable().columns().every( function () {
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
 var table = $('#usertb').DataTable();

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

$('#usertb tbody').on('dblclick', 'tr', function () {
  var rdata = table.row( this ).data();
  var dialogInstance1 = new BootstrapDialog({
  type: BootstrapDialog.TYPE_INFO,
  size: BootstrapDialog.SIZE_WIDE,
  title: "<i class='ti-user'></i></font> ข้อมูลผู้ใช้งาน",
  message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
  message: $('<div></div>').load("admin/user/data/from_detail_user.php?useridedit=" + rdata[1] + ""),
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
<table id="usertb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%"> <!--display nowrap-->
    <thead>
        <tr>
            <th style="text-align:center;">ลำดับที่</th>
            <th>ลำดับ</th>
            <th>รหัสพนักงาน</th>
            <th>คำนำหน้า</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>สาขา</th>
            <th>สิทธิ์ผู้ใช้งาน</th> <!-- admin , requestor, approver, visitor -->
            <th>สิทธิ์ผู้อนุมัติ</th> <!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
            <th style="text-align:center;">แก้ไข</th>
            <th style="text-align:center;">ลบ</th>
        </tr>
    </thead>
    <tfoot>
      <tr>
          <th>ลำดับที่</th>
          <th>ลำดับ</th>
          <th>รหัสพนักงาน</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>สาขา</th>
          <th>สิทธิ์ผู้ใช้งาน</th> <!-- admin , requestor, approver, visitor -->
          <th>สิทธิ์ผู้อนุมัติ</th> <!-- apv0, apv1, apv2, apv3, apv4, apv5 -->
          <th>แก้ไข</th>
          <th>ลบ</th>
      </tr>
    </tfoot>
    <tbody>

    <?php include "../../../Connections/connect_mysql.php";

        $sql= " SELECT * FROM tbluser WHERE use_status = 1 order by use_id desc ";
        $result = mysql_query($sql) or die(mysql_error());
        $rowint = 1;
        while($record=mysql_fetch_array($result)){

            $use_id = $record['use_id'];
            $use_code = $record['use_code'];
            $use_name = $record['use_name'];
            $use_lname = $record['use_lname'];
            $record['use_titid'];
            $record['use_branid'];
            $use_type2 = $record['use_tuseid'];//ประเภท ผู้ใช้งาน
            $record['use_appid'];
			$username5=$record['use_user'];

			//ตรวจสอบประเภท ผู้ใช้งาน
			if($use_type2 == 1 || $use_type2 ==2){ //แสดงว่าเป็น Admin
				//นับจำนวนรายการใน tbluser ว่ามีหรือไม่
				$sql_ct1 = " select count(use_createby) as numofadmin from tbluser where use_createby ='{$username5}' ";
				$result_ct1 = mysql_query($sql_ct1) or die(mysql_error());
				$record_ct1=mysql_fetch_array($result_ct1);
					$numofadmin = $record_ct1['numofadmin'];
					if($numofadmin > 0){
						$delbtn = "n";	
					}else{
						$delbtn = "y";	
					}
			}else if($use_type2 == 3){ //แสดงว่าเป็น requester
				//นับจำนวนรายการใน tblcreditopen1 ว่ามีหรือไม่
				$sql_ct2 = " select count(crd1_projectname) as numofreq from tblcreditopen1 where crd1_createby ='{$username5}' ";
				$result_ct2 = mysql_query($sql_ct2) or die(mysql_error());
				$record_ct2=mysql_fetch_array($result_ct2);
					$numofreq = $record_ct2['numofreq'];
					if($numofreq > 0){
						$delbtn = "n";	
					}else{
						$delbtn = "y";	
					}
			}else if($use_type2 == 4){ //แสดงว่าเป็น approver
				//นับจำนวนรายการใน tblapprove ว่ามีหรือไม่
				$sql_ct3 = " select count(app_useid) as numofapp from tblapprove where app_createby ='{$username5}' ";
				$result_ct3 = mysql_query($sql_ct3) or die(mysql_error());
				$record_ct3=mysql_fetch_array($result_ct3);
					$numofapp = $record_ct3['numofapp'];
					if($numofapp > 0){
						$delbtn = "n";	
					}else{
						$delbtn = "y";	
					}
			}

$sql_s = "SELECT * FROM tbltitle, tblbrand, tbltypeuser, tbltypeapprove WHERE tit_id = '".$record['use_titid']."' AND bran_id = '".$record['use_branid']."' AND tuse_id = '".$record['use_tuseid']."' AND tapp_status = '".$record['use_appid']."'";
$result_s = mysql_query($sql_s) or die(mysql_error());
while($record_s = mysql_fetch_array($result_s)){
$use_titname = $record_s['tit_name'];
$use_bran = $record_s['bran_name'];
$use_tuse = $record_s['tuse_nameth'];
$use_app = $record_s['tapp_name'];
    ?>
        <tr style="cursor:pointer;">
            <td style="text-align:center;"><?=$rowint?></td>
            <td><?=$use_id?></td>
            <td><?=$use_code?></td>
            <td><?=$use_titname?></td>
            <td><?=$use_name?></td>
            <td><?=$use_lname?></td>
            <td><?=$use_bran?></td>
            <td><?=$use_tuse?></td>
            <td><?=$use_app?></td>
<!--<td style="text-align:center;"><? #if($use_signature==""){ ?><div style="color:#800000;" onClick="javascript:uploadsig('<?#=$use_id?>');"><i class="ti-upload"></i> Upload file </div><? #}else{ ?><div onClick="javascript:showimgsig('<?#=$use_id?>');" style="color:#09F;"><i class="ti-image"></i> Show image</div><? #} ?></td>-->
<td style="text-align:center;" onClick="uedit('<?=$use_id?>');"><img src="images/b_edit.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
<?
	if($record['use_tuseid']!=1){
?>
<? if($delbtn =="y"){ ?>
<td style="text-align:center;" id="icondelete"  onClick="udelete('<?=$use_id?>','<?=$use_titname?>','<?=$use_name?>','<?=$use_lname?>');" ><img src="images/b_drop.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
<? }else{ ?>
	<td></td>
<? } ?> 
<?
	}else{
?>
<td style="text-align:center;" id="icondelete"></td>	
<?
	}
?>
        </tr>
      <?php $rowint = $rowint + 1;
        }
      }//while ?>

    </tbody>
</table>

<?
	mysql_close($c); //close connection
?>
