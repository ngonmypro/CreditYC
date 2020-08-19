<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

$('#doctb').DataTable({
paging: false,	
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
  buttons: [{
	/*lengthMenu: [
	      [ 25, 50, 100, -1 ],
	      [ '25 rows', '50 rows', '100 rows', 'Show all' ]
	  ],
	iDisplayLength: -1,
	paging: false,
    extend: 'pageLength'
    },
  {*/
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
                columns: [ 0, 2, 3]
            }
  }
],
select: true

});
//------------------------------------------------------------------

//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
$('#doctb tfoot th').each( function () {
var title = $(this).text();
if((title != 'แก้ไข') && (title !='ลบ') && (title !='ปิดการใช้งาน') ){
  $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
}else{
  $(this).html(' ');
}
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ----------------------------
$('#doctb').DataTable().columns().every( function () {
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
</script>

</head>

<body>

  <table id="doctb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
  		<thead>
          <tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อเอกสาร</th>
              <th>ประเภทเอกสาร</th>
              <th style="text-align:center;">แก้ไข</th>
							<th style="text-align:center;">ปิดการใช้งาน</th>
          </tr>
      </thead>
      <tfoot>
      		<tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อเอกสาร</th>
              <th>ประเภทเอกสาร</th>
              <th style="text-align:center;">แก้ไข</th>
							<th style="text-align:center;">ปิดการใช้งาน</th>
          </tr>
      </tfoot>
      <tbody>
      	<?php
      $sql = "";
			$sql = " SELECT * FROM tbldocument, tbldoctype WHERE doc_type = dty_id ORDER BY doc_id ";
			$result = mysql_query($sql) or die(mysql_error());
            $rowint = 1;
			while($record=mysql_fetch_array($result)){
				$doc_id = $record['doc_id'];
				$doc_name = $record['doc_name'];
				$doc_type = $record['dty_name'];
				$doc_status = $record['doc_status'];
				
				$sql_count_doc = " select count(file_docid) as numofdoc from tblfile where file_docid={$doc_id} ";
				$result_count_doc = mysql_query($sql_count_doc) or die(mysql_error());
				$record_count_doc = mysql_fetch_array($result_count_doc);
					$numofdoc = $record_count_doc['numofdoc'];
		?>

      		<tr>
              <td style="text-align:center;"><?=$rowint?></td>
              <td><?=$doc_id?></td>
              <td><?=$doc_name?></td>
              <td><?=$doc_type?></td>
              <? if($numofdoc ==0){ ?>
              <td style="text-align:center;" onClick="javascript:docedit('<?=$doc_id?>','<?=$doc_name?>');"><img src="images/b_edit.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
              <? }else{ ?>
              	<td></td>
              <? } ?>
              <? //if($numofdoc ==0){ ?>
							<?php if ($doc_status == 1) { ?>
							<td style="text-align:center;" onClick="javascript:closedoc('<?=$doc_id?>','<?=$doc_name?>');"><img src="images/details_close.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
						<?php }else { ?>
							<td style="text-align:center;" onClick="javascript:opendoc('<?=$doc_id?>','<?=$doc_name?>');"><img src="images/details_open.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
							<?php } ?>
              <? //}else{ ?>
              	<!--<td></td>-->
              <? //} ?>
					</tr>

        <?php
				$rowint = $rowint + 1;
			}//while
		?>
      </tbody>
  </table>
</body>
</html>
<?php
	mysql_close($c); //close connection
?>
