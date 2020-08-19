<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

    $sql = " SELECT * FROM tbldocument WHERE doc_id = '{$_GET['docid']}'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $docname = $row['doc_name'];
    $doctype = $row['doc_type'];
 ?>
 
 <script>

 $(document).ready(function(){

	$('#doc_name_e').blur(function() {
		if($('#doc_name_e').val().length==0){
			$('#fg_doc_name_e').addClass('has-error');
			$('#smt_doc_name_e').html('ชื่อเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_name_e').focus();		
		}else{
			$('#fg_doc_name_e').removeClass('has-error');
			$('#fg_doc_name_e').addClass('has-success');
			$('#smt_doc_name_e').html('');	
		}
	});	
	
	$('#doc_type_e').blur(function() {
		if($('#doc_type_e').val()==0){
			$('#fg_doc_type_e').addClass('has-error');
			$('#smt_doc_type_e').html('ประเภทเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_type_e').focus();		
		}else{
			$('#fg_doc_type_e').removeClass('has-error');
			$('#fg_doc_type_e').addClass('has-success');
			$('#smt_doc_type_e').html('');	
		}
	});		
	
});
 
 </script>

 <div class="row">
   <div class="col-md-5">
   	  <div class="form-group" id="fg_doc_name_e">
       <label>ชื่อเอกสาร : </label>
         <input type="text" class="form-control border-input" id="doc_name_e" placeholder="Document Name"  value="<?=$docname?>"/>
         <small id="smt_doc_name_e" class="form-text text-muted" style="color:#F30;"></small>
      </div>
    </div>
    <div class="col-md-3">
       <div class="form-group" id="fg_doc_type_e">
       <label>ประเภทเอกสาร : </label>
         <select class="form-control" id="doc_type_e">
           <option value="0"> # เลือกประเภทเอกสาร # </option>
           <?php
           $sqldoc = 'SELECT * FROM tbldoctype';
           $resultdoc = mysql_query($sqldoc) or die(mysql_error());
           while ($rowdoc = mysql_fetch_array($resultdoc)) {?>
             <option value="<?php echo $rowdoc['dty_id']; ?>"
               <?php if ($doctype == $rowdoc['dty_id']) {
                 echo 'selected="selected"';
               } ?>
               ><?php echo $rowdoc['dty_name']; ?></option>
             <?php } ?>
           </select>
           <small id="smt_doc_type_e" class="form-text text-muted" style="color:#F30;"></small>
       </div>    
    </div>
  </div>
