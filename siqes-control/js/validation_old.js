/****************BANNER MANAGEMENT********************/
	function validAddBanner(){
		if($('.banner_image').val()==""){
			alert("Please select banner image.");
			$('.banner_image').focus();
			return false;
		}
		if($('.banner_title').val()==""){
			alert("Please enter title.");
			$('.banner_title').focus();
			return false;
		}
	    return true;
	}
	
	function validEditBanner()
	{
		if($('.h_banner_image').val()=="")
		{
			alert("Please select image.");
			$('.h_banner_image').focus();
			return false;
		}
		if($('.banner_title').val()=="")
		{
			alert("Please enter image title.");
			$('.banner_title').focus();
			return false;
		}
		
	    return true;
	}
	
/*******************CATEGORY MANAGEMENT*******************/
	function validCategory()
	{
		if($('.cat_name').val()==""){
			alert("Please enter category name.");
			$('.cat_name').focus();
			return false;
		}
		if($('.cat_image').val()==""){
			alert("Please select image.");
			$('.cat_image').focus();
			return false;
		}
		if($('.cat_banner').val()==""){
			alert("Please select banner image.");
			$('.cat_banner').focus();
			return false;
		}
		if($('.meta_title').val()==""){
			alert("Please enter meta title.");
			$('.meta_title').focus();
			return false;
		}
	    return true;
	}
	
   function validEditCategory()
	{
		if($('.cat_name').val()==""){
			alert("Please enter category name.");
			$('.cat_name').focus();
			return false;
		}
		if($('.h_cat_image').val()==""){
			alert("Please select image.");
			$('.h_cat_image').focus();
			return false;
		}
		if($('.h_cat_banner').val()==""){
			alert("Please select banner image.");
			$('.h_cat_banner').focus();
			return false;
		}
		if($('.meta_title').val()==""){
			alert("Please enter meta title.");
			$('.meta_title').focus();
			return false;
		}
	    return true;
	}

/*******************CITY MANAGEMENT***********************/
	function validCity(){
		if($('.state_id').val()=="")
		{
		alert("Please select state name.");
		$('.state_id').focus();
		return false;
		}
		if($('.city_name').val()==""){
			alert("Please enter city name.");
			$('.city_name').focus();
			return false;
		}
		var iChars = "!`~@#$%^&*()+=-[]\\\';,_/{}|\":<>?";
		for (var i = 0; i < document.frmcity.city_name.value.length; i++) {
		   if (iChars.indexOf(document.frmcity.city_name.value.charAt(i)) != -1) {
			alert ("Please enter city name without special character");
			document.frmcity.city_name.focus();
			return false;
		   }
		}
		if((document.frmcity.city_name.value.length) < 3 || (document.frmcity.city_name.value.length) > 50){
				alert('City name should be more than 2 character and less than 50 character');
				$('.city_name').focus();
				return false;
		}
	    return true;
	}
	
	function validEditCity(){
		if($('.state_id').val()=="")
		{
		alert("Please select state name.");
		$('.state_id').focus();
		return false;
		}
		if($('.city_name').val()==""){
			alert("Please enter city name.");
			$('.city_name').focus();
			return false;
		}
		var iChars = "!`~@#$%^&*()+=-[]\\\';,_/{}|\":<>?";
		for (var i = 0; i < document.frmcity.city_name.value.length; i++) {
		   if (iChars.indexOf(document.frmcity.city_name.value.charAt(i)) != -1) {
			alert ("Please enter city name without special character");
			document.frmcity.city_name.focus();
			return false;
		   }
		}
		if((document.frmcity.city_name.value.length) < 3 || (document.frmcity.city_name.value.length) > 50){
				alert('City name should be more than 2 character and less than 50 character');
				$('.city_name').focus();
				return false;
		}
	    return true;
	}
/********************** FAQ MANAGEMENT*************/
	function validFaq(){
		if($('.question').val()==""){
			alert("Please enter question.");
			$('.question').focus();
			return false;
		}
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter answer.');
		  $('.editor1').focus();
		return false;
		}
	    return true;
	}
	
	function validEditFaq(){
		if($('.question').val()==""){
			alert("Please enter question.");
			$('.question').focus();
			return false;
		}
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter answer.');
		  $('.editor1').focus();
		return false;
		}
	    return true;
	}
	
	
/********************CUSTOMER MANAGEMENT***********************/
function validAddCust(){
		if(document.frmcustomer.name.value.trim() == '')
		{	
			alert('Please enter your name');
			document.frmcustomer.name.focus();
			return false;
		}
		var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
		for (var i = 0; i < document.frmcustomer.name.value.length; i++)
		{
			
			if (iChars.indexOf(document.frmcustomer.name.value.charAt(i)) != -1)
			{
				alert ("Please enter your name without special characters or numeric values.");
				document.frmcustomer.name.focus();
				return false;
			}
		}
		if(document.frmcustomer.name.value.length > 30)
		{
			alert("Please enter your name in less than 30 characters.");
			document.frmcustomer.name.focus();
			return false;
		}	
		if(document.frmcustomer.name.value.length < 3)
		{
			alert("Please enter your name in greater than 3 characters.");
			document.frmcustomer.name.focus();
			return false
		}
		if(document.frmcustomer.user_name.value.trim() == '')
		{	
			alert('Please enter user name');
			document.frmcustomer.user_name.focus();
			return false;
		}
		if(document.frmcustomer.corp_email.value.trim() == '')
		{
			alert('Please enter corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}	
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.frmcustomer.corp_email.value))) 
		{
			alert('Invalid corporate email id! Please enter the correct corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}
		/*if(document.frmcustomer.corp_email.value.trim() == '')
		{
			alert('Please enter corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.frmcustomer.alt_email.value))) 
		{
			alert('Invalid alternate email id! Please enter the correct alternate email id.');
			document.frmcustomer.alt_email.focus();
			return false;
		}*/
		if(document.frmcustomer.password.value.trim() == '')
		{
			alert('Please enter password.');
			document.frmcustomer.password.focus();
			return false;
		}
		if(document.frmcustomer.cpassword.value.trim() == '')
		{
			alert('Please enter confirm password.');
			document.frmcustomer.cpassword.focus();
			return false;
		}
		if(frmcustomer.password.value != "" && frmcustomer.password.value == frmcustomer.cpassword.value) {
		  if(frmcustomer.password.value.length < 6) {
			alert("Password must contain at least six characters!");
			frmcustomer.password.focus();
			return false;
		  }
		  if(frmcustomer.password.value == frmcustomer.user_name.value) {
			alert("Password must be different from Username!");
			frmcustomer.password.focus();
			return false;
		  }
		  /*re = /[0-9]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one number (0-9)!");
			frmcustomer.password.focus();
			return false;
		  }
		  re = /[a-z]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one lowercase letter (a-z)!");
			frmcustomer.password.focus();
			return false;
		  }
		  re = /[A-Z]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one uppercase letter (A-Z)!");
			frmcustomer.password.focus();
			return false;
		  }*/
		} else {
		  alert("Please check that you've entered and confirmed your password!");
		  frmcustomer.password.focus();
		  return false;
		}
		//alert("You entered a valid password: " + form.password.value);
		if(document.frmcustomer.contact.value.trim() == '')
		{
			alert('Please enter contact number.');
			document.frmcustomer.contact.focus();
			return false;
		}
		if(isNaN(document.frmcustomer.contact.value) || /[\-\.\+]/.test(document.frmcustomer.contact.value) || !(/^[0-9]*/.test(document.frmcustomer.contact.value)))
		{
			alert('Please enter contact number in numeric only.');
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.contact.value.length > 13)
		{
			alert("Please enter contact number less than 13 digits");
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.contact.value.length < 10)
		{
			alert("Please enter contact number greater than 10 digits");
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.country_id.value.trim() == '')
		{
			alert('Please select country.');
			document.frmcustomer.country_id.focus();
			return false;
		}
		if(document.frmcustomer.state_id.value.trim() == '')
		{
			alert('Please select state.');
			document.frmcustomer.state_id.focus();
			return false;
		}
		if(document.frmcustomer.city_id.value.trim() == '')
		{
			alert('Please select city.');
			document.frmcustomer.city_id.focus();
			return false;
		}
		if(document.frmcustomer.company_name.value.trim() == '')
		{
			alert('Please enter company name.');
			document.frmcustomer.company_name.focus();
			return false;
		}
		if(document.frmcustomer.pincode.value.trim() == '')
		{
			alert('Please enter pincode.');
			document.frmcustomer.pincode.focus();
			return false;
		}
		var pin_code=document.getElementById("pincode");
		var pat=/^\d{6}$/;
		if(!pat.test(pin_code.value))
		{
		alert("Pincode should be 6 digits ");
		pin_code.focus();
		return false;
		}
		if(document.frmcustomer.address1.value.trim() == '')
		{
			alert('Please enter address.');
			document.frmcustomer.address1.focus();
			return false;
		}
		
	    return true;
	}

	function validEditCust(){
		//alert("okk");
		if(document.frmcustomer.name.value.trim() == '')
		{	
			alert('Please enter your name');
			document.frmcustomer.name.focus();
			return false;
		}
		var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
		for (var i = 0; i < document.frmcustomer.name.value.length; i++)
		{
			
			if (iChars.indexOf(document.frmcustomer.name.value.charAt(i)) != -1)
			{
				alert ("Please enter your name without special characters or numeric values.");
				document.frmcustomer.name.focus();
				return false;
			}
		}
		if(document.frmcustomer.name.value.length > 30)
		{
			alert("Please enter your name in less than 30 characters.");
			document.frmcustomer.name.focus();
			return false;
		}	
		if(document.frmcustomer.name.value.length < 3)
		{
			alert("Please enter your name in greater than 3 characters.");
			document.frmcustomer.name.focus();
			return false
		}
		if(document.frmcustomer.user_name.value.trim() == '')
		{	
			alert('Please enter user name');
			document.frmcustomer.user_name.focus();
			return false;
		}
		if(document.frmcustomer.corp_email.value.trim() == '')
		{
			alert('Please enter corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}	
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.frmcustomer.corp_email.value))) 
		{
			alert('Invalid corporate email id! Please enter the correct corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}
		/*if(document.frmcustomer.corp_email.value.trim() == '')
		{
			alert('Please enter corporate email id.');
			document.frmcustomer.corp_email.focus();
			return false;
		}
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.frmcustomer.alt_email.value))) 
		{
			alert('Invalid alternate email id! Please enter the correct alternate email id.');
			document.frmcustomer.alt_email.focus();
			return false;
		}*/
		if(document.frmcustomer.password.value.trim() == '')
		{
			alert('Please enter password.');
			document.frmcustomer.password.focus();
			return false;
		}
		if(document.frmcustomer.cpassword.value.trim() == '')
		{
			alert('Please enter confirm password.');
			document.frmcustomer.cpassword.focus();
			return false;
		}
		if(frmcustomer.password.value != "" && frmcustomer.password.value == frmcustomer.cpassword.value) {
		  if(frmcustomer.password.value.length < 6) {
			alert("Password must contain at least six characters!");
			frmcustomer.password.focus();
			return false;
		  }
		  if(frmcustomer.password.value == frmcustomer.user_name.value) {
			alert("Password must be different from Username!");
			frmcustomer.password.focus();
			return false;
		  }
		  /*re = /[0-9]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one number (0-9)!");
			frmcustomer.password.focus();
			return false;
		  }
		  re = /[a-z]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one lowercase letter (a-z)!");
			frmcustomer.password.focus();
			return false;
		  }
		  re = /[A-Z]/;
		  if(!re.test(frmcustomer.password.value)) {
			alert("Password must contain at least one uppercase letter (A-Z)!");
			frmcustomer.password.focus();
			return false;
		  }*/
		} else {
		  alert("Please check that you've entered and confirmed your password!");
		  frmcustomer.password.focus();
		  return false;
		}
		//alert("You entered a valid password: " + form.password.value);
		if(document.frmcustomer.contact.value.trim() == '')
		{
			alert('Please enter contact number.');
			document.frmcustomer.contact.focus();
			return false;
		}
		if(isNaN(document.frmcustomer.contact.value) || /[\-\.\+]/.test(document.frmcustomer.contact.value) || !(/^[0-9]*/.test(document.frmcustomer.contact.value)))
		{
			alert('Please enter contact number in numeric only.');
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.contact.value.length > 13)
		{
			alert("Please enter contact number less than 13 digits");
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.contact.value.length < 10)
		{
			alert("Please enter contact number greater than 10 digits");
			document.frmcustomer.contact.focus();
			return false;
		}
		if(document.frmcustomer.country_id.value.trim() == '')
		{
			alert('Please select country.');
			document.frmcustomer.country_id.focus();
			return false;
		}
		if(document.frmcustomer.state_id.value.trim() == '')
		{
			alert('Please select state.');
			document.frmcustomer.state_id.focus();
			return false;
		}
		if(document.frmcustomer.city_id.value.trim() == '')
		{
			alert('Please select city.');
			document.frmcustomer.city_id.focus();
			return false;
		}
		if(document.frmcustomer.company_name.value.trim() == '')
		{
			alert('Please enter company name.');
			document.frmcustomer.company_name.focus();
			return false;
		}
		if(document.frmcustomer.pincode.value.trim() == '')
		{
			alert('Please enter pincode.');
			document.frmcustomer.pincode.focus();
			return false;
		}
		var pin_code=document.getElementById("pincode");
		var pat=/^\d{6}$/;
		if(!pat.test(pin_code.value))
		{
		alert("Pincode should be 6 digits ");
		pin_code.focus();
		return false;
		}
		if(document.frmcustomer.address1.value.trim() == '')
		{
			alert('Please enter address.');
			document.frmcustomer.address1.focus();
			return false;
		}
	    return true;
	}
/********************PRODUCT MANAGEMENT***********************/

	function validProduct(){
		if(document.frmproduct.sell_id.value.trim() == '')
		{
			alert('Please select seller.');
			document.frmproduct.sell_id.focus();
			return false;
		}
		if(document.frmproduct.cat_id.value.trim() == '')
		{
			alert('Please select product category.');
			document.frmproduct.cat_id.focus();
			return false;
		}
		if(document.frmproduct.product_name.value.trim() == '')
		{
			alert('Please enter product name.');
			document.frmproduct.product_name.focus();
			return false;
		}
		if(document.frmproduct.product_location.value.trim() == '')
		{
			alert('Please enter location.');
			document.frmproduct.product_location.focus();
			return false;
		}
		if(document.frmproduct.estimate_price.value.trim() == '')
		{
			alert('Please enter estimated price.');
			document.frmproduct.estimate_price.focus();
			return false;
		}
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter product description.');
		  $('.editor1').focus();
		return false;
		}
		if(document.frmproduct.age.value.trim() == '')
		{
			alert('Please enter product age.');
			document.frmproduct.age.focus();
			return false;
		}
		/*var r = document.getElementsByName("packing")
		var c = 0
		for(var i=0; i < r.length; i++){
		   if(c[i].checked) {
			  c = i; }
		}
		alert("please select radio");
		*/
		if(document.frmproduct.image1.value.trim() == '')
		{
			alert('Please select product image1.');
			document.frmproduct.image1.focus();
			return false;
		}
		if(document.frmproduct.image2.value.trim() == '')
		{
			alert('Please select product image2.');
			document.frmproduct.image1.focus();
			return false;
		}
		return true;	
	}
	
	function validEditProd()
	{
		if($('.sell_id').val()==""){
			alert('Please select seller.');
			$('.sell_id').focus();
			return false;
		}
		if($('.cat_id').val()==""){
			alert('Please select product category.');
			$('.cat_id').focus();
			return false;
		}
		if($('.product_name').val()==""){
			alert('Please enter product name.');
			$('.product_name').focus();
			return false;
		}
		if($('.meta_title').val()==""){
			alert("Please enter meta title.");
			$('.meta_title').focus();
			return false;
		}
		if($('.product_location').val()==""){
			alert('Please enter location.');
			$('.product_location').focus();
			return false;
		}
		if($('.estimate_price').val()==""){
			alert('Please enter estimated price.');
			$('.estimate_price').focus();
			return false;
		}
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter product description.');
		  $('.editor1').focus();
		return false;
		}
		if($('.age').val()==""){
			alert('Please enter product age.');
			$('.age').focus();
			return false;
		}
		if(document.frmproduct.h_image1.value.trim() == '')
		{
			alert('Please select product image1.');
			document.frmproduct.h_image1.focus();
			return false;
		}
		/*if(document.frmproduct.h_image2.value.trim() == '')
		{
			alert('Please select product image2.');
			document.frmproduct.h_image2.focus();
			return false;
		}*/
		return true;
	}
	
//************************** START FORUM MANAGEMENT********************/
	function validForumCategory()
	{
		if($('.name').val()==""){
			alert("Please enter forum category name.");
			$('.name').focus();
			return false;
		}
	    return true;
	}
	function validEditForumCategory()
	{
		if($('.name').val()==""){
			alert("Please enter forum category name.");
			$('.name').focus();
			return false;
		}
	    return true;
	}
	
	function validForum(){
		
		if($('.forumCatId').val()==""){
			alert('Please select forum category.');
			$('.forumCatId').focus();
			return false;
		}
		if($('.topic_name').val()==""){
			alert('Please enter topic name.');
			$('.topic_name').focus();
			return false;
		}
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter forum description.');
		  $('.editor1').focus();
		return false;
		}
		return true;
	}
	
	
	function validEditForum()
	{	
		if($('.forumCatId').val()==""){
			alert('Please select forum category.');
			$('.forumCatId').focus();
			return false;
		}
		if($('.topic_name').val()==""){
			alert('Please enter topic name.');
			$('.topic_name').focus();
			return false;
		}		
		if (CKEDITOR.instances.editor1.getData() == '' ){
          alert('Please enter forum description.');
		  $('.editor1').focus();
		return false;
		}
		if($('.age').val()==""){
			alert('Please enter product age.');
			$('.age').focus();
			return false;
		}
		return true;
	}
//************************** END FORUM MANAGEMENT***********************/


	
	