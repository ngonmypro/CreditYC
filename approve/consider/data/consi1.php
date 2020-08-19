<?php session_start();
	
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$use_id_r = $_SESSION['use_id'];
	$approve = $_SESSION['use_appid'];
	$crd2id = $_GET['reqid'];
  //$business = $_GET['business'];

	$sql = " SELECT * FROM tblcreditopen2 WHERE crd2_id = '$crd2id'  ";
	$result = mysql_query($sql) or die(mysql_error());
	if($result){
		if(mysql_num_rows($result)>0){
			$record=mysql_fetch_array($result);
			$rca_id_apv1 = $record['crd2_id'];
			$cus_id = $record['crd2_cusid'];
			$rca_status_apv1_apv1 = $record['crd2_app1']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
			$rca_status_apv2_apv1 = $record['crd2_app2']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
			/*$rca_status_apv3_apv1 = $record['crd2_app3']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ
			$rca_status_apv4_apv1 = $record['crd2_app4']; //0:กำลังพิจราณา 1:1:อนุมัติ , 2:ไม่อนุมัติ*/
      $assesment = $record['crd2_assesmentapp'];

        $sql2 = "SELECT * FROM tblcustomer WHERE cus_id = '$cus_id'";
              $result2 = mysql_query($sql2) or die(mysql_error());
              while($record2 = mysql_fetch_array($result2)){
                $cus_openoth = $record2['cus_openoth']; //ประเภทกิจการอื่นๆ
                $cus_company = $record2['cus_company']; //ชื่อกิจการ
                $record2['cus_openid'];
          $sql3 = "SELECT * FROM tbltypeopen WHERE open_id = '".$record2['cus_openid']."'";
          $result3 = mysql_query($sql3) or die(mysql_error());
          while($record3 = mysql_fetch_array($result3)){
            $type_busin = $record3['open_name'];
		}
	}}}
		//ค้นหาว่ามีการเคยใส่ การประเมินไว้หรือยัง
		$sqlcarl = " SELECT * FROM tblapprove WHERE app_crd2id = {$crd2id} AND app_useid = {$use_id_r} AND app_useappid = {$approve}";
		$resultcarl = mysql_query($sqlcarl) or die(mysql_error);
		if($resultcarl){
			if(mysql_num_rows($resultcarl)>0){
				$hdcarl = '0'; //ถ้ามีให้ค่า เป็น 0
				$reccarl = mysql_fetch_array($resultcarl);
				$app_id = $reccarl['app_id'];
				$app_date = $reccarl['app_date'];
				$app_result = trim($reccarl['app_result']);
				$app_comment = trim($reccarl['app_comment']);
			}else{
				$hdcarl = '1'; //ถ้ายังไม่มีให้ค่าเป็น1
			}
		}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
.notes {
    background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-size: 100% 100%, 100% 100%, 100% 31px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    line-height: 31px;
    font-family: Arial, Helvetica, Sans-serif;
    padding: 8px;
}

.notes:focus {
    outline: none;
}
</style>
<script>
	//$("#apnreq1").load("approversys/appreqdata.php?reqid=<?#$crd2id?>");
function cresult1(){
	$('#apv1_result').val('ผ่าน');
	$('#apv1_result').css('color', '#090'); //color:#090
	$('#btnsaveapv1').removeAttr("disabled");
}
function cresult2(){
	$('#apv1_result').val('ไม่ผ่าน');	//color:#C00;
	$('#apv1_result').css('color', '#C00');
	$('#btnsaveapv1').removeAttr("disabled");
}
function cresult3(){
	$('#apv1_result').val('ยังไม่ประเมิน');
	$('#apv1_result').css('color', '#FC0');
	$('#btnsaveapv1').attr("disabled", true);
}


function closedlgapp(){
	appdlg.close();
}


</script>

</head>

<body>

    <div class="row">
    	<div class="col-md-12">
        	<div id="pnreq1" class="panel panel-success">
            	<!--<div id="pnhreq1" class="panel-heading">
                	ข้อมูลลูกค้า
                </div>-->
                <div class="panel-body">
                	<div id="apnreq1">
                    	<div class="row">
                        	<div class="col-md-8">
                            	<div class="panel panel-secondary">
                                	<div class="panel-body">
                                    	<!--//-->
                                        <div class="row">
                        					<div class="col-md-12">
                        						<p><b>เห็นสมควรให้ :</b></p>
                            				</div>
                        				</div>
                                  <p>
									<?php if ($approve == 4) { ?>
                        				<div class="row">
                        					   <div class="col-md-4" style="text-align:center;">
                            		<button type="button" style="width:170px;" class="btn btn-success" id="btnapprove" onClick="cresult1();"><img src="images/chek1.png" width="32" height="32"> ผ่านการประเมิน</button>
                            				</div>
                            				<div class="col-md-4" style="text-align:center;">
                   							<button type="button" style="width:170px;" class="btn btn-danger" id="btnapprove" onClick="cresult2();"><img src="images/false.png" width="32" height="32"> ไม่ผ่านการประเมิน</button>
                            				</div>
                                    <!--<div class="col-md-4" style="text-align:center;">
                   							<button type="button" style="width:145px;" class="btn btn-warning" id="btnapprove" onClick="cresult3();"><img src="images/undo-icon.png" width="32" height="32"> ยกเลิก</button>
                            		     </div>-->
                            			</div>
                        				</p>
                                <div class="row" style="padding-left:0px;">
                        					<div class="col-md-12">
                            					<div class="panel panel-primary">
                                					<div>
                                              <input type="text" class="form-control" id="apv1_result" <? if($rca_status_apv1_apv1=='0'){ ?>value="ยังไม่ประเมิน" <? }elseif($rca_status_apv1_apv1=='1'){ ?> value="ผ่าน" <? }elseif($rca_status_apv1_apv1=='2'){ ?> value="ไม่ผ่าน" <? } ?>
											disabled style="text-align:center; font-size:40px; height:90px; <? if($rca_status_apv1_apv1=='0'){ ?> color:#FC0; <? }elseif($rca_status_apv1_apv1=='1'){ ?>color:#090; <? }elseif($rca_status_apv1_apv1=='2'){ ?> color:#C00; <? } ?> ">
                                          </div>
                                				</div>
                            				</div>
                        				</div>
								<?php } elseif ($approve == 5) {  ?>
									<div class="row">
	                            <?php if ($assesment != 0) { ?>
	                        					   <div class="col-md-4" style="text-align:center;">
	                            		<button type="button" style="width:170px;" class="btn btn-success" id="btnapprove" onClick="cresult1();"><img src="images/chek1.png" width="32" height="32"> ผ่านการประเมิน</button>
	                            				</div>
	                            				<div class="col-md-4" style="text-align:center;">
	                   							<button type="button" style="width:170px;" class="btn btn-danger" id="btnapprove" onClick="cresult2();"><img src="images/false.png" width="32" height="32"> ไม่ผ่านการประเมิน</button>
	                            				</div>
	                                    <!--<div class="col-md-4" style="text-align:center;">
	                   							<button type="button" style="width:145px;" class="btn btn-warning" id="btnapprove" onClick="cresult3();"><img src="images/undo-icon.png" width="32" height="32"> ยกเลิก</button>
	                            				</div>-->
	                                  <?php }else{ ?>
	                                    <div class="col-md-12" style="text-align:center;"><?php echo "กรุณาทำแบบประเมินความเสี่ยงของลูกค้าก่อน"; ?></div>
	                                  <?php } ?>
	                            			</div>
	                        				</p>
	                                <div class="row" style="padding-left:0px;">
	                        					<div class="col-md-12">
	                            					<div class="panel panel-primary">
	                                					<div>
	                                              <input type="text" class="form-control" id="apv1_result" <? if($rca_status_apv2_apv1=='0'){ ?>value="ยังไม่ประเมิน" <? }elseif($rca_status_apv2_apv1=='1'){ ?> value="ผ่าน" <? }elseif($rca_status_apv2_apv1=='2'){ ?> value="ไม่ผ่าน" <? } ?>
																								disabled style="text-align:center; font-size:40px; height:90px; <? if($rca_status_apv2_apv1=='0'){ ?> color:#FC0; <? }elseif($rca_status_apv2_apv1=='1'){ ?>color:#090; <? }elseif($rca_status_apv2_apv1=='2'){ ?> color:#C00; <? } ?> ">
	                                          </div>
	                                				</div>
	                            				</div>
	                        				</div>
								<?php } else { echo "คุณไม่สิทธิใน์การพิจารณา"; }?>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-group">
                									<label>ความคิดเห็น</label>
                    								<textarea class="form-control border-input notes" placeholder="Comment" id="apv1_comment" rows="5"><?=$app_comment?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12" style="text-align:right;">
                                            	<button type="button" class="btn btn-info" id="btnsaveapv1" disabled <? if($hdcarl == '1'){ ?>onClick="savecarl('<?=$rca_id_apv1?>','<?=$use_id_r?>','<?=$approve?>');" <? }elseif($hdcarl == '0'){ ?>
												onClick="updatecarl('<?=$rca_id_apv1?>','<?=$use_id_r?>','<?=$approve?>','<?=$app_id?>');"<? } ?>><i class="ti-save"></i> บันทึก</button>
                                            </div>
                                        </div>
                                        <!--//-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="panel panel-secondary">
                                	<div class="panel-body">
								<?php if ($approve == 5) {?>
                                    	<div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btnrating" onClick="openrating('<?=$crd2id?>')"><i class="ti-book"></i> แบบประเมินความเสี่ยงของลูกค้า</button></p>
                                            </div>
                                        </div>
								<?php } ?>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btncustdata" onClick="OpenCus('<?=$crd2id?>')"><i class="ti-user"></i> ข้อมูลลูกค้าและผู้เสนอขออนุมัติ</button></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btncustdata" onClick="AttFile('<?=$crd2id?>');"><i class="ti-files"></i> เอกสารประกอบการพิจารณา</button></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--apnreq1-->
               	</div><!--body-->
                <!--<div class="panel-footer" style="text-align:right;"></div>-->
            </div><!--panal-->
        </div><!--col-->
   </div><!--row-->


</body>
</html>
<?php
// --- แสดงวันที่แบบไทย --- //
function  displaydate($x){
	$date_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=substr($date_array[2], 0, 2);

	$m=$date_m[$m];

	$displaydate="$d $m $y";
	return $displaydate;
}

	mysql_close($c); //close connection
?>
