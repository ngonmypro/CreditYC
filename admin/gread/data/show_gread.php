<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

$('#greadtb').DataTable({
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
		lengthMenu: [
	      [ 25, 50, 100, -1 ],
	      [ '25 rows', '50 rows', '100 rows', 'Show all' ]
	  ],
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
select: true

});
//------------------------------------------------------------------

//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
$('#greadtb tfoot th').each( function () {
var title = $(this).text();
if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') ){
  $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
}else{
  $(this).html(' ');
}
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#greadtb').DataTable().columns().every( function () {
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

  <table id="greadtb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
  		<thead>
          <tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>เกรด</th>
              <th style="text-align:center;">ลบ</th>
          </tr>
      </thead>
      <tfoot>
      		<tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>เกรด</th>
              <th style="text-align:center;">ลบ</th>
          </tr>
      </tfoot>
      <tbody>
      	<?php
      $sql = "";
			$sql = " select * from tblgread order by gread_id ";
			$result = mysql_query($sql) or die(mysql_error());
            $rowint = 1;
			while($record=mysql_fetch_array($result)){
				$gread_id = $record['gread_id'];
				$gread_name = $record['gread_name'];
		?>

      		<tr>
              <td style="text-align:center;"><?=$rowint?></td>
              <td><?=$gread_id?></td>
              <td><?=$gread_name?></td>
							<td style="text-align:center;" onClick="javascript:delgread('<?=$gread_id?>','<?=$gread_name?>');"><img src="images/b_drop.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');"></td>
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
