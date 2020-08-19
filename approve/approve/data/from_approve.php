<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";


  $use_id_r = $_SESSION['use_id'];
  $approve = $_SESSION['use_appid'];
  $crd2id = $_GET['reqid'];


  $sql = " SELECT * FROM tblcreditopen2 where crd2_id = '$crd2id'  ";
  $result = mysql_query($sql) or die(mysql_error());
  if($result){
    if(mysql_num_rows($result)>0){
      $record=mysql_fetch_array($result);
      $rca_id_apv = $record['crd2_id'];
      $cus_id = $record['crd2_cusid'];
      $rca_business_name_apv3 = $record['rca_business_name'];
      $rca_status_apv3_apv = $record['crd2_app3'];
      $rca_status_apv4_apv = $record['crd2_app4'];

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
    $sqlcarl = " SELECT * FROM tblapprove WHERE app_crd2id = '$crd2id' AND app_useid = '$use_id_r' AND app_useappid = '$approve'";
    $resultcarl = mysql_query($sqlcarl) or die(mysql_error);
    if($resultcarl){
      if(mysql_num_rows($resultcarl)>0){
        $hdcarl = '0';
        $reccarl = mysql_fetch_array($resultcarl);
        $app_id = $reccarl['app_id'];
        $app_date = $reccarl['app_date'];
        $app_result = trim($reccarl['app_result']);
        $app_comment = trim($reccarl['app_comment']);
        $carl_amnt_apv3 = intval($reccarl['app_monlimit']);
  			$formattedNum = number_format($carl_amnt_apv3, 2);
  			$carl_amnt_day_apv3 = intval($reccarl['app_monday']);
  			$carl_other_apv3 = $reccarl['app_proother'];
      }else{
        $hdcarl = '1';
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
	//$("#apnreq1").load("approversys/appreqdata.php?reqid=<?$crd2id?>");
function cresult1(){
	$('#apv3_result').val('อนุมัติ');
	$('#apv3_result').css('color', '#090'); //color:#090
	$('#btnsaveapv1').removeAttr("disabled");
}
function cresult2(){
	$('#apv3_result').val('ไม่อนุมัติ');	//color:#C00;
	$('#apv3_result').css('color', '#C00');
	$('#btnsaveapv1').removeAttr("disabled");
}
function cresult3(){
	$('#apv3_result').val('ยังไม่ประเมิน');
	$('#apv3_result').css('color', '#FC0');
	$('#btnsaveapv1').attr("disabled", true);
}


function closedlgapp(){
	appdlg.close();
}

	$(document).ready(function () {

		$("#apv3_comment").on("keyup", null, function() {
			if(window.event.keyCode == 9 ){
				$("#apv3_fnl_amnt").focus();
			}
		});
		$("#apv3_fnl_amnt").on("keyup", null, function () {
			if(window.event.keyCode == 13 ){
				$("#apv3_fnl_day").focus();
				$("#apv3_fnl_day").select();
			}
        });
		$("#apv3_fnl_amnt").on("focus",null,function(){
			this.select();
		});
		$("#apv3_fnl_day").on("focus",null,function(){
			this.select();
		});
		$("#apv3_fnl_day").on("keyup", null, function() {
			if(window.event.keyCode == 13 ){
				$("#apv3_other").focus();
				$("#apv3_other").select();
			}
		});
		$("#apv3_fnl_amnt").on("blur", null, function() {
			var input = $("#apv3_fnl_amnt").val();
			$("#apv3_fnl_amnt2").val(input);
            var num = parseFloat(input).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,') + " ฿";
            $("#apv3_fnl_amnt").val(num);
		});
	});

</script>

</head>

<body>

	<div class="row">
    	<div class="col-md-12">
        	<p><b style="font-size:14px; color:#03F;"><? echo " {$rca_business_name_apv3}"; ?></b></p>
        </div><!--col-->
    </div><!--row-->
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
                        				<div class="row">
                        					<div class="col-md-4" style="text-align:center;">
                            				<button type="button" style="width:170px;" class="btn btn-success" id="btnapprove" onClick="cresult1();"><img src="images/chek1.png" width="32" height="32"> อนุมัติ</button>
                            				</div>
                            				<div class="col-md-4" style="text-align:center;">
                   							<button type="button" style="width:170px;" class="btn btn-danger" id="btnapprove" onClick="cresult2();"><img src="images/false.png" width="32" height="32"> ไม่อนุมัติ</button>
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
                                            <?php if ($approve == 6) { ?>
                                              <input type="text" class="form-control" id="apv3_result" <? if($rca_status_apv3_apv=='0'){ ?>value="ยังไม่ประเมิน" <? }elseif($rca_status_apv3_apv=='1'){ ?> value="อนุมัติ" <? }elseif($rca_status_apv3_apv=='2'){ ?> value="ไม่อนุมัติ" <? } ?>
                                              disabled style="text-align:center; font-size:40px; height:90px; <? if($rca_status_apv3_apv=='0'){ ?> color:#FC0; <? }elseif($rca_status_apv3_apv=='1'){ ?>color:#090; <? }elseif($rca_status_apv3_apv=='2'){ ?> color:#C00; <? } ?>  ">
                                            <?php } elseif ($approve == 7) { ?>
                                              <input type="text" class="form-control" id="apv3_result" <? if($rca_status_apv4_apv=='0'){ ?>value="ยังไม่ประเมิน" <? }elseif($rca_status_apv4_apv=='1'){ ?> value="อนุมัติ" <? }elseif($rca_status_apv4_apv=='2'){ ?> value="ไม่อนุมัติ" <? } ?>
                                              disabled style="text-align:center; font-size:40px; height:90px; <? if($rca_status_apv4_apv=='0'){ ?> color:#FC0; <? }elseif($rca_status_apv4_apv=='1'){ ?>color:#090; <? }elseif($rca_status_apv4_apv=='2'){ ?> color:#C00; <? } ?>  ">
                                            <?php }else { echo "คุณไม่สิทธิใน์การพิจารณา"; } ?>
                                          </div>
                                			</div>
                            			</div>
                        				</div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-group">
                									<label>เนื่องจาก</label>
                    								<textarea class="form-control border-input notes" placeholder="" id="apv3_comment" rows="3"><?=$app_comment?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-inline">
                                            	<div class="form-group">
                                                	<table class="table table-responsive">
                                                    	<tr>
                                                			<td><label>วงเงินอนุมัติ : </label></td>
                                                    		<td><input type="text" class="form-control" id="apv3_fnl_amnt" style="text-align:right;padding-right: 15px;" value="<? if($hdcarl == '0'){ ?><?=$formattedNum?><? }else{ ?> 0 <? } ?>" ><input type="hidden" id="apv3_fnl_amnt2" value="<? if($hdcarl == '0'){ ?><?=$carl_amnt_apv3?><? }else{ ?> 0 <? } ?>"></td>
                                                    		<td><label> บาท </label></td>
                                                    	</tr>
                                                        <tr>
                                                        	<td><label>เงื่อนไขการชำระเงินเครดิต : </label></td>
                                                            <td><input type="text" class="form-control" id="apv3_fnl_day" value="<? if($hdcarl == '0'){ ?><?=$carl_amnt_day_apv3?><? }else{ ?> 0 <? } ?>" style="text-align:right;"></td>
                                                            <td><label> วัน </label></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<div class="form-group">
                                                	<label>เงื่อนไขเพิ่มเติม :</label>
                                                    <textarea class="form-control border-input notes"  placeholder="" id="apv3_other" rows="1"><?=$carl_other_apv3?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12" style="text-align:right;">
                                            	<div class="form-group">
                                            	<button type="button" class="btn btn-info" disabled id="btnsaveapv1" <? if($hdcarl == '1'){ ?>onClick="savecarlappro('<?=$rca_id_apv?>','<?=$use_id_r?>','<?=$approve?>');" <? }elseif($hdcarl == '0'){ ?>
                                              onClick="updatecarlappro('<?=$rca_id_apv?>','<?=$use_id_r?>','<?=$approve?>','<?=$app_id?>');"<? } ?>><i class="ti-save"></i> บันทึก</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="panel panel-secondary">
                                	<div class="panel-body">
                                    	<!--<div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btnrating" onClick="openrating('<?=$crd2id?>')"><i class="ti-book"></i> แบบประเมินความเสี่ยงของลูกค้า</button></p>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btncustdata" onClick="OpenCus('<?=$crd2id?>')"><i class="ti-user"></i> ข้อมูลลูกค้าและผู้เสนอขออนุมัติ</button></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                            	<p><button type="button" class="btn btn-secondary" id="btncustdata" onClick="AttFile('<?=$crd2id?>')"><i class="ti-files"></i> เอกสารประกอบการพิจารณา</button></p>
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
<?
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
?>
<?
	mysql_close($c); //close connection
?>
