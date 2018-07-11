 @include ('include.header'); 
<!-- My Style Sheet -->
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<!-- ========= Code.Starts ========= -->
	<!-- =========   @Rajuan I.    ========= -->	
<!--
========== 01.Navbar.Header Div ============
-->
@include ('include.fixedNavbar');
<!--  End.Navbar.End -->
<!--========== 02.Slider Div ===========-->
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img class="img-responsive" src="img/slider1.jpg" alt="Los Angeles" style="width:100%;">
				<<!-- div class="carousel-caption">
					<h1 style="font-size: 7.5vw;color: #fff;font-weight: bold;margin: 0;">Blood 24/7</h1>
					<p style="margin-top: 0;font-weight: bold;margin-bottom: 100px;">We are always ready at your service.</p>
			</div> -->
		</div>
		<div class="item">
			<img class="img-responsive" src="img/slider2.png" alt="Chicago" style="width:100%;">
			<div class="carousel-caption">
				<h1 style="font-size: 7.5vw;color: #fff;font-weight: bold;margin: 0;">Blood 24/7</h1>
				<p style="margin-top: 0;font-weight: bold;margin-bottom: 100px;">We are always ready at your service.</p>
			</div>
		</div>
		
		<div class="item">
			<img class="img-responsive" src="img/Slider_4_blog.png" alt="New york" style="width:100%;">
			<div class="carousel-caption">
				<h1 style="font-size: 7.5vw;color: #fff;font-weight: bold;margin: 0;">Blood 24/7</h1>
				<p style="margin-top: 0;font-weight: bold;margin-bottom: 100px;">We are always ready at your service.</p>
			</div>
		</div>
	</div>
	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
</div>
<!--End.Slider.End -->
<!--
========= 03.Slider Bottom Div ===========
-->
<!-- SLider Bottom Bar with Differnts Sections Logo -->
<div class="containerSlider">
<div class="rowSlider">
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-donor.png" alt="">
			</a>
			<div class="desc">Donor</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-financial-donors.png" alt="">
			</a>
			<div class="desc">Financial Donor</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-hospitals-physicians.png" alt="">
			</a>
			<div class="desc">Hospitals & Physicians</div>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-researchers.png" alt="">
			</a>
			<div class="desc">Researchers & Tips</div>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-volunteers.png" alt="">
			</a>
			<div class="desc">Volunteers</div>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="img">
			<a target="_blank" href="#">
				<img src="img/role-job-seekers.png" alt="">
			</a>
			<div class="desc">Whats New?</div>
		</div>
	</div>
	
</div>
</div>
<!--End.SLider Bottom Bar with Differnts Sections Logo.End -->
<!--
=========== 04.Go digital Div ============
-->
<!---->
<div class = "col-md-12 goDigital">
<div class = "col-md-3 imgGoDigital">
	
	<a target="_blank" href="">
		<img src="img/blood-digital-promo.jpg" alt="">
	</a>
	<div class="descGoDigital">
		<h2>Save time, Go Digital</h2>
	Add a description here</div>
	
</div>
<div class = "col-md-3 imgGoDigital">
	
	<a target="_blank" href="">
		<img src="img/igvLife.jpg" alt="">
	</a>
	<div class="descGoDigital">
		<h2>donation criteria</h2>
		Add a description here
	</div>
	
</div>
<div class = "col-md-3 imgGoDigital">
	<a target="_blank" href="">
		<img src="img/blood-digital-promo.jpg" alt="">
	</a>
	<div class="descGoDigital">
		<h2>Give where you live</h2>
	Add a description here</div>
</div>
</div>
<!--End.Go digital Div.End -->
<!--
========== 05.National Inventory Div ============
-->
<div class="col-md-12 inventory">
<div class="col-md-12">
	<div class="imageInventoryUpperStyle">
		<img src="img/top-red-banner.png" alt="">
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-2 inventoryImg">
		<div class="img">
			<img src="img/blood-bag.critical.png" alt="" style="max-height: 250px;">
		</div>
	</div>
	
	<div class="col-md-5 inventoryMiddleParagraph">
		<h1>Blood Donors Needed</h1>
	</div>
	
	<div class="col-md-3 inventoryImg">
		<div class="img">
			<img src="img/chart.blood_inventory_levels.en.png" alt="">
		</div>
	</div>
</div>
</div>
<!--End.National Inventory Div.End -->
<!--
========== 06.Donate Today Div ============
-->
<div class="col-md-12 donateToday">
<div class="col-md-12">
	<div class="imagedonateTodayUpperStyle">
		<img src="img/home-stats-vignette.png" alt="">
	</div>
</div>
<div class="col-md-12">
	<div class="imagedonateTodayBoxStyle">
		<div class="col-md-3 donateTodayImg">
			<p>OVER</p>
			<h1>80 DISEASES</h1>
			<p>May be treated by a steam sell transplant</p>
			<div class="img">
				<img src="img/Stem-cells-stat-card-sliced_03.png" alt="">
			</div>
		</div>
		
		<div class="col-md-3 donateTodayImg" >
			<p>WE are</p>
			<h1>Connected</h1>
			<p>Over</p>
			<div class="img">
				<img src="img/cbs-info-card-image.organization.fw_.png" alt="">
			</div>
		</div>
		
		<div class="col-md-3 donateTodayImg">
			<p>OVER</p>
			<h1>1M+ Partners</h1>
			<p>Contributing</p>
			<div class="img">
				<img src="img/pfl-stat-card-sliced.png" alt="">
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!--End.Donate Today.End-->
<!-- ============.The End.============= -->
@include ('include.footer');