<?php session_start();

date_default_timezone_set('Asia/Bangkok'); //set timezone ให้ตรงกับประเทศไทย
include "../../../Connections/connect_mysql.php";

$target_dir = "../../../uploads/";
$userupload = $_GET["userUpload"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadDetail = 0;
$response = "";

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
		$response = "ไฟล์ชนิดรูปภาพ - " . $check["mime"] . ".";
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
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
	$response = "เสียใจด้วย, ไฟล์ของคุณมีขนาดใหญ่เกินไป.";
    $uploadOk = 0;
	$uploadDetail = 3;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$response = "เสียใจด้วย, ไฟล์ที่สามารถ อัปโหลดได้ ต้องเป็นไฟล์ JPG, JPEG, PNG & GIF เท่านั้น.";
    $uploadOk = 0;
	$uploadDetail = 4;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
	if ($uploadDetail == 1){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจากไม ่ไช่ไฟล์รูปภาพ.";
	}else
	if($uploadDetail == 2){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.";
	}else
	if($uploadDetail == 3){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.";
	}else
	if($uploadDetail == 4){
		$response = "เสียใจด้วย, ไม่สามารถอัปโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิืด JPG, JPEG, PNG & GIF เท่านั้น.";
	}

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$response = "ไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " อัปโหลด เสร็จเรียบร้อย.";
		$data = 0; //result success
		//rename file
		rename ($target_dir . basename( $_FILES["fileToUpload"]["name"]), $target_dir . $userupload . '.' . $imageFileType);

		$target_file_n = $userupload . '.' . $imageFileType;

		//--- update data in table employee_tb
		$sql = " UPDATE  `intrayon_credityc`.`tbluser` SET  ";
		$sql .= "`use_signature` =  '{$target_file_n}', ";
		$sql .= "`use_updateby` ='{$_SESSION['use_user']}', ";
		$sql .= "`use_updatetime` = NOW() ";
		$sql .= " WHERE `tbluser`.`use_id` ={$userupload} LIMIT 1 ;";
		$result = mysql_query($sql) or die(mysql_error());

    } else {
        //echo "Sorry, there was an error uploading your file.";
		$response = "เสียใจด้วย , มีข้อผิดพลาดในการ อัปโหลดไฟล์ของคุณ.";
		$data = 1; //result success
    }
}



	echo "{$uploadDetail},{$imageFileType}";

	mysql_close($c); //close connection
?>
