<?  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script>
$(document).ready(function(){

    //check userName
    $('#userName').blur(function() {
      if($('#userName').val().length==0){
        $('#fg1').addClass('has-error');
        $('#smt1').html('กรุณากรอก Username !');
        $('#userName').focus();
      }else{
        $('#fg1').removeClass('has-error');
        $('#fg1').addClass('has-success');
        $('#smt1').html('');
      }
    });

    //userPassword
    $('#userPassword').blur(function() {
      if($('#userPassword').val().length==0){
        $('#fg2').addClass('has-error');
        $('#smt2').html('กรุณากรอก Password !');
        $('#userPassword').focus();
      }else{
        $('#fg2').removeClass('has-error');
        $('#fg2').addClass('has-success');
        $('#smt2').html('');
      }
    });
  });
</script>
</head>

<body>
   <div class="content">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-offset-4 col-md-3">
                    	<div class="card">
                        	<div class="header">
                                <h4 class="title"><font color="#0099FF"><i class="ti-unlock"></i> Login</font></h4>
                            </div>
                            <div class="content">
                            	<div class="row">
                            		<div class="col-md-12">
                                    	<div id="fg1" class="form-group">
                                        	<label><font color="#757575"><i class="ti-user"></i> Username </font></label>
                                            <input type="text" id="userName" class="form-control border-input" placeholder="Username" onKeyUp="checkKey(this.id);">
                                            <small id="smt1" class="form-text text-muted" style="color:#F30;"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                            		<div class="col-md-12">
                                    	<div id="fg2" class="form-group">
                                        	<label><font color="#757575"><i class="ti-key"></i> Password</font></label>
                                            <input type="password" id="userPassword" class="form-control border-input" placeholder="Password" onKeyUp="checkKey(this.id);">
                                            <small id="smt2" class="form-text text-muted" style="color:#F30;"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                	<button type="submit" onClick="javascript:AdminAddUserWS();submitlogin();" class="btn btn-info btn-fill btn-wd" id="btnlogin"><i class="glyphicon glyphicon-log-in"></i>&nbsp; Sign in </button>
                                </div>

                                 <div id="resultlogin" style="font-size:12px; color:#F00; padding-top:10px; text-align:center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
