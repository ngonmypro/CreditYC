<?php  session_start();
	include "../../../Connections/connect_mysql.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
/*-------*/

</style>

<script type="text/javascript">

$(document).ready(function(){

	//check use_firstname
	$('#use_firstname').blur(function() {
		if($('#use_firstname').val().length==0){
			$('#fg1').addClass('has-error');
			$('#smt1').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
			$('#use_firstname').focus();
		}else{
			$('#fg1').removeClass('has-error');
			$('#fg1').addClass('has-success');
			$('#smt1').html('');
		}
	});

	//use_lastname
	$('#use_lastname').blur(function() {
		if($('#use_lastname').val().length==0){
			$('#fg2').addClass('has-error');
			$('#smt2').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
			$('#use_lastname').focus();
		}else{
			$('#fg2').removeClass('has-error');
			$('#fg2').addClass('has-success');
			$('#smt2').html('');
		}
	});

	//use_numcode
	$('#use_numcode').blur(function() {
		if($('#use_numcode').val().length==0){
			$('#fg3').addClass('has-error');
			$('#smt3').html('รหัสพนักงาน ต้องไม่เป็นค่าว่าง!');
			$('#use_numcode').focus();
		}else{
			$('#fg3').removeClass('has-error');
			$('#fg3').addClass('has-success');
			$('#smt3').html('');
		}
	});

	//use_username
	$('#use_username').blur(function() {
		if($('#use_username').val().length==0){
			$('#fg4').addClass('has-error');
			$('#smt4').html('Username ต้องไม่เป็นค่าว่าง!');
			$('#use_username').focus();
		}else
		if ($('#use_username').val().match(/^([a-zA-Z0-9._-]){4,10}$/)){
			$('#fg4').removeClass('has-error');
			$('#fg4').addClass('has-success');
			$('#smt4').html('');
		}else{
			$('#fg4').addClass('has-error');
			$('#smt4').html('ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 4-10 ตัวอักษร!');
			$('#use_username').focus();
		}
	});

	//use_password
	$('#use_password').blur(function() {
		if($('#use_password').val().length==0){
			$('#fg5').addClass('has-error');
			$('#smt5').html('Password ต้องไม่เป็นค่าว่าง!');
			$('#use_password').focus();
		}else
		if ($('#use_password').val().match(/^([a-zA-Z0-9._-]){4,50}$/)){
			$('#fg5').removeClass('has-error');
			$('#fg5').addClass('has-success');
			$('#smt5').html('');
		}else{
			$('#fg5').addClass('has-error');
			$('#smt5').html('ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 2-10 ตัวอักษร!');
			$('#use_password').focus();
		}
	});
	
	//use_title
	$('#use_title').blur(function() {
		//alert($('#use_title').val());
		if($('#use_title').val()==0){
			$('#fg_use_title').addClass('has-error');
			$('#smt_use_title').html('คำนำหน้า ต้องไม่เป็นค่าว่าง!');
			$('#use_title').focus();		
		}else{
			$('#fg_use_title').removeClass('has-error');
			$('#fg_use_title').addClass('has-success');
			$('#smt_use_title').html('');	
		}
	});
	
	//use_bran
	$('#use_bran').blur(function() {
		//alert($('#use_title').val());
		if($('#use_bran').val()==0){
			$('#fg_use_bran').addClass('has-error');
			$('#smt_use_bran').html('สาขา ต้องไม่เป็นค่าว่าง!');
			$('#use_bran').focus();		
		}else{
			$('#fg_use_bran').removeClass('has-error');
			$('#fg_use_bran').addClass('has-success');
			$('#smt_use_bran').html('');	
		}
	});
	
	//use_typeuse
	$('#use_typeuse').blur(function() {
		//alert($('#use_title').val());
		if($('#use_typeuse').val()==0){
			$('#fg_use_typeuse').addClass('has-error');
			$('#smt_use_typeuse').html('ประเภทผู้ใช้งาน ต้องไม่เป็นค่าว่าง!');
			$('#use_typeuse').focus();		
		}else{
			$('#fg_use_typeuse').removeClass('has-error');
			$('#fg_use_typeuse').addClass('has-success');
			$('#smt_use_typeuse').html('');	
		}
	});
	
	//use_approver
	$('#use_approver').blur(function() {
		//alert($('#use_title').val());
		if($('#use_approver').val()==0){
			$('#fg_use_approver').addClass('has-error');
			$('#smt_use_approver').html('ประเภทการอนุมัติ ต้องไม่เป็นค่าว่าง!');
			$('#use_approver').focus();		
		}else{
			$('#fg_use_approver').removeClass('has-error');
			$('#fg_use_approver').addClass('has-success');
			$('#smt_use_approver').html('');	
		}
	});
	
});

	$("#use_typeuse").change(function() {
    	$.post("admin/user/process/chk_typeapprove.php",
      	{
          	pro : $('#use_typeuse').val()
      	},
      	function(data){
      		$("#use_approver").html(data);
      	});
  	});

</script>
</head>
<body>

                        <div>
                            <legend>User Profile</legend>
                            <div class="content" style="color:#666;">

                                <form id="#apply-form">
                                    <div class="row">
										<div class="col-md-3">
                                        	<div class="form-group" id="fg_use_title">
                								<label>คำนำหน้า :</label>
												<select class="form-control" id="use_title">
      												<option value="0"> # คำนำหน้า # </option>
             										<?php 
														$sqltit = 'SELECT * FROM tbltitle';
             											$resulttit = mysql_query($sqltit) or die(mysql_error());
             											while ($rowtit = mysql_fetch_array($resulttit)) { ?>
        													<option value="<?php echo $rowtit['tit_id']; ?>" ><?php echo $rowtit['tit_name']; ?></option>
        											<?php } ?>
  												</select>
                                                <small id="smt_use_title" class="form-text text-muted" style="color:#F30;"></small>
              								</div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="fg1" class="form-group">
                                                <label>ชื่อ :</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" id="use_firstname">
                                                <small id="smt1" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="fg2" class="form-group">
                                                <label>นามสกุล :</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" id="use_lastname">
                                                <small id="smt2" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" id="fg_use_bran">
                                                <label>สาขา :</label>
												<select class="form-control" id="use_bran">
								      				<option value="0"> # สาขา # </option>
								             		<?php 
															$sqltit = 'SELECT * FROM tblbrand';
								             				$resulttit = mysql_query($sqltit) or die(mysql_error());
								             				while ($rowtit = mysql_fetch_array($resulttit)) { ?>
								        						<option value="<?php echo $rowtit['bran_id']; ?>" ><?php echo $rowtit['bran_name']; ?></option>
								        			<?php } ?>
                                                    
								  				</select>
                                                <small id="smt_use_bran" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
										<div class="col-md-3">
 											<div id="fg3" class="form-group">
 												<label>รหัสพนักงาน :</label>
 												<input type="text" class="form-control border-input" placeholder="Employee code" id="use_numcode">
 												<small id="smt3" class="form-text text-muted" style="color:#F30;"></small>
 											</div>
 									 </div>
                                     	<div class="col-md-4">
                                        	<div id="fg4" class="form-group">
                                            	<label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" id="use_username">
                                                <small id="smt4" class="form-text text-muted" style="color:#F30;"> ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 4-10 ตัวอักษร</small>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div id="fg5" class="form-group">
                                            	<label>Password</label>
                                                <input type="password" class="form-control border-input" placeholder="Password" id="use_password">
                                                <small id="smt5" class="form-text text-muted" style="color:#F30;"> ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 2-10 ตัวอักษร</small>

                                            </div>
                                        </div>
                                     </div>

                                     <div class="row">

                                     	<div class="col-md-4 col-md-offset-1" style="border-radius: 25px;border: 1px solid #090;padding: 10px;">
                                        	<div class="form-group" id="fg_use_typeuse">
                                            	<legend>ประเภทผู้ใช้งาน</legend>
												<select class="form-control" id="use_typeuse">
													<option value="0"> # ประเภทผู้ใช้งาน # </option>
														<?php $sqluse = 'SELECT * FROM tbltypeuser WHERE tuse_id != 1';
															$resultuse = mysql_query($sqluse) or die(mysql_error());
															while ($rowuse = mysql_fetch_array($resultuse)) { ?>
																<option value="<?php echo $rowuse['tuse_id']; ?>" >
																<?php echo $rowuse['tuse_nameth']," : ",$rowuse['tuse_nameen']; ?></option>
														<?php } ?>
													</select>
                                                    <small id="smt_use_typeuse" class="form-text text-muted" style="color:#F30;"></small>
												</div>
                                        </div>
  										<div class="col-md-5 col-md-offset-1" style="border-radius: 25px;border: 1px solid #090;;padding: 10px;">
                                       	  <div class="form-group" id="fg_use_approver">
                                            	<legend>ประเภทผู้อนุมัติ</legend>
												<select class="form-control" id="use_approver">
													<option value="0"> # ประเภทผู้อนุมัติ # </option>
                                                    <?php
	                                                $sqltapp = 'SELECT * FROM tbltypeapprove'; // WHERE tapp_id != 1';
	                                                $resulttapp = mysql_query($sqltapp) or die(mysql_error());
	                                                while ($rowtapp = mysql_fetch_array($resulttapp)) {?>
	                                                  <option value="<?php echo $rowtapp['tapp_status']; ?>"
	                                                    <?php if ($use_approve == $rowtapp['tapp_status']) {
	                                                      echo 'selected="selected"';
	                                                    } ?>
	                                                    ><?php echo $rowtapp['tapp_name']; ?></option>
	                                                  <?php } ?>
																							
                                                </select>
                                                <small id="smt_use_approver" class="form-text text-muted" style="color:#F30;"></small>
											</div>
                                        </div>
                                     </div>
                                     <div class="row">
                                     	<div class="col-md-12" style="text-align:center;">
                                        	<div id="resulta1" style="padding-top:10px; padding-bottom:10px; color:#F30;"></div>
                                        </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
</body>
</html>
