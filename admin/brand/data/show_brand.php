<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

$('#brandtb').DataTable({
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
$('#brandtb tfoot th').each( function () {
var title = $(this).text();
if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') ){
  $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
}else{
  $(this).html(' ');
}
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#brandtb').DataTable().columns().every( function () {
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

  <table id="brandtb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
  		<thead>
          <tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อเต็มสาขา</th>
			  <th>ชื่อย่อสาขา</th>
              <th>เขตพิสจารณา</th>
              <th style="text-align:center;">ลบ</th>
          </tr>
      </thead>
      <tfoot>
      		<tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อเต็มสาขา</th>
			  <th>ชื่อย่อสาขา</th>
              <th>เขตพิสจารณา</th>
              <th style="text-align:center;">ลบ</th>
          </tr>
      </tfoot>
      <tbody>
      	<?php
      $sql = "";
			$sql = " select * from tblbrand order by bran_id ";
			$result = mysql_query($sql) or die(mysql_error());
            $rowint = 1;
			while($record=mysql_fetch_array($result)){
				$bran_id = $record['bran_id'];
				$bran_name = $record['bran_name'];
				$bran_names = $record['bran_names'];
				$bran_status = $record['bran_status'];

				$sql_sch_cons = " select * from tblconsideration where consi_id ={$bran_status} ";
				$result_sch_cons = mysql_query($sql_sch_cons) or die(mysql_error());
				$record_sch_cons=mysql_fetch_array($result_sch_cons);
					$consi_name_sch_cons = $record_sch_cons['consi_name'];

				//ค้นหาว่าถูกนำไปใช้ใน User หรือยัง tbluser
				$sql_count_brn = "select count(use_branid) as NumberofBraid from tbluser where use_branid={$bran_id} "; //SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;
				$result_count_brn = mysql_query($sql_count_brn) or die(mysql_error());
				$record_count_brn=mysql_fetch_array($result_count_brn);
					$NumberofBraid = $record_count_brn['NumberofBraid'];
		?>

      		<tr>
              <td style="text-align:center;"><?=$rowint?></td>
              <td><?=$bran_id?></td>
              <td><?=$bran_name?></td>
			  <td><?=$bran_names?></td>
              <td><?=$consi_name_sch_cons?></td>
              <? if($NumberofBraid == 0){ ?>
              <td style="text-align:center;" onClick="javascript:delbran('<?=$bran_id?>','<?=$bran_name?>');">
               <img src="images/b_drop.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');">
              </td>
              <? }else{ ?>
              	<td style="text-align:center;"></td>
              <? } ?>
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
