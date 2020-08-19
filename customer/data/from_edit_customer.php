<?php  session_start();
	include "../../Connections/connect_mysql.php";
 $custocodeedit = $_GET["cusid"];

 if($custocodeedit!=''){
		$data = 1;
		$sql = "SELECT * FROM tblcustomer where cus_id = '{$custocodeedit}' ";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result)!=0){
		    $row=mysql_fetch_array($result);
			$cus_id_e = $row['cus_id'];
      $cus_code = $row['cus_code'];
      $cus_dateopen = $row['cus_dateopen'];
      $cus_tit = $row['cus_titid'];
      $cus_name = $row['cus_name'];
      $cus_lname = $row['cus_lname'];
      $cus_idcard = $row['cus_idcard'];
      $cus_posi = $row['cus_position'];
      $cus_depart = $row['cus_department'];
      $cus_phone = $row['cus_phoneno'];
      $cus_backlist = $row['cus_backlist'];
      $cus_gread = $row['cus_greadid'];

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
  //cus_code
	$('#cus_numcodeE').blur(function() {
			$('#fg1').addClass('has-success');
			$('#smt1').html('');
	});

  //cus_name
	$('#cus_firstnameE').blur(function() {
			$('#fg2').addClass('has-success');
			$('#smt2').html('');
	});

  //cus_lname
	$('#cus_lastnameE').blur(function() {
			$('#fg3').addClass('has-success');
			$('#smt3').html('');
	});

  //cus_lname
	$('#cus_idcardE').blur(function() {
			$('#fg4').addClass('has-success');
			$('#smt4').html('');
	});

  //cus_phone
	$('#cus_phoneE').blur(function() {
			$('#fg5').addClass('has-success');
			$('#smt5').html('');
	});

});
</script>
</head>
<body>

                        <div>
                            <legend>Customer Profile</legend>
                            <div class="content" style="color:#666;">

                                <form id="#apply-form">
                                    <div class="row">
                                      <div id="fg1" class="col-md-3">
                                        <label>รหัสลูกค้า :</label>
                                        <input type="text" class="form-control border-input" placeholder="Customer Code" id="cus_numcodeE" value="<?=$cus_code?>">
                                        <small id="smt1" class="form-text text-muted" style="color:#F30;"></small>
                                      </div>
                                    </div>
                                    <div class="row">
																			 	<div class="col-md-3">
                                        	<div class="form-group">
                								    <label>คำนำหน้า :</label>
                                    <select class="form-control" id="cus_titleE">
                                      <option value="0"> # คำนำหน้า # </option>
                                      <?php
                                      $sqltit = 'SELECT * FROM tbltitle';
                                      $resulttit = mysql_query($sqltit) or die(mysql_error());
                                      while ($rowtit = mysql_fetch_array($resulttit)) {?>
                                        <option value="<?php echo $rowtit['tit_id']; ?>"
                                          <?php if ($cus_tit == $rowtit['tit_id']) {
                                            echo 'selected="selected"';
                                          } ?>
                                          ><?php echo $rowtit['tit_name']; ?></option>
                                        <?php } ?>
                                      </select>
              								              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="fg2" class="form-group">
                                                <label>ชื่อ :</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" id="cus_firstnameE" value="<?=$cus_name?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="fg3" class="form-group">
                                                <label>นามสกุล :</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" id="cus_lastnameE" value="<?=$cus_lname?>">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                       <div id="fg4" class="col-md-5">
                                         <label>รหัสบัตรประชาชน / รหัสหนังสือเดินทาง :</label>
                                         <input type="text" class="form-control border-input" placeholder="Last Name" id="cus_idcardE" value="<?=$cus_idcard?>" disabled>
                                       </div>
                                     	<div class="col-md-4">
                                        	<div id="fg5" class="form-group">
                                            	<label>เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" id="cus_phoneE" value="<?=$cus_phone?>">
                                          </div>
                                        </div>
																				<div class="col-md-3">
                                        	<div class="form-group">
                								    				<label>เกรดลูกค้า :</label>
                                    				<select class="form-control" id="cus_greadE">
                                      			<option value="0"> # เกรดลูกค้า # </option>
                                      			<?php $sqltit = 'SELECT * FROM tblgread';
                                      				$resulttit = mysql_query($sqltit) or die(mysql_error());
                                      				while ($rowtit = mysql_fetch_array($resulttit)) {?>
                                        			<option value="<?php echo $rowtit['gread_id']; ?>"
                                          		<?php if ($cus_gread == $rowtit['gread_id']) {
                                            	echo 'selected="selected"'; } ?>
                                          		><?php echo $rowtit['gread_name']; ?></option>
                                        		<?php } ?>
                                      			</select>
              								             </div>
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
//echo $custocodeedit;

mysql_close($c); ?>
