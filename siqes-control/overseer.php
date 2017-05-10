<?php
error_reporting(0);
include("../config/connection.php");
$obj = new Connection();
if($_SESSION['admin']['name']){

    echo "<script>window.location.href='dashboard.php'</script>";
}
if(isset($_REQUEST['Sign_in'])){
	$mail_id = $_POST['Email'];
	$password=mysql_real_escape_string($_REQUEST['Password']);
	$mdpassword= md5($password);
	//echo $pass; 
	$query = mysql_query("select * from  sqs_admin_user where email_id='".$mail_id."' and password='".$mdpassword."'");
    $erroMSG='';
	if(mysql_num_rows($query)>0){
		$result = mysql_fetch_array($query);
        $usersession=array();
        $usersession['id']=$result['id'];				
        $usersession['name']=$result['name'];
        $usersession['email_id']=$result['email_id'];
        $_SESSION['admin']=$usersession;
		echo "<script>window.location='dashboard.php'</script>";
	}else{
		$erroMSG = " Invalid login details";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>SIQES</title>
     <?php  include("scripting-admin.php"); ?>
	 <script>
	function valid_login(){
   
		if(document.acdlogin.Email.value == '')
		{
            $("#errorClass").html("Please enter email id");
			document.acdlogin.Email.focus();
			return false;
		}
		if(document.acdlogin.Email.value != '')
		{
			if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.acdlogin.Email.value)))
			{
                 $("#errorClass").html("Invalid email id. Please enter valid email id");
				document.acdlogin.Email.focus();
				return false;
			}
			if(document.acdlogin.Email.value.length > 45)
			{
                 $("#errorClass").html("Your email id is too long. It should not be greater than 45 characters");
				document.acdlogin.Email.focus();
				return false;
			}
		}
		if(document.acdlogin.inputPassword.value == '')
		{
             $("#errorClass").html("Please enter password");
			document.acdlogin.inputPassword.focus();
			return false;
		}
	
	}
	</script>
</head>
<body class="loginbg">
    <div class="loginBox">
        <div class="bLogo"></div>
        <div class="loginForm">
             <div  id="errorClass" style="background-color: #FFEBE8; color:#FF0000;font-size:14px; text-align:center;line-height:30px"><?php if($erroMSG!=''){ echo $erroMSG; } ?></div>
            <form name="acdlogin" class="form-horizontal" action="overseer.php" method="POST" onsubmit="return valid_login();">
				
                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><span class="icon-envelope"></span></span>
                        <input style="margin-top:0;" type="text" id="inputEmail" name="Email" placeholder="User Email" maxlength="45"/>
                    </div>                
                </div>
                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><span class="icon-lock"></span></span>
                        <input style="margin-top:0;" type="password" id="inputPassword"  name="Password" placeholder="Password" maxlength="15"/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span8">
                        <div class="control-group" style="margin-top: 5px;">
                            <!--<label class="checkbox"><input type="checkbox"> Remember me</label> -->                                               
                        </div>                    
                    </div>
                    <div class="span4">
                       <input type="submit" class="btn btn-block" name="Sign_in" value="Sign in"/>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
