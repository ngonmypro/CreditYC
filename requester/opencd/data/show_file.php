<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

$docidsh = $_GET['docid'];
$crd2idsh = $_GET['crd2id'];

//echo "{$docidsh}, {$crd2idsh}";

?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

$('#filetb').DataTable({
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
        }  ],
				dom: 'Bfrtip',
				buttons: [{
					lengthMenu: [
							[ 25, 50, 100, -1 ],
							[ '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
					extend: 'pageLength'
				}],
				select: true
});
//------------------------------------------------------------------

//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
$('#filetb tfoot th').each( function () {
var title = $(this).text();
if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') ){
  $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
}else{
  $(this).html('');
}
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#filetb').DataTable().columns().every( function () {
var that = this;
//ค้นหาจาก footer
$( 'input', this.footer() ).on( 'keyup change', function () {
  if ( that.search() !== this.value ) {
    that
      .search( this.value )
      .draw();
  	}
	});
});
</script>

</head>

<body>

  <table id="filetb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
  		<thead>
          <tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อไฟล์</th>
              <th style="text-align:center;">ชื่อเอกสาร</th>
              <th>ดูเอกสาร</th>
              <th>วันที่อัปโหลด</th>
                <!--<th>วันที่หมดอายุ</th>-->
          </tr>
      </thead>
      <tfoot>
      		<tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th>ID</th>
              <th>ชื่อไฟล์</th>
              <th style="text-align:center;">ชื่อเอกสาร</th>
              <th>ดูเอกสาร</th>
              <th>วันที่อัปโหลด</th>
              <!--<th>วันที่หมดอายุ</th>-->
          </tr>
      </tfoot>
      <tbody>
      	<?php
			$sql = " SELECT * FROM tblfile WHERE file_crd2id = '{$crd2idsh}' AND file_docid = '{$docidsh}' order by file_id ";
			$result = mysql_query($sql) or die(mysql_error());
            $rowint = 1;
			while($record=mysql_fetch_array($result)){
				$fileid = $record['file_id'];
        		$doc_id = $record['file_docid'];
				$doc_name = $record['file_name'];
        		$doc_status = $record['file_status'];
        		$doc_dates = $record['file_datestart'];
        		$doc_datee = $record['file_dateend'];
				$doc_file_createtime = $record['file_createtime'];
				$doc_file_createby = $record['file_createby'];

        $sql1 = " SELECT * FROM tbldocument WHERE doc_id = '$doc_id'";
        $result1 = mysql_query($sql1) or die(mysql_error());
        while($row1 = mysql_fetch_array($result1)){
          $doc_typename = $row1['doc_name'];
		?>

      		<tr>
              <td style="text-align:center;"><?=$rowint?></td>
              <td><?=$fileid?></td>
              <td><?=$doc_name?></td>
              <?php if ($doc_status == 1){ ?>
                <td style="cursor:pointer"><b style="color:#36F;">NEW </b><?=$doc_typename?></td>
              <?php }else { ?>
              <td style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$doc_typename?></td>
            <?php } ?>
						<?php if ($_SESSION['use_tuseid'] != 4) { ?>
            <td><button type="button" class="btn btn-info form-control" onClick="showimgdoc('<?=$rowint?>','<?=$doc_name?>','<?=$doc_typename?>');">Open File</button></td>
					<?php } else { ?>
						<td><button type="button" class="btn btn-info form-control" onClick="showimgdocapp('<?=$rowint?>','<?=$doc_name?>','<?=$doc_typename?>');">Open File</button></td>
					<?php } ?>
			  <td><?=$doc_file_createtime?>(<?=$doc_file_createby?>)</td>
            <!--<td><?#=$doc_datee?></td>-->
          </tr>

        <?php
				$rowint = $rowint + 1;
			}}//while
		?>
      </tbody>
  </table>

  <div class="" id="c1"></div>
</body>
</html>
<?php

	mysql_close($c); //close connection
?>
