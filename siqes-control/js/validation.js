/*******************ABOUT US MANAGEMENT*******************/
    function validAboutUs()
	{
		if(document.frmabout.content_type.value.trim() == '')
		{	
			alert('Please select content type.');
			document.frmabout.content_type.focus();
			return false;
		}
		
		/*if(document.frmabout.title.value.trim().length <3)
		{	
			alert('Title name is not less than 3 character.');
			document.frmabout.title.focus();
			return false;
		}
		if(document.frmabout.banner.value.trim() == '')
		{	
			alert('Please upload banner image.');
			document.frmabout.banner.focus();
			return false;
		}
		if(document.frmabout.about_image.value.trim() == '')
		{	
			alert('Please upload About Us image.');
			document.frmabout.about_image.focus();
			return false;
		}
		if(document.frmabout.short_description.value.trim() == '')
		{	
			alert('Please inter Short Description.');
			document.frmabout.short_description.focus();
			return false;
		}
		if(document.frmabout.short_description.value.trim().length < 50)
		{	
			alert('Please inter Short Description atleast 50 character.');
			document.frmabout.short_description.focus();
			return false;
		}*/
		if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please inter Description.');
			document.frmabout.long_description.focus();
			return false;
		}
	return true;
	}
	
	function validAboutUsUpdate()
	{
		if(document.frmabout.content_type.value.trim() == '')
		{	
			alert('Please select content type.');
			document.frmabout.content_type.focus();
			return false;
		}
		
		/*if(document.frmabout.title.value.trim().length <3)
		{	
			alert('Title name is not less than 3 character.');
			document.frmabout.title.focus();
			return false;
		}
		if(document.frmabout.banner_image.value.trim() == '')
		{	
			alert('Please upload banner image.');
			document.frmabout.banner.focus();
			return false;
		}
		if(document.frmabout.image_image.value.trim() == '')
		{	
			alert('Please upload About Us image.');
			document.frmabout.about_image.focus();
			return false;
		}
		if(document.frmabout.short_description.value.trim() == '')
		{	
			alert('Please inter Short Description.');
			document.frmabout.short_description.focus();
			return false;
		}
		if(document.frmabout.short_description.value.trim().length < 50)
		{	
			alert('Please inter Short Description atleast 50 character.');
			document.frmabout.short_description.focus();
			return false;
		}
		if(document.frmabout.long_description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmabout.long_description.focus();
			return false;
		}*/
	return true;
	}
/*******************Banner MANAGEMENT*******************/

function validBanner()
	{
		if(document.frmbanner.banner_name.value.trim() == '')
		{	
			alert('Please inter banner name.');
			document.frmbanner.banner_name.focus();
			return false;
		}
		
		if(document.frmbanner.banner_name.value.trim().length <3)
		{	
			alert('Banner name is not less than 3 character.');
			document.frmbanner.banner_name.focus();
			return false;
		}
		if(document.frmbanner.banner_image.value.trim() == '')
		{	
			alert('Please upload banner image.');
			document.frmbanner.banner_image.focus();
			return false;
		}
		/*if(document.frmbanner.banner_text.value.trim().length < 3)
		{	
			alert('Please inter banner text greater than 2 character.');
			document.frmbanner.banner_text.focus();
			return false;
		}
		
		if(document.frmbanner.banner_url.value.trim() == '')
		{	
			alert('Please enter banner url.');
			document.frmbanner.banner_url.focus();
			return false;
		}*/
		return true;
	}
	
	
	function validUpdateBanner()
	{
		if(document.frmbanner.banner_name.value.trim() == '')
		{	
			alert('Please inter banner name.');
			document.frmbanner.banner_name.focus();
			return false;
		}
		
		if(document.frmbanner.banner_name.value.trim().length <3)
		{	
			alert('Banner name is not less than 3 character.');
			document.frmbanner.banner_name.focus();
			return false;
		}
		if(document.frmbanner.banner.value.trim() == '')
		{	
			alert('Please upload banner image.');
			document.frmbanner.banner.focus();
			return false;
		}
		if(document.frmbanner.banner_text.value.trim().length < 3)
		{	
			alert('Please inter banner text greater than 2 character.');
			document.frmbanner.banner_text.focus();
			return false;
		}
		
		/*if(document.frmbanner.banner_url.value.trim() == '')
		{	
			alert('Please enter banner url.');
			document.frmbanner.banner_url.focus();
			return false;
		}*/
		return true;
	}

	/*******************SERVICES MANAGEMENT*******************/
	function validServices()
	{
		if(document.frmservices.service_title.value.trim() == '')
		{	
			alert('Please inter service title.');
			document.frmservices.service_title.focus();
			return false;
		}
		
		if(document.frmservices.service_title.value.trim().length <3)
		{	
			alert('Service title is not less than 3 character.');
			document.frmservices.service_title.focus();
			return false;
		}
		if(document.frmservices.service_image.value.trim() == '')
		{	
			alert('Please upload service image.');
			document.frmservices.service_image.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please enter service descriptions.');
			document.frmservices.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 20)
		{	
			alert('Please inter descriptions atleast 20 characters.');
			document.frmservices.description.focus();
			return false;
		}
		return true;
	}
	
	function validUpdateServices()
	{
		if(document.frmservices.service_title.value.trim() == '')
		{	
			alert('Please inter service title.');
			document.frmservices.service_title.focus();
			return false;
		}
		
		if(document.frmservices.service_title.value.trim().length <3)
		{	
			alert('Service title is not less than 3 character.');
			document.frmservices.service_title.focus();
			return false;
		}
		if(document.frmservices.edit_image.value.trim() == '')
		{	
			alert('Please upload service image.');
			document.frmservices.edit_image.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please enter service descriptions.');
			document.frmservices.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 20)
		{	
			alert('Please inter descriptions atleast 20 characters.');
			document.frmservices.description.focus();
			return false;
		}
		return true;
	}

/********************PRODUCT MANAGEMENT***********************/

	function validProduct(){
		if(document.frmproduct.product_name.value.trim() == '')
		{
			alert('Please enter product name.');
			document.frmproduct.product_name.focus();
			return false;
		}
		if(document.frmproduct.product_name.value.length > 30)
		{
			alert("Please enter product name in less than 30 characters.");
			document.frmproduct.product_name.focus();
			return false;
		} 
		if(document.frmproduct.product_name.value.length < 3)
		{
			alert("Please enter product name in greater than 3 characters.");
			document.frmproduct.product_name.focus();
			return false
		}
		if(document.frmproduct.product_image.value.trim() == '')
		{	
			alert('Please upload product image.');
			document.frmproduct.product_image.focus();
			return false;
		}
		if(document.frmproduct.short_description.value.trim() == '')
		{	
			alert('Please inter Short Description.');
			document.frmproduct.short_description.focus();
			return false;
		}
		if(document.frmproduct.short_description.value.trim().length < 20)
		{	
			alert('Please inter Short Description atleast 20 character.');
			document.frmproduct.short_description.focus();
			return false;
		}
		if(document.frmproduct.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmproduct.description.focus();
			return false;
		}
		if(document.frmproduct.description.value.trim().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmproduct.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditProd()
	{
		if(document.frmproduct.product_name.value.trim() == '')
		{
			alert('Please enter product name.');
			document.frmproduct.product_name.focus();
			return false;
		}
		if(document.frmproduct.product_name.value.length > 30)
		{
			alert("Please enter product name in less than 30 characters.");
			document.frmproduct.product_name.focus();
			return false;
		} 
		if(document.frmproduct.product_name.value.length < 3)
		{
			alert("Please enter product name in greater than 3 characters.");
			document.frmproduct.product_name.focus();
			return false
		}
		if(document.frmproduct.edit_image.value.trim() == '')
		{	
			alert('Please upload product image.');
			document.frmproduct.product_image.focus();
			return false;
		}
		if(document.frmproduct.short_description.value.trim() == '')
		{	
			alert('Please inter Short Description.');
			document.frmproduct.short_description.focus();
			return false;
		}
		if(document.frmproduct.short_description.value.trim().length < 20)
		{	
			alert('Please inter Short Description atleast 20 character.');
			document.frmproduct.short_description.focus();
			return false;
		}
		if(document.frmproduct.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmproduct.description.focus();
			return false;
		}
		if(document.frmproduct.description.value.trim().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmproduct.description.focus();
			return false;
		}
		return true;
	}
	
	/********************CLIENT MANAGEMENT***********************/

	function validClient(){
		if(document.frmclient.client_title.value.trim() == '')
		{
			alert('Please enter Client Title.');
			document.frmclient.client_title.focus();
			return false;
		}
		if(document.frmclient.client_title.value.length > 30)
		{
			alert("Please enter Client Title in less than 30 characters.");
			document.frmclient.client_title.focus();
			return false;
		} 
		if(document.frmclient.client_title.value.length < 3)
		{
			alert("Please enter Client Title in greater than 3 characters.");
			document.frmclient.client_title.focus();
			return false
		}
		if(document.frmclient.client_logo.value.trim() == '')
		{	
			alert('Please upload Logo.');
			document.frmclient.client_logo.focus();
			return false;
		}
		/*if(document.frmclient.client_url.value.trim() == '')
		{	
			alert('Please inter client url.');
			document.frmclient.client_url.focus();
			return false;
		}
		if(document.frmclient.client_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmclient.client_url.focus();
			return false;
		}*/
		if(document.frmclient.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmclient.description.focus();
			return false;
		}
		if(document.frmclient.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmclient.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditClient(){
		if(document.frmclient.client_title.value.trim() == '')
		{
			alert('Please enter Client Title.');
			document.frmclient.client_title.focus();
			return false;
		}
		if(document.frmclient.client_title.value.length > 30)
		{
			alert("Please enter Client Title in less than 30 characters.");
			document.frmclient.client_title.focus();
			return false;
		} 
		if(document.frmclient.client_title.value.length < 3)
		{
			alert("Please enter Client Title in greater than 3 characters.");
			document.frmclient.client_title.focus();
			return false
		}
		if(document.frmclient.edit_logo.value.trim() == '')
		{	
			alert('Please upload Logo.');
			document.frmclient.client_logo.focus();
			return false;
		}
		/*if(document.frmclient.client_url.value.trim() == '')
		{	
			alert('Please inter client url.');
			document.frmclient.client_url.focus();
			return false;
		}
		if(document.frmclient.client_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmclient.client_url.focus();
			return false;
		}*/
		if(document.frmclient.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmclient.description.focus();
			return false;
		}
		if(document.frmclient.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmclient.description.focus();
			return false;
		}
		return true;	
	}
	
	/********************PARTNER MANAGEMENT***********************/

	function validPartner(){
		if(document.frmcpartner.partner_title.value.trim() == '')
		{
			alert('Please enter Partner Title.');
			document.frmcpartner.partner_title.focus();
			return false;
		}
		if(document.frmcpartner.partner_title.value.length > 30)
		{
			alert("Please enter Partner Title in less than 30 characters.");
			document.frmcpartner.partner_title.focus();
			return false;
		} 
		if(document.frmcpartner.partner_title.value.length < 3)
		{
			alert("Please enter Partner Title in greater than 3 characters.");
			document.frmcpartner.partner_title.focus();
			return false
		}
		if(document.frmcpartner.partner_logo.value.trim() == '')
		{	
			alert('Please upload Logo.');
			document.frmcpartner.partner_logo.focus();
			return false;
		}
		/*if(document.frmcpartner.partner_url.value.trim() == '')
		{	
			alert('Please inter Partner url.');
			document.frmcpartner.partner_url.focus();
			return false;
		}
		if(document.frmcpartner.partner_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmcpartner.partner_url.focus();
			return false;
		}*/
		if(document.frmcpartner.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmcpartner.description.focus();
			return false;
		}
		if(document.frmcpartner.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmcpartner.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditPartner(){
		if(document.frmcpartner.partner_title.value.trim() == '')
		{
			alert('Please enter Partner Title.');
			document.frmcpartner.partner_title.focus();
			return false;
		}
		if(document.frmcpartner.partner_title.value.length > 30)
		{
			alert("Please enter Partner Title in less than 30 characters.");
			document.frmcpartner.partner_title.focus();
			return false;
		} 
		if(document.frmcpartner.partner_title.value.length < 3)
		{
			alert("Please enter Partner Title in greater than 3 characters.");
			document.frmcpartner.partner_title.focus();
			return false
		}
		if(document.frmcpartner.edit_logo.value.trim() == '')
		{	
			alert('Please upload Logo.');
			document.frmcpartner.partner_logo.focus();
			return false;
		}
		/*if(document.frmcpartner.partner_url.value.trim() == '')
		{	
			alert('Please inter Partner url.');
			document.frmcpartner.partner_url.focus();
			return false;
		}
		if(document.frmcpartner.partner_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmcpartner.partner_url.focus();
			return false;
		}*/
		if(document.frmcpartner.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmcpartner.description.focus();
			return false;
		}
		if(document.frmcpartner.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmcpartner.description.focus();
			return false;
		}
		return true;	
	}
	
	/********************Gallery MANAGEMENT***********************/

	function validGallery(){
		
		if(document.frmcgallery.gallery_type.value.trim() == 'select')
		{
			alert("Please select gallery.");
			document.frmcgallery.gallery_type.focus();
			return false;
		} 
	
			if(document.frmcgallery.gallery_img.value.trim() == '')
		{
			alert("Please upload Image.");
			document.frmcgallery.gallery_img.focus();
			return false;
		} 
		
		/*if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please inter Description.');
			document.frmcgallery.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmcgallery.description.focus();
			return false;
		}*/
		return true;	
	}
	
	function validEditGallery(){
		if(document.frmcgallery.gallery_type.value.trim() == 'select')
		{
		    alert("Please select gallery.");
			document.frmcgallery.gallery_type.focus();
			return false;
		} 
			if(document.frmcgallery.gall_img.value.trim() == '')
		{
			alert("Please upload Image.");
			document.frmcgallery.gallery_img.focus();
			return false;
		} 
		
		
		/*if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please inter Description.');
			document.frmcgallery.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmcgallery.description.focus();
			return false;
		}*/
		return true;	
	}
	
	/********************BLOG MANAGEMENT***********************/

	function validBlog(){
		if(document.frmcblog.blog_title.value.trim() == '')
		{
			alert('Please enter Blog Title.');
			document.frmcblog.blog_title.focus();
			return false;
		}
		if(document.frmcblog.blog_title.value.length > 30)
		{
			alert("Please enter Blog Title is less than 30 characters.");
			document.frmcblog.blog_title.focus();
			return false;
		} 
		if(document.frmcblog.blog_title.value.length < 3)
		{
			alert("Please enter Blog Title in greater than 3 characters.");
			document.frmcblog.blog_title.focus();
			return false
		}
		if(document.frmcblog.blog_img.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmcblog.blog_img.focus();
			return false;
		}
		/*if(document.frmcblog.small_img.value.trim() == '')
		{	
			alert('Please upload small Image.');
			document.frmcblog.small_img.focus();
			return false;
		}*/
		if(document.frmcblog.category.value.trim() == 'select')
		{	
			alert('Please select cotegory.');
			document.frmcblog.category.focus();
			return false;
		}
		/*if(document.frmcblog.blog_url.value.trim() == '')
		{	
			alert('Please inter url.');
			document.frmcblog.blog_url.focus();
			return false;
		}
		if(document.frmcblog.blog_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmcblog.blog_url.focus();
			return false;
		}*/
		if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please inter Description.');
			document.frmcblog.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmcblog.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditBlog(){
		if(document.frmcblog.blog_title.value.trim() == '')
		{
			alert('Please enter Blog Title.');
			document.frmcblog.blog_title.focus();
			return false;
		}
		if(document.frmcblog.blog_title.value.length > 30)
		{
			alert("Please enter Blog Title is less than 30 characters.");
			document.frmcblog.blog_title.focus();
			return false;
		} 
		if(document.frmcblog.blog_title.value.length < 3)
		{
			alert("Please enter Blog Title in greater than 3 characters.");
			document.frmcblog.blog_title.focus();
			return false
		}
		if(document.frmcblog.edit_img.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmcblog.blog_img.focus();
			return false;
		}
		/*if(document.frmcblog.edit_small_img.value.trim() == '')
		{	
			alert('Please upload small Image.');
			document.frmcblog.small_img.focus();
			return false;
		}*/
		if(document.frmcblog.category.value.trim() == 'select')
		{	
			alert('Please select cotegory.');
			document.frmcblog.category.focus();
			return false;
		}
		if(document.frmcblog.blog_url.value.trim() == '')
		{	
			alert('Please inter url.');
			document.frmcblog.blog_url.focus();
			return false;
		}
		if(document.frmcblog.blog_url.value.trim().length < 10)
		{	
			alert('Please inter url atleast 10 character.');
			document.frmcblog.blog_url.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData() == '')
		{	
			alert('Please inter Description.');
			document.frmcblog.description.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmcblog.description.focus();
			return false;
		}
		return true;	
	}
	
	
	/********************Site MANAGEMENT***********************/
	
	function validSite(){
		if (document.frmcsite.contact.value == '') {
            alert('Please enter contact number');
            document.frmcsite.contact.focus();
            return false;
        }
        if (document.frmcsite.contact.value != '') {
            
            if (document.frmcsite.contact.value.length < 10) {
                alert('Your contact no should not be less than 10 characters');
                document.frmcsite.contact.focus();
                return false;
            }
		}			
        if (document.frmcsite.address.value.trim() == '') {
            alert('Please enter address');
            document.frmcsite.address.focus();
            return false;
        }
        if (document.frmcsite.address.value.trim() != '') {
            
            if (document.frmcsite.address.value.trim().length < 3) {
                alert('Your address should not be less than 3 characters');
                document.frmcsite.address.focus();
                return false;
            }
		}
        if (document.frmcsite.email.value != '') {
            if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.frmcsite.email.value))) {
                alert('Invalid email address. Please enter valid email address.');
                document.frmcsite.email.focus();
                return false;
            }
            if (document.frmcsite.email.value.length > 30) {
                alert('Your email should not be greater than 30 characters');
                document.frmcsite.email.focus();
                return false;
            }
        }			
		return true;	
	  
	}
	
/********************Testimonial MANAGEMENT***********************/

	function validTestimonial(){
		if(document.frmtestimonial.name.value.trim() == '')
		{
			alert('Please enter Testimonial Name.');
			document.frmtestimonial.name.focus();
			return false;
		}
		
		if(document.frmtestimonial.name.value.trim().length < 3)
		{
			alert("Please enter Testimonial Name is greater than 3 characters.");
			document.frmtestimonial.name.focus();
			return false;
		}
		if(document.frmtestimonial.designation.value.trim() == '')
		{	
			alert('Please inter designation.');
			document.frmtestimonial.designation.focus();
			return false;
		}
		if(document.frmtestimonial.designation.value.trim().length < 3)
		{	
			alert('Designation should not be less than 3 characters.');
			document.frmtestimonial.designation.focus();
			return false;
		}
		if(document.frmtestimonial.company.value.trim() == '')
		{	
			alert('Please inter company name.');
			document.frmtestimonial.company.focus();
			return false;
		}
		if(document.frmtestimonial.company.value.trim().length < 3)
		{	
			alert('Company Name should not be less than 3 characters.');
			document.frmtestimonial.company.focus();
			return false;
		}
		if(document.frmtestimonial.testimo_image.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmtestimonial.testimo_image.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmtestimonial.description.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmtestimonial.description.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim().length > 250)
		{	
			alert('Please inter descriptions maximum 250 characters.');
			document.frmtestimonial.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditTestimo(){
		if(document.frmtestimonial.name.value.trim() == '')
		{
			alert('Please enter Testimonial Name.');
			document.frmtestimonial.name.focus();
			return false;
		}
		
		if(document.frmtestimonial.name.value.trim().length < 3)
		{
			alert("Please enter Testimonial Name is greater than 3 characters.");
			document.frmtestimonial.name.focus();
			return false;
		}
		if(document.frmtestimonial.designation.value.trim() == '')
		{	
			alert('Please inter designation.');
			document.frmtestimonial.designation.focus();
			return false;
		}
		if(document.frmtestimonial.designation.value.trim().length < 3)
		{	
			alert('Designation should not be less than 3 characters.');
			document.frmtestimonial.designation.focus();
			return false;
		}
		if(document.frmtestimonial.company.value.trim() == '')
		{	
			alert('Please inter company name.');
			document.frmtestimonial.company.focus();
			return false;
		}
		if(document.frmtestimonial.company.value.trim().length < 3)
		{	
			alert('Company Name should not be less than 3 characters.');
			document.frmtestimonial.company.focus();
			return false;
		}
		if(document.frmtestimonial.edit_image.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmtestimonial.testimo_image.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmtestimonial.description.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmtestimonial.description.focus();
			return false;
		}
		if(document.frmtestimonial.description.value.trim().length > 250)
		{	
			alert('Please inter descriptions maximum 250 characters.');
			document.frmtestimonial.description.focus();
			return false;
		}
		return true;	
	}
	
	/********************MANAGEMENT MANAGE***********************/

	function validManagement(){
		if(document.frmmanagement.name.value.trim() == '')
		{
			alert('Please enter Name.');
			document.frmmanagement.name.focus();
			return false;
		}
		
		if(document.frmmanagement.name.value.trim().length < 3)
		{
			alert("Please enter Name is greater than 3 characters.");
			document.frmmanagement.name.focus();
			return false;
		}
		if(document.frmmanagement.designation.value.trim() == '')
		{	
			alert('Please inter designation.');
			document.frmmanagement.designation.focus();
			return false;
		}
		if(document.frmmanagement.designation.value.trim().length < 3)
		{	
			alert('Designation should not be less than 3 characters.');
			document.frmmanagement.designation.focus();
			return false;
		}
		if(document.frmmanagement.manage_image.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmmanagement.manage_image.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmmanagement.description.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmmanagement.description.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim().length > 150)
		{	
			alert('Please inter descriptions maximum 150 characters.');
			document.frmmanagement.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditmanage(){
		if(document.frmmanagement.name.value.trim() == '')
		{
			alert('Please enter Name.');
			document.frmmanagement.name.focus();
			return false;
		}
		
		if(document.frmmanagement.name.value.trim().length < 3)
		{
			alert("Please enter Name is greater than 3 characters.");
			document.frmmanagement.name.focus();
			return false;
		}
		if(document.frmmanagement.designation.value.trim() == '')
		{	
			alert('Please inter designation.');
			document.frmmanagement.designation.focus();
			return false;
		}
		if(document.frmmanagement.designation.value.trim().length < 3)
		{	
			alert('Designation should not be less than 3 characters.');
			document.frmmanagement.designation.focus();
			return false;
		}
		if(document.frmmanagement.edit_image.value.trim() == '')
		{	
			alert('Please upload Image.');
			document.frmmanagement.manage_image.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim() == '')
		{	
			alert('Please inter Description.');
			document.frmmanagement.description.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim().length < 3)
		{	
			alert('Please inter descriptions atleast 3 characters.');
			document.frmmanagement.description.focus();
			return false;
		}
		if(document.frmmanagement.description.value.trim().length > 150)
		{	
			alert('Please inter descriptions maximum 150 characters.');
			document.frmmanagement.description.focus();
			return false;
		}
		return true;	
	}
	
	
	/********************BLOG CATEGORY MANAGEMENT***********************/

	
	function validBlogcategory(){
		if(document.frmcblogcategory.cat_name.value.trim()=="")
		{
			alert('Please inter blog category name.');
			document.frmcblogcategory.cat_name.focus();
			return false;
		}
		if(document.frmcblogcategory.cat_name.value.trim().length < 3)
		{
			alert('Please inter blog category name greater than 2 characters.');
			document.frmcblogcategory.cat_name.focus();
			return false;
		}
		
		return true;
	}
	
	function validEditBlogCategory(){
		if(document.frmcblogcategory.cat_name.value.trim()=="")
		{
			alert('Please inter blog category name.');
			document.frmcblogcategory.cat_name.focus();
			return false;
		}
		if(document.frmcblogcategory.cat_name.value.trim().length < 3)
		{
			alert('Please inter blog category name greater than 2 characters.');
			document.frmcblogcategory.cat_name.focus();
			return false;
		}
		
		return true;
	}
	
	function validGallType(){
		if(document.frmgall_type.typ_name.value.trim()=="")
		{
			alert('Please inter gallery type name.');
			document.frmgall_type.typ_name.focus();
			return false;
		}
		if(document.frmgall_type.typ_name.value.trim().length < 3)
		{
			alert('Please inter gallery type name greater than 2 characters.');
			document.frmgall_type.typ_name.focus();
			return false;
		}
		
		return true;
	}
	
	function validEditGallType(){
		if(document.frmgall_type.typ_name.value.trim()=="")
		{
			alert('Please inter gallery type name.');
			document.frmgall_type.typ_name.focus();
			return false;
		}
		if(document.frmgall_type.typ_name.value.trim().length < 3)
		{
			alert('Please inter gallery type name greater than 2 characters.');
			document.frmgall_type.typ_name.focus();
			return false;
		}
		
		return true;
	}
	
	/********************JOB MANAGEMENT***********************/

	function validJob(){
		if(document.frmjob.job_name.value.trim() == '')
		{
			alert('Please enter Job Title.');
			document.frmjob.job_name.focus();
			return false;
		}
		
		if(document.frmjob.job_name.value.trim().length < 3)
		{
			alert("Please enter Job Title is greater than 2 characters.");
			document.frmjob.job_name.focus();
			return false;
		}
		if(document.frmjob.job_location.value.trim() == '')
		{	
			alert('Please inter job location.');
			document.frmjob.job_location.focus();
			return false;
		}
		if(document.frmjob.job_location.value.trim().length < 3)
		{	
			alert('Job location should not be less than 3 characters.');
			document.frmjob.job_location.focus();
			return false;
		}
		if(document.frmjob.experience.value.trim() == '')
		{	
			alert('Please inter experience.');
			document.frmjob.experience.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData()=='')
		{	
			alert('Please inter Description.');
			document.frmjob.description.focus();
			return false;
		}
		
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmjob.description.focus();
			return false;
		}
		return true;	
	}
	
	function validEditjob(){
		if(document.frmjob.job_name.value.trim() == '')
		{
			alert('Please enter Job Title.');
			document.frmjob.job_name.focus();
			return false;
		}
		
		if(document.frmjob.job_name.value.trim().length < 3)
		{
			alert("Please enter Job Title is greater than 2 characters.");
			document.frmjob.job_name.focus();
			return false;
		}
		if(document.frmjob.job_location.value.trim() == '')
		{	
			alert('Please inter job location.');
			document.frmjob.job_location.focus();
			return false;
		}
		if(document.frmjob.job_location.value.trim().length < 3)
		{	
			alert('Job location should not be less than 3 characters.');
			document.frmjob.job_location.focus();
			return false;
		}
		if(document.frmjob.experience.value.trim() == '')
		{	
			alert('Please inter experience.');
			document.frmjob.experience.focus();
			return false;
		}
		if(CKEDITOR.instances['editor1'].getData()=='')
		{	
			alert('Please inter Descriptions.');
			document.frmjob.description.focus();
			return false;
		}
		
		if(CKEDITOR.instances['editor1'].getData().length < 50)
		{	
			alert('Please inter descriptions atleast 50 characters.');
			document.frmjob.description.focus();
			return false;
		}
		return true;	
	}
	
	//--------SEO validation-------
	function validEditSeo(){
		if(document.frmseo.page_name.value.trim() == 'select_page')
		{
			alert('Please select page name.');
			document.frmseo.page_name.focus();
			return false;
		}
		
		if(document.frmseo.title.value.trim()== '')
		{
			alert("Please enter meta title .");
			document.frmseo.title.focus();
			return false;
		}
		if(document.frmseo.meta_key.value.trim() == '')
		{	
			alert('Please inter meta keyword.');
			document.frmseo.meta_key.focus();
			return false;
		}
		if(document.frmseo.description.value.trim()== '')
		{	
			alert('Please inter meta description.');
			document.frmseo.description.focus();
			return false;
		}
		return true;	
	}
	
function nameCharacter(evt)
	{              
		var charCode = (evt.which) ? evt.which : event.keyCode
		if((64 < charCode && charCode < 91) || (96 <charCode && charCode< 123) || (charCode==32) || charCode == 8  || charCode == 46){
		return true;
		}else{
		return false;      
		}                                                                                                 
	}
	
function contactFormate(evt)
    {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{
		return false;
		}else{
		return true;      
		}
    }
	
	