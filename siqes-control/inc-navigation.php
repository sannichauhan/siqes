 <div class="menu">  
 <a class="logo" href="dashboard.php"><img src="img/logo.png" alt="" title=""/></a> 
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active">
			<?php if(isset($_SESSION['admin']['name']) && !empty($_SESSION['admin']['name'])){ echo "Welcome ".ucwords($_SESSION['admin']['name']); }  ?>
			<!--Welcome !-->
		</div>
	</div>

	<div class="admin">
		<div class="image">
			<!--<img src="#" class="img-polaroid"/>-->                
		</div>
		<ul class="control">                
			<li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
		</ul>
		<!--<div class="info">
			<span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
		</div>-->
	</div>
	<ul class="navigation">            
		<li class="active">
			<a href="dashboard.php">
				<span class="isw-grid"></span><span class="text">Dashboard</span>
			</a>
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Banner</span>
			</a>
			<ul>
				<li>
					<a href="add-banner.php">
						<span class="icon-user"></span><span class="text">Add banner<span>
					</a>                  
				</li>
				<li>
					<a href="banner-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Banner</span>
					</a>                  
				</li>            
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage About Us</span>
			</a>
			<ul>
				<!--<li>
					<a href="add-aboutus.php">
						<span class="icon-user"></span><span class="text">Add about us<span>
					</a>                  
				</li>-->
				<li>
					<a href="edit-aboutus.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit About Us</span>
					</a>                  
				</li> 
				           
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Services</span>
			</a>
			<ul>
				<li>
					<a href="add-services.php">
						<span class="icon-user"></span><span class="text">Add Services<span>
					</a>                  
				</li>
				<li>
					<a href="service-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Services</span>
					</a>                  
				</li>            
			</ul>                
		</li>
		<!--<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Product</span>
			</a>
			<ul>
				<li>
					<a href="add-product.php">
						<span class="icon-user"></span><span class="text">Add Product <span>
					</a>                  
				</li>
				<li>
					<a href="product-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Product</span>
					</a>                  
				</li>             
			</ul>                
		</li>-->
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Client</span>
			</a>
			<ul>
			<li>
					<a href="add-client.php">
						<span class="icon-user"></span><span class="text">Add Client <span>
					</a>                  
				</li>
				<li>
					<a href="client-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Client</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Partners</span>
			</a>
			<ul>
			<li>
					<a href="add-partner.php">
						<span class="icon-user"></span><span class="text">Add Partner <span>
					</a>                  
				</li>
				<li>
					<a href="partner-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Partner</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Gallery</span>
			</a>
			<ul>
			<li>
					<a href="add-gallery-type.php">
						<span class="icon-user"></span><span class="text">Add Gallery Type <span>
					</a>                  
				</li>
				<li>
					<a href="gallery-typ-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Gallery Type</span>
					</a>                 
				</li>
			<li>
					<a href="add-gallery.php">
						<span class="icon-user"></span><span class="text">Add Gallery <span>
					</a>                  
				</li>
				<li>
					<a href="gallery-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Gallery</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Blog</span>
			</a>
			<ul>
			<li>
					<a href="add-blog-category.php">
						<span class="icon-user"></span><span class="text">Add Blog Category <span>
					</a>                  
				</li>
				<li>
					<a href="blog-category-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Blog Category</span>
					</a>                 
				</li>   
			</ul> 
			<ul>
			<li>
					<a href="add-blog.php">
						<span class="icon-user"></span><span class="text">Add Blog <span>
					</a>                  
				</li>
				<li>
					<a href="blog-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Blog</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Site</span>
			</a>
			<ul>
			<li>
					<a href="edit-social.php">
						<span class="icon-user"></span><span class="text">Edit Site <span>
					</a>                  
				</li>  
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Subscribe User</span>
			</a>
			<ul>
			<li>
					<a href="subscribe-list.php">
						<span class="icon-user"></span><span class="text">User Listing <span>
					</a>                  
				</li>  
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Testimonials</span>
			</a>
			<ul>
			<li>
					<a href="add-testimonials.php">
						<span class="icon-user"></span><span class="text">Add Testimonials <span>
					</a>                  
				</li>
				<li>
					<a href="testimonials-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Testimonials</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Management</span>
			</a>
			<ul>
			<li>
					<a href="add-management.php">
						<span class="icon-user"></span><span class="text">Add Management <span>
					</a>                  
				</li>
				<li>
					<a href="management-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Management</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li>
			<a href="rfq-list.php">
				<span class="isw-list"></span><span class="text">Request Query List</span>
			</a>
			<!--<ul>
			<li>
					<a href="rfq-list.php">
						<span class="icon-user"></span><span class="text">View Request Query <span>
					</a>                  
				</li>  
			</ul>-->                
		</li>
		<li class="openable">
			<a href="#">
				<span class="isw-list"></span><span class="text">Manage Job</span>
			</a>
			<ul>
			<li>
					<a href="add-job.php">
						<span class="icon-user"></span><span class="text">Add Job <span>
					</a>                  
				</li>
				<li>
					<a href="job-list.php">
						<span class="icon-pencil"></span><span class="text">View/ Edit Job</span>
					</a>                 
				</li>   
			</ul>                
		</li>
		<li>
			<a href="job-application-list.php">
				<span class="isw-list"></span><span class="text">Job Application List</span>
			</a>             
		</li>
		<li>
			<a href="edit-seometa.php">
				<span class="isw-list"></span><span class="text">Manage SEO</span>
			</a>               
		</li>
		
		     
	</ul>
</div>