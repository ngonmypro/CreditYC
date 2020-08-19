<?php  
	
	session_start();
	
	include "../../../Connections/connect_mysql.php";
	
 $usercodeedit = $_GET["useridedit"];

 if($usercodeedit!=''){
		$data = 1;
		$sql = "SELECT * FROM tbluser where use_id='{$usercodeedit}' ";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result)!=0){
		    $row=mysql_fetch_array($result);
			$use_id_e = $row['use_id'];
			$use_code_e = $row['use_code'];
			$use_name_e = $row['use_name'];
      		$use_lname_e = $row['use_lname'];
			$use_user_e = $row['use_user'];
			$use_pass_e = base64_decode($row['use_pass']);
      		$use_signat = $row['use_signature'];
			$use_tit = $row['use_titid'];
			$use_bran = $row['use_branid'];
      		$use_typeuse = $row['use_tuseid'];
      		$use_approve = $row['use_appid']; //ระดับสิทธิ์ การ approve 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

</style>

<script type="text/javascript">

$(document).ready(function(){

	//check use_firstname
	$('#use_firstnameE').blur(function() {
		if($('#use_firstnameE').val().length==0){
			$('#fg1').addClass('has-error');
			$('#smt1').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
			$('#use_firstnameE').focus();
		}else{
			$('#fg1').removeClass('has-error');
			$('#fg1').addClass('has-success');
			$('#smt1').html('');
		}
	});

	//use_lastname
	$('#use_lastnameE').blur(function() {
		if($('#use_lastnameE').val().length==0){
			$('#fg2').addClass('has-error');
			$('#smt2').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
			$('#use_lastnameE').focus();
		}else{
			$('#fg2').removeClass('has-error');
			$('#fg2').addClass('has-success');
			$('#smt2').html('');
		}
	});


	//use_password
	$('#use_passwordE').blur(function() {
		if($('#use_passwordE').val().length==0){
			$('#fg5').addClass('has-error');
			$('#smt5').html('Password ต้องไม่เป็นค่าว่าง!');
			$('#use_passwordE').focus();
		}else{
			$('#fg5').removeClass('has-error');
			$('#fg5').addClass('has-success');
			$('#smt5').html('');
		}
	});
	
		//use_title
	$('#use_titleE').blur(function() {
		if($('#use_titleE').val()==0){
			$('#fg_use_titleE').addClass('has-error');
			$('#smt_use_titleE').html('คำนำหน้า ต้องไม่เป็นค่าว่าง!');
			$('#use_titleE').focus();		
		}else{
			$('#fg_use_titleE').removeClass('has-error');
			$('#fg_use_titleE').addClass('has-success');
			$('#smt_use_titleE').html('');	
		}
	});
	
	//use_bran
	$('#use_branE').blur(function() {
		if($('#use_branE').val()==0){
			$('#fg_use_branE').addClass('has-error');
			$('#smt_use_branE').html('สาขา ต้องไม่เป็นค่าว่าง!');
			$('#use_branE').focus();		
		}else{
			$('#fg_use_branE').removeClass('has-error');
			$('#fg_use_branE').addClass('has-success');
			$('#smt_use_branE').html('');	
		}
	});
	
	//use_typeuse
	$('#use_typeuseE').blur(function() {
		if($('#use_typeuseE').val()==0){
			$('#fg_use_typeuseE').addClass('has-error');
			$('#smt_use_typeuseE').html('ประเภทผู้ใช้งาน ต้องไม่เป็นค่าว่าง!');
			$('#use_typeuseE').focus();		
		}else{
			$('#fg_use_typeuseE').removeClass('has-error');
			$('#fg_use_typeuseE').addClass('has-success');
			$('#smt_use_typeuseE').html('');	
		}
	});
	
	//use_approver
	$('#use_approverE').blur(function() {
		if($('#use_approverE').val()==0){
			$('#fg_use_approverE').addClass('has-error');
			$('#smt_use_approverE').html('ประเภทการอนุมัติ ต้องไม่เป็นค่าว่าง!');
			$('#use_approverE').focus();		
		}else{
			$('#fg_use_approverE').removeClass('has-error');
			$('#fg_use_approverE').addClass('has-success');
			$('#smt_use_approverE').html('');	
		}
	});

	
});

$("#use_typeuseE").change(function() {
    $.post("admin/process/chk_typeapprove.php",
      {
          pro : $('#use_typeuseE').val()
      },
      function(data){
      $("#use_approverE").html(data);
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
                                        	<div class="form-group" id="fg_use_titleE">
                								<label>คำนำหน้า :</label>
                                    			<select class="form-control" id="use_titleE">
                                      				<option value="0"> # คำนำหน้า # </option>
                                      				<?php
                                      					$sqltit = 'SELECT * FROM tbltitle';
                                      					$resulttit = mysql_query($sqltit) or die(mysql_error());
                                      					while ($rowtit = mysql_fetch_array($resulttit)) {?>
                                        			<option value="<?php echo $rowtit['tit_id']; ?>"
                                          			<?php if ($use_tit == $rowtit['tit_id']) {
                                            			echo 'selected="selected"';
                                          			} ?>
                                          			><?php echo $rowtit['tit_name']; ?></option>
                                        			<?php } ?>
                                      			</select>
                                                <small id="smt_use_titleE" class="form-text text-muted" style="color:#F30;"></small>
              								</div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div id="fg1" class="form-group">
                                                <label>ชื่อ :</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" id="use_firstnameE" value="<?=$use_name_e?>">
                                                <small id="smt1" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="fg2" class="form-group">
                                                <label>นามสกุล :</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" id="use_lastnameE" value="<?=$use_lname_e?>">
                                                <small id="smt2" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" id="fg_use_branE">
                                                <label>สาขา :</label>
                                                <select class="form-control" id="use_branE">
                                                  <option value="0"> # สาขา # </option>
                                                  <?php
                                                  $sqlbran = 'SELECT * FROM tblbrand';
                                                  $resultbran = mysql_query($sqlbran) or die(mysql_error());
                                                  while ($rowbran = mysql_fetch_array($resultbran)) {?>
                                                    <option value="<?php echo $rowbran['bran_id']; ?>"
                                                      <?php if ($use_bran == $rowbran['bran_id']) {
                                                        echo 'selected="selected"';
                                                      } ?>
                                                      ><?php echo $rowbran['bran_name']; ?></option>
                                                    <?php } ?>
                                                  </select>
                                                  <small id="smt_use_branE" class="form-text text-muted" style="color:#F30;"></small>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
										<div class="col-md-3">
 											<div id="fg3" class="form-group">
 												<label>รหัสพนักงาน :</label>
 												<input type="text" class="form-control border-input" placeholder="Employee code" id="use_numcodeE" value="<?=$use_code_e?>" disabled>
 												<small id="smt3" class="form-text text-muted" style="color:#F30;"></small>
 											</div>
 										</div>
                                     	<div class="col-md-4">
                                        	<div id="fg4" class="form-group">
                                            	<label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" id="use_usernameE" value="<?=$use_user_e?>" disabled>
                                                <!--<small id="smt4" class="form-text text-muted" style="color:#F30;"> ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 4-10 ตัวอักษร</small>-->

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div id="fg5" class="form-group">
                                            	<label>Password</label>
                                                <input type="password" class="form-control border-input" placeholder="Password" id="use_passwordE" value="<?=$use_pass_e?>">
                                                <!--<small id="smt5" class="form-text text-muted" style="color:#F30;"> ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 2-10 ตัวอักษร</small>-->

                                            </div>
                                        </div>
                                     </div>

                                     <div class="row">

                                     	<div class="col-md-4 col-md-offset-1" style="border-radius: 25px;border: 1px solid #090;padding: 10px;">
                                        	<div class="form-group" id="fg_use_typeuseE">
                                            	<legend>ประเภทผู้ใช้งาน</legend>
                                              <select class="form-control" id="use_typeuseE">
                                                <option value="0"> # ประเภทผู้ใช้งาน # </option>
                                                <?php
                                                $sqltuse = 'SELECT * FROM tbltypeuser'; //  WHERE tuse_id != 1';
                                                $resulttuse = mysql_query($sqltuse) or die(mysql_error());
                                                while ($rowtuse = mysql_fetch_array($resulttuse)) {?>
                                                  <option value="<?php echo $rowtuse['tuse_id']; ?>"
                                                    <?php if ($use_typeuse == $rowtuse['tuse_id']) {
                                                      echo 'selected="selected"';
                                                    } ?>
                                                    ><?php echo $rowtuse['tuse_nameth']," : ",$rowtuse['tuse_nameen']; ?></option>
                                                  <?php } ?>
                                                </select>
                                                <small id="smt_use_typeuseE" class="form-text text-muted" style="color:#F30;"></small>
											</div>
                                        </div>
  										<div class="col-md-5 col-md-offset-1" style="border-radius: 25px;border: 1px solid #090;;padding: 10px;">
                                       	  <div class="form-group" id="fg_use_approverE">
                                            	<legend>ประเภทผู้อนุมัติ</legend>
													<select class="form-control" id="use_approverE">
														<option value="0"> # ประเภทผู้อนุมัติ # </option>
													<?php
	                                                $sqltapp = 'SELECT * FROM tbltypeapprove'; //where tapp_status = {$use_approve}' ; // WHERE tapp_id != 1';
	                                                $resulttapp = mysql_query($sqltapp) or die(mysql_error());
	                                                while ($rowtapp = mysql_fetch_array($resulttapp)) {?>
	                                                  <option value="<?php echo $rowtapp['tapp_status']; ?>"
	                                                    <?php if ($use_approve == $rowtapp['tapp_status']) {
	                                                      echo 'selected="selected"';
	                                                    } ?>
	                                                    ><?php echo $rowtapp['tapp_name']; ?></option>
	                                                  <?php } ?>
												   </select>
                                                   <small id="smt_use_approverE" class="form-text text-muted" style="color:#F30;"></small>
											</div>
                                        </div>
	 											   </div><br>
												<div class="row">
												<div class="col-md-6 col-md-offset-3" style="border-radius: 25px;border: 1px solid #090;padding: 10px;">
	                                        	<div class="form-group">
	                                            	<legend>ลายเซ็น</legend>
													<?php if($use_signat==""){ ?><button class="col-md-offset-3 form-control btn-warning" style="Width:200px;" type="button" onClick="javascript:uploadsig('<?=$use_id_e?>');"><i class="ti-upload"></i> Upload file </button>
													<?php }else{ ?><button class="col-md-offset-3 form-control btn-info" style="Width:200px;" type="button" onClick="javascript:showimgsig('<?=$use_id_e?>');"><i class="ti-image"></i> Show image<?php } ?>
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
<?php }
}else{
$data= 0;
}

//echo $data;
//echo $usercodeedit;

mysql_close($c); ?>
