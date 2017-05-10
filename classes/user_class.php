<?php
require_once('config/connection.php');
require_once('email.class.php');


class User extends Connection{
	function __construct(){
	   $this->createConnection();
	}
	function userSignIn(){
		 if(isset($_REQUEST['username'],$_REQUEST['password']) and !empty($_REQUEST['username']) and !empty($_REQUEST['password']))
		{
			$username=mysql_real_escape_string($_REQUEST['username']);
			$password=mysql_real_escape_string($_REQUEST['password']);
			$mdpassword= md5($password);
			//$check_email = filter_var($username, FILTER_VALIDATE_EMAIL);
			//if($check_email)
			//{	
				//echo "SELECT * FROM tp_users WHERE (corporate_email='".$username."' OR user_name='".$username."' OR (alternate_email='".$username."' AND alter_mail_varify=1)) AND password='".$mdpassword."' AND status = '1' AND is_active = '1'"; exit;
				$signInQuery=mysql_query("SELECT * FROM tp_users WHERE (corporate_email='".$username."' OR user_name='".$username."' OR (alternate_email='".$username."' AND alter_mail_varify=1)) AND password='".$mdpassword."' AND status = '1' AND is_active = '1'") or die(mysql_error());
			//}
			if($signInQuery){
				if(mysql_num_rows($signInQuery)){
					$signInResult=mysql_fetch_object($signInQuery);
					if($signInResult->status == 1){
						$_SESSION['id'] = $signInResult->id;
						$_SESSION['corporate_email'] = $signInResult->corporate_email;
						$_SESSION['name'] = $signInResult->name;
						return 1;
					}else if($signInResult->status == 0){
						return 2;
					}
				}
				else 
				{
					return 3;
				}
			}
			else{
				return 0;
			}
		}
		else{
			return 4; // required parameter missing
		}
	}
	
//*********************SIGN UP USER*************************//

	function SignUpUser(){
       if(isset($_REQUEST['name'],$_REQUEST['user_name'],$_REQUEST['corp_email']) and !empty($_REQUEST['name']) and !empty($_REQUEST['corp_email']) and !empty($_REQUEST['user_name'])){ 
		
			$name=mysql_real_escape_string($_REQUEST['name']);
			$userName=mysql_real_escape_string($_REQUEST['user_name']);
			$corpEmail=$_REQUEST['corp_email'];
			$altEmail=$_REQUEST['email_id'];
			$password=$_REQUEST['password'];
			$mdpassword= md5($password);
			$contact_number=$_REQUEST['contact'];
			$stateId=$_REQUEST['state_id'];
			$cityId=$_REQUEST['city_id'];
			$company=$_REQUEST['company_name'];
			//echo $company; exit;
			//$address1=mysql_real_escape_string($_REQUEST['address1']);
			//$address2=mysql_real_escape_string($_REQUEST['address2']);
			$pincode=$_REQUEST['pin_code'];
			$verify_code = mt_rand();
			
			$domain=array();
			$queryDomain = mysql_query("select domain from tp_company_domain where company_id='".$company."'") or die(mysql_error());
			while($resultdomain = mysql_fetch_array($queryDomain)){
				//$subdomain = strrchr($resultdomain['domain'], "www.");
				//$restdomain = substr($subdomain,2);
				//$domain[] = $restdomain;
				$domain[] = $resultdomain['domain'];
				
				//print_r($resultdomain);
				
			}	
			/* echo "<pre>";
			 print_r($domain);
			echo "</pre>";*/
			
			$subcorpmail = strrchr($corpEmail, "@"); 
			$restcorpmail = substr($subcorpmail, 1);
			if(in_array($restcorpmail, $domain)){
				//echo "Match found";
				$chkUser=mysql_query("select corporate_email from tp_users where corporate_email='".$corpEmail."'") or die(mysql_error());
				$num1=mysql_num_rows($chkUser);
				if($num1>0){
					return 2;
				}
				$chkUser1=mysql_query("select user_name from tp_users where user_name='".$userName."'")or die(mysql_error());
				$num2=mysql_num_rows($chkUser1);
				if($num2>0){
					return 3;
				}
				$chkUser2=mysql_query("select alternate_email from tp_users where alternate_email='".$altEmail."'")or die(mysql_error());
				$num3=mysql_num_rows($chkUser1);
				if($num3>0){
					return 4;
				}
				
				$contact_code = mt_rand(1000,9999);
				$alter_mail_code = mt_rand();
					
				$sql="insert into tp_users set name='".$name."', user_name='".$userName."', corporate_email='".$corpEmail."',alternate_email='".$altEmail."',company_id='".$company."',password='".$mdpassword."',contact_number='".$contact_number."',country_id='1',state_id='".$stateId."',city_id='".$cityId."',pincode='".$pincode."',status='0',is_active='0',verify_code ='".$verify_code."',alter_mail_varify='0', alter_mail_code='".$alter_mail_code."', contact_verify='0',contact_code='".$contact_code."' , created_on='".date('Y-m-d::H:i:s')."'"; 
				$signupResult = mysql_query($sql);
				$user_id=mysql_insert_id();
				
				//####################SEND MAIL TO COOPERATE MAIL ID FOR ACCOUNT ACTIVATION######################################
				$objEmail = new Email();
				$objEmail->mailaccount='avdhesh007';
				$objEmail->to=$corpEmail;
				$objEmail->toname=$name;              
				$objEmail->from=Email_FROM;
				$objEmail->fromname=Email_FROMNAME;
				if(ADDCC!=""){
					$objEmail->bcc=Email_BCC;
				}
				$objEmail->subject = 'Activate your account with us.';
					$objEmail->body.="<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
					<tr>
						<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
							<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px;'>
								<tr>
									<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									</th>
								</tr>
								<tr>
									<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									<img src='".SITEURL."images/images/logo.png' alt='Trust Portal' height='75' width='75'/>
									</th>
								</tr>
								<tr>
									<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
										Dear ".$name.",<br/><br/>
										We are really excited to have you be a part of Trustportal.com!<br/><br/>
										Click below to verify your email now and activate your account: <br/><br/>
										 <a style='background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;' href='".SITEURL."ajax/user.php?action=verifySignUp&email=".md5($corpEmail)."&code=".md5($verify_code)." '>Activate Your Account</a><br/><br/>
										    or <br/><br/>
											Copy the following link and paste in your browser: <br/><br/>
											 ".SITEURL."ajax/user.php?action=verifySignUp&email=".md5($corpEmail)."&code=".md5($verify_code)."<br/><br/>
											Looking forward to connecting with you very soon.<br/><br/>
									</td>
								</tr>
								<tr>
									<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
										Warm Regards,<br/>
										Trust Portal<br/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					</table>	
					";
					$email_response = $objEmail->sendemail();
					
					//####################SEND MAIL TO PERSONAL MAIL ID FOR ACCOUNT ACTIVATION######################################
					
					$objEmail1 = new Email();
					$objEmail1->mailaccount='avdhesh007';
					$objEmail1->to=$altEmail;
					$objEmail1->toname=$name;              
					$objEmail1->from=Email_FROM;
					$objEmail1->fromname=Email_FROMNAME;
					if(ADDCC!=""){
						$objEmail1->bcc=Email_BCC;
					}
					$objEmail1->subject = 'Verify your personal email';
					$objEmail1->body.="<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
					<tr>
						<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
							<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px;'>
								<tr>
									<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									</th>
								</tr>
								<tr>
									<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									<img src='".SITEURL."images/images/logo.png' alt='Trust Portal' height='75' width='75'/>
									</th>
								</tr>
								<tr>
									<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
										Dear ".$name.",<br/><br/>
										We are really excited to have you be a part of Trustportal.com!<br/><br/>
										Click below to verify your personal email: <br/><br/>
										 <a style='background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;' href='".SITEURL."ajax/user.php?action=verifyEmail&email=".md5($altEmail)."&code=".md5($alter_mail_code)." '>Verify personal email</a><br/><br/>
										     or   <br/><br/>
											 Copy the following link and paste in your browser: <br/><br/>
											 ".SITEURL."ajax/user.php?action=verifySignUp&email=".md5($corpEmail)."&code=".md5($verify_code)."<br/><br/>
											Verification of personal email and mobile number will help you in future to retrieve your account password.<br/><br/>
											Looking forward to connecting with you very soon.<br/><br/>
										   
									</td>
								</tr>
								<tr>
									<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
										Warm Regards,<br/>
										Trust Portal<br/>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					</table>	
					";
					$email_response1 = $objEmail1->sendemail();
					
					##########################FOR SEND SMS FOR VERIFY NUMBER#################################
						$sms = new SMS();
						$sms->message="Please enter this code $contact_code"."\n"." for mobile number verification in My Account on Trust Portal";
						$sms->CLI="TRUPTL";
						$sms->mobile=$contact_number;
						$sms->accountName="vibescom";	
						$sms_response = $sms->sendsms();
					//print_r($objEmail); die;
				if($signupResult==true){ 
					return 1; 
				}else{
					 return 0; 
				}
			}else{
				return 9;
			}
		}else{
            return 5;  
        }
	}

/*********************************EDIT PROFILE**************/
	function EditProfile(){
       if(isset($_REQUEST['name'],$_REQUEST['user_name'],$_REQUEST['corp_email']) and !empty($_REQUEST['name']) and !empty($_REQUEST['corp_email']) and !empty($_REQUEST['user_name'])){ 
			
			$name=mysql_real_escape_string($_REQUEST['name']);
			$userId=mysql_real_escape_string($_REQUEST['user_id']);
			$userName=mysql_real_escape_string($_REQUEST['user_name']);
			$corpEmail=$_REQUEST['corp_email'];
			$altEmail=$_REQUEST['alt_email'];
			//$password=$_REQUEST['password'];
			$contact=$_REQUEST['contact'];
			//$countryId=$_REQUEST['country_id'];
			$stateId=$_REQUEST['state_id'];
			$cityId=$_REQUEST['city_id'];
			$company=$_REQUEST['company_name'];
			$address1=mysql_real_escape_string($_REQUEST['address1']);
			$address2=mysql_real_escape_string($_REQUEST['address2']);
			$pincode=$_REQUEST['pin_code'];
			
			$domain=array();
			$queryDomain = mysql_query("select domain from tp_company_domain where company_id='".$company."'") or die(mysql_error());
			while($resultdomain = mysql_fetch_array($queryDomain)){
				$domain[] = $resultdomain['domain'];
				
			}	
			$subcorpmail = strrchr($corpEmail, "@"); 
			$restcorpmail = substr($subcorpmail, 1);
			if(in_array($restcorpmail, $domain)){
				//echo "Match found";
				$chkUser=mysql_query("select corporate_email from tp_users where id!='".$userId."' and corporate_email='".$corpEmail."'") or die(mysql_error());
				$num1=mysql_num_rows($chkUser);
				if($num1>0){
					return 2; exit;
				}
				$chkUser1=mysql_query("select user_name from tp_users where id!='".$userId."' and user_name='".$userName."'")or die(mysql_error());
				$num2=mysql_num_rows($chkUser1);
				if($num2>0){
					return 3; exit;
				}
				$chkUser2=mysql_query("select alternate_email from tp_users where id!='".$userId."' and alternate_email='".$altEmail."'")or die(mysql_error());
				$num3=mysql_num_rows($chkUser1);
				if($num3>0){
					return 4; exit;
				} 
			$sqluser=mysql_query("SELECT contact_number, contact_code FROM tp_users where id='".$userId."'");
			$userData=mysql_fetch_assoc($sqluser);
			$contact_number=$userData['contact_number'];
			$contact_code =$userData['contact_code'];
			if($contact_number != $contact){
			
				if($contact_code == ''){
					$contact_code = mt_rand(1000,9999);
					$queryMobile = mysql_query("update tp_users set contact_code='".$contact_code."' where id='".$userId."'") or die(mysql_error());
				}
				$sms = new SMS();
				$sms->message="Please enter this code $contact_code"."\n"." for verification of your mobile number on Trust Portal";
				$sms->CLI="TRUPTL";
				$sms->mobile=$contact;
				$sms->accountName="vibescom";	
				$sms_response = $sms->sendsms();
				$sql="update tp_users set name='".$name."',user_name='".$userName."',corporate_email='".$corpEmail."',alternate_email='".$altEmail."',company_id='".$company."',contact_number='".$contact."', contact_verify=0, country_id='1',state_id='".$stateId."',city_id='".$cityId."',address_line1='".$address1."',address_line2='".$address2."',pincode='".$pincode."',status='1',updated_on='".date('Y-m-d::H:i:s')."' where id='".$userId."'"; 
			
			}else{
				
				$sql="update tp_users set name='".$name."',user_name='".$userName."',corporate_email='".$corpEmail."',alternate_email='".$altEmail."',company_id='".$company."',contact_number='".$contact."',country_id='1',state_id='".$stateId."',city_id='".$cityId."',address_line1='".$address1."',address_line2='".$address2."',pincode='".$pincode."',status='1',updated_on='".date('Y-m-d::H:i:s')."' where id='".$userId."'"; 
			
			}
				$result = mysql_query($sql);
				if($result==true){
                return 5; 
				
            }else{
                 return 1; 
            }
	    }else{
            return 9;  
        }
	}else {
		return 0;
	}
}
//*******************CHANGED PASSWORD***********************//
 function changedPassword(){
	 if(isset($_REQUEST['oldpassword'],$_REQUEST['newpassword'],$_REQUEST['cpassword']) and !empty($_REQUEST['oldpassword']) and ! empty($_REQUEST['newpassword']) and !empty($_REQUEST['cpassword']))
	 { 
		$userId=$_REQUEST['user_id'];
		$oldPassword = $_REQUEST['oldpassword'];
		$mdoldPassword = md5($oldPassword);
		$newPassword = $_REQUEST['newpassword'];
		$mdnewPassword = md5($newPassword);
		$confirmPassword = $_REQUEST['cpassword'];
		$mdconfirmPassword = md5($confirmPassword);
		$query = mysql_query("select * from tp_users where  password='".$mdoldPassword."'  and status='1' and id='".$userId."'") or die(mysql_error());
		$res = mysql_fetch_assoc($query);	
		if(!empty($res)){
			if(($mdnewPassword==$mdconfirmPassword) and ($mdnewPassword!=$mdoldPassword))
			{
			$sql="update tp_users set password='".$mdnewPassword."', updated_on='".date('Y-m-d::H:i:s')."' where id='".$userId."'"; 
			$result = mysql_query($sql);
			}
				
				if($result==true){
                return 5; 
				
            }
			else
			{
                 return 1; 
            }
		}
		else{
            return 2;  
        }
	    }
		else{
            return 0;  
        }
	 
 }

//*******************COUNTRY LIST***************************/

	function getcountryList($selected=""){
				$listCountries=""; 
				$countries_array =array();
				$countries = mysql_query("select * from  tp_countries") or die(mysql_error());
				while ($countries_values = mysql_fetch_array($countries)) {
					$countries_array[$countries_values['country_id']] = $countries_values['country_name'];
				}
				foreach($countries_array as $key => $value){
					$listCountries.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCountries;
			}
			
//*******************STATE LIST***************************/

	function getstateList($selected=""){
				$listStates=""; 
				$states_array =array();
				$states = mysql_query("select * from  tp_states order by state_name ASC") or die(mysql_error());
				while ($states_values = mysql_fetch_array($states)) {
					$states_array[$states_values['state_id']] = $states_values['state_name'];
				}
				foreach($states_array as $key => $value){
					$listStates.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listStates;
			}
			
//*******************CITY LIST*******************************/

	function getcityList($selected=""){
				$listCities=""; 
				$cities_array =array();
				$cities = mysql_query("select * from  tp_cities ORDER BY city_name") or die(mysql_error());
				while ($cities_values = mysql_fetch_array($cities)) {
					$cities_array[$cities_values['city_id']] = $cities_values['city_name'];
				}
				foreach($cities_array as $key => $value){
					$listCities.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCities;
			}
	function getStateCityList($state_id , $selected=""){
				$listCities=""; 
				$cities_array =array();
				$cities = mysql_query("select * from  tp_cities where state_id='".$state_id."' ORDER BY city_name") or die(mysql_error());
				while ($cities_values = mysql_fetch_array($cities)) {
					$cities_array[$cities_values['city_id']] = $cities_values['city_name'];
				}
				foreach($cities_array as $key => $value){
					$listCities.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCities;
			}
		function getProductCityList($selected=""){
				$listCities=""; 
				$cities_array =array();
				$cities = mysql_query("select * from  tp_cities WHERE city_id IN(select city_id FROM tp_product WHERE is_approved=1 AND status=1) ORDER BY city_name") or die(mysql_error());
				while ($cities_values = mysql_fetch_array($cities)) {
					$cities_array[$cities_values['city_id']] = $cities_values['city_name'];
				}
				foreach($cities_array as $key => $value){
					$listCities.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCities;
			}
//*********************** GETEGORY LIST *********************/
	function getcatList($selected=""){
				$listCat=""; 
				$cat_array =array();
				if($_SESSION['id']=='37') {
				$cat = mysql_query("SELECT * FROM tp_category where cat_id='21' and status=1 order  BY cat_name ASC") or die(mysql_error());
				}
				else{
					
				$cat = mysql_query("SELECT * FROM tp_category where cat_id!='21' and status='1' order  BY cat_name ASC") or die(mysql_error());	
				}
				//$cat = mysql_query("SELECT * FROM tp_category where cat_id='20' and status=1 order  BY cat_name ASC") or die(mysql_error());
				while ($cat_values = mysql_fetch_array($cat)) {
					$cat_array[$cat_values['cat_id']] = $cat_values['cat_name'];
				}
				foreach($cat_array as $key => $value){
					$listCat.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCat;
			}
			
//*********************** SELLER LIST *********************/
	function getsellerList($selected=""){
				$listCust=""; 
				$cust_array =array();
				$cust = mysql_query("SELECT id,name,user_name FROM tp_users where status='1'") or die(mysql_error());
				while ($cust_values = mysql_fetch_array($cust)) {
					$cust_array[$cust_values['id']] = $cust_values['name'];
				}
				foreach($cust_array as $key => $value){
					$listCust.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCust;
			}
	
	//*********************** COMPANY LIST *********************/
	function getcmpList($selected=""){
				$listCmp=""; 
				$cmp_array =array();
				$cmp = mysql_query("SELECT * FROM tp_company where status='1'") or die(mysql_error());
				while ($cmp_values = mysql_fetch_array($cmp)) {
					$cmp_array[$cmp_values['id']] = $cmp_values['company_name'];
				}
				foreach($cmp_array as $key => $value){
					$listCmp.="<option value=\"".$key."\"".((strtolower($selected) == strtolower($key)) ? " selected=\"selected\"" : "").">".$value."</option>";
				}
				return $listCmp;
			}
	
	function Is_email($username)
	{ 
		//If the username input string is an e-mail, return true 
		if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
	//********************* ADD PRODUCT PRODUCT**********************************/
	function addProduct(){
		//echo "okk"; exit;
       if(isset($_REQUEST['userId'],$_REQUEST['cat_id'],$_REQUEST['product_name']) and !empty($_REQUEST['userId']) and !empty($_REQUEST['cat_id']) and !empty($_REQUEST['product_name'])){ 
			$userId=$_REQUEST['userId'];
			$catId=$_REQUEST['cat_id'];
			$pName=$_REQUEST['product_name'];
			$cityId=$_REQUEST['city_id'];
			$pLocation=$_REQUEST['product_location'];
			$price=$_REQUEST['estimate_price'];
			$description=mysql_real_escape_string($_REQUEST['description']);
			$age=$_REQUEST['product_age'];
			$packing=$_REQUEST['packing'];
			$productSeoName=$_REQUEST['product_seo_name'];
			
			$prod_imagequery1 ='';
            $dir_name = "doc/product";
            if($_FILES["image1"]["name"]!=''){
             
                $fsize = $_FILES["image1"]["size"];
                //####CHECK SIZE FOR IMAGE ######//                
                if($fsize > FILESIZE){
                    return 7; //##### file is greater then 2 MB
                }                 
                $filename = explode(".",$_FILES["image1"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image1"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);
                //#########CHECK EXTENTION FOR IMAGE############//                
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; //##### file extension not accepted
                }      
				$image1 = time().'_'.$filename.'.'.$file_ext;
                //$dance_image = $filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image1))
                {                    
                    @unlink($dir_name."/".$image1);
                }
                $movefile=move_uploaded_file($_FILES["image1"]["tmp_name"],$dir_name."/".$image1);
                if($movefile){
                    $prod_imagequery1 = "image1='".$image1."'";
                }
            }
			$prod_imagequery2 ='';
			$dir_name = "doc/product";
            if($_FILES["image2"]["name"]!=''){
             
                $fsize = $_FILES["image2"]["size"];
                //####CHECK SIZE FOR IMAGE ######//                
                if($fsize > FILESIZE){
                    return 7; //##### file is greater then 2 MB
                }                 
                $filename = explode(".",$_FILES["image2"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image2"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);
                //#########CHECK EXTENTION FOR IMAGE############//                
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; //##### file extension not accepted
                }      
				$image2 = time().'_'.$filename.'.'.$file_ext;
                //$dance_image = $filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image2))
                {                    
                    @unlink($dir_name."/".$image2);
                }
                $movefile=move_uploaded_file($_FILES["image2"]["tmp_name"],$dir_name."/".$image2);
                if($movefile){
                    $prod_imagequery2 = "image2='".$image2."'";
                }
            }
			
			$prod_imagequery3 ='';
            $dir_name = "doc/product";
            if($_FILES["image3"]["name"]!=''){
             
                $fsize = $_FILES["image3"]["size"];
                //####CHECK SIZE FOR IMAGE ######//                
                if($fsize > FILESIZE){
                    return 7; //##### file is greater then 2 MB
                }                 
                $filename = explode(".",$_FILES["image3"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image3"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);
                //#########CHECK EXTENTION FOR IMAGE############//                
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; //##### file extension not accepted
                }      
				$image3 = time().'_'.$filename.'.'.$file_ext;
                //$dance_image = $filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image3))
                {                    
                    @unlink($dir_name."/".$image3);
                }
                $movefile=move_uploaded_file($_FILES["image3"]["tmp_name"],$dir_name."/".$image3);
                if($movefile){
                    $prod_imagequery3 = ",image3='".$image3."'";
                }
            }
			$prod_imagequery4 ='';
			$dir_name = "doc/product";
            if($_FILES["image4"]["name"]!=''){
             
                $fsize = $_FILES["image4"]["size"];
                //####CHECK SIZE FOR IMAGE ######//                
                if($fsize > FILESIZE){
                    return 7; //##### file is greater then 2 MB
                }                 
                $filename = explode(".",$_FILES["image4"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image4"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);
                //#########CHECK EXTENTION FOR IMAGE############//                
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; //##### file extension not accepted
                }      
				$image4 = time().'_'.$filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image4))
                {                    
                    @unlink($dir_name."/".$image4);
                }
                $movefile=move_uploaded_file($_FILES["image4"]["tmp_name"],$dir_name."/".$image4);
                if($movefile){
                    $prod_imagequery4 = ",image4='".$image4."'";
                }
            }
			//echo "insert into tp_product set user_id='".$userId."'$prod_imagequery3$prod_imagequery4,cat_id='".$catId."',product_name='".$pName."',product_location='".$pLocation."',city_id='".$cityId."',product_description='".$description."',orginal_price='".$price."',product_age='".$age."',packing_availability='".$packing."',product_seo_name='".$productSeoName."',$prod_imagequery1,$prod_imagequery2,status='1',created_on='".date('Y-m-d::H:i:s')."',created_by='".$userId."'"; exit;
			$sql="insert into tp_product set user_id='".$userId."'$prod_imagequery3$prod_imagequery4,cat_id='".$catId."',product_name='".$pName."',product_location='".$pLocation."',city_id='".$cityId."',product_description='".$description."',orginal_price='".$price."',product_age='".$age."',packing_availability='".$packing."',product_seo_name='".$productSeoName."',$prod_imagequery1,$prod_imagequery2,status='1',created_on='".date('Y-m-d::H:i:s')."',created_by='".$userId."'"; 
            $resp = mysql_query($sql);
			$objEmail = new Email();
			$objEmail->mailaccount='avdhesh007';
			//$objEmail->to=SITE_OWNER_EMAIL_ADDRESS;
			$objEmail->to=$_SESSION['corporate_email'];
			$objEmail->toname=$_SESSION['name'];              
			$objEmail->from=Email_FROM;
			$objEmail->fromname=Email_FROMNAME;
			if(ADDCC!=""){
						$objEmail->bcc=Email_BCC;
					}
			$objEmail->subject = 'Product listing Approval';
				$objEmail->Body.="<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
				<tr>
					<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
						<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px;'>
							<tr>
								<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
								</th>
							</tr>
							<tr>
								<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
								<img src='".SITEURL."images/images/logo.png' alt='Trust Portal' height='75' width='75'/>
									
								</th>
							</tr>
							<tr>
								<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									Dear User,<br/><br/>
									Your ad listing for $pName on Trust Portal is approved by Admin. Now the product is live on Trust Portal please click the below link to view your product list.<br/><br/>
									<a href='".SITEURL."seller-product-list.php'>Click Here</a><br/><br/>
									You can also check your product listing details through MY SELLING ZONE.<br/><br/> 
									Login to Trust Portal<br/><br/><br/>
									 <br/><br/>
								</td>
							</tr>
							<tr>
								<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
									Warm Regards,<br/>
									Trust Portal<br/>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</table>	
				";
				$email_response = $objEmail->sendemail();
				//print_r($objEmail); die;
            if($resp==true){
                return 5; 
            }else{
                 return 1; 
            }
	    }else{
            return 0;  
        }
	}
	
//***************EDIT POST ADS*************************************//

function updateProduct(){
		
       if(isset($_REQUEST['prod_id'],$_REQUEST['userId'],$_REQUEST['cat_id'],$_REQUEST['product_name']) and !empty($_REQUEST['cat_id']) and !empty($_REQUEST['product_name']) and !empty($_REQUEST['prod_id']) and !empty($_REQUEST['userId'])){ 
			$userId=$_REQUEST['userId'];
			$prodId=$_REQUEST['prod_id'];
			$catId=$_REQUEST['cat_id'];
			$pName=$_REQUEST['product_name'];
			$pLocation=$_REQUEST['product_location'];
			$cityId=$_REQUEST['city_id'];
			$price=$_REQUEST['estimate_price'];
			$description=mysql_real_escape_string($_REQUEST['description']);
			//$description=$_REQUEST['description'];
			$age=$_REQUEST['product_age'];
			$packing=$_REQUEST['packing'];
			$soldStatus=$_REQUEST['sold_status'];
			$status=$_REQUEST['status'];
			$productSeoName=$_REQUEST['product_seo_name'];
			
			$prod_imagequery1 ='';
            $dir_name = "doc/product";
            if($_FILES["image1"]["name"]!=''){
             
                $fsize = $_FILES["image1"]["size"];         
                if($fsize > FILESIZE){
                    return 7; 
                }                 
                $filename = explode(".",$_FILES["image1"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image1"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);        
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; 
                }      
				$image1 = time().'_'.$filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image1))
                {                    
                    @unlink($dir_name."/".$image1);
                }
                $movefile=move_uploaded_file($_FILES["image1"]["tmp_name"],$dir_name."/".$image1);
                if($movefile){
                    $prod_imagequery1 = ",image1='".$image1."'";
                }
            }
			
			$prod_imagequery2 ='';
			$dir_name = "doc/product";
            if($_FILES["image2"]["name"]!=''){
             
                $fsize = $_FILES["image2"]["size"];              
                if($fsize > FILESIZE){
                    return 7; 
                }                 
                $filename = explode(".",$_FILES["image2"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image2"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; 
                }      
				$image2 = time().'_'.$filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image2))
                {                    
                    @unlink($dir_name."/".$image2);
                }
                $movefile=move_uploaded_file($_FILES["image2"]["tmp_name"],$dir_name."/".$image2);
                if($movefile){
                    $prod_imagequery2 = ",image2='".$image2."'";
                }
            }
			
			$prod_imagequery3 ='';
            $dir_name = "doc/product";
            if($_FILES["image3"]["name"]!=''){
             
                $fsize = $_FILES["image3"]["size"];         
                if($fsize > FILESIZE){
                    return 7;
                }                 
                $filename = explode(".",$_FILES["image3"]["name"]);
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image3"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);            
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; 
                }      
				$image3 = time().'_'.$filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image3))
                {                    
                    @unlink($dir_name."/".$image3);
                }
                $movefile=move_uploaded_file($_FILES["image3"]["tmp_name"],$dir_name."/".$image3);
                if($movefile){
                    $prod_imagequery3 = ",image3='".$image3."'";
                }
            }
			
			$prod_imagequery4 ='';
			$dir_name = "doc/product";
            if($_FILES["image4"]["name"]!=''){
                $fsize = $_FILES["image4"]["size"];          
                if($fsize > FILESIZE){
                    return 7;
                }                 
                $filename = explode(".",$_FILES["image4"]["name"]);
				//echo $filename; exit;
                $file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["image4"]["name"],0,-(strlen($file_ext)+1));
                $filename = str_replace(" ","_",$imgname);             
                $allExtarray = array("jpg","jpeg","png");
                if(!in_array($file_ext,$allExtarray)){                
                    return 8; 
                }      
				$image4 = time().'_'.$filename.'.'.$file_ext;
                if(!file_exists($dir_name))
                {
                    $flag = mkdir($dir_name, 0777,true);                    
                }
                if(file_exists($dir_name."/".$image4))
                {                    
                    @unlink($dir_name."/".$image4);
                }
                $movefile=move_uploaded_file($_FILES["image4"]["tmp_name"],$dir_name."/".$image4);
                if($movefile){
                    $prod_imagequery4 = ",image4='".$image4."'";
					
                }
            }
			if($status==0){
			$sql="update tp_product set user_id='".$userId."'$prod_imagequery3$prod_imagequery4,cat_id='".$catId."',product_name='".$pName."',product_location='".$pLocation."',city_id='".$cityId."',product_description='".$description."',orginal_price='".$price."',product_age='".$age."',packing_availability='".$packing."',product_seo_name='".$productSeoName."'$prod_imagequery1$prod_imagequery2,status='".$status."', is_approved='0' ,sold_status='".$soldStatus."',updated_on='".date('Y-m-d::H:i:s')."',updated_by='".$userId."' where prod_id='".$prodId."'"; 
			} else if($soldStatus=='0'){
			$sql="update tp_product set user_id='".$userId."'$prod_imagequery3$prod_imagequery4,cat_id='".$catId."',product_name='".$pName."',product_location='".$pLocation."',city_id='".$cityId."',product_description='".$description."',orginal_price='".$price."',product_age='".$age."',packing_availability='".$packing."',product_seo_name='".$productSeoName."'$prod_imagequery1$prod_imagequery2,status='".$status."',sold_status='".$soldStatus."',is_approved='0',updated_on='".date('Y-m-d::H:i:s')."',updated_by='".$userId."' where prod_id='".$prodId."'"; 		
			} else {
				
				$sql="update tp_product set user_id='".$userId."'$prod_imagequery3$prod_imagequery4,cat_id='".$catId."',product_name='".$pName."',product_location='".$pLocation."',city_id='".$cityId."',product_description='".$description."',orginal_price='".$price."',product_age='".$age."',packing_availability='".$packing."',product_seo_name='".$productSeoName."'$prod_imagequery1$prod_imagequery2,status='".$status."',sold_status='".$soldStatus."',updated_on='".date('Y-m-d::H:i:s')."',updated_by='".$userId."' where prod_id='".$prodId."'"; 		
			}
            $resp = mysql_query($sql);
            if($resp==true){
                return 5; 
            }else{
                 return 1; 
            }
	    }else{
            return 0;  
        }
	}
	
	//####################19.04.2016###########################//
	function getCategoryId($cat_name){
		$cat_id='';
		$categoryQuery = mysql_query("SELECT cat_id from tp_category where cat_name='".$cat_name."'");
		if($categoryQuery && mysql_num_rows($categoryQuery)){
			$categoryResult =  mysql_fetch_assoc($categoryQuery);
			$cat_id = $categoryResult['cat_id'];
		}
		return $cat_id;
	}
	function getCityId($city_name){
		$city_id='';
		$cityQuery = mysql_query("SELECT city_id from  tp_cities WHERE city_name='".$city_name."'") or die(mysql_error());
		if($cityQuery && mysql_num_rows($cityQuery)){
			$cityResult =  mysql_fetch_assoc($cityQuery);
			$city_id = $cityResult['city_id'];
		}
		return $city_id;
	}
	
	//#########################################################//
	function getProdMsgCount($prod_id , $user_id){
		$count=0;
		$query=mysql_query("SELECT * FROM tp_message WHERE prod_id='".$prod_id."' AND message_to='".$user_id."' AND message_read='0'");
		if($query){
			$count = mysql_num_rows($query);
		}
		return $count;
	}
	function isProdUnlike($prod_id , $user_id){
		$isUnlike=0;
		$queryUnlike=mysql_query("select * from tp_unlikes where status='0' AND prod_id='".$prod_id."' AND unliked_by='".$user_id."'") or die(mysql_error());
		if($queryUnlike && mysql_num_rows($queryUnlike)){
			$isUnlike=1;
		}
		return $isUnlike;
	}
	function isProdFav($prod_id , $user_id){
		$isFav=0;
		//echo "select * from tp_favourite where status='1' AND prod_id='".$prod_id."' AND favourite_by='".$user_id."'";exit;
		$query=mysql_query("select * from tp_favourite where status='1' AND prod_id='".$prod_id."' AND favourite_by='".$user_id."'") or die(mysql_error());
		if($query && mysql_num_rows($query)){
			$isFav = 1;
		}
		return $isFav;
	}
	//###############################ADD NOTE##############################
	function addNote($note, $productID, $sessUserId){
		$chk=0;
		if($note != ''){
			$sqlNote=mysql_query("insert into tp_fav_note set fav_id='".$productID."',user_id='".$sessUserId."',note_text='".$note."',created_on='".date('Y-m-d::H:i:s')."'")or die(mysql_error());
			if($sqlNote==true)
			{
				$select=mysql_query("Select * from tp_favourite where prod_id='".$productID."' and favourite_by='".$sessUserId."'");
				$dateTime=gmdate("Y-m-d H:i:s", time()+19800);
				$chk=mysql_num_rows($select);
				if($chk==0){
					$sql=mysql_query("insert into  tp_favourite set prod_id='".$productID."',favourite_by='".$sessUserId."',favourite_on='".$dateTime."', status='1'");	
				} 
				else {	
					$chkfav=mysql_fetch_array($select);
					if($chkfav['status']=='0')
					{
						$sql=mysql_query("update tp_favourite set status='1' where prod_id='".$productID."' and favourite_by='".$sessUserId."'");	
					} 
				}
				return 1;
			}
			else 
			{
				return 0;
			}
		}else{
			return 2;
		}
	}
	
	//################################ADD MESSAGE####################################
	function addMessage($message, $message_to, $productID, $userID){
		if($message_to!="" && $message!="")
		{
			$queryInsert=mysql_query("insert into tp_message set prod_id='".$productID."', message='".$message."',message_by='".$userID."',message_to='".$message_to."',message_date='".date('Y-m-d::H:i:s')."'") or die(mysql_error());
			$objEmail = new Email();
			$objEmail->mailaccount='avdhesh007';
			$objEmail->to=$resprodData['corporate_email'];
			$objEmail->toname=$resprodData['name'];              
			$objEmail->from=Email_FROM;
			$objEmail->fromname=$_SESSION['name'];
			if(ADDCC!=""){
				$objEmail->bcc=Email_BCC;
			}
			$objEmail->subject = 'New Message Received';
			$objEmail->Body.="<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
			<tr>
				<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
					<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px;'>
						<tr>
							<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							</th>
						</tr>
						<tr>
							<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							<img src='".SITEURL."images/images/logo.png' alt='Trust Portal' height='75' width='75'/>
								
							</th>
						</tr>
						<tr>
							<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
								Dear User,<br/><br/>
								You have received a new message on ".$resprodData['product_name']." ad listing from ".$_SESSION['name'].".<br/><br/>
								<a href='".SITEURL."messagechat.php'>Click Here</a><br/><br/>
								Message: $message <br/><br/> 
								Please Login to Trust Portal to reply.<br/><br/><br/>
								<br/><br/>
							</td>
						</tr>
						<tr>
							<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
								Warm Regards,<br/>
								Trust Portal<br/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>";
			$email_response = $objEmail->sendemail();
			//print_r($objEmail); die;
			if($queryInsert==true){
				
				return 1;
				
			}else{
			
				return 0;
				
			}
		}else{
		
			return 2;
		}
	}
	
}
?>