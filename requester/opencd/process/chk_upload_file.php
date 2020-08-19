<?php session_start();

date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
include "../../../Connections/connect_mysql.php";


$target_dir = "../../../uploads/";
$docid = $_GET["docid"];
$crd2id = $_GET["crd2id"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadDetail = 0;
$response = "";

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



/*$sqlse = "SELECT * FROM `tblfile` WHERE file_crd2id = '$crd2id' AND file_docid = '$docid' AND file_createby = '".$_SESSION['use_user']."' AND file_createtime = '".date('Y-m-d')."'";
$resultse = mysql_query($sqlse) or die(mysql_error());
while ($rowse = mysql_fetch_array($resultse)){
$fileid = $rowse['file_id'];*/

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
		$response = "ไฟล์ชนิดpdf - " . $check["mime"] . ".";
        $uploadOk = 1;
		$uploadDetail = 0;
    } else {
        //echo "File is not an image.";
		$response = "ไม่ไช่ไฟล์ชนิดรูปภาพ.";
        $uploadOk = 0;
		$uploadDetail = 1;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
	$response = "เสียใจด้วย, มีไฟล์ชื่อนี้อยู่ในระบบแล้ว.";
    $uploadOk = 0;
	$uploadDetail = 2;
}else {
  // Check file size
  if ($_FILES["fileToUpload"]["size"] == 0) {
      //echo "Sorry, your file is too large.";
  	$response = "เสียใจด้วย, ไฟล์ของคุณมีขนาดไม่เหมาะสม.";
      $uploadOk = 0;
  	$uploadDetail = 3;
  }else {
    // Allow certain file formats
    if($imageFileType != "pdf" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	$response = "เสียใจด้วย, ไฟล์ที่สามารถ อัปโหลดได้ ต้องเป็นไฟล์ pdf เท่านั้น.";
        $uploadOk = 0;
    	$uploadDetail = 4;
    }else {
        $sqlin = "INSERT INTO `intrayon_credityc`.`tblfile` ( ";
        $sqlin .= " `file_crd2id` , ";
        $sqlin .= " `file_docid` , ";
        $sqlin .= " `file_name` , ";
        $sqlin .= " `file_datestart` , ";
        $sqlin .= " `file_dateend` , ";
        $sqlin .= " `file_createby` , ";
        $sqlin .= " `file_createtime` , ";
        $sqlin .= " `file_updateby` , ";
        $sqlin .= " `file_updatetime` ";
        $sqlin .= " ) ";
        $sqlin .= " VALUES ( ";
        $sqlin .= " '$crd2id', '$docid', NULL, NULL, NULL, '".$_SESSION['use_user']."', NOW(), '".$_SESSION['use_user']."', NOW()";
        $sqlin .= " ); ";

        $resultin = mysql_query($sqlin) or die(mysql_error());
        $fileid = mysql_insert_id();

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo $uploadOk;
              //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      		$response = "ไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " อัปโหลด เสร็จเรียบร้อย.";
      		$data = 0; //result success
      		//rename file
      		rename ($target_dir . basename( $_FILES["fileToUpload"]["name"]), $target_dir . $fileid . "_" . $crd2id . "_" . $docid . '.' . $imageFileType);

      		$target_file_n = $fileid . "_" . $crd2id . "_" . $docid . '.' . $imageFileType;

      		//--- update data in table employee_tb

      		$sqlup = " UPDATE `intrayon_credityc`.`tblfile` SET  ";
      		$sqlup .= "`file_name` =  '{$target_file_n}', ";
      		$sqlup .= "`file_updateby` ='{$_SESSION['use_user']}', ";
      		$sqlup .= "`file_updatetime` = NOW() ";
      		$sqlup .= " WHERE `tblfile`.`file_id` ={$fileid} LIMIT 1 ;";
      		$resultup = mysql_query($sqlup) or die(mysql_error());

          //UPDATE  tblfile SET file_status = 0 WHERE file_id <> 12 AND file_crd2id = 1 AND file_docid = 1

          $sqlup2 = " UPDATE `intrayon_credityc`.`tblfile` SET ";
          $sqlup2 .= "`file_updateby` ='{$_SESSION['use_user']}' , ";
          $sqlup2 .= "`file_updatetime` = NOW() , ";
          $sqlup2 .= "`file_status` = '0' ";
          $sqlup2 .= " WHERE file_id <> {$fileid} AND file_crd2id = '$crd2id' AND file_docid = '$docid' ;";
      		$resultup2 = mysql_query($sqlup2) or die(mysql_error());

          $uploadDetail = 5;
          } else {
              //echo "Sorry, there was an error uploading your file.";
      		$response = "เสียใจด้วย , มีข้อผิดพลาดในการ อัปโหลดไฟล์ของคุณ.";
      		$data = 1; //result success
        }
      }
    }
  }
//echo $uploadOk;




	echo "{$uploadDetail},{$imageFileType}";


	mysql_close($c); //close connection
?>
