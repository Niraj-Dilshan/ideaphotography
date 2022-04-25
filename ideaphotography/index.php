<?php 
	include "./db.php";
	session_start(); 
?>

<!DOCTYPE html>

<html class=no-js lang=en>

<head>
	
	<meta charset=UTF-8>
	<meta content="IE=edge" http-equiv=X-UA-Compatible>
	<meta content="width=device-width,initial-scale=1" name=viewport>
	<title>IdeaPhotography.lk</title>

	<style>
		img{
		min-width: 100%;
	}
	.sr-only{
		position: absolute;
		left: -9999999px;
	}
	.img-responsive,
	.thumbnail > img,
	.thumbnail a > img,
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > img {
	  display: block;
	  max-width: 100%;
	  height: auto;
	}
	//carousel start
	.carousel {
	  position: relative;
	}
	.carousel-inner {
	  position: relative;
	  width: 100%;
	  overflow: hidden;
	}
	.carousel-inner > .item {
	  position: relative;
	  display: none;
	  -webkit-transition: .6s ease-in-out left;
		   -o-transition: .6s ease-in-out left;
			  transition: .6s ease-in-out left;
	}
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > img {
	  line-height: 1;
	}
	@media all and (transform-3d), (-webkit-transform-3d) {
	  .carousel-inner > .item {
		-webkit-transition: -webkit-transform .6s ease-in-out;
			 -o-transition:      -o-transform .6s ease-in-out;
				transition:         transform .6s ease-in-out;

		-webkit-backface-visibility: hidden;
				backface-visibility: hidden;
		-webkit-perspective: 1000px;
				perspective: 1000px;
	  }
	  .carousel-inner > .item.next,
	  .carousel-inner > .item.active.right {
		left: 0;
		-webkit-transform: translate3d(100%, 0, 0);
				transform: translate3d(100%, 0, 0);
	  }
	  .carousel-inner > .item.prev,
	  .carousel-inner > .item.active.left {
		left: 0;
		-webkit-transform: translate3d(-100%, 0, 0);
				transform: translate3d(-100%, 0, 0);
	  }
	  .carousel-inner > .item.next.left,
	  .carousel-inner > .item.prev.right,
	  .carousel-inner > .item.active {
		left: 0;
		-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
	  }
	}
	.carousel-inner > .active,
	.carousel-inner > .next,
	.carousel-inner > .prev {
	  display: block;
	}
	.carousel-inner > .active {
	  left: 0;
	}
	.carousel-inner > .next,
	.carousel-inner > .prev {
	  position: absolute;
	  top: 0;
	  width: 100%;
	}
	.carousel-inner > .next {
	  left: 100%;
	}
	.carousel-inner > .prev {
	  left: -100%;
	}
	.carousel-inner > .next.left,
	.carousel-inner > .prev.right {
	  left: 0;
	}
	.carousel-inner > .active.left {
	  left: -100%;
	}
	.carousel-inner > .active.right {
	  left: 100%;
	}
	.carousel-control {
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  left: 0;
	  width: 15%;
	  font-size: 20px;
	  color: #fff;
	  text-align: center;
	  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
	  filter: alpha(opacity=50);
	  opacity: .5;
	}
	.carousel-control.left {
	  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
	  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
	  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
	  background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
	  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
	  background-repeat: repeat-x;
	}
	.carousel-control.right {
	  right: 0;
	  left: auto;
	  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
	  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
	  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
	  background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
	  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
	  background-repeat: repeat-x;
	}
	.carousel-control:hover,
	.carousel-control:focus {
	  color: #fff;
	  text-decoration: none;
	  filter: alpha(opacity=90);
	  outline: 0;
	  opacity: .9;
	}
	.carousel-control .icon-prev,
	.carousel-control .icon-next,
	.carousel-control .glyphicon-chevron-left,
	.carousel-control .glyphicon-chevron-right {
	  position: absolute;
	  top: 50%;
	  z-index: 5;
	  display: inline-block;
	  margin-top: -10px;
	}
	.carousel-control .icon-prev,
	.carousel-control .glyphicon-chevron-left {
	  left: 50%;
	  margin-left: -10px;
	}
	.carousel-control .icon-next,
	.carousel-control .glyphicon-chevron-right {
	  right: 50%;
	  margin-right: -10px;
	}
	.carousel-control .icon-prev,
	.carousel-control .icon-next {
	  width: 20px;
	  height: 20px;
	  font-family: serif;
	  line-height: 1;
	}
	.carousel-control .icon-prev:before {
	  content: '\2039';
	}
	.carousel-control .icon-next:before {
	  content: '\203a';
	}
	.carousel-indicators {
	  position: absolute;
	  bottom: 10px;
	  left: 50%;
	  z-index: 15;
	  width: 60%;
	  padding-left: 0;
	  margin-left: -30%;
	  text-align: center;
	  list-style: none;
	}
	.carousel-indicators li {
	  display: inline-block;
	  width: 10px;
	  height: 10px;
	  margin: 1px;
	  text-indent: -999px;
	  cursor: pointer;
	  background-color: #000 \9;
	  background-color: rgba(0, 0, 0, 0);
	  border: 1px solid #fff;
	  border-radius: 10px;
	}
	.carousel-indicators .active {
	  width: 12px;
	  height: 12px;
	  margin: 0;
	  background-color: #fff;
	}
	.carousel-caption {
	  position: absolute;
	  right: 15%;
	  bottom: 20px;
	  left: 15%;
	  z-index: 10;
	  padding-top: 20px;
	  padding-bottom: 20px;
	  color: #fff;
	  text-align: center;
	  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
	}
	.carousel-caption .btn {
	  text-shadow: none;
	}
	@media screen and (min-width: 768px) {
	  .carousel-control .glyphicon-chevron-left,
	  .carousel-control .glyphicon-chevron-right,
	  .carousel-control .icon-prev,
	  .carousel-control .icon-next {
		width: 30px;
		height: 30px;
		margin-top: -15px;
		font-size: 30px;
	  }
	  .carousel-control .glyphicon-chevron-left,
	  .carousel-control .icon-prev {
		margin-left: -15px;
	  }
	  .carousel-control .glyphicon-chevron-right,
	  .carousel-control .icon-next {
		margin-right: -15px;
	  }
	  .carousel-caption {
		right: 20%;
		left: 20%;
		padding-bottom: 30px;
	  }
	  .carousel-indicators {
		bottom: 20px;
	  }
	}
	//carousel-end
	</style>
	<!--	CSS	-->
	<link href=assets/css/bootstrap.min.css rel=stylesheet>
	<link href=assets/css/font-awesome.min.css rel=stylesheet>
	<link href=assets/css/ionicons.min.css rel=stylesheet>
	<link href=assets/css/magnific-popup.css rel=stylesheet>
	<link href=assets/css/style.css rel=stylesheet>
	<!--	JS	-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
	
	<div id=preloader>
		<div class=loader><span></span> <span></span> <span></span> <span></span></div>
	</div>
	
	<div class=home-page>
		<div class="image_logo_intro introduction" style="background-image:url(assets/img/bg.jpg);">
			<div class=intro-content align="center">
			   <div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php
							$query="SELECT * FROM mainslider";
							$result=mysqli_query($connect,$query);
							$i=0;
							while($row=mysqli_fetch_assoc($result))
							{  
						?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" ></li>
					   	<?php $i=$i+1;}?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">

						<div class="item active">
							<img src="assets/img/slider/1.jpg" alt="picture" style="width:100%;">
						</div> 
					<?php
						$query="SELECT * FROM mainslider";
						$result=mysqli_query($connect,$query);
						while($row=mysqli_fetch_assoc($result))
						{
					?>
					<?php if ($row['image']== "1.jpg" ) continue; ?>
						<div class="item ">
						<img src="assets/img/slider/<?php echo $row['image']?>" alt="picture" style="width:100%;">
						</div>
					<?php } ?>
					</div>

	  			</div>
			  <p><font color="white"  size="6" face="Georgia" >Tell Your Dreams</font><br>
				 <font color="red"  size="6" face="Georgia">We Change Your World !</font></p>
				<button type="button" class="btn btn-light" onclick="window.location='./Blog/login/index.php';"><strong>Customer Area</strong></button>
			</div>
		</div>
		
		<div class="menu four_nav_item">
			
			<div class="menu_button service-btn" data-url_target=service>
				<div class=mask style=background-image:url("assets/img/navigation/service.jpg")></div>
				<div class=heading><i class="hidden-xs ion-ios-lightbulb-outline"></i>
					<h2><b>Services</b></h2>
				</div>
			</div>
			
			<div class="menu_button faq-btn">
				<div class=mask style=background-image:url("assets/img/navigation/blog.jpg")></div>
				<div class=heading><i class="hidden-xs ion-ios-chatboxes-outline"></i>
				   <a href="./Blog/index.php" style="color: #000000"> <h2><b>Blog</b></h2></a>
				</div>
			</div>
			
			<div class="menu_button profile-btn" data-url_target=about_us>
				<div class=mask style=background-image:url("assets/img/navigation/aboutus.jpg")></div>
				<div class=heading><i class="hidden-xs ion-ios-people-outline"></i>
					<h2><b>About Us</b></h2>
				</div>
			</div>
			
			<div class="menu_button contact-btn" data-url_target=contact>
				<div class=mask style=background-image:url("assets/img/navigation/contact.jpg")></div>
				<div class=heading><b><i class="hidden-xs ion-ios-email-outline"></i></b>
					<h2><b>Contact</b></h2>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class=close-btn></div>
	
	<div class="container-fluid page profile-page" id=about_us>
		<div class=row>
			
			<div class="hidden-xs col-md-3 hidden-sm image-container">
				<div class=mask></div>
				<div class=main-heading>
					<h1>About us</h1></div>
			</div>
			
			<div class="col-md-9 col-sm-12 content-container" align="center">
				
				<div class=clearfix>
					<h2 class=small-heading>LEARN ABOUT US</h2>
					<div class=row>
						<div class=col-md-12>
							<div class=about-us-desc>
									<p class="text-center">IdeaPhotography is a profeesional wedding photography studio in Tangalle, Sri Lanka. Focused on innovative concepts with a fresh approach. We offer wedding photography, wedding videography, commercial photo shoots, personel portfolio shoots and etc. IdeaPhotography founder and photographer Minura Kavishan has 4 years' experience in wedding photography.
							</div>
						</div>
					</div>
				</div>
				
				<div class=clearfix>
					
					<h2 class=small-heading>OUR FUN FACTS</h2>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">						
						<div class=row>							
							<div class="col-xs-12 col-md-4 services">
								<div class=facts>
									<div class=facts-overlay><i class="fa fa-3x fa-calendar"></i>
										<p class=count>50
											<p class=text-capitalize>Events  <br>&nbsp 
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-md-4 services">
								<div class=facts>
									<div class=facts-overlay><i class="fa fa-3x fa-user"></i>
										<p class=count>100
											<p class=text-capitalize>Happy Customers <br>&nbsp
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-md-4 services">
								<div class=facts>
									<div class=facts-overlay><i class="fa fa-3x fa-cubes"></i>
										<p class=count>20
											<p class=text-capitalize>More than projects delivered
									</div>
								</div>
							</div>
							
						</div>						
					</div>					
				</div>
				
				<div class="clearfix full-height">
					
					<h2 class=small-heading>MEET THE TEAM</h2>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">						
						<div class=row>							
							<div class="col-xs-12 col-md-6">
								<div class="center-block team-member-box text-center"><img src=assets/img/minura.jpg class=img-responsive>
									<h4 class=text-capitalize>Minura Kavishan</h4>
									<p class=text-uppercase>Founder and ceo</div>
							</div>
							
							<div class="col-xs-12 col-md-6">
								<div class="center-block team-member-box text-center"><img src=assets/img/thaveesha.jpg class=img-responsive>
									<h4 class=text-capitalize>Thavisha Wickramasuriya</h4>
									<p class=text-uppercase>Photographer</div>
							</div>
							
						</div>						
					</div>					
				</div>
				<div class="clearfix footer">
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=row>
							<div class="col-xs-12 col-md-6 col-sm-12">
								<p class=copyright>Copyright © <?php echo date("Y");?> <a href=#> IdeaPhotography.lk</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid page service-page" id=service align="center">
		<div class=row>
			
			<div class="hidden-xs col-md-3 hidden-sm image-container">
				<div class=mask></div>
				<div class=main-heading>
					<h1>Service</h1></div>
			</div>
			
			<div class="col-md-9 col-sm-12 content-container">
				<div class=clearfix>
					<h2 class=small-heading>WHAT WE DO BEST</h2>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=row>
							<div class="col-md-4 col-sm-12">
								<div class=faq-desc-item>
									<div class="text-center flip-container">
										<div class="flipper front"><i class="fa fa-mobile"></i>
											<h5>WEDDINGS</h5></div>
										<div class="flipper back">
											<h5>WEDDINGS</h5>
											<p>A wedding is typically one of the most memorable days in a lifetime, one that people remember for years to come. For most couples, regular pictures just won’t do. Wedding photography is much more than simply snapping a few pictures. It is a one kind of art. Just tell us what you need and we will fullfill that..
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class=faq-desc-item>
									<div class="text-center flip-container">
										<div class="flipper front"><i class="fa fa-lightbulb-o"></i>
											<h5>PRE SHOOTS</h5></div>
										<div class="flipper back">
											<h5>PRE SHOOTS</h5>
											<p>A pre-shoot is a great way to get acquainted with being in front of the camera as many people haven’t had professional photographs before - but it also gives me the perfect opportunity to see how you interact together, and capture the magical moments between you both.
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class=faq-desc-item>
									<div class="text-center flip-container" ontouchstart='this.classList.toggle("hover")'>
										<div class="flipper front"><i class="fa fa-paint-brush"></i>
											<h5>BRIDAL SHOOT</h5></div>
										<div class="flipper back">
											<h5>BRIDAL SHOOT</h5>
											<p>In the bridal session, the bride gets dressed and usually has her makeup and hair done. The bride should have a complete bridal look that she wants to have on reception. The bridal photoshoot is a secret from the guests, family, and friends. At the wedding reception, a large bridal portrait is displayed.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class=clearfix>
					<h2 class=small-heading>CHOSSE YOUR PLAN</h2>
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=row>
							<?php  
								$query="SELECT * FROM packages";
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result)){
							?>
								<div class="col-xs-12 col-md-6 col-sm-6 price-catagory">
									<div class=price-box>
										<p class=pricing-catagory-name><?php echo  $row['pac_name']; ?>
											<p><span class=price>Rs.<?php echo  $row['price']; ?></span>/Month
												<ul>
													<?php 
														$myString = $row['description'];
														$myArray = explode(',', $myString);
														foreach($myArray as $my_Array){
															echo "<li>".$my_Array. "</li>";
														}
													?>

												</ul><a href=# class=btn>Order Now</a></div>
								</div> 
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="clearfix footer">
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=row>
							<div class="col-xs-12 col-md-6 col-sm-12">
								<p class=copyright>Copyright © <?php echo date("Y");?> <a href=#> IdeaPhotography.lk</a>
							</div>                     
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="container-fluid page faq-page" id=faq>
		<?php if(id=='faq'){ ?>
	  		<script type="text/javascript">location.href = './Blog';</script>
		<?php } ?>
	</div>
	
	<div class="container-fluid page contact-page" id=contact align="center">
		<div class=row>
			
			<div class="hidden-xs col-md-3 hidden-sm image-container">
				<div class=mask></div>
				<div class=main-heading>
					<h1>contact</h1></div>
			</div>
			
			<div class="col-md-9 col-sm-12 content-container">
				<div class="clearfix full-height">
					<h2 class=small-heading>COME IN TOUCH</h2>

					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=contact-info>
							<div class=row>
								<div class=col-md-6>
									<div class=data><i class="fa fa-map-marker"></i> <span style="text-align: left">No.1/28, Indipokunagoda Road,<br> Tangalle, Sri Lanka<br></span></div>
									<div class=data><i class="fa fa-envelope"></i> <span>IdeaPhotography@gmail.com</span></div>
									<div class=data><i class="fa fa-phone"></i> <span>0702018739</span></div>
								</div>
								<div class=col-md-6>
									<div id=map-canvas></div>
								</div>
							</div>
						</div>
						<div class=contact-form>
							<div class=row>
								<form action="./contact.php" method="POST" id="form1">

									<div class="col-md-12 col-sm-6">
										<div class=form-group>
											<input class=form-control id=name name=name placeholder="name" required>
										</div>
									</div>
									
									<div class="col-md-12 col-sm-6">
										<div class=form-group>
											<input class=form-control id=email name=email placeholder="email" required type=email>
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12">
										<div class=form-group>
											<textarea class=form-control id=message name=message placeholder="message" required rows=5 type=text></textarea>
										</div>
									</div>
									
									<div class="col-xs-12 col-md-4">
									   <button class="btn btn-danger" type=submit name='contact'>Contact us</button>
									   </div>
									<div class="col-xs-12 col-md-8" id=contactFormResponse></div>

								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix footer">
					<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
						<div class=row>
							<div class="col-xs-12 col-md-6 col-sm-12">
								<p class=copyright>Copyright ©  <?php echo date("Y");?> <a href=index.php>IdeaPhotography.lk</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>		
	</div>
	
	<script src=assets/js/jquery-2.1.3.min.js></script>
	<script src=assets/js/bootstrap.min.js></script>
	<script src=assets/js/modernizr.js></script>
	<script src=assets/js/jquery.easing.min.js></script>
	<script src=assets/js/jquery.magnific-popup.min.js></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyDHROeb_V3gSyiBa4Yh8SSTKtx14kQ5wIA&callback=initMap" async defer></script>
	<script src=assets/js/script.js></script>
	<script>
		function initMap() {
			var e = {
					lat: 6.026007059402769,
					lng: 80.79272441373853
				},
				o = new google.maps.Map(document.getElementById("map-canvas"), {
					zoom: 17,
					center: e,
					scrollwheel: !1,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			new google.maps.Marker({
				position: e,
				map: o,
				title: "IdeaPhotography.lk"
			})
		}
	</script>
	
</body>

</html>

