var dlgAttfile = "";
var dlgaf = "";
var AppWindow = "";



function showscreen(){
	var windowWidth = 1200;
	var windowHeight = 800;
	window.resizeTo(windowWidth,windowHeight);
	var xPos = (screen.width/2) - (windowWidth/2);
	var yPos = (screen.height/2) - (windowHeight/2);
	window.moveTo(xPos, yPos);
	window.focus();
	AppWindow = window.opener;

}

function loadLoginPage(){
	$("#myNavbar").load("login/loginmenu1.php");
	$("#a1").load("login/logincontent1.php");
}

function Chgtxt(){
	$('#logo1').html("<font color='#FF6600'><i class='ti-check-box'></i></font><font color='#0099FF'> ระบบอนุมัติเครดิต (<font color='#FF6600'>ACS</font>)</font>");
}
function Retrntxt(){
	$('#logo1').html("<font color='#FF6600'><i class='ti-check-box'></i></font><font color='#0099FF'> Approve Credit System (<font color='#FF6600'>ACS</font>)</font>");
}

function adminmain() {	//เรียกหน้า admin
  $("#myNavbar").load("admin/menu_admin.php");
  $('#a1').load('admin/user/data/detail_main.php');
}
function RefreshAdminUse() {
	$('#a2').load('admin/user/data/show_user.php');
}

function admindoc() {
	$("#myNavbar").load("admin/menu_admin.php");
	$('#a1').load('admin/document/data/detail_doc.php');
	$("#d2").load("admin/document/data/show_doc.php");
}

function loadshowdoc() {
	$("#d2").load("admin/document/data/show_doc.php");
}

function customer() {
	$("#a1").load("customer/data/detail_cus.php");
}

function adminrequestermain() {
  $('#a1').load('requester/opencd/data/detail_main.php');
}

function requestermain() {
  $("#myNavbar").load("requester/menu_requester.php");
  $('#a1').load('requester/opencd/data/detail_main.php');
}
function RefreshReques() {
	$('#a2').load('requester/opencd/data/show_opencd.php');
}

function show_filepdf(docid,crd2id) {
	$('#show_file').load('requester/opencd/data/show_file.php?docid='+ docid + '&crd2id=' + crd2id);
}

function adminconsidermain1() {
  $('#a1').load('approve/consider/data/detail_maincon1.php');
}
function adminconsidermain2() {
  $('#a1').load('approve/consider/data/detail_maincon2.php');
}
function adminapprovemain1() {
  $('#a1').load('approve/approve/data/detail_mainappro1.php');
}
function adminapprovemain2() {
  $('#a1').load('approve/approve/data/detail_mainappro2.php');
}

function considermain1() {
	$("#myNavbar").load("approve/menu_approve.php");
  $('#a1').load('approve/consider/data/detail_maincon1.php');
}

function considermain2() {
	$("#myNavbar").load("approve/menu_approve.php");
  $('#a1').load('approve/consider/data/detail_maincon2.php');
}
function approvemain1() {
	$("#myNavbar").load("approve/menu_approve.php");
  $('#a1').load('approve/approve/data/detail_mainappro1.php');
}
function approvemain2() {
	$("#myNavbar").load("approve/menu_approve.php");
  $('#a1').load('approve/approve/data/detail_mainappro2.php');
}

function RefreshConsi1() {
	$('#a2').load("approve/consider/data/show_consider1.php");
}
function RefreshConsi2() {
	$('#a2').load("approve/consider/data/show_consider2.php");
}

function RefreshAppro1() {
	$('#a2').load("approve/approve/data/show_appro1.php");
}
function RefreshAppro2() {
	$('#a2').load("approve/approve/data/show_appro2.php");
}

function RefreshCustomer() {
	$('#cus1').load("customer/data/show_customer.php");
}

function brand() {
	//alert("ttt");
	$('#a1').load('admin/brand/data/detail_brand.php');
}
function loadshowbrand() {
	$("#a2").load("admin/brand/data/show_brand.php");
}
function gread() {
	$('#a1').load('admin/gread/data/detail_gread.php');
}
function loadshowgread() {
	$("#a2").load("admin/gread/data/show_gread.php");
}

function logout() {
  $.ajax({
		type: "POST",
		url: "login/process/chk_logout.php",
		cache: false,
		data: "",
		success: function(msg){
			//alert(msg);
			//location.reload();
			if(msg!='Y'){
        /*Lobibox.notify('success', {
            title: "Logout สำเร็จ",
            msg: "ออกจากระบบสำเร็จ"
         });*/
         		loadLoginPage();
				location.reload();
			}
		}
	});
}

function checkKey(n){
  if (window.event.keyCode == 13){ //Enter
  		if(n=='userName'){
			var userName = $('#userName').val();
			if(userName.length > 0){
				if (userName.match(/^([a-zA-Z0-9._-]){4,10}$/)) {
					//alert(userName);
					$('#userPassword').focus();
				}else{
					/*-- open dialog --*/
          /*Lobibox.notify('warning', {
              title: "<i class='ti-alert'></i></font> Username ไม่ถูกต้อง",
              msg: "<i class='glyphicon glyphicon-hand-right'></i>  คุณต้องป้อนข้อมูล Username เป็นตัวอักษรภาษาอังกฤษ หรือ ตัวเลข ความยาว 4-10 ตัวอักษร.",
              action: function(){
                  $('#userName').focus();
                  $('#userName').select();
              }
           });*/
					/*-- end dialog --*/
					BootstrapDialog.alert('Username ต้องเป็นตัวอักษรภาษาอังกฤษ, หรือตัวเลข \n ความยาว 4 - 10 ตัวอักษร.');
				}
			}else{
				/*-- open dialog --*/
        /*Lobibox.notify('warning', {
            title: "<i class='ti-alert'></i></font> Username ไม่ถูกต้อง",
            msg: "<i class='glyphicon glyphicon-hand-right'></i>  คุณยังไม่ได้ใส่ข้อมูล Username.",
            action: function(){
                $('#userName').focus();
                $('#userName').select();
            }
         });*/
					/*-- end dialog --*/

				BootstrapDialog.alert("Please insert username. \n" + "กรุณาใส่ userName");
				$('#userName').focus();
			}
		}else if(n=='userPassword'){
			var userPassword = $('#userPassword').val();
			if(userPassword.length > 0){
				if (userPassword.match(/^([a-zA-Z0-9._-]){4,10}$/)) {
					//alert(userPassword);
					$('#userPassword').focus();
					$('#userPassword').select();
					submitlogin();
				}else{
					/*-- open dialog --*/
          /*Lobibox.notify('warning', {
              title: "<i class='ti-alert'></i></font> Password ไม่ถูกต้อง",
              msg: "<i class='glyphicon glyphicon-hand-right'></i>  คุณต้องใส่ข้อมูล Password เป็นตัวอักษรภาษาอังกฤษ, หรือตัวเลข ความยาวอยู่ระหว่าง 4 - 10 ตัวอักษร.",
              action: function(){
                  $('#userPassword').focus();
                  $('#userPassword').select();
              }
           });*/
					/*-- end dialog --*/
					BootstrapDialog.alert('Password ต้องเป็นตัวอักษรภาษาอังกฤษ, หรือตัวเลข \n ความยาว 4 - 10 ตัวอักษร.');
				}
			}else{
				/*-- open dialog --*/
       /* Lobibox.notify('warning', {
            title: "<i class='ti-alert'></i></font> Password ไม่ถูกต้อง",
            msg: "<i class='glyphicon glyphicon-hand-right'></i>  คุณยังไม่ได้ใส่ข้อมูล Password.",
            action: function(){
                $('#userPassword').focus();
                $('#userPassword').select();
            }
         });*/
					/*-- end dialog --*/
				BootstrapDialog.alert("Please insert password. \n" + "กรุณาใส่ password");
				$('#userPassword').focus();
			}
		}
  }
}

function AdminAddUserWS(){

	var std1,std2 = '';
  //เช็คค่าว่างผู้ใช้งานระบบ
  if($('#userName').val().length==0){
    $('#fg1').addClass('has-error');
    $('#smt1').html('กรุณากรอก Username !');
    $('#userName').focus();
    std1 = 'N';
  }else{
    $('#fg1').removeClass('has-error');
    $('#fg1').addClass('has-success');
    $('#smt1').html('');
    var userName_n = $('#userName').val();
    std1 = 'Y';
		}
    // เช็คค่าว่างรหัสผ่าน
		if($('#userPassword').val().length==0){
			$('#fg2').addClass('has-error');
			$('#smt2').html('กรุณากรอก Password !');
			$('#userPassword').focus();
			std2 = 'N';
		}else{
			$('#fg2').removeClass('has-error');
      $('#fg2').addClass('has-success');
			$('#smt2').html('');
			var userPassword_n = $('#userPassword').val();
			std2 = 'Y';
		}
}

function submitlogin(){

	var userName = $('#userName').val();
	var userPassword = $('#userPassword').val();

	if(userName.length > 0 && userPassword.length > 0 ){
		var data = "userName=" + userName + "&userPassword=" + userPassword;
		//alert(data);
		$('#resultlogin').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");
		//send data to web service by ajax javascript
		//ajaxLoad('post', 'login/login_ws.php', data , 'resultlogin');
    $.ajax({
		type: "POST",
		url: "login/process/chk_login.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
		//location.reload();
		if(msg=='A1'){ //admin programmer
            /*Lobibox.notify('success', {
                title: "Login สำเร็จ",
                msg: "ระดับสิทธิ์ของคุณคือ Programmer"
             });*/
             adminmain();
			}else if (msg=='A2') {  //admin บช.ลน
        /*Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้ดูแลระบบอนุมัติวงเงินเครดิต"
         });*/
			adminmain();
			}else if (msg=='R1') {  //พนง.ขายเครดิต
       /* Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้ส่งคำร้องขอเปิดวงเงินเครดิตลูกค้า",
         });*/
			requestermain();
			}else if (msg=='AP1') {  //อนุมัติระดับ 1 ผจก. ฝ่ายขายเครดิต
       /* Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้ตรวจสอบคำร้องขอเปิดวงเงินเครดิต ระดับที่ 1",
         });*/
				considermain1();
			}else if (msg=='AP2') {  //อนุมัติระดับ 2 ผจก. ฝ่าย บช.ลน
        /*Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้ตรวจสอบคำร้องขอเปิดวงเงินเครดิต ระดับที่ 2",
         });*/
				 considermain2();
			}else if (msg=='AP3') {  //อนุมัติระดับ 3 ผอ.ฝ่ายการเงิน การลงทุน
       /* Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้อนุมัติคำร้องขอเปิดวงเงินเครดิต ระดับที่ 1",
         });*/
				 approvemain1();
			}else if (msg=='AP4') {  //อนุมัติระดับ 4 กรรมการผู้จัดการ
        /*Lobibox.notify('success', {
          title: "Login สำเร็จ",
          msg: "ระดับสิทธิ์ของคุณคือ ผู้อนุมัติคำร้องขอเปิดวงเงินเครดิต",
         });*/
				 approvemain2();
			}else if (msg=='N') {  //login ไม่สำเร็จ
			$('#resultlogin').html("");
        /*Lobibox.notify('error', {
            msg: "Username หรือ Password ไม่ถูกต้อง.",
            action: function(){
                $('#userPassword').focus();
                $('#userPassword').select();
            }
         });*/
		 	BootstrapDialog.alert("Username หรือ Password ไม่ถูกต้อง.");
			}else{
				$('#username').focus();
				$('#username').select();
				$("#pp").html(msg);
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
	}else{
          /*Lobibox.notify('warning', {
              title: "ข้อมุลไม่ครบถ้วน",
              msg: "<i class='glyphicon glyphicon-hand-right'></i>  คุณยังไม่ได้ใส่ข้อมูล Username หรือ Password.",
              action: function(){
                  $('#userPassword').focus();
                  $('#userPassword').select();
              }
           });*/
					/*-- end dialog --*/
			BootstrapDialog.alert('Please insert username or password. \n' + 'กรุณาใส่ username และ password ให้ครบถ้วน');
		if(userName.length <= 0){
			$('#userName').focus();
		}else
		if(userPassword.length <= 0){
			$('#userPassword').focus();
		}
	}

}


function add_user(){
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
		size: BootstrapDialog.SIZE_WIDE,
		title: '<i class="ti-user"></i></font> เพิ่มข้อมูลผู้ใช้งาน',
    	message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('admin/user/data/from_adduser.php'),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}, {
			label: "<i class='ti-save'></i>&nbsp; Save Change",
			cssClass: 'btn-success',
			action: function(dialogItself){
				adduser();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}

function adduser(){

	var std1,std2,std3,std4,std5,std6,std7,std8,std9 = '';

	//-- ตรวจสอบข้อมูลก่อนส่งไป บันทึก return false; ---//
	//check use_firstname
		if($('#use_firstname').val().length==0){
			$('#fg1').addClass('has-error');
			$('#smt1').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
			$('#use_firstname').focus();
			std1 = 'N';
		}else{
			$('#fg1').removeClass('has-error');
			$('#fg1').addClass('has-success');
			$('#smt1').html('');
			var use_firstname_n = $('#use_firstname').val();
			std1 = 'Y';
		}

	//use_lastname
		if($('#use_lastname').val().length==0){
			$('#fg2').addClass('has-error');
			$('#smt2').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
			$('#use_lastname').focus();
			std2 = 'N';
		}else{
			$('#fg2').removeClass('has-error');
			$('#fg2').addClass('has-success');
			$('#smt2').html('');
			var use_lastname_n = $('#use_lastname').val();
			std2 = 'Y';
		}

	//use_numcode
		if($('#use_numcode').val().length==0){
			$('#fg3').addClass('has-error');
			$('#smt3').html('รหัสพนักงาน ต้องไม่เป็นค่าว่าง!');
			$('#use_numcode').focus();
			std3 = 'N';
		}else{
			$('#fg3').removeClass('has-error');
			$('#fg3').addClass('has-success');
			$('#smt3').html('');
			var use_numcode_n = $('#use_numcode').val();
			std3 = 'Y';
		}

	//use_username
		if($('#use_username').val().length==0){
			$('#fg4').addClass('has-error');
			$('#smt4').html('Username ต้องไม่เป็นค่าว่าง!');
			$('#use_username').focus();
			std4 = 'N';
		}else
		if ($('#use_username').val().match(/^([a-zA-Z0-9._-]){4,10}$/)){
			$('#fg4').removeClass('has-error');
			$('#fg4').addClass('has-success');
			$('#smt4').html('');
			var use_username_n = $('#use_username').val();
			std4 = 'Y';
		}else{
			$('#fg4').addClass('has-error');
			$('#smt4').html('ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 4-10 ตัวอักษร!');
			$('#use_username').focus();
			std4 = 'N';
		}

	//use_password
		if($('#use_password').val().length==0){
			$('#fg5').addClass('has-error');
			$('#smt5').html('Password ต้องไม่เป็นค่าว่าง!');
			$('#use_password').focus();
			std5 = 'N';
		}else
		if ($('#use_password').val().match(/^([a-zA-Z0-9._-]){4,50}$/)){
			$('#fg5').removeClass('has-error');
			$('#fg5').addClass('has-success');
			$('#smt5').html('');
			var use_password_n = $('#use_password').val();
			std5 = 'Y';
		}else{
			$('#fg5').addClass('has-error');
			$('#smt5').html('ภาษาอังกฤษ หรือ ตัวเลข ความยาวระหว่าง 2-10 ตัวอักษร!');
			$('#use_password').focus();
			std5 = 'N';
		}

		//use_title
		//alert($('#use_title').val());
		if($('#use_title').val()==0){
			$('#fg_use_title').addClass('has-error');
			$('#smt_use_title').html('คำนำหน้า ต้องไม่เป็นค่าว่าง!');
			$('#use_title').focus();
			std6 = 'N';
		}else{
			$('#fg_use_title').removeClass('has-error');
			$('#fg_use_title').addClass('has-success');
			$('#smt_use_title').html('');
			var use_title_n = $('#use_title').val();
			std6 = 'Y';
		}


	//use_bran
		//alert($('#use_title').val());
		if($('#use_bran').val()==0){
			$('#fg_use_bran').addClass('has-error');
			$('#smt_use_bran').html('สาขา ต้องไม่เป็นค่าว่าง!');
			$('#use_bran').focus();
			std7 = 'N';
		}else{
			$('#fg_use_bran').removeClass('has-error');
			$('#fg_use_bran').addClass('has-success');
			$('#smt_use_bran').html('');
			var use_bran_n = $('#use_bran').val();
			std7 = 'Y';
		}


	//use_typeuse
		//alert($('#use_title').val());
		if($('#use_typeuse').val()==0){
			$('#fg_use_typeuse').addClass('has-error');
			$('#smt_use_typeuse').html('ประเภทผู้ใช้งาน ต้องไม่เป็นค่าว่าง!');
			$('#use_typeuse').focus();
			std8 = 'N';
		}else{
			$('#fg_use_typeuse').removeClass('has-error');
			$('#fg_use_typeuse').addClass('has-success');
			$('#smt_use_typeuse').html('');
			var use_typeuse_n = $('#use_typeuse').val();
			std8 = 'Y';
		}

	//use_approver
		//alert($('#use_title').val());
		if($('#use_approver').val()==0){
			$('#fg_use_approver').addClass('has-error');
			$('#smt_use_approver').html('ประเภทการอนุมัติ ต้องไม่เป็นค่าว่าง!');
			$('#use_approver').focus();
			std9 = 'N';
		}else{
			$('#fg_use_approver').removeClass('has-error');
			$('#fg_use_approver').addClass('has-success');
			$('#smt_use_approver').html('');
			var use_approver_n = $('#use_approver').val();
			std9 = 'Y';
		}
	//-- end of chek data ----
//alert(use_password_n);
	//--- add all data ------------
	if(std1=='Y' && std2=='Y' && std3=='Y' && std4=='Y' && std5=='Y' && std6=='Y' && std7=='Y' && std8=='Y' && std9=='Y' ){	//
		var data1 = "use_title_n=" + use_title_n + "&use_firstname_n=" + use_firstname_n + "&use_lastname_n=" + use_lastname_n;
		data1 = data1 + "&use_bran_n=" + use_bran_n + "&use_numcode_n=" + use_numcode_n + "&use_username_n=" + use_username_n;
		data1 = data1 + "&use_password_n=" + use_password_n + "&use_typeuse_n="	+ use_typeuse_n + "&use_approver_n="	+ use_approver_n;
		//alert(data1);

		$('#resulta1').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...")
		//ajaxLoad('post', 'adminsys/testphpjs.php', data,'ra1');
		//var value = 'day';// post each click value to another page

     	$.ajax({
         	url: "admin/user/process/chk_add_user.php",
         	dataType: "html",
         	type: 'POST', //I want a type as POST
         	data: data1,
         	success: function(data) {
						alert(data);
				 var a = data;
				 if(a==0){
					$.each(BootstrapDialog.dialogs, function(id, dialog){
                       dialog.close();
                    });
					/*Lobibox.notify('success', {
							title: "การประมวลผล",
							msg: 'บันทึกข้อมูล User : ' + use_username_n + ' เรียบร้อยแล้ว.'
					 });*/
					RefreshAdminUse();
					BootstrapDialog.alert("บันทึกข้อมูล User : " + use_username_n + " เรียบร้อยแล้ว.");
				 }else
				 if(a==1){

					$.each(BootstrapDialog.dialogs, function(id, dialog){
						dialog.close();
					});
					 /*Lobibox.notify('warning', {
							 title: "การประมวลผล",
							 msg: 'มีข้อมูล User : ' + use_username_n + ' หรือมีรหัสพนักงาน : ' + use_numcode_n + ' อยู่ในระบบแล้ว.'
										});*/
					RefreshAdminUse();
					BootstrapDialog.alert("มีข้อมูล User : " + use_username_n + " หรือมีรหัสพนักงาน : " + use_numcode_n + " อยู่ในระบบแล้ว.");
				 }

        	},
        	error: function() {
						/*Lobibox.notify('error', {
	              title: "Error",
	              msg: "เพิ่มผู้ใช้งานมีข้อผิดพลาด."
	           });*/
			   BootstrapDialog.alert("เพิ่มผู้ใช้งานมีข้อผิดพลาด.");
        	}
		});

	}else{
		//alertBDialog2("ข้อมูลไม่ถูกต้อง","ตรวจสอบข้อมูลใหม่อีกครั้ง !");
	}

}


function uedit(udt1){
    var data1 = "useridedit=" + udt1;
			//alert(data1);
			var dialogInstance1 = new BootstrapDialog({
			type: BootstrapDialog.TYPE_WARNING,
			size: BootstrapDialog.SIZE_WIDE,
			title: "<i class='ti-pencil' id='edit'></i></font> แก้ไขข้อมูลผู้ใช้งาน",
			message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
			message: $('<div></div>').load("admin/user/data/from_edit_user.php?useridedit=" + udt1 + ""), //"<i class='glyphicon glyphicon-hand-right'></i>  test.",
			draggable: true,
			closable: true,
			closeByBackdrop: false,
			closeByKeyboard: false,
			buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			},{
				label: "<i class='ti-save'></i>&nbsp; Save Change",
				cssClass: 'btn-warning',
				//hotkey: 13, //enter
				action: function(dialogItself){
					useredit(udt1);
				}
			}]
		});

		dialogInstance1.open();

}

function useredit(ue1) {
	var std1, std2, std5, std6, std7, std8, std9 = '';

	var use_title_e = $('#use_titleE').val();
	var use_bran_e = $('#use_branE').val();
	var use_numcode_e = $('#use_numcodeE').val();
	var use_username_e = $('#use_usernameE').val();
	var use_typeuse_e = $('#use_typeuseE').val();
	var use_approver_e = $('#use_approverE').val();

	//-- ตรวจสอบข้อมูลก่อนส่งไป บันทึก return false; ---//
	//check use_firstname
		if($('#use_firstnameE').val().length==0){
			$('#fg1').addClass('has-error');
			$('#smt1').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
			$('#use_firstnameE').focus();
			std1 = 'N';
		}else{
			$('#fg1').removeClass('has-error');
			$('#fg1').addClass('has-success');
			$('#smt1').html('');
			var use_firstname_e = $('#use_firstnameE').val();
			std1 = 'Y';
		}

	//use_lastname
		if($('#use_lastnameE').val().length==0){
			$('#fg2').addClass('has-error');
			$('#smt2').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
			$('#use_lastnameE').focus();
			std2 = 'N';
		}else{
			$('#fg2').removeClass('has-error');
			$('#fg2').addClass('has-success');
			$('#smt2').html('');
			var use_lastname_e = $('#use_lastnameE').val();
			std2 = 'Y';
		}

	//use_password
		if($('#use_passwordE').val().length==0){
			$('#fg5').addClass('has-error');
			$('#smt5').html('Password ต้องไม่เป็นค่าว่าง!');
			$('#use_passwordE').focus();
			std5 = 'N';
		}else{
			$('#fg5').removeClass('has-error');
			$('#fg5').addClass('has-success');
			$('#smt5').html('');
			var use_password_e = $('#use_passwordE').val();
			std5 = 'Y';
		}

	//use_title
		if($('#use_titleE').val()==0){
			$('#fg_use_titleE').addClass('has-error');
			$('#smt_use_titleE').html('คำนำหน้า ต้องไม่เป็นค่าว่าง!');
			$('#use_titleE').focus();
			std6 = 'N';
		}else{
			$('#fg_use_titleE').removeClass('has-error');
			$('#fg_use_titleE').addClass('has-success');
			$('#smt_use_titleE').html('');
			var use_title_n = $('#use_titleE').val();
			std6 = 'Y';
		}


	//use_bran
		if($('#use_branE').val()==0){
			$('#fg_use_branE').addClass('has-error');
			$('#smt_use_branE').html('สาขา ต้องไม่เป็นค่าว่าง!');
			$('#use_branE').focus();
			std7 = 'N';
		}else{
			$('#fg_use_branE').removeClass('has-error');
			$('#fg_use_branE').addClass('has-success');
			$('#smt_use_branE').html('');
			var use_bran_n = $('#use_branE').val();
			std7 = 'Y';
		}


	//use_typeuse
		if($('#use_typeuseE').val()==0){
			$('#fg_use_typeuseE').addClass('has-error');
			$('#smt_use_typeuseE').html('ประเภทผู้ใช้งาน ต้องไม่เป็นค่าว่าง!');
			$('#use_typeuseE').focus();
			std8 = 'N';
		}else{
			$('#fg_use_typeuseE').removeClass('has-error');
			$('#fg_use_typeuseE').addClass('has-success');
			$('#smt_use_typeuseE').html('');
			var use_typeuse_n = $('#use_typeuseE').val();
			std8 = 'Y';
		}

	//use_approver
		if($('#use_approverE').val()==0){
			$('#fg_use_approverE').addClass('has-error');
			$('#smt_use_approverE').html('ประเภทการอนุมัติ ต้องไม่เป็นค่าว่าง!');
			$('#use_approverE').focus();
			std9 = 'N';
		}else{
			$('#fg_use_approverE').removeClass('has-error');
			$('#fg_use_approverE').addClass('has-success');
			$('#smt_use_approverE').html('');
			var use_approver_n = $('#use_approverE').val();
			std9 = 'Y';
		}



	//-- end of chek data ----
	//--- add all data ------------
	if(std1=='Y' && std2=='Y' && std5=='Y' && std6=='Y' && std7=='Y' && std8=='Y' && std9=='Y' ){	//
		var data1 = "use_title_e=" + use_title_e + "&use_firstname_e=" + use_firstname_e + "&use_lastname_e=" + use_lastname_e;
		data1 = data1 + "&use_bran_e=" + use_bran_e + "&use_numcode_e=" + use_numcode_e + "&use_username_e=" + use_username_e;
		data1 = data1 + "&use_password_e=" + use_password_e + "&use_typeuse_e="	+ use_typeuse_e + "&use_approver_e="	+ use_approver_e + "&usereditid=" + ue1;
		//alert(data1);
		$('#resulta1').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...")
		//ajaxLoad('post', 'adminsys/testphpjs.php', data,'ra1');
		//var value = 'day';// post each click value to another page
     	$.ajax({
         	url: "admin/user/process/chk_edit_user.php",
         	dataType: "html",
         	type: 'POST', //I want a type as POST
         	data: data1,
         	success: function(data) {
						//alert(data);
				 if(data==1){

					$.each(BootstrapDialog.dialogs, function(id, dialog){
                       dialog.close();
                    });
					/*Lobibox.notify('success', {
							title: "การประมวลผล",
							msg: 'บันทึกข้อมูล User : ' + use_username_e + ' เรียบร้อยแล้ว.'
					 });*/

					RefreshAdminUse();
					BootstrapDialog.alert("บันทึกข้อมูล User : " + use_username_e + " เรียบร้อยแล้ว.");
				}else {
					/*Lobibox.notify('warning', {
							title: "ข้อมูลไม่ถูกต้อง",
							msg: "กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง !."
					 });*/
					 BootstrapDialog.alert("กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง !.");
				}
        	},
		});

	}else{
		//alertBDialog2("ข้อมูลไม่ถูกต้อง","ตรวจสอบข้อมูลใหม่อีกครั้ง !");
	}
}


function udelete(udt1,udt3,udt4,udt5,udt7){
	//alert(udt1+","+udt3+","+udt4+","+udt5+","+udt7);

	 var data1 = "useriddel=" + udt1 + "&usertuse=" + udt7;

	 BootstrapDialog.show({
     	title: 'ยืนยันการลบข้อมูล.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการลบข้อมูล User : ' + udt3 + ' ' +  udt4 + ' ' + udt5+ ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){

				$.ajax({
					url: "admin/user/process/chk_del_user.php",
					dataType: "html",
         			type: 'POST', //I want a type as POST
         			data: data1,
					success: function(data) {
				 		if(data==1){

							dialogItself.close();
							/*Lobibox.notify('success', {
									title: "การประมวลผล",
									msg: 'ลบข้อมูลเรียบร้อยแล้ว.'
							 });*/

							RefreshAdminUse();
							BootstrapDialog.alert("ลบข้อมูลเรียบร้อยแล้ว.");
						}else if(data==2){

							dialogItself.close();
							/*Lobibox.notify('warning', {
									title: "การประมวลผล",
									msg: "ระบบไม่สามารถ ลบ User : " + udt4 + udt5 + " ได้ กรุณาติดต่อผู้ดูและระบบ."
							 });*/
							BootstrapDialog.alert("ระบบไม่สามารถ ลบ User : " + udt4 + udt5 + " ได้ กรุณาติดต่อผู้ดูและระบบ.");
						}else{
							//
						}
        			},
        			error: function() {
								/*Lobibox.notify('error', {
										title: "การประมวลผล",
										msg: "Error Can't Delete user."
								 });*/
						BootstrapDialog.alert("Error Can't Delete user.");
        			}
				});

			}
		}]
     });
}


function adddoc() {

	var std1,std2 = '';



		if($('#doc_name').val().length==0){
			$('#doc_name').addClass('has-error');
			$('#smt_doc_name').html('ชื่อเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_name').focus();
			std1 = 'N';
		}else{
			$('#doc_name').removeClass('has-error');
			$('#doc_name').addClass('has-success');
			$('#smt_doc_name').html('');
			var doc_name = $("#doc_name").val();
			std1 = 'Y';
		}


		if($('#doc_type').val()==0){
			$('#doc_type').addClass('has-error');
			$('#smt_doc_type').html('ประเภทเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_type').focus();
			std2 = 'N';
		}else{
			$('#doc_type').removeClass('has-error');
			$('#doc_type').addClass('has-success');
			$('#smt_doc_type').html('');
			var doc_type = $("#doc_type").val();
			std2 = 'Y';
		}


	//alert(data);
	if(std1=="Y" && std2=="Y"){
		var data = "doc_name=" + doc_name + "&doc_type=" + doc_type;
	$.ajax({
		type: "POST",
		url: "admin/document/process/chk_add_doc.php",
		cache: false,
		data: data,
		success: function(msg){
			if(msg=="Y"){

				loadshowdoc();
				/*Lobibox.notify('success', {
						title: "การประมวลผล",
						msg: 'เพิ่มข้อมูลเรียบร้อยแล้ว.'
				 });*/
				 BootstrapDialog.alert("เพิ่มข้อมูลเรียบร้อยแล้ว.");
				 document.getElementById("doc_name").value = "";
				 document.getElementById("doc_type").value = "0";
			}else{
				/*Lobibox.notify('error', {
						title: "บันทึกไม่สำเร็จ",
						msg: 'เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่.'
				 });*/
				 BootstrapDialog.alert("เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่.");
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
			/*Lobibox.notify('warning', {
					title: "บันทึกไม่สำเร็จ",
					msg: 'กรุณากรอกข้อมูลให้ครบถ้วน !.'
			 });*/
			 BootstrapDialog.alert("กรุณากรอกข้อมูลให้ครบถ้วน !.");
	}
}

function deldoc(docid,docname) {
	BootstrapDialog.show({
     	title: '<i class="ti-eraser"></i> ยืนยันการลบข้อมูล.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการลบข้อมูล  ' + docname + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){
				var data1 = "docid=" + docid;
				//---ส่งข้อมูล ajax

				  $.ajax({
					  url: "admin/document/process/chk_del_doc.php",
						dataType: "html",
						type: 'POST', //I want a type as POST
						data: data1,
						success: function(msg){
							//alert(msg);
							if(msg==0){
								loadshowdoc();

								dialogItself.close();
								/*Lobibox.notify('success', {
										title: '<i class="ti-comment"></i> การประมวลผล',
										msg: 'ลบรายการเรียบร้อย.'
								 });*/
								BootstrapDialog.alert("ลบรายการเรียบร้อย.");
							}else{
								/*Lobibox.notify('error', {
										title: '<i class="ti-comment"></i> การประมวลผล' ,
										msg: 'ไม่สามารถลบรายการได้.'
								 });*/
								 BootstrapDialog.alert("ไม่สามารถลบรายการได้.");
							}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: "การประมวลผล",
									msg: "Error Can't Delete Document."
							 });*/
							 BootstrapDialog.alert("Error Can't Delete Document.");
						}
					});
			}
		}]
	});
}

function docedit(docid,docname){
    var data1 = "docid=" + docid;
			//alert(data1);
			var dialogInstance1 = new BootstrapDialog({
			type: BootstrapDialog.TYPE_WARNING,
			size: BootstrapDialog.SIZE_WIDE,
			title: "<i class='ti-pencil' id='edit'></i></font> แก้ไขประเภทเอกสาร",
			message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
			message: $('<div></div>').load("admin/document/data/from_edit_doc.php?docid=" + docid + ""), //"<i class='glyphicon glyphicon-hand-right'></i>  test.",
			draggable: true,
			closable: true,
			closeByBackdrop: false,
			closeByKeyboard: false,
			buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			},{
				label: "<i class='ti-save'></i>&nbsp; Save Change",
				cssClass: 'btn-warning',
				//hotkey: 13, //enter
				action: function(dialogItself){
					editdoc(docid);
				}
			}]
		});

		dialogInstance1.open();

}

function editdoc(docid) {

	var std1,std2 = '';

		if($('#doc_name_e').val().length==0){
			$('#fg_doc_name_e').addClass('has-error');
			$('#smt_doc_name_e').html('ชื่อเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_name_e').focus();
			std1 = 'N';
		}else{
			$('#fg_doc_name_e').removeClass('has-error');
			$('#fg_doc_name_e').addClass('has-success');
			$('#smt_doc_name_e').html('');
			var doc_name = $("#doc_name_e").val();
			std1 = 'Y';
		}

		if($('#doc_type_e').val()==0){
			$('#fg_doc_type_e').addClass('has-error');
			$('#smt_doc_type_e').html('ประเภทเอกสาร ต้องไม่เป็นค่าว่าง!');
			$('#doc_type_e').focus();
			std2 = 'N';
		}else{
			$('#fg_doc_type_e').removeClass('has-error');
			$('#fg_doc_type_e').addClass('has-success');
			$('#smt_doc_type_e').html('');
			var doc_type = $("#doc_type_e").val();
			std2 = 'Y';
		}


	//alert(data);
	if(std1=="Y" && std2=="Y"){
		var data = "doc_name=" + doc_name + "&doc_type=" + doc_type + "&docid=" + docid;

	$.ajax({
		type: "POST",
		url: "admin/document/process/chk_edit_doc.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg)
			if(msg=="Y"){

				$.each(BootstrapDialog.dialogs, function(id, dialog){
					dialog.close();
				});
				loadshowdoc();
				/*Lobibox.notify('success', {
						title: "การประมวลผล",
						msg: 'เพิ่มข้อมูลเรียบร้อยแล้ว.'
				 });*/
				BootstrapDialog.alert("แก้ไขข้อมูลเรียบร้อยแล้ว.");
				 document.getElementById("doc_name").value = "";
				 document.getElementById("doc_type").value = "0";
			}else{
				/*Lobibox.notify('error', {
						title: "บันทึกไม่สำเร็จ",
						msg: 'เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่.'
				 });*/
				 BootstrapDialog.alert("เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่");
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
			/*Lobibox.notify('warning', {
					title: "บันทึกไม่สำเร็จ",
					msg: 'กรุณากรอกข้อมูลให้ครบถ้วน !.'
			 });*/
			 BootstrapDialog.alert("กรุณากรอกข้อมูลให้ครบถ้วน !.");
	}
}

function closedoc(docid,docname) {
	BootstrapDialog.show({
     	title: '<i class="ti-eraser"></i> ยืนยันการปิดการใช้งาน.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการปิดการใช้งาน  ' + docname + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){
				var data1 = "docid=" + docid;
				//---ส่งข้อมูล ajax

				  $.ajax({
					  url: "admin/document/process/chk_close_doc.php",
						dataType: "html",
						type: 'POST', //I want a type as POST
						data: data1,
						success: function(msg){
							//alert(msg);
							if(msg == 'Y' ){
								loadshowdoc();

								dialogItself.close();
								/*Lobibox.notify('success', {
										title: '<i class="ti-comment"></i> การประมวลผล',
										msg: 'ปิดการใช้งานเรียบร้อย.'
								 });*/
								BootstrapDialog.alert("ปิดการใช้งานเรียบร้อย.");
							}else{
								/*Lobibox.notify('error', {
										title: '<i class="ti-comment"></i> การประมวลผล' ,
										msg: 'ไม่สามารถปิดการใช้งานได้.'
								 });*/
								 BootstrapDialog.alert("ไม่สามารถปิดการใช้งานได้.");
							}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: "การประมวลผล",
									msg: "Error Can't Delete Document."
							 });*/
							 BootstrapDialog.alert("Error Can't Delete Document.");
						}
					});
			}
		}]
	});
}

function opendoc(docid,docname){
	//alert(docid+" "+docname);
	BootstrapDialog.show({
     	title: '<i class="ti-eraser"></i> ยืนยันการเปิดการใช้งาน.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการเปิดการใช้งาน  ' + docname + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){
				var data1 = "docid=" + docid;
				//---ส่งข้อมูล ajax

				  $.ajax({
					  url: "admin/document/process/chk_open_doc.php",
						dataType: "html",
						type: 'POST', //I want a type as POST
						data: data1,
						success: function(msg){
							//alert(msg);
							if(msg == 'Y'){
								loadshowdoc();

								dialogItself.close();
								/*Lobibox.notify('success', {
										title: '<i class="ti-comment"></i> การประมวลผล',
										msg: 'เปิดการใช้งานเรียบร้อย.'
								 });*/
								BootstrapDialog.alert("เปิดการใช้งานเรียบร้อย.");
							}else{
								/*
								Lobibox.notify('error', {
										title: '<i class="ti-comment"></i> การประมวลผล' ,
										msg: 'ไม่สามารถเปิดการใช้งานได้.'
								 });*/
								 BootstrapDialog.alert("เปิดการใช้งานเรียบร้อย.");
							}
						},
						error: function() {
							/*
							Lobibox.notify('error', {
									title: "การประมวลผล",
									msg: "Error Can't Delete Document."
							 });
							 */
							 BootstrapDialog.alert("Error Can't Delete Document.");
						}
					});
			}
		}]
	});
}


function uploadsig(upl1){
	var data1 = "userUpload=" + upl1;
	var resp = "";
	var str = "";
	var res = "";
	var fname = "";
	var di1 = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		//size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-upload'></i></font> Upload รูปภาพลายเซนต์",
		message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load("admin/user/data/from_up_signa.php?userUpload=" + upl1 + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
			buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			},{
				label: "<i class='ti-upload'></i>&nbsp; Upload File",
				cssClass: 'btn-info',
				//hotkey: 13, //enter
				action: function(dialogItself){
				  if( document.getElementById("fileToUpload").files.length == 0 ){
					$('#fgup1').addClass('has-error');
					$('#smtup1').html('ยังไม่เลือกไฟล์ upload!');
					$('#fileToUpload').focus();
				  }else{
					$('#fgup1').removeClass('has-error');
					$('#smtup1').html('');
					//=====
					$.ajax({
    					url: "admin/user/process/chk_upload.php?userUpload=" + upl1 + "",
    					type: "POST",
    					data: new FormData($("#frm")[0]), // The form with the file    inputs.
    					processData: false,                          // Using FormData, no need to process data.
    					contentType:false
  						}).done(function(data){
								//alert(data);
							str = data;
							res = str.split(",");
							//alert("Success: Files sent!" + res[0]  + res[1]);

							if (res[0] == 1){
								/*Lobibox.notify('warning', {
										title: "เพิ่มลายเซ็น",
										msg: "ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ."
								 });*/
								 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
							}else
							if(res[0] == 2){
								/*Lobibox.notify('warning', {
										title: "เพิ่มลายเซ็น",
										msg: "ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว."
								 });*/
								 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
							}else
							if(res[0] == 3){
								/*Lobibox.notify('warning', {
										title: "เพิ่มลายเซ็น",
										msg: "ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป."
								 });*/
								 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
							}else
							if(res[0] == 4){
								/*Lobibox.notify('warning', {
										title: "เพิ่มลายเซ็น",
										msg: "ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น."
								 });*/
								 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
							}else{
								/*Lobibox.notify('success', {
										title: "เพิ่มลายเซ็น",
										msg: "อัพโหลดไฟล์ เสร็จเรียบร้อย."
								 });*/

								$.each(BootstrapDialog.dialogs, function(id, dialog){
				                      dialog.close();
				                 });
								uedit(upl1);
								RefreshAdminUse();
								BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
							}


  						}).fail(function(){
     						//alert("An error occurred, the files couldn't be sent!" + data);

								$.each(BootstrapDialog.dialogs, function(id, dialog){
                       				dialog.close();
                    			});
													/*Lobibox.notify('error', {
															title: "การประมวลผล",
															msg: "ไม่สามารถส่งไฟล์ได้."
													 });*/
								BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
						});
					//=====
				  } //if
				}
			}]
	});
	di1.open();
}

function showimgsig(userid){
	//alert(userid);
	var data1 = "useriddel=" + userid;
	var di1 = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='ti-image'></i></font> Upload รูปภาพลายเซนต์",
		message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load("admin/user/data/show_img.php?userID=" + userid + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			},{
				label: "<i class='ti-trash'></i>&nbsp; Delete File",
				cssClass: 'btn-danger',
				action: function(dialogItself){
				//---ส่งข้อมูล ajax
					$.ajax({
						url: "admin/user/process/chk_del_img.php?userID=" + userid + "",
						data: data1, // The form with the file    inputs.
    					processData: false,                          // Using FormData, no need to process data.
    					contentType:false
						}).done(function(data){
							//alert(data);
							if(data==0){

								$.each(BootstrapDialog.dialogs, function(id, dialog){
                       				dialog.close();
                    			});
													/*Lobibox.notify('success', {
															title: "ผลการลบลายเซ็น",
															msg: "ลบไฟล์เสร็จเรียบร้อย."
													 });*/

								RefreshAdminUse();
								BootstrapDialog.alert("ลบไฟล์เสร็จเรียบร้อย.");
							}else
							if(data==1){
								/*Lobibox.notify('warning', {
										title: "ผลการลบลายเซ็น",
										msg: "ไม่สามารถลบไฟล์ได้ อาจเกิดจากข้อผิดพลาดบางประการ."
								 });*/

								RefreshAdminUse();
								BootstrapDialog.alert("ไม่สามารถลบไฟล์ได้ อาจเกิดจากข้อผิดพลาดบางประการ.");
							}

						}).fail(function(){

							$.each(BootstrapDialog.dialogs, function(id, dialog){
                       			dialog.close();
                    		});
												/*Lobibox.notify('error', {
														title: "ผลการลบลายเซ็น",
														msg: "ไม่สามารถลบไฟล์ได้."
												 });*/
						   BootstrapDialog.alert("ไม่สามารถลบไฟล์ได้");
					});
				//---
				}
			}]
	});
	di1.open();
}

function showimgsigdetail(userid){
	//alert(userid);
	var data1 = "useriddel=" + userid;
	var di1 = new BootstrapDialog({
		type: BootstrapDialog.TYPE_INFO,
		title: "<i class='ti-image'></i></font> Upload รูปภาพลายเซนต์",
		message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load("admin/user/data/show_img.php?userID=" + userid + ""),
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
		buttons: [{
				label: "<i class='glyphicon glyphicon-share'></i> Close",
				cssClass: 'btn-secondary',
				//hotkey: 27, //esc
				action: function(dialogItself){
					dialogItself.close();
				}
			}]
	});
	di1.open();
}


function add_opencd() {
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-plus'></i></font> เพิ่มรายการขออนุมัติ",
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('requester/opencd/data/from_addopen.php'),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}, {
			label: "<i class='ti-save'></i>&nbsp; Save Change",
			cssClass: 'btn-success',
			action: function(dialogItself){
				addopencd();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}

function addopencd(){

	var std1,std2,std3,std4,std5,std6,std7,std8 = '';

	var customer_code_n = $('#customer_code').val();	//รหัสลูกค้า
	var open_date_n = $('#open_date').val();	//วันที่ขอเปิด
	var open_type_n = $('#open_type').val();	//ประเภทกิจการ
	var open_other_n = $('#open_other').val();	//กิจการอื่นๆ
	var open_busiswine_n = $('#open_busiswine').val();	//หมู่ที่
	var open_busiroad_n = $('#open_busiroad').val();	//ถนน
	var open_busialley_n = $('#open_busialley').val();	//ตรอก/ซอย
	var open_busiprovin_n = $('#open_busiprovin').val();	//จังหวัด
	var open_busiamphur_n = $('#open_busiamphur').val();	//อำเภอ
	var open_busidistrict_n = $('#open_busidistrict').val();	//ตำบล
	var open_busizipcode_n = $('#open_busizipcode').val();	//รหัสไปรษณีย์
	var open_fax_n = $('#open_fax').val();	//แฟกซ์

	var open_typeproject_n = '';		//วัตถุประสงค์การใช้งาน
	if($('#open_typeproject1').is(':checked')){
		open_typeproject_n = $('#open_typeproject1').val();
	}else if($('#open_typeproject2').is(':checked')){
		open_typeproject_n = $('#open_typeproject2').val();
		var open_nameproject_n = $('#open_nameproject').val();	//ชื่อโครงการ
		var open_locaproject_n = $('#open_locaproject').val();	//ที่ตั้ง
		var open_dateproject_n = $('#open_dateproject').val();	//ระยะเวลาสัญญา
		var open_dateprostart_n = $('#open_dateprostart').val();	//วันที่เริ่ม
		var open_dateproend_n = $('#open_dateproend').val();	//วันที่สิ้นสุด
		var open_promon_n = $('#open_promon').val();	//มูลค่าโครงการ
		var proget_start_n = $('#proget_start').val();	//เริ่มใช้สินค้า
		var project_type_n = $('#project_type').val();	//ประเภทงานก่อสร้าง
		var project_other_n = $('#project_other').val();	//ประเภทโครงการอื่นๆ
	}

	var project_averagebuy_n = $('#project_averagebuy').val();	//ซื้อเฉลี่ย/เดือน
	var project_buytotal_n = $('#project_buytotal').val();	//รวม/ปี

	var delivery_n = '';		//สถานที่ส่งสินค้า
	if($('#delivery1').is(':checked')){
		delivery_n = $('#delivery1').val();
	}else if($('#delivery2').is(':checked')){
		delivery_n = $('#delivery2').val();
	}

	var pay_type_n = $('#pay_type').val();	//การชำระเงิน
	var pay_other_n = $('#pay_other').val();	//การชำระค่าสินค้าทางอื่นๆ
	var pay_deadline_n = $('#pay_deadline').val();	//กำหนดชำระเงินเครดิต
	var pay_locabill_n = $('#pay_locabill').val();	//สถานที่วางบิล

	var billing_n = '';		//ระเบียบการวางบิล
	if($('#billing1').is(':checked')){
		billing_n = $('#billing1').val();
	}else if($('#billing2').is(':checked')){
		billing_n = $('#billing2').val();
		var billing_other_n = $('#billing_other').val();	//เงื่อนไขอื่นๆ
	}

	var contacted_open_n = $('#contacted_open').val();	//ร้านค้าที่เคยติดต่อ
	var product_open_n = $('#product_open').val();	//สินค้า
	var product_mon_n = $('#product_mon').val();	//วงเงิน
	var product_credit_n = $('#product_credit').val();	//เครดิต
	var bank_open_n = $('#bank_open').val();	//ธนาคารที่ติดต่อ
	var bankbran_open_n = $('#bankbran_open').val();	//สาขา
	var booknum_open_n = $('#booknum_open').val();	//เลขที่บัญชี
	var cus_tit_n = $('#cus_tit').val();	//คำนำหน้า
	var cus_name_n = $('#cus_name').val();	//ชื่อ
	var cus_lname_n = $('#cus_lname').val();	//นามสกุล
	var cus_position_n = $('#cus_position').val();	//ตำแหน่ง
	var cus_department_n = $('#cus_department').val();	//แผนก/ฝ่าย
	var sale_name_n = $('#sale_name').val();	//ชื่อพนักงานขาย
	var sale_branch_n = $('#sale_branch').val();	//สาขา
	var sale_comment_n = $('#sale_comment').val();	//คอมเม้น
	var cus_line = $('#cus_line').val();	//สาขา
	var cus_face = $('#cus_face').val();	//คอมเม้น
	//-- ตรวจสอบข้อมูลก่อนส่งไป บันทึก return false; ---//

	//คำนำหน้าชื่อ
		if($('#cus_tit').val()==0){
			$('#cus_tit').focus();
			var std9 = 'N';
		}else{
			var std9 = 'Y';
		}
	// ชื่อกิจการ
			if($('#open_businame').val().length==0){
				$('#a05').addClass('has-error');
				$('#amsg5').html('ชื่อกิจการ ต้องไม่เป็นค่าว่าง!');
				$('#open_businame').focus();
				std1 = 'N';
			}else{
				$('#a05').removeClass('has-error');
				$('#a05').addClass('has-success');
				$('#amsg5').html('');
				var open_businame_n = $('#open_businame').val();
				std1 = 'Y';
			}

		// ที่อยู่
			if($('#open_busiloca').val().length==0){
				$('#a06').addClass('has-error');
				$('#amsg6').html('ที่อยู่ ต้องไม่เป็นค่าว่าง!');
				$('#open_busiloca').focus();
				std2 = 'N';
			}else{
				$('#a06').removeClass('has-error');
				$('#a06').addClass('has-success');
				$('#amsg6').html('');
				var open_busiloca_n = $('#open_busiloca').val();
				std2 = 'Y';
			}
		//เบอร์โทรศัพท์
		if($('#open_phone').val().length==0){
			$('#a14').addClass('has-error');
			$('#amsg14').html('เบอร์โทรศัพท์ ต้องไม่เป็นค่าว่าง!');
			$('#open_phone').focus();
			std3 = 'N';
		}else{
			$('#a14').removeClass('has-error');
			$('#a14').addClass('has-success');
			$('#amsg14').html('');
			var open_phone_n = $('#open_phone').val();
			std3 = 'Y';
		}

		//ชื่อ
			if($('#cus_name').val().length==0){
				$('#a40').addClass('has-error');
				$('#amsg40').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
				$('#cus_name').focus();
				std4 = 'N';
			}else{
				$('#a40').removeClass('has-error');
				$('#a40').addClass('has-success');
				$('#amsg40').html('');
				var cus_name_n = $('#cus_name').val();
				std4 = 'Y';
			}
		//นามสกุล
			if($('#cus_lname').val().length==0){
				$('#a41').addClass('has-error');
				$('#amsg41').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
				$('#cus_lname').focus();
				std5 = 'N';
			}else{
				$('#a41').removeClass('has-error');
				$('#a41').addClass('has-success');
				$('#amsg41').html('');
				var cus_lname_n = $('#cus_lname').val();
				std5 = 'Y';
			}

			//เลขบัตรประชาชน/เลขผู้เสียภาษี
			if($('#cus_idcard').val().length==0){
				$('#a47').addClass('has-error');
				$('#amsg47').html('เลขบัตรประชาชน/เลขผู้เสียภาษี ต้องไม่เป็นค่าว่าง!');
				$('#cus_idcard').focus();
				std6 = 'N';
			}else if ($('#cus_idcard').val().match(/^([0-9-]){13}$/)){
				$('#a47').removeClass('has-error');
				$('#a47').addClass('has-success');
				$('#amsg47').html('');
				var cus_idcard_n = $('#cus_idcard').val();
				std6 = 'Y';
			}else{
				$('#a47').addClass('has-error');
				$('#amsg47').html('ตัวเลข ความยาวระหว่าง 13 ตัวอักษร!');
				$('#cus_idcard').focus();
				std6 = 'N';
			}

			if($('#cus_phonecus').val().length==0){
				$('#a48').addClass('has-error');
				$('#amsg48').html('เบอร์โทรศัพท์ผู้ติดต่อ ต้องไม่เป็นค่าว่าง!');
				$('#cus_phonecus').focus();
				std7 = 'N';
			}else{
				$('#a48').removeClass('has-error');
				$('#a48').addClass('has-success');
				$('#amsg48').html('');
				var cus_phonecus = $('#cus_phonecus').val();
				std7 = 'Y';
			}

			if($('#cus_email').val().length==0){
				$('#a49').addClass('has-error');
				$('#amsg49').html('Email ต้องไม่เป็นค่าว่าง!');
				$('#cus_email').focus();
				std8 = 'N';
			}else if ($('#cus_email').val().match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]$/)){
				$('#a49').removeClass('has-error');
				$('#a49').addClass('has-success');
				$('#amsg49').html('');
				var cus_email = $('#cus_email').val();
				std8 = 'Y';
			}else{
				$('#a49').addClass('has-error');
				$('#amsg49').html('ต้องกรอกเป็น Email *admin@gmail.com*');
				$('#cus_email').focus();
				std8 = 'N';
			}




			var tit1 = $('#tit1').val();
			var name1 = $('#name1').val();
			var lname1 = $('#lname1').val();
			var idcard1 = $('#idcard1').val();
			var position1 = $('#position1').val();

			var tit2 = $('#tit2').val();
			var name2 = $('#name2').val();
			var lname2 = $('#lname2').val();
			var idcard2 = $('#idcard2').val();
			var position2 = $('#position2').val();

			var tit3 = $('#tit3').val();
			var name3 = $('#name3').val();
			var lname3 = $('#lname3').val();
			var idcard3 = $('#idcard3').val();
			var position3 = $('#position3').val();

			var consideration = $('#consideration').val();
			var sale_name_cus = $('#sale_name_cus').val();
			var sale_branch_cus = $('#sale_branch_cus').val();
	//-- end of chek data ----

	//--- add all data ------------
	if(std1=='Y' && std2=='Y' && std3=='Y' && std4=='Y' && std5=='Y' && std6=='Y' && std7=='Y' && std8=='Y' && std9=='Y' ){	//
		var data1 = "customer_code_n=" + customer_code_n + "&open_date_n=" + open_date_n + "&open_type_n=" + open_type_n + "&cus_face=" + cus_face + "&cus_line=" + cus_line;
		data1 = data1 + "&open_other_n=" + open_other_n + "&open_busiswine_n=" + open_busiswine_n + "&open_busiroad_n=" + open_busiroad_n + "&sale_branch_cus=" + sale_branch_cus;
		data1 = data1 + "&open_busialley_n=" + open_busialley_n + "&open_busiprovin_n="	+ open_busiprovin_n + "&open_busiamphur_n="	+ open_busiamphur_n;
		data1 = data1 + "&open_busidistrict_n=" + open_busidistrict_n + "&open_busizipcode_n=" + open_busizipcode_n + "&open_fax_n=" + open_fax_n + "&sale_name_cus=" + sale_name_cus;
		data1 = data1 + "&open_typeproject_n=" + open_typeproject_n + "&open_nameproject_n="	+ open_nameproject_n + "&open_locaproject_n="	+ open_locaproject_n;
		data1 = data1 + "&open_dateproject_n=" + open_dateproject_n + "&open_dateprostart_n=" + open_dateprostart_n + "&open_dateproend_n=" + open_dateproend_n;
		data1 = data1 + "&open_promon_n=" + open_promon_n + "&proget_start_n="	+ proget_start_n + "&project_type_n="	+ project_type_n + "&position3=" + position3;
		data1 = data1 + "&open_busidistrict_n=" + open_busidistrict_n + "&open_busizipcode_n=" + open_busizipcode_n +"&open_phone_n=" + open_phone_n + "&open_fax_n=" + open_fax_n;
		data1 = data1 + "&project_other_n=" + project_other_n + "&project_averagebuy_n="	+ project_averagebuy_n + "&project_buytotal_n="	+ project_buytotal_n;
		data1 = data1 + "&delivery_n=" + delivery_n + "&pay_type_n=" + pay_type_n + "&pay_other_n=" + pay_other_n + "&open_businame_n=" + open_businame_n;
		data1 = data1 + "&pay_deadline_n=" + pay_deadline_n + "&pay_locabill_n="	+ pay_locabill_n + "&billing_n="	+ billing_n + "&open_busiloca_n=" + open_busiloca_n;
		data1 = data1 + "&billing_other_n=" + billing_other_n + "&contacted_open_n=" + contacted_open_n + "&product_open_n=" + product_open_n + "&consideration=" + consideration;
		data1 = data1 + "&product_mon_n=" + product_mon_n + "&product_credit_n="	+ product_credit_n + "&bank_open_n="	+ bank_open_n + "&cus_email=" + cus_email;
		data1 = data1 + "&bankbran_open_n=" + bankbran_open_n + "&booknum_open_n=" + booknum_open_n + "&cus_tit_n=" + cus_tit_n + "&cus_phonecus=" + cus_phonecus;
		data1 = data1 + "&cus_name_n=" + cus_name_n + "&cus_lname_n="	+ cus_lname_n + "&cus_position_n="	+ cus_position_n + "&cus_idcard_n=" + cus_idcard_n;
		data1 = data1 + "&cus_department_n=" + cus_department_n + "&sale_name_n="	+ sale_name_n + "&sale_branch_n="	+ sale_branch_n + "&sale_comment_n="	+ sale_comment_n;
		data1 = data1 + "&tit1=" + tit1 + "&name1=" + name1 + "&lname1=" + lname1 + "&idcard1=" + idcard1 + "&position1=" + position1 + "&tit2=" + tit2 + "&name2=" + name2;
		data1 = data1 + "&lname2=" + lname2 + "&idcard2=" + idcard2 + "&position2=" + position2 + "&tit3=" + tit3 + "&name3=" + name3 + "&lname3=" + lname3 + "&idcard3=" + idcard3;

		$('#resulta1').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");

     	$.ajax({
         	url: "requester/opencd/process/chk_add_req.php",
         	dataType: "html",
         	type: 'POST', //I want a type as POST
         	data: data1,
         	success: function(data) {
						//alert(data);
				 if(data=="Y"){

					$.each(BootstrapDialog.dialogs, function(id, dialog){
                       dialog.close();
                    });
					/*Lobibox.notify('success', {
							title: "การประมวลผล",
							msg: 'บันทึกคำร้องขอวงเงินเครดิตเรียบร้อยแล้ว.'
					 });*/

					RefreshReques();
					BootstrapDialog.alert("บันทึกคำร้องขอวงเงินเครดิตเรียบร้อยแล้ว.");
				 }
        	},
        	error: function() {
						/*Lobibox.notify('error', {
	              title: "Error",
	              msg: "บันทึกคำร้องขอวงเงินเครดิตมีข้อผิดพลาด."
	           });*/
			   BootstrapDialog.alert("บันทึกคำร้องขอวงเงินเครดิตมีข้อผิดพลาด.");
        	}
		});
	}else{
		//alertBDialog2("ข้อมูลไม่ถูกต้อง","ตรวจสอบข้อมูลใหม่อีกครั้ง !");
	}
}

function AttFile(crd2id){
	//alert(crd2id);
	dlgAttfile = new BootstrapDialog({
    type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-files'></i></font> แนบไฟล์ เอกสารประกอบการขออนุมัติ ",
    	message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('requester/opencd/data/show_doc.php?&crd2id=' + crd2id),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
	dlgAttfile.open();
}



function addfile(id2,crd2id2,name2) {
	//alert(id2 + "," + crd2id2 + "," + name2);
	dlgaf = new BootstrapDialog({
    type: BootstrapDialog.TYPE_INFO,
	title: "<i class='ti-files'></i></font> อัพไฟล์ " + name,
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
	message: $('<div></div>').load('requester/opencd/data/upload_file.php?&idfile=' + id2 + '&crd2idfile=' + crd2id2),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
				//dlgAttfile.close();
				//AttFile(crd2id2);
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false
	});
	dlgaf.open();
}

function upattf(docid,crd2id) {

	if( document.getElementById("fileToUpload").files.length == 0 ){
			$('#fgup1').addClass('has-error');
			$('#smtup1').html('ยังไม่เลือกไฟล์ upload!');
			$('#fileToUpload').focus();
		}else{
			$('#fgup1').removeClass('has-error');
			$('#smtup1').html('');
			//alert(docid+" "+crd2id);

			$.ajax({
				url: "requester/opencd/process/chk_upload_file.php?docid=" + docid + "&crd2id=" + crd2id,
				type: "POST",
				data: new FormData($("#frm")[0]),
				processData: false,
				contentType:false
				}).done(function(data){
					//alert(data);
					str = data;
					res = str.split(",");
					if (res[0] == 1){
						/*Lobibox.notify('warning', {
								title: "อัพโหลดไฟล์",
								msg: 'ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ ใช่ไฟล์รูปภาพ.'
						 });*/
						BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ ใช่ไฟล์รูปภาพ.");
					}else if(res[0] == 2){
						/*Lobibox.notify('warning', {
								title: "อัพโหลดไฟล์",
								msg: 'ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
					}else if(res[0] == 3){
						/*Lobibox.notify('warning', {
								title: "อัพโหลดไฟล์",
								msg: 'ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดไม่เหมาะสม.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดไม่เหมาะสม.");
					}else if(res[0] == 4){
						/*Lobibox.notify('warning', {
								title: "อัพโหลดไฟล์",
								msg: 'ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด PDF เท่านั้น.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด PDF เท่านั้น.");
					}else if (res[0] == 5){
						/*Lobibox.notify('success', {
								title: "อัพโหลดไฟล์",
								msg: 'อัพโหลดไฟล์ เสร็จเรียบร้อย.'
						 });*/

						 $.each(BootstrapDialog.dialogs, function(id, dialog){
				              dialog.close();
				         });
						 document.getElementById("fileToUpload").value = "";
						 show_filepdf(docid,crd2id);
						 //dlgAttfile.close();
						 AttFile(crd2id);
						 BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
						  //dlgaf.close();


						 //dlgAttfile.open();

					}else {
						/*Lobibox.notify('warning', {
								title: "อัพโหลดไฟล์",
								msg: 'ไม่สามารถอัพโหลดไฟล์ได้.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้.");
					}
				}).fail(function(){
					/*Lobibox.notify('error', {
							title: "อัพโหลดไฟล์",
							msg: 'ไม่สามารถอัพโหลดไฟล์ได้.'
					 });*/
					 BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้.");
			});
		}
}


function showimgdoc(file_id,docname,doctypename){		//เปิดดูเอกสาร สำหรับ พนักงานขาย
	var myArray = ['success', 'info', 'warning'];
	var rand = Math.floor(Math.random() * myArray.length);
	//alert(myArray[rand]);
	var strdiv = "<div id='fpn" + file_id + "' class='panel panel-" + myArray[rand] + "'>";
	strdiv += "<div id='fpnh" + file_id + "' class='panel-heading'> <i class='ti-clipboard'></i><b> " + doctypename + " </b> </div>";
	strdiv += "<div class='panel-body'>";
	strdiv += "<div id='fapn" + file_id + "'>";
	strdiv += "<object id='fobj" + file_id + "'></object>";
	strdiv += "</div>";
	strdiv += "</div>";
	strdiv += "<div class='panel-footer' style='text-align:right;'>";
	strdiv += "</div>";
	strdiv += "</div>";
	if ( $( "#fpn" + file_id + "" ).length ) {
		//
	}else{

		$("#c1").append(strdiv);

	}
	$("#fpn" + file_id + "").lobiPanel({ //เพิ่มคุุณสมบัติให้ div เป็น lobipanel
		sortable: true,
		reload: false,
    	//close: false,
    	editTitle: false,
		unpin: false,
		//minimize: false,
		expand: false,
	});
		var w = 400;  //screen.width-230;
		var h = 450;  //screen.height-30;
		var left = (screen.width/2)-(w/2); //300;
		var top =  20;//(screen.height/2)-(h/2); // 0;


var	prvpanel = $("#fpn" + file_id + "").data('lobiPanel');
	prvpanel.unpin();
	prvpanel.setSize(w, h);
	prvpanel.setPosition(left, top);
	$("#fobj" + file_id + "").attr({
		data: "uploads/" + docname,
		type: "application/pdf",
		width:"350px",
		height: h-140
	});
}

function showimgdocapp(file_id,docname,doctypename){		//เปิดดูเอกสาร สำหรับ พนักงานขาย
	var myArray = ['success', 'info', 'warning'];
	var rand = Math.floor(Math.random() * myArray.length);
	//alert(myArray[rand]);
	var strdiv = "<div id='fpn" + file_id + "' class='panel panel-" + myArray[rand] + "'>";
	strdiv += "<div id='fpnh" + file_id + "' class='panel-heading'> <i class='ti-clipboard'></i><b> " + doctypename + " </b> </div>";
	strdiv += "<div class='panel-body'>";
	strdiv += "<div id='fapn" + file_id + "'>";
	strdiv += "<object id='fobj" + file_id + "'></object>";
	strdiv += "</div>";
	strdiv += "</div>";
	strdiv += "<div class='panel-footer' style='text-align:right;'>";
	strdiv += "</div>";
	strdiv += "</div>";
	if ( $( "#fpn" + file_id + "" ).length ) {
		//
	}else{

		$("#c1").append(strdiv);

	}
	$("#fpn" + file_id + "").lobiPanel({ //เพิ่มคุุณสมบัติให้ div เป็น lobipanel
		sortable: true,
		reload: false,
    	//close: false,
    editTitle: false,
		unpin: false,
		//minimize: false,
		expand: false,
	});
		var w = 680;  //screen.width-230;
		var h = 750;  //screen.height-30;
		var left = (screen.width/2)-(w/2); //300;
		var top =  20;//(screen.height/2)-(h/2); // 0;


var	prvpanel = $("#fpn" + file_id + "").data('lobiPanel');
	prvpanel.unpin();
	prvpanel.setSize(w, h);
	prvpanel.setPosition(left, top);
	$("#fobj" + file_id + "").attr({
		data: "uploads/" + docname,
		type: "application/pdf",
		width:"680px",
		height: h-140
	});
}


function resultreq(crd2id) {
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-check'></i></font> ผลการประเมิน / พิจารณา / อนุมัติ",
    	message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('requester/opencd/data/result.php?crd2id=' + crd2id),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}


function reqedit(reqid){
	BootstrapDialog.show({
	type: BootstrapDialog.TYPE_WARNING,
	size: BootstrapDialog.SIZE_WIDE,
	title: "<i class='ti-pencil-alt'></i></font> แก้ไขรายการขออนุมัติ",
	message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
	message: $('<div></div>').load('requester/opencd/data/from_editopen.php?reqid=' + reqid),
	draggable: true,
	closable: true,
	closeByBackdrop: false,
	closeByKeyboard: false,
	buttons: [{
		label: "<i class='glyphicon glyphicon-share'></i> Close",
		cssClass: 'btn-secondary',
		action: function(dialogItself){
			dialogItself.close();
		}
	},{
		label: "<i class='ti-save'></i>&nbsp; Save Change",
		cssClass: 'btn-warning',
		action: function(dialogItself){
			editopencd(reqid);
		}
	}],
	draggable: true,
	closable: true,
	closeByBackdrop: false,
	closeByKeyboard: false,
	});
}

function editopencd(reid){
//alert(reid);
	var std1,std2,std3,std4,std5,std6 = '';

	var customer_code_e = $('#customer_codeE').val();	//รหัสลูกค้า
	var open_date_e = $('#open_dateE').val();	//วันที่ขอเปิด
	var open_type_e = $('#open_typeE').val();	//ประเภทกิจการ
	var open_other_e = $('#open_otherE').val();	//กิจการอื่นๆ
	var open_busiswine_e = $('#open_busiswineE').val();	//หมู่ที่
	var open_busiroad_e = $('#open_busiroadE').val();	//ถนน
	var open_busialley_e = $('#open_busialleyE').val();	//ตรอก/ซอย
	var open_busiprovin_e = $('#open_busiprovinE').val();	//จังหวัด
	var open_busiamphur_e = $('#open_busiamphurE').val();	//อำเภอ
	var open_busidistrict_e = $('#open_busidistrictE').val();	//ตำบล
	var open_busizipcode_e = $('#open_busizipcodeE').val();	//รหัสไปรษณีย์
	var open_fax_e = $('#open_faxE').val();	//แฟกซ์

	var open_typeproject_e = '';		//วัตถุประสงค์การใช้งาน
	if($('#open_typeproject1E').is(':checked')){
		open_typeproject_e = $('#open_typeproject1E').val();
	}else if($('#open_typeproject2E').is(':checked')){
		open_typeproject_e = $('#open_typeproject2E').val();
		var open_nameproject_e = $('#open_nameprojectE').val();	//ชื่อโครงการ
		var open_locaproject_e = $('#open_locaprojectE').val();	//ที่ตั้ง
		var open_dateproject_e = $('#open_dateprojectE').val();	//ระยะเวลาสัญญา
		var open_dateprostart_e = $('#open_dateprostartE').val();	//วันที่เริ่ม
		var open_dateproend_e = $('#open_dateproendE').val();	//วันที่สิ้นสุด
		var open_promon_e = $('#open_promonE').val();	//มูลค่าโครงการ
		var proget_start_e = $('#proget_startE').val();	//เริ่มใช้สินค้า
		var project_type_e = $('#project_typeE').val();	//ประเภทงานก่อสร้าง
		var project_other_e = $('#project_otherE').val();	//ประเภทโครงการอื่นๆ
	}

	var project_averagebuy_e = $('#project_averagebuyE').val();	//ซื้อเฉลี่ย/เดือน
	var project_buytotal_e = $('#project_buytotalE').val();	//รวม/ปี

	var delivery_e = '';		//สถานที่ส่งสินค้า
	if($('#delivery1E').is(':checked')){
		delivery_e = $('#delivery1E').val();
	}else if($('#delivery2E').is(':checked')){
		delivery_e = $('#delivery2E').val();
	}

	var pay_type_e = $('#pay_typeE').val();	//การชำระเงิน
	var pay_other_e = $('#pay_otherE').val();	//การชำระค่าสินค้าทางอื่นๆ
	var pay_deadline_e = $('#pay_deadlineE').val();	//กำหนดชำระเงินเครดิต
	var pay_locabill_e = $('#pay_locabillE').val();	//สถานที่วางบิล

	var billing_e = '';		//ระเบียบการวางบิล
	if($('#billing1E').is(':checked')){
		billing_e = $('#billing1E').val();
	}else if($('#billing2E').is(':checked')){
		billing_e = $('#billing2E').val();
		var billing_other_e = $('#billing_otherE').val();	//เงื่อนไขอื่นๆ
	}

	var contacted_open_e = $('#contacted_openE').val();	//ร้านค้าที่เคยติดต่อ
	var product_open_e = $('#product_openE').val();	//สินค้า
	var product_mon_e = $('#product_monE').val();	//วงเงิน
	var product_credit_e = $('#product_creditE').val();	//เครดิต
	var bank_open_e = $('#bank_openE').val();	//ธนาคารที่ติดต่อ
	var bankbran_open_e = $('#bankbran_openE').val();	//สาขา
	var booknum_open_e = $('#booknum_openE').val();	//เลขที่บัญชี
	var cus_tit_e = $('#cus_titE').val();	//คำนำหน้า
	var cus_name_e = $('#cus_nameE').val();	//ชื่อ
	var cus_lname_e = $('#cus_lnameE').val();	//นามสกุล
	var cus_position_e = $('#cus_positionE').val();	//ตำแหน่ง
	var cus_department_e = $('#cus_departmentE').val();	//แผนก/ฝ่าย
	var sale_name_e = $('#sale_nameE').val();	//ชื่อพนักงานขาย
	var sale_branch_e = $('#sale_branchE').val();	//สาขา
	var sale_comment_e = $('#sale_commentE').val();	//คอมเม้น


	//-- ตรวจสอบข้อมูลก่อนส่งไป บันทึก return false; ---//
	// ชื่อกิจการ
			if($('#open_businameE').val().length==0){
				$('#a05').addClass('has-error');
				$('#amsg5').html('ชื่อกิจการ ต้องไม่เป็นค่าว่าง!');
				$('#open_businameE').focus();
				std1 = 'N';
			}else{
				$('#a05').removeClass('has-error');
				$('#a05').addClass('has-success');
				$('#amsg5').html('');
				var open_businame_e = $('#open_businameE').val();
				std1 = 'Y';
			}

		// ที่อยู่
			if($('#open_busilocaE').val().length==0){
				$('#a06').addClass('has-error');
				$('#amsg6').html('ที่อยู่ ต้องไม่เป็นค่าว่าง!');
				$('#open_busilocaE').focus();
				std2 = 'N';
			}else{
				$('#a06').removeClass('has-error');
				$('#a06').addClass('has-success');
				$('#amsg6').html('');
				var open_busiloca_e = $('#open_busilocaE').val();
				std2 = 'Y';
			}

		//เบอร์โทรศัพท์
		if($('#open_phoneE').val().length==0){
			$('#a14').addClass('has-error');
			$('#amsg14').html('เบอร์โทรศัพท์ ต้องไม่เป็นค่าว่าง!');
			$('#open_phoneE').focus();
			std3 = 'N';
		}else{
			$('#a14').removeClass('has-error');
			$('#a14').addClass('has-success');
			$('#amsg14').html('');
			var open_phone_e = $('#open_phoneE').val();
			std3 = 'Y';
		}
		//ชื่อ
			if($('#cus_nameE').val().length==0){
				$('#a40').addClass('has-error');
				$('#amsg40').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
				$('#cus_nameE').focus();
				std4 = 'N';
			}else{
				$('#a40').removeClass('has-error');
				$('#a40').addClass('has-success');
				$('#amsg40').html('');
				var cus_name_e = $('#cus_nameE').val();
				std4 = 'Y';
			}

		//นามสกุล
			if($('#cus_lnameE').val().length==0){
				$('#a41').addClass('has-error');
				$('#amsg41').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
				$('#cus_lnameE').focus();
				std5 = 'N';
			}else{
				$('#a41').removeClass('has-error');
				$('#a41').addClass('has-success');
				$('#amsg41').html('');
				var cus_lname_e = $('#cus_lnameE').val();
				std5 = 'Y';
			}

			//เลขบัตรประชาชน/เลขผู้เสียภาษี
			if($('#cus_idcardE').val().length==0){
				$('#a47').addClass('has-error');
				$('#amsg47').html('เลขบัตรประชาชน/เลขผู้เสียภาษี ต้องไม่เป็นค่าว่าง!');
				$('#cus_idcardE').focus();
				std6 = 'N';
			}else if ($('#cus_idcardE').val().match(/^([0-9]){13}$/)){
				$('#a47').removeClass('has-error');
				$('#a47').addClass('has-success');
				$('#amsg47').html('');
				var cus_idcard_e = $('#cus_idcardE').val();
				std6 = 'Y';
			}else{
				$('#a47').addClass('has-error');
				$('#amsg47').html('ตัวเลข ความยาวระหว่าง 13 ตัวอักษร!');
				$('#cus_idcardE').focus();
				std6 = 'N';
			}
			var cus_phonecus = $('#cus_phonecus').val();
			var cus_email = $('#cus_email').val();
			var cus_line = $('#cus_line').val();
			var cus_face = $('#cus_face').val();
			var tit1 = $('#tit1').val();
			var name1 = $('#name1').val();
			var lname1 = $('#lname1').val();
			var idcard1 = $('#idcard1').val();
			var position1 = $('#position1').val();
			var tit2 = $('#tit2').val();
			var name2 = $('#name2').val();
			var lname2 = $('#lname2').val();
			var idcard2 = $('#idcard2').val();
			var position2 = $('#position2').val();
			var tit3 = $('#tit3').val();
			var name3 = $('#name3').val();
			var lname3 = $('#lname3').val();
			var idcard3 = $('#idcard3').val();
			var position3 = $('#position3').val();

			var considerationE = $('#considerationE').val();
			var sale_name_cusE = $('#sale_name_cusE').val();
			var sale_branch_cusE = $('#sale_branch_cusE').val();


	//-- end of chek data ----
	//--- add all data ------------
	if(std1=='Y' && std2=='Y' && std3=='Y' && std4=='Y' && std5=='Y' && std6=='Y'){	//

		var data1 = "customer_code_e=" + customer_code_e + "&open_date_e=" + open_date_e + "&open_type_e=" + open_type_e + "&cus_line=" + cus_line;
		data1 = data1 + "&open_other_e=" + open_other_e + "&open_busiswine_e=" + open_busiswine_e + "&open_busiroad_e=" + open_busiroad_e + "&cus_face=" + cus_face;
		data1 = data1 + "&open_busialley_e=" + open_busialley_e + "&open_busiprovin_e="	+ open_busiprovin_e + "&open_busiamphur_e="	+ open_busiamphur_e;
		data1 = data1 + "&open_busidistrict_e=" + open_busidistrict_e + "&open_busizipcode_e=" + open_busizipcode_e + "&open_fax_e=" + open_fax_e;
		data1 = data1 + "&open_typeproject_e=" + open_typeproject_e + "&open_nameproject_e="	+ open_nameproject_e + "&open_locaproject_e="	+ open_locaproject_e;
		data1 = data1 + "&open_dateproject_e=" + open_dateproject_e + "&open_dateprostart_e=" + open_dateprostart_e + "&open_dateproend_e=" + open_dateproend_e;
		data1 = data1 + "&open_promon_e=" + open_promon_e + "&proget_start_e="	+ proget_start_e + "&project_type_e="	+ project_type_e;
		data1 = data1 + "&open_busidistrict_e=" + open_busidistrict_e + "&open_busizipcode_e=" + open_busizipcode_e +"&open_phone_e=" + open_phone_e + "&open_fax_e=" + open_fax_e;
		data1 = data1 + "&project_other_e=" + project_other_e + "&project_averagebuy_e="	+ project_averagebuy_e + "&project_buytotal_e="	+ project_buytotal_e;
		data1 = data1 + "&delivery_e=" + delivery_e + "&pay_type_e=" + pay_type_e + "&pay_other_e=" + pay_other_e + "&open_businame_e=" + open_businame_e;
		data1 = data1 + "&pay_deadline_e=" + pay_deadline_e + "&pay_locabill_e="	+ pay_locabill_e + "&billing_e="	+ billing_e + "&open_busiloca_e=" + open_busiloca_e;
		data1 = data1 + "&billing_other_e=" + billing_other_e + "&contacted_open_e=" + contacted_open_e + "&product_open_e=" + product_open_e;
		data1 = data1 + "&product_mon_e=" + product_mon_e + "&product_credit_e="	+ product_credit_e + "&bank_open_e="	+ bank_open_e + "&cus_email=" + cus_email;
		data1 = data1 + "&bankbran_open_e=" + bankbran_open_e + "&booknum_open_e=" + booknum_open_e + "&cus_tit_e=" + cus_tit_e + "&cus_phonecus=" + cus_phonecus;
		data1 = data1 + "&cus_name_e=" + cus_name_e + "&cus_lname_e="	+ cus_lname_e + "&cus_position_e="	+ cus_position_e + "&cus_idcard_e=" + cus_idcard_e;
		data1 = data1 + "&cus_department_e=" + cus_department_e + "&sale_name_e="	+ sale_name_e + "&sale_branch_e="	+ sale_branch_e + "&sale_comment_e="	+ sale_comment_e + "&reid=" + reid;
		data1 = data1 + "&tit1=" + tit1 + "&lname1=" + lname1 + "&name1=" + name1 + "&idcard1=" + idcard1 + "&position1=" + position1 + "&tit2=" + tit2 + "&name2=" + name2 + "&lname2=" + lname2;
		data1 = data1 + "&position2=" + position2 + "&idcard2=" + idcard2 + "&tit3=" + tit3 + "&name3=" + name3 + "&lname3=" + lname3 + "&idcard3=" + idcard3 + "&position3=" + position3;
		data1 = data1 + "&considerationE=" + considerationE + "&sale_name_cusE=" + sale_name_cusE + "&sale_branch_cusE=" + sale_branch_cusE;
//alert(data1);
		$('#resulta1').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...");

     	$.ajax({
         	url: "requester/opencd/process/chk_edit_req.php",
         	dataType: "html",
         	type: 'POST', //I want a type as POST
         	data: data1,
         	success: function(data) {
						//alert(data);
				 if(data=="Y"){

					$.each(BootstrapDialog.dialogs, function(id, dialog){
                       dialog.close();
                    });
					/*Lobibox.notify('success', {
							title: "การประมวลผล",
							msg: 'บันทึกคำร้องขอวงเงินเครดิตเรียบร้อยแล้ว.'
					 });*/

					RefreshReques();
					BootstrapDialog.alert("บันทึกคำร้องขอวงเงินเครดิตเรียบร้อยแล้ว.");
				 }
        	},
        	error: function() {
				/*Lobibox.notify('error', {
	              title: "Error",
	              msg: "บันทึกคำร้องขอวงเงินเครดิตมีข้อผิดพลาด."
	           });*/
			   BootstrapDialog.alert("บันทึกคำร้องขอวงเงินเครดิตมีข้อผิดพลาด.");
        	}
		});
	}else{
		//alertBDialog2("ข้อมูลไม่ถูกต้อง","ตรวจสอบข้อมูลใหม่อีกครั้ง !");
	}
}


function reqdel(udt1,udt4){
	 var data1 = "crd2iddel=" + udt1;

	 BootstrapDialog.show({
     	title: 'ยืนยันการลบข้อมูล.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการลบข้อมูล ลูกค้า : ' +  udt4 + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){

				$.ajax({
					url: "requester/opencd/process/chk_del_open.php",
					dataType: "html",
         			type: 'POST', //I want a type as POST
         			data: data1,
					success: function(data) {
						//alert(data);
				 		if(data=="Y"){

							dialogItself.close();
							/*Lobibox.notify('success', {
									title: "การประมวลผล",
									msg: 'ลบข้อมูลเรียบร้อยแล้ว.'
							 });*/

							RefreshReques();
							BootstrapDialog.alert("ลบข้อมูลเรียบร้อยแล้ว.");
						}else{
							//
						}
        			},
        			error: function() {
								/*Lobibox.notify('error', {
										title: "การประมวลผล",
										msg: "Error Can't Delete."
								 });*/
						BootstrapDialog.alert("Error Can't Delete.");
        			}
				});

			}
		}]
     });
}

function Appreq(reqid,business) {
	//alert(reqid);

	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: '<b><i class="ti-check"></i></font> ประเมิน / พิจารณา / อนุมัติ : </b>' + business,
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('approve/consider/data/consi1.php?reqid=' + reqid),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});

}

function OpenCus(reqid){
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-user'></i></font> ข้อมูลลูกค้าขอวงเงินเครดิต ",
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('requester/opencd/data/from_show.php?&reqid=' + reqid),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}

function openrating(reqid){
	//alert(reqid);
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
		size: BootstrapDialog.SIZE_WIDE,
		title: "<i class='ti-clipboard'></i></font> แบบประเมินความเสี่ยงของลูกค้า (Credit Rating) ",
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('approve/consider/data/assessment.php?&reqid=' + reqid),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}

function saverat(reqid,empid,apv,business){
	//alert('test' + ',' + reqid + ',' + ',' + empid + ',' + apv);
	var data1 = 'score1=' + Number($('#score1').val());
	data1 += '&score2=' + Number($('#score2').val());
	data1 += '&score3=' + Number($('#score3').val());
	data1 += '&score4=' + Number($('#score4').val());
	data1 += '&score5=' + Number($('#score5').val());
	data1 += '&score6=' + Number($('#score6').val());
	data1 += '&score7=' + Number($('#score7').val());
	data1 += '&score8=' + Number($('#score8').val());
	data1 += '&score9=' + Number($('#score9').val());
	data1 += '&score10=' + Number($('#score10').val());
	data1 += '&scoret1=' + Number($('#scoret1').val());
	data1 += '&scoret2=' + Number($('#scoret2').val());
	data1 += '&scoret3=' + Number($('#scoret3').val());
	data1 += '&scoret4=' + Number($('#scoret4').val());
	data1 += '&ratcom=' + $('#rating_comment').val();
	data1 += '&reqid=' + reqid;
	data1 += '&empid=' + empid;
	data1 += '&apv=' + apv;

	//alert(data1);

		$.ajax({
			url: "approve/consider/process/chk_add_assessment.php",
			dataType: "html",
					type: 'POST', //I want a type as POST
					data: data1,
			success: function(data) {
				//alert(data);
				if(data=="Y"){
					/*Lobibox.notify('success', {
							title: '<i class="ti-comment"></i> การประมวลผล',
							msg: 'บันทึกรายการเรียบร้อย.'
					 });*/

					 $.each(BootstrapDialog.dialogs, function(id, dialog){
                        dialog.close();
                     });
					Appreq(reqid,business);
					BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
				}else{
					/*Lobibox.notify('warning', {
							title: '<i class="ti-comment"></i> การประมวลผล',
							msg: 'ไม่สามารถบันทึกรายการได้.'
					 });*/
					 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้");
				}
					},
					error: function() {
						/*Lobibox.notify('error', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'ไม่สามารถส่งข้อมูลไปประมวลผลได้.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้");
					}
		});
}

function updaterat(reqid,empid,apv,cratid,business){
	//alert(apv);
	var data1 = 'score1=' + Number($('#score1').val());
	data1 += '&score2=' + Number($('#score2').val());
	data1 += '&score3=' + Number($('#score3').val());
	data1 += '&score4=' + Number($('#score4').val());
	data1 += '&score5=' + Number($('#score5').val());
	data1 += '&score6=' + Number($('#score6').val());
	data1 += '&score7=' + Number($('#score7').val());
	data1 += '&score8=' + Number($('#score8').val());
	data1 += '&score9=' + Number($('#score9').val());
	data1 += '&score10=' + Number($('#score10').val());
	data1 += '&scoret1=' + Number($('#scoret1').val());
	data1 += '&scoret2=' + Number($('#scoret2').val());
	data1 += '&scoret3=' + Number($('#scoret3').val());
	data1 += '&scoret4=' + Number($('#scoret4').val());
	data1 += '&ratcom=' + $('#rating_comment').val();
	data1 += '&reqid=' + reqid;
	data1 += '&empid=' + empid;
	data1 += '&apv=' + apv;
	data1 += '&cratid=' + cratid;
	//alert(data1);

	$.ajax({
		url: "approve/consider/process/chk_edit_assessment.php",
		data: data1,
		dataType: "html",
		type: 'POST', //I want a type as POST
		processData: false,                          // Using FormData, no need to process data.
		success: function(data) {
			//alert(data);
			if(data=="Y"){
				/*Lobibox.notify('success', {
						title: '<i class="ti-comment"></i> การประมวลผล',
						msg: 'บันทึกรายการเรียบร้อย.'
				 });*/

				 $.each(BootstrapDialog.dialogs, function(id, dialog){
											dialog.close();
									 });
				Appreq(reqid,business);
				BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
			}else{
				/*Lobibox.notify('warning', {
						title: '<i class="ti-comment"></i> การประมวลผล',
						msg: 'ไม่สามารถบันทึกรายการได้.'
				 });*/
				 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้.");
			}
				},
				error: function() {
					/*Lobibox.notify('error', {
							title: '<i class="ti-comment"></i> การประมวลผล',
							msg: 'ไม่สามารถส่งข้อมูลไปประมวลผลได้.'
					 });*/
					BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้");
				}
	});
}

function savecarl(reqid,empid,apv){
	//alert(reqid + ',' + empid + ',' + apv);

	var data1 = 'reqid=' + reqid;
	data1 += '&empid=' + empid;
	data1 += '&apv=' + apv;
	data1 += '&carel=' + $('#apv1_result').val();	//ผลการประเมิน
	data1 += '&carelcomment=' + $('#apv1_comment').val();
	//alert(data1);

	$.ajax({
		url: "approve/consider/process/chk_add_approve.php",
		data: data1,
		dataType: "html",
		type: 'POST', //I want a type as POST
		processData: false,                          // Using FormData, no need to process data.
		success: function(data) {
			//alert(data);

			if(data=="Y1"){


				$.each(BootstrapDialog.dialogs, function(id, dialog){
											dialog.close();
									 });
				RefreshConsi1();
				BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
			}else if(data=="Y2"){


				$.each(BootstrapDialog.dialogs, function(id, dialog){
					dialog.close();
				});
				RefreshConsi2();
				BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
			}else{

				 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้." + data );
			}
		},
			error: function() {
				BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้." + data);
		}
	});

}


function updatecarl(reqid,empid,apv,carlid){
	var d1 = $('#apv1_result').val();
	var d2 = $('#apv1_comment').val();
	var data1 = 'reqid=' + reqid;
	data1 += '&empid=' + empid;
	data1 += '&apv=' + apv;
	data1 += '&carel=' + d1;
	data1 += '&carelcomment=' + d2;
	data1 += '&carlid=' + carlid;
	//alert(data1);

	$.ajax({
		url: "approve/consider/process/chk_edit_approve.php",
		data: data1,
		dataType: "html",
		type: 'POST', //I want a type as POST
		processData: false,                          // Using FormData, no need to process data.
		success: function(data) {
			//alert(data);
			if(data=="Y1"){
				/*Lobibox.notify('success', {
						title: '<i class="ti-comment"></i> การประมวลผล',
						msg: 'บันทึกรายการเรียบร้อย.'
				 });*/

				$.each(BootstrapDialog.dialogs, function(id, dialog){
											dialog.close();
									 });
				RefreshConsi1();
				BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
			}else if(data=="Y2"){
				/*Lobibox.notify('success', {
						title: '<i class="ti-comment"></i> การประมวลผล',
						msg: 'บันทึกรายการเรียบร้อย.'
				 });*/

				$.each(BootstrapDialog.dialogs, function(id, dialog){
											dialog.close();
									 });
				RefreshConsi2();
				BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
			}else{
				/*Lobibox.notify('warning', {
						title: '<i class="ti-comment"></i> การประมวลผล',
						msg: 'ไม่สามารถบันทึกรายการได้.'
				 });*/
				 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้");
			}
				},
				error: function() {
					/*Lobibox.notify('error', {
							title: '<i class="ti-comment"></i> การประมวลผล',
							msg: 'ไม่สามารถส่งข้อมูลไปประมวลผลได้.'
					 });*/
					 BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้");
				}
			});
		}


		function Approveq(reqid,business) {
			//alert(reqid + ',' + business);
			BootstrapDialog.show({
		    type: BootstrapDialog.TYPE_INFO,
				size: BootstrapDialog.SIZE_WIDE,
				title: '<b><i class="ti-check"></i></font> ประเมิน / พิจารณา / อนุมัติ : </b>' + business,
		    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
				message: $('<div></div>').load('approve/approve/data/from_approve.php?&reqid=' + reqid),
				buttons: [{
					label: "<i class='glyphicon glyphicon-share'></i> Close",
					action: function(dialogItself){
						dialogItself.close();
					}
				}],
				draggable: true,
				closable: true,
				closeByBackdrop: false,
				closeByKeyboard: false,
			});
		}

		function savecarlappro(reqid,empid,apv){
			//alert(reqid+' , '+empid+' , '+apv);
			var data1 = 'reqid=' + reqid;
			data1 += '&empid=' + empid;
			data1 += '&apv=' + apv;
			data1 += '&carel=' + $('#apv3_result').val();
			data1 += '&carelcomment=' + $('#apv3_comment').val();
			data1 += '&apvamnt=' + $('#apv3_fnl_amnt2').val();
			data1 += '&apvday='	+ $('#apv3_fnl_day').val();
			data1 += '&apvother=' + $('#apv3_other').val();
			//alert(data1);

			$.ajax({
				url: "approve/approve/process/chk_add_approve.php",
				data: data1,
				dataType: "html",
				type: 'POST', //I want a type as POST
				processData: false,                          // Using FormData, no need to process data.
				success: function(data) {
					//alert(data);
					if(data=="Y1"){
						/*Lobibox.notify('success', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'บันทึกรายการเรียบร้อย.'
						 });*/

						$.each(BootstrapDialog.dialogs, function(id, dialog){
													dialog.close();
											 });
						RefreshAppro1();
						BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
					}else if(data=="Y2"){
						/*Lobibox.notify('success', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'บันทึกรายการเรียบร้อย.'
						 });*/

						$.each(BootstrapDialog.dialogs, function(id, dialog){
													dialog.close();
											 });
						RefreshAppro2();
						BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
					}else{
						/*Lobibox.notify('warning', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'ไม่สามารถบันทึกรายการได้.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้.");
					}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: '<i class="ti-comment"></i> การประมวลผล',
									msg: 'ไม่สามารถส่งข้อมูลไปประมวลผลได้.'
							 });*/
							 BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้");
						}
			});
		}

		function updatecarlappro(reqid,empid,apv,carlid) {
			var d1 = $('#apv3_result').val();
			var d2 = $('#apv3_comment').val();
			var data1 = 'reqid=' + reqid;
			data1 += '&empid=' + empid;
			data1 += '&apv=' + apv;
			data1 += '&carel=' + d1;
			data1 += '&carelcomment=' + d2;
			data1 += '&carlid=' + carlid;
			data1 += '&apvamnt=' + $('#apv3_fnl_amnt2').val();
			data1 += '&apvday='	+ $('#apv3_fnl_day').val();
			data1 += '&apvother=' + $('#apv3_other').val();
			//alert(data1);

			$.ajax({
				url: "approve/approve/process/chk_edit_approve.php",
				data: data1,
				dataType: "html",
				type: 'POST', //I want a type as POST
				processData: false,                          // Using FormData, no need to process data.
				success: function(data) {
					//alert(data);
					if(data=="Y1"){
						/*Lobibox.notify('success', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'บันทึกรายการเรียบร้อย.'
						 });*/

						$.each(BootstrapDialog.dialogs, function(id, dialog){
													dialog.close();
											 });
						RefreshAppro1();
						BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
					}else if(data=="Y2"){
						/*Lobibox.notify('success', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'บันทึกรายการเรียบร้อย.'
						 });*/

						$.each(BootstrapDialog.dialogs, function(id, dialog){
													dialog.close();
											 });
						RefreshAppro2();
						BootstrapDialog.alert("บันทึกรายการเรียบร้อย.");
					}else{
						/*Lobibox.notify('warning', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'ไม่สามารถบันทึกรายการได้.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถบันทึกรายการได้");
					}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: '<i class="ti-comment"></i> การประมวลผล',
									msg: 'ไม่สามารถส่งข้อมูลไปประมวลผลได้.'
							 });*/
							 BootstrapDialog.alert("ไม่สามารถส่งข้อมูลไปประมวลผลได้.");
						}
			});
		}

function backlist(cusid,cusname) {
	//alert(cusid+ ',' +cusname);
	var data1 = "cusid=" + cusid ;
	BootstrapDialog.show({
		title: 'ยืนยันการลบข้อมูล.',
	 	type: BootstrapDialog.TYPE_INFO,
		message: 'ต้องการตั้งแบล็คลิสต์ : ' + cusname + ' ไช่หรือไม่ ?',
	 	draggable: true,
	 	closable: false,
	 	closeByBackdrop: false,
		closeByKeyboard: false,
	 buttons: [{
		 label: "<i class='glyphicon glyphicon-floppy-remove'></i>&nbsp; No",
		 cssClass: 'btn-secondary',
		 hotkey: 13,
				 action: function(dialogItself){
						 dialogItself.close();
				 }
	 },{
		 label: "<i class='glyphicon glyphicon-floppy-saved'></i>&nbsp; Yes",
		 cssClass: 'btn-info',
		 //hotkey: 13, //enter
		 action: function(dialogItself){

			 $.ajax({
				 url: "customer/process/chk_add_backlist.php",
				 dataType: "html",
						 type: 'POST', //I want a type as POST
						 data: data1,
				 success: function(data) {
					 //alert(data);
					 if(data=="Y"){

						 dialogItself.close();
						 /*Lobibox.notify('success', {
								 title: "การประมวลผล",
								 img: 'images/lock.png',
								 msg: 'ตั้งแบล็คลิสต์ เรียบร้อยแล้ว.'
							});*/

						 RefreshCustomer();
						 BootstrapDialog.alert("ตั้งแบล็คลิสต์ เรียบร้อยแล้ว.");
					 }else{
						 //
					 }
						 },
						 error: function() {
							 /*Lobibox.notify('error', {
									 title: "การประมวลผล",
									 msg: "Error Can't Set Backlist Customer."
								});*/
							BootstrapDialog.alert("Error Can't Set Backlist Customer.");
						 }
			 });

		 }
	 }]
		});
}

function upbacklist(cusid,cusname) {
	//alert(cusid+ ',' +cusname);
	var data1 = "cusid=" + cusid ;
	BootstrapDialog.show({
		 title: 'ยืนยันการลบข้อมูล.',
	 type: BootstrapDialog.TYPE_INFO,
			 message: 'ต้องการปลดแบล็คลิสต์ : ' + cusname + ' ไช่หรือไม่ ?',
	 draggable: true,
	 closable: false,
	 closeByBackdrop: false,
			 closeByKeyboard: false,
	 buttons: [{
		 label: "<i class='glyphicon glyphicon-floppy-remove'></i>&nbsp; No",
		 cssClass: 'btn-secondary',
		 hotkey: 13,
				 action: function(dialogItself){
						 dialogItself.close();
				 }
	 },{
		 label: "<i class='glyphicon glyphicon-floppy-saved'></i>&nbsp; Yes",
		 cssClass: 'btn-info',
		 //hotkey: 13, //enter
		 action: function(dialogItself){

			 $.ajax({
				 url: "customer/process/chk_edit_backlist.php",
				 dataType: "html",
						 type: 'POST', //I want a type as POST
						 data: data1,
				 success: function(data) {
					 //alert(data);
					 if(data=="Y"){

						 dialogItself.close();
						 /*Lobibox.notify('success', {
								 title: "การประมวลผล",
								 img: 'images/unlock.png',
								 msg: 'ปลดแบล็คลิสต์ เรียบร้อยแล้ว.'
							});*/

						 RefreshCustomer();
						 BootstrapDialog.alert("ปลดแบล็คลิสต์ เรียบร้อยแล้ว.");
					 }else{
						 //
					 }
						 },
						 error: function() {
							 /*Lobibox.notify('error', {
									 title: "การประมวลผล",
									 msg: "Error Can't Set Backlist Customer."
								});*/
							BootstrapDialog.alert("Error Can't Set Backlist Customer.");
						 }
			 });

		 }
	 }]
		});
}

function cusedit(cusid) {
	//alert("edit" + ' , ' + cusid);

	var dialogInstance1 = new BootstrapDialog({
	type: BootstrapDialog.TYPE_WARNING,
	size: BootstrapDialog.SIZE_WIDE,
	title: "<i class='ti-pencil' id='edit'></i></font> แก้ไขข้อมูลลูกค้า",
	message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
	message: $('<div></div>').load("customer/data/from_edit_customer.php?cusid=" + cusid),
	draggable: true,
	closable: true,
	closeByBackdrop: false,
	closeByKeyboard: false,
	buttons: [{
		label: "<i class='glyphicon glyphicon-floppy-remove'></i> Close",
		cssClass: 'btn-secondary',
		//hotkey: 27, //esc
		action: function(dialogItself){
			dialogItself.close();
		}
	},{
		label: "<i class='glyphicon glyphicon-floppy-saved'></i>&nbsp; Save Change",
		cssClass: 'btn-warning',
		//hotkey: 13, //enter
		action: function(dialogItself){
			cuschkedit(cusid);
		}
	}]
});
dialogInstance1.open();
}

function cuschkedit(idcus) {
	//alert(idcus);

	var cus_numcodeE = $('#cus_numcodeE').val();
	var cus_titleE = $('#cus_titleE').val();
	var cus_firstnameE = $('#cus_firstnameE').val();
	var cus_lastnameE = $('#cus_lastnameE').val();
	var cus_idcardE = $('#cus_idcardE').val();
	var cus_phoneE = $('#cus_phoneE').val();
	var cus_greadE = $('#cus_greadE').val();

		var data1 = "cus_numcodeE=" + cus_numcodeE + "&cus_titleE=" + cus_titleE + "&cus_firstnameE=" + cus_firstnameE;
		data1 = data1 + "&cus_lastnameE=" + cus_lastnameE + "&cus_idcardE=" + cus_idcardE + "&cus_phoneE=" + cus_phoneE + "&cus_greadE=" + cus_greadE + "&idcus=" + idcus;
		//alert(data1);
		$('#cus1').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading...")

			$.ajax({
					url: "customer/process/chk_edit_cus.php",
					dataType: "html",
					type: 'POST', //I want a type as POST
					data: data1,
					success: function(data) {
						//alert(data);
				 if(data == "Y"){

					$.each(BootstrapDialog.dialogs, function(id, dialog){
											 dialog.close();
										});
					/*Lobibox.notify('success', {
							title: "การประมวลผล",
							msg: 'บันทึกข้อมูลลูกค้า : ' + cus_firstnameE + ' ' + cus_lastnameE + ' เรียบร้อยแล้ว.'
					 });*/

					RefreshCustomer();
					BootstrapDialog.alert("บันทึกข้อมูลลูกค้า : "+ cus_firstnameE + " " + cus_lastnameE + " เรียบร้อยแล้ว.");
				}else {
					/*
					Lobibox.notify('warning', {
							title: "ข้อมูลไม่ถูกต้อง",
							msg: "กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง !."
					 });*/
					 BootstrapDialog.alert("กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง !.");
				}
					},
		});
}

function addbrand() {
	var brand_name = $("#brand_name").val();
	var brand_names = $("#brand_names").val();
	var cons1 = $("#cons1").val();
	var data = "brand_name=" + brand_name + "&brand_names=" + brand_names + "&cons1=" + cons1;
	//alert(data);

	if(brand_name != ''){
	$.ajax({
		type: "POST",
		url: "admin/brand/process/chk_add_brand.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=="Y"){
				loadshowbrand();
				/*Lobibox.notify('success', {
						title: "การประมวลผล",
						msg: 'เพิ่มข้อมูลเรียบร้อยแล้ว.'
				 });*/
				 BootstrapDialog.alert("เพิ่มข้อมูลเรียบร้อยแล้ว.");
				 document.getElementById("brand_name").value = "";
				 document.getElementById("brand_names").value = "";
				 document.getElementById("cons1").value = 0;
			}else{
				/*Lobibox.notify('error', {
						title: "บันทึกไม่สำเร็จ",
						msg: 'เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่.'
				 });*/
				 BootstrapDialog.alert("เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่");
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});

	}else{
			/*Lobibox.notify('warning', {
					title: "บันทึกไม่สำเร็จ",
					msg: 'กรุณากรอกข้อมูลให้ครบถ้วน !.'
			 });*/
			 BootstrapDialog.alert("กรุณากรอกข้อมูลให้ครบถ้วน !.");
	}
}

function delbran(branid,branname){
	//alert(docid+" "+docname);
	BootstrapDialog.show({
     	title: '<i class="ti-eraser"></i> ยืนยันการลบข้อมูล.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการลบสาขา  ' + branname + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){
				var data1 = "branid=" + branid;
				//---ส่งข้อมูล ajax

				  $.ajax({
					  url: "admin/brand/process/chk_del_bran.php",
						dataType: "html",
						type: 'POST', //I want a type as POST
						data: data1,
						success: function(msg){
							//alert(msg);
							if(msg==0){
								loadshowbrand();

								dialogItself.close();
								/*Lobibox.notify('success', {
										title: '<i class="ti-comment"></i> การประมวลผล',
										msg: 'ลบสาขาเรียบร้อย.'
								 });*/
								BootstrapDialog.alert("ลบสาขาเรียบร้อย.");
							}else{
								/*Lobibox.notify('error', {
										title: '<i class="ti-comment"></i> การประมวลผล' ,
										msg: 'ไม่สามารถลบสาขาได้.'
								 });*/
								 BootstrapDialog.alert("ลบสาขาเรียบร้อย.");
							}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: "การประมวลผล",
									msg: "Error Can't Delete Document."
							 });*/
							 BootstrapDialog.alert("Error Can't Delete Document.");
						}
					});
			}
		}]
	});
}

function addgread() {
	var gread_name = $("#gread_name").val();
	var data = "gread_name=" + gread_name;
	//alert(data);
	if(gread_name != ''){
	$.ajax({
		type: "POST",
		url: "admin/gread/process/chk_add_gread.php",
		cache: false,
		data: data,
		success: function(msg){
			if(msg=="Y"){
				loadshowgread();
				/*Lobibox.notify('success', {
						title: "การประมวลผล",
						msg: 'เพิ่มข้อมูลเรียบร้อยแล้ว.'
				 });*/
				 BootstrapDialog.alert("เพิ่มข้อมูลเรียบร้อยแล้ว.");
				 document.getElementById("gread_name").value = "";
			}else{
				/*Lobibox.notify('error', {
						title: "บันทึกไม่สำเร็จ",
						msg: 'เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่.'
				 });*/
				 BootstrapDialog.alert("เกิดข้อผิดพลาดกรุณาเพิ่มข้อมูลใหม่");
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
			/*Lobibox.notify('warning', {
					title: "บันทึกไม่สำเร็จ",
					msg: 'กรุณากรอกข้อมูลให้ครบถ้วน !.'
			 });*/
			 BootstrapDialog.alert("กรุณากรอกข้อมูลให้ครบถ้วน !.");
	}
}

function delgread(greadid,greadname){
	//alert(docid+" "+docname);
	BootstrapDialog.show({
     	title: '<i class="ti-eraser"></i> ยืนยันการลบข้อมูล.',
		type: BootstrapDialog.TYPE_DANGER,
        message: 'คุณต้องการลบสาขา  ' + greadname + ' ไช่หรือไม่ ?',
		draggable: true,
		closable: false,
		closeByBackdrop: false,
        closeByKeyboard: false,
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> No",
			cssClass: 'btn-secondary',
			hotkey: 13,
        	action: function(dialogItself){
            	dialogItself.close();
        	}
		},{
			label: "<i class='ti-trash'></i>&nbsp; Yes",
			cssClass: 'btn-danger',
			//hotkey: 13, //enter
			action: function(dialogItself){
				var data1 = "greadid=" + greadid;
				//---ส่งข้อมูล ajax

				  $.ajax({
					  url: "admin/gread/process/chk_del_gread.php",
						dataType: "html",
						type: 'POST', //I want a type as POST
						data: data1,
						success: function(msg){
							//alert(msg);
							if(msg==0){
								loadshowgread();

								dialogItself.close();
								/*Lobibox.notify('success', {
										title: '<i class="ti-comment"></i> การประมวลผล',
										msg: 'ลบสาขาเรียบร้อย.'
								 });*/
								BootstrapDialog.alert("ลบสาขาเรียบร้อย.");
							}else{
								/*Lobibox.notify('error', {
										title: '<i class="ti-comment"></i> การประมวลผล' ,
										msg: 'ไม่สามารถลบสาขาได้.'
								 });*/
								BootstrapDialog.alert("ไม่สามารถลบสาขาได้");
							}
						},
						error: function() {
							/*Lobibox.notify('error', {
									title: "การประมวลผล",
									msg: "Error Can't Delete Document."
							 });*/
							 BootstrapDialog.alert("Error Can't Delete Document.");
						}
					});
			}
		}]
	});
}

function preview(crd2id) {
	//alert(crd2id);
	window.location.href = "pagepreview.php?crd2id=" + crd2id;
}

function addzipcode() {
	BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
		//size: BootstrapDialog.SIZE_WIDE,
		title: '<i class="ti-plus"></i></font> เพิ่มข้อมูลรหัสไปรษณีย์',
    message: $('<div></div>').html("<img src='images/load.gif' height='40' width='40' /> <br> Loading..."),
		message: $('<div></div>').load('zipcode/data/from_add_zipcode.php'),
		buttons: [{
			label: "<i class='glyphicon glyphicon-share'></i> Close",
			action: function(dialogItself){
				dialogItself.close();
			}
		}, {
			label: "<i class='ti-save'></i>&nbsp; Save Change",
			cssClass: 'btn-success',
			action: function(dialogItself){
				addzip();
			}
		}],
		draggable: true,
		closable: true,
		closeByBackdrop: false,
		closeByKeyboard: false,
	});
}

function addzip() {
	var provin = $("#provin").val();
	var amphur = $("#amphur").val();
	var district = $("#district").val();
	var zipcode = $("#zipcode").val();
	//alert(district);
	if (provin != '' && amphur != '' && district != '' && zipcode != '') {
		var data = "provin=" + provin + "&amphur=" + amphur + "&district=" + district + "&zipcode=" + zipcode;
			$.ajax({
				url: "zipcode/process/chk_add_zip_pro.php",
				dataType: "html",
				type: 'POST', //I want a type as POST
				data: data,
				success: function(msg){
					//alert(msg);
					if(msg== 'Y'){
						/*Lobibox.notify('success', {
								title: '<i class="ti-comment"></i> การประมวลผล',
								msg: 'เพิ่มรหัสไปรษณีย์เรียบร้อย.'
						 });*/

	 						$.each(BootstrapDialog.dialogs, function(id, dialog){
	 												 dialog.close();
	 											});
						 //add_opencd();
						 BootstrapDialog.alert("เพิ่มรหัสไปรษณีย์เรียบร้อย.");
					}else{
						/*Lobibox.notify('error', {
								title: '<i class="ti-comment"></i> การประมวลผล' ,
								msg: 'ไม่สามารถเพิ่มรหัสไปรษณีย์ได้.'
						 });*/
						 BootstrapDialog.alert("ไม่สามารถเพิ่มรหัสไปรษณีย์ได้");
					}
				}
		});
	}else {
		/*Lobibox.notify('error', {
				title: "การประมวลผล",
				msg: "กรุณากรอกข้อมูลให้ครบถ้วน."
		 });*/
		 BootstrapDialog.alert("กรุณากรอกข้อมูลให้ครบถ้วน.");
	}
}
