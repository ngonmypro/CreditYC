<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";
?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

$('#doctb').DataTable({

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
					],*/
					extend: 'pageLength'
				}],
select: true,
//paging: false,
//searching: false,
retrieve: true,

});
   
//------------------------------------------------------------------

//กำหนดส่วน footer ให้มีช่องพิมพ์ textbox สำหรับค้นหา
$('#doctb tfoot th').each( function () {
var title = $(this).text();
if((title != 'แก้ไข') && (title !='ลบ') && (title !='ลายเซนต์') ){
  $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
}else{
  $(this).html('');
}
} );
//-------------------------------------------------------------
// Apply the search ค้นหาจาก footer ------------------------
$('#doctb').DataTable().columns().every( function () {
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

  <table id="doctb" class="display cell-border compact row-border table table-striped table-bordered" cellspacing="0" width="100%">
  		<thead>
          <tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th style="display:none;">ID</th>
              <th>ชื่อเอกสาร</th>
              <th>ประเภทเอกสาร</th>
			  <th style="text-align:center;">อัพโหลดไฟล์</th>
          </tr>
      </thead>
      <tfoot>
      		<tr>
              <th style="text-align:center;">ลำดับที่</th>
              <th style="display:none;">ID</th>
              <th>ชื่อเอกสาร</th>
              <th>ประเภทเอกสาร</th>
			  <th style="text-align:center;">อัพโหลดไฟล์</th>
          </tr>
      </tfoot>
      <tbody>
      	<?php $crd2id = $_GET['crd2id'];
			$sql = " SELECT * FROM tbldocument WHERE doc_status = 1 ORDER BY doc_id ";
			$result = mysql_query($sql) or die(mysql_error());
            $rowint = 1;
			while($record=mysql_fetch_array($result)){
				$doc_id = $record['doc_id'];
				$doc_name = $record['doc_name'];
				$doc_type = $record['doc_type'];
				$doc_updatetime = $record['doc_updatetime'];
				
				//ค้นหา tbldoctype
				$sql_sch_doctype = " select * from tbldoctype where dty_id={$doc_type}";
				$result_sch_doctype = mysql_query($sql_sch_doctype) or die(mysql_error());
				$record_sch_doctype=mysql_fetch_array($result_sch_doctype);
					$dty_name = $record_sch_doctype['dty_name'];
					
				//ค้นหาว่ามี เอกสารที่แนบไปแล้วหรือยัง
				$sql_sch_attfile = " select count(file_name) as numoffile from tblfile where file_crd2id={$crd2id} and file_docid={$doc_id} ";
				$result_sch_attfile = mysql_query($sql_sch_attfile) or die(mysql_error());
				$record_sch_attfile=mysql_fetch_array($result_sch_attfile);
					$numoffile = $record_sch_attfile['numoffile'];						
		?>

      		<tr>
              <td style="text-align:center;"><?=$rowint?></td>
              <td style="display:none;"><?=$doc_id?></td>
              <td><?=$doc_name?></td>
              <td><?=$dty_name?></td>
			  <td>
              	
               <? 
			   	if($_SESSION['use_appid']==4 || $_SESSION['use_appid']==6 || $_SESSION['use_appid']==7){
					$btndis = "y"; 	  
			   	}else{
					$btndis = "n";	
				}
			   ?>
                
      			<button id="btnfileatt" class="btn <? if($numoffile==0){ ?>btn-warning<? }else{ ?>btn-info<? } ?> form-control"  type="button"  onclick="javascript:addfile('<?=$doc_id?>','<?=$crd2id?>','<?=$doc_name?>');" <? if($btndis=='y' && $numoffile==0 ){ ?> disabled <? } ?> ><? if($numoffile==0){ ?><i class='glyphicon glyphicon-paperclip'></i> Attachment File <? }else{ ?><i class='glyphicon glyphicon-file'></i> Open File<? } ?></button>
                
    		  </td>
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
