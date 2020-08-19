<?php session_start();
	date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
	include "../../../Connections/connect_mysql.php";

	$reqid_comm = $_GET['reqid'];
	$apv_comm = $_GET['apv'];


	$sql = " SELECT * FROM tblapprove WHERE app_crd2id = {$reqid_comm} AND app_useappid='{$apv_comm}' ";
	$result = mysql_query($sql) or die(mysql_error);
	if($result){
		if(mysql_num_rows($result)>0){
			$hdcomm = '0';
			$rec_comm = mysql_fetch_array($result);
			$carl_id_comm = $rec_comm['app_id'];  //id การอนุมัติ
			$carl_date_comm = $rec_comm['app_date'];  //วันที่อนุมัติ
			$carl_result_comm = trim($rec_comm['app_result']); //ผลการอนุมัติ
			$carl_comment_comm = trim($rec_comm['app_comment']); //คอมเม้น

			$carl_amnt_comm = intval($rec_comm['app_monlimit']);  //วงเงิน
			$formattedNum = number_format($carl_amnt_comm, 2);
			$carl_amnt_day_comm = intval($rec_comm['app_monday']);  //กำหนดวันชำระเงิน
			$carl_other_comm = $rec_comm['app_proother']; //เงื่อนไขอื่นๆ

			$modification_time_comm_date = displaydate($rec_comm['app_date']);  //วันที่แก้ไข
			$date = date_create($rec_comm['app_date']); //วันที่แก้ไข
			$modification_time_comm_time = date_format($date,'G:ia');
		}else{
			$hdcomm = '1';
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
</head>

<body>
<?php if($hdcomm == '0'){ ?>
<div class="row">
	<div class="col-md-6">
    	<div class="form-group">
        วันที่ : <b style="color:#03F"><?=$modification_time_comm_date?></b> เวลา :<b style="color:#03F"><?=$modification_time_comm_time?></b>
        </div>
    </div>
    <div class="col-md-6">
    	ผลการประเมิน : <b style="color:#03F"><?=$carl_result_comm?></b>
    </div>
</div>
<!--
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	<label>ความคิดเห็น</label>
            <textarea class="form-control border-input notes" placeholder="Comment" id="apv1_comment" rows="3"><?$carl_comment_comm?></textarea>
        </div>
    </div>
</div>
-->
	 <div class="row">
     	<div class="col-md-12">
        	<div class="form-inline">
            	<div class="form-group">
                	<table class="table table-responsive">
                    	<tr>
                       		<td><label>วงเงินอนุมัติ : </label></td>
                            <td><input type="text" class="form-control" id="apv_fnl_amnt" style="text-align:right;padding-right: 15px;" value="<?=$formattedNum?>" ></td>
                            <td><label> บาท </label></td>
                        </tr>
                        <tr>
                            <td><label>เงื่อนไขการชำระเงินเครดิต : </label></td>
                            <td><input type="text" class="form-control" id="apv_fnl_day" value="<?=$carl_amnt_day_comm?>" style="text-align:right;"></td>
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
                	<textarea class="form-control border-input notes"  placeholder="" id="apv_other" rows="3"><?=$carl_other_comm?></textarea>
           	</div>
       </div>
   </div>


<?php }elseif($hdcomm == '1'){ ?>
<div class="row">
	<div class="col-md-12">
    	<div class="form-group">
        	<label>ยังไม่มีข้อมูล</label>
        </div>
    </div>
</div>
<?php } ?>
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

?>
<?php
	mysql_close($c); //close connection
?>
