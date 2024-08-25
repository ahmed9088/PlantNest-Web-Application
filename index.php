<?php
// Start the session
session_start();
if (!isset($_SESSION['profile'])) {
	header('location: login.php');
}


// Include the database connection file
include 'plantdb.php';


// Retrieve the data for the currently logged-in user from the database
if (isset($_SESSION['profile'])) {
	$profileName = $_SESSION['profile'];
	$query = "SELECT * FROM users WHERE name = '$profileName'";
	$result = mysqli_query($conn, $query);

	// Check if the query was successful and if there's data for the logged-in user
	if ($result && mysqli_num_rows($result) > 0) {
		$data = mysqli_fetch_assoc($result);
	} else {
		// Handle the case where user data is not found
		$data = array(); // Initialize an empty array to avoid errors
	}
} else {
	// Handle the case where the user is not logged in or the session is not set
	$data = array(); // Initialize an empty array to avoid errors
}
// Retrieve the data for the currently logged-in user from the database
$query_accessories = "SELECT * FROM accessories";
$result_accessories = mysqli_query($conn, $query_accessories);

// Retrieve the data from the Instagram table
$query_instagram = "SELECT * FROM instagram";
$result_instagram = mysqli_query($conn, $query_instagram);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Garden - Home Four</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="site.html">
	<link rel="apple-touch-icon" href="icon.html">
	<!-- Place favicon.ico in the root directory -->

	<!-- bootstrap v4.0.0 -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- fontawesome-icons css -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<!-- elegant css -->
	<link rel="stylesheet" href="assets/css/elegant.css">
	<!-- meanmenu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- venobox css -->
	<link rel="stylesheet" href="assets/css/venobox.css">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<!-- slick css -->
	<link rel="stylesheet" href="assets/css/slick.css">
	<!-- slick-theme css -->
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<!-- helper css -->
	<link rel="stylesheet" href="assets/css/helper.css">
	<!-- style css -->
	<link rel="stylesheet" href="style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	<!--[if lte IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

	<!--header-area start-->
	<header class="header-area">
		<!--header-top-->
		<div class="header-top d-none d-sm-block">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-9">
						<div class="contact-info">
							<ul>
								<li><i class="fa fa-phone"></i>031888963863<span>|</span></li>
								<li><i class="fa fa-home"></i>Plant Nest Pakistan <span>|</span></li>
								<li><i class="fa fa-time"></i>Monday - Saturday: 7.AM - 5.PM</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="social-icons pull-right">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
							<a href="#"><i class="fa fa-skype"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header-bottom-->
		<div id="sticker" class="header-bottom">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-sm-2">
						<div class="logo">
							<a href="index.html"><img src="Plant Images\logo lg (2).png" alt="logo"></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="mainmenu text-center">
							<nav>
								<ul>
									<li><a href="index.php">Home</a> </li>
									<li><a href="service.php">Services</a> </li>
									<li><a href="gallery.php">Gallery</a></li>

									<li><a href="about.php">About</a></li>


									<li><a href="#">Shop</a>
										<ul class="mega-menu">
											<li class="megamenu-single">
												<span class="mega-menu-title">Accessories</span>
												<ul>
													<li><a href="Garden-toys.php">Garden toys</a></li>
													<li><a href="Decorative-Pebbles.php">Decorative pebble</a></li>
													<li><a href="Garden-Brick.php">Garden bricks</a></li>
													<li><a href="Garden-fence.php">Garden Fence</a></li>
													<li><a href="garden Light.php">Garden Outdoor Light</a></li>


												</ul>
											</li>
											<li class="megamenu-single">
												<span class="mega-menu-title">Tools</span>
												<ul>
													<li><a href="Breakets.php">Breakets</a></li>
													<li><a href="batches.php">Batches</li></a>
													<li><a href="Railing.php">Railing</a></li>
													<li><a href="Wheel-Barrows.php">Wheel Barrows</a></li>
													<li><a href="Spray-Bottles.php">Spray bottel</a></li>
												</ul>
											</li>

											<li class="megamenu-single">
												<span class="mega-menu-title">products</span>
												<ul>
													<li><a href="Soil-and-set.php">Soil-&-set</a></li>
													<li><a href="Pesticides.php">Pesticides</a></li>
													<li><a href="seeds.php">Seeds</a></li>

												</ul>
											</li>
											<li class="megamenu-single">
												<img src="assets/images/ad/3.jpg" alt="" />
											</li>
										</ul>
									</li>

									<li><a href="contact.php">Contact Us</a></li>
									<div class="dropdown">
										<button class="dropbtn">
											<!-- Assuming $data['image'] contains the image filename and $data['name'] contains the name of the image -->
											<img src="User Images/<?php echo $data['Image']; ?>">
											<?php echo $_SESSION['profile'] ?>
											<i class="fas fa-caret-down"></i>
										</button>
										<div class="dropdown-content">
											<a href="setting1.php"><i class="fas fa-cog"></i> Settings</a>
											<a href="#"><i class="fas fa-history"></i> History</a>
											<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Switch</a>
											<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
										</div>
									</div>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="search-and-cart">
							<!--search-box-->
							<div class="search search-box">
								<i class="fa fa-search searching-icon"></i>
								<div class="search-place">
									<input type="text" placeholder="Search" />
								</div>
							</div>
							<!--shopping-cart-->
							<div class="cart-link">
								<a href="javascript:void(0);">
									<i class="fa fa-shopping-cart"></i>
									<span>2</span>
								</a>
								<ul class="list-none cart-dropdown">
									<li>
										<div class="mini-cart-thumb">
											<a href="#"><img src="assets/images/cart/1.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href="#">Aloe vera - herbal</a></h5>
											<span>2 x $140.00</span>
										</div>
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-thumb">
											<a href="#"><img src="assets/images/cart/2.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href="#">Haworthia Wide Zebra</a></h5>
											<span>1 x $100.00</span>
										</div>
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-thumb">
											<a href="#"><img src="assets/images/cart/3.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href="#">Echeveria Succulent</a></h5>
											<span>1 x $100.00</span>
										</div>
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-total">
											<h5>Total: $280.00</h5>
										</div>
										<div class="mini-cart-checkout">
											<a href="checkout.html">Checkout</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--header-area end-->

	<!--slider-area start-->
	<div class="slider-area">
		<div class="container-fluid">
			<div class="slider-items arrow-none">
				<div class="single-slide bg-1">
					<div class="row height-800 align-items-center">
						<div class="col-lg-9 offset-lg-3 col-sm-12">
							<div class="banner-text style-3 text-black text-left mt-minus-58">
								<h2>Succulent <br /> Minimal Collections</h2>
								<p class="mt-35">It is a long established fact that a reader will
									be distracted by the readable <br /> content of a page when
									looking at its layout. The point of using Lorem Ipsum</p>
								<a href="#" class="btn-common mt-40">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="single-slide bg-2 height-800">
					<div class="row height-800 align-items-center">
						<div class="col-sm-12">
							<div class="banner-text style-3 text-white text-center mt-minus-58">
								<h2>Your Home <br /> With a Beautiful Garden</h2>
								<p class="mt-35" style="color: white;">It is a long established fact that a reader will
									be distracted by the readable <br /> content of a page when looking at its layout.
									The point of using Lorem Ipsum</p>
								<a href="#" class="btn-common mt-40">Shop Now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="single-slide bg-3 height-800">
					<div class="row height-800 align-items-center">
						<div class="col-sm-12">
							<div class="banner-text style-3 text-white text-center mt-minus-58">
								<h2 style="color: white;">Your Home <br /> With a Beautiful Garden</h2>
								<p class="mt-35" style="color:white;">It is a long established fact that a reader will
									be distracted by the readable <br /> content of a page when looking at its layout.
									The point of using Lorem Ipsum</p>
								<a href="#" class="btn-common mt-40">Shop Now</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--slider-area end-->

	<!--products-area start-->
	<div class="products-area mt-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<div class="section-title style-2 text-center">
						<h2>New Products</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="single-product style-2">
						<div class="product-thumb-sin">
							<a href="#"><img src="assets/images/card/home-card-1.jpg" alt="" /></a>
							<div class="product-action">
								<a href="#" class="add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Add to Cart</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<h4><a href="#">Grey Pebbles Landscaping</a></h4>
							<span class="stock-unit">SKU: 12345-028</span>
							<span class="product-price">$69.99</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="single-product style-2">
						<div class="product-thumb-sin">
							<a href="#"><img src="assets/images/card/home-card-2.jpg" alt="" /></a>
							<div class="product-action">
								<a href="#" class="add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Add to Cart</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<h4><a href="#">Garden Hanging Breakets</a></h4>
							<span class="stock-unit">SKU: 12345-028</span>
							<span class="product-price">$99.99</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="single-product style-2">
						<div class="product-thumb-sin">
							<a href="#"><img src="assets/images/card/home-card-3.jpg" alt="" /></a>
							<div class="product-action">
								<a href="#" class="add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Add to Cart</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<h4><a href="#">Classic Garden Fence Panel</a></h4>
							<span class="stock-unit">SKU: 12345-028</span>
							<span class="product-price">$29.49</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="single-product style-2">
						<div class="product-thumb-sin">
							<a href="#"><img src="assets/images/card/home-card-4.jpg" alt="" /></a>
							<div class="product-action">
								<a href="#" class="add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Add to Cart</span>
								</a>
							</div>
						</div>
						<div class="product-text">
							<h4><a href="#">Wheel Barrows</a></h4>
							<span class="stock-unit">SKU: 12345-028</span>
							<span class="product-price">$69.99</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--products-area end-->

	<!--blog-area start-->
	<div class="blog-area mt-62 sm-mt-58">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<div class="section-title style-2">
						<h2>Tips New</h2>
					</div>
				</div>
			</div>
			<div class="row mt-42">
				<div class="col-lg-6 col-sm-12 single-blog style-3 style-4 p-0">
					<div class="row">
						<div class="col-sm-6">
							<div class="blog-thumb">
								<a href="#"><img src="assets/images/banners/10.jpg" alt="blog-image"></a>
							</div>
						</div>
						<div class="col-sm-6 p-0">
							<div class="blog-desc text-left">
								<h3><a href="#">Reach for the Treetops!</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip</p>
								<a href="#" class="btn-common">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12 single-blog style-3 style-4 sm-mb-0 p-0">
					<div class="row">
						<div class="col-sm-6">
							<div class="blog-thumb">
								<a href="#"><img src="assets/images/banners/11.jpg" alt="blog-image"></a>
								<i class="ti-control-play blog-video"></i>
							</div>
						</div>
						<div class="col-sm-6 p-0">
							<div class="blog-desc text-left">
								<h3><a href="#">Nothing Beats Simplicity!</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip</p>
								<a href="#" class="btn-common">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--blog-area end-->

	<!--products-area start-->
	<div class="products-area mt-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<div class="section-title style-2 text-center">
						<h2>New Products</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php while ($data = mysqli_fetch_assoc($result_accessories)) { ?>

					<div class="col-lg-3 col-sm-6">

						<div class="single-product style-2">
							<div class="product-thumb-sin">
								<a href="#"><img src="Plant Images/<?php echo $data['product_image']; ?>" alt="" /></a>
								<div class="product-action">
									<a href="#" class="add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										<span>Add to Cart</span>
									</a>
								</div>
							</div>
							<div class="product-text">
								<h4><a href="#">
										<?php echo $data['Product']; ?>
									</a></h4>
								<span class="stock-unit">SKU: 65161-028</span>
								<span class="product-price">
									$
									<?php echo $data['price']; ?>
								</span>
							</div>
						</div>

					</div>
				<?php } ?>

			</div>
		</div>
	</div>
	<!--products-area end-->






	<!--contact-box-area start-->
	<div class="contact-box-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-contact-box">
						<i class="fa fa-map-marker"></i>
						<h4>Our Location</h4>
						<p>Aptech defence branch qasimabad hyderabad sindh Pakistan</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single-contact-box">
						<i class="fa fa-phone"></i>
						<h4>Phone Number</h4>
						<p>03188893863</p>
						<p>03073762276</p>
					</div>
				</div>
				<div class="col-lg-4 d-lg-block col-md-6 d-md-none col-sm-12">
					<div class="single-contact-box">
						<i class="fa fa-envelope"></i>
						<h4>Email Contact</h4>
						<p>ahmedhere1@icloud.com </p>
						<p>ubaidsoomro505@gmail.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--contact-box-area end-->

	<!--instagram-area start-->
	<div class="instagram-area">
		<div class="container-fluid p-0">
			<div class="instragram-photos">
				<?php while ($row_instagram = mysqli_fetch_assoc($result_instagram)) { ?>
					<div class="instragram-photo">
						<a href="#"><img style="width:90%"
								src="assets\images\instagram\<?php echo $row_instagram['product_image']; ?>" alt="" /></a>
						<h5><a href="#"><i class="fa fa-instagram"></i>
								<?php echo $row_instagram['Product']; ?>"
							</a>
						</h5>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!--instagram-area end-->

	<!--footer-area start-->
	<footer class="footer-area">
		<!--footer-top-->
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget style-2">
							<h4>The Garden</h4>
							<div class="about-widget">
								<p>We are the professional the garden company to make your garden more beautiful and
									have the fresh air. We have more service for your choice.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget style-2">
							<h4>Contact Info</h4>
							<div class="contact-info style-3">
								<ul>
									<li><i class="fa fa-home"></i>Plant Nest Pakistan</li>
									<li><i class="fa fa-phone"></i>03188893863</li>
									<li><i class="fa fa-envelope"></i>ubaidsoomro505@gmail.om</li>
									<li><i class="fa fa-clock-o"></i>Monday - Saturday: 7.AM - 5.PM</li>
									<li><i></i>Sunday CLOSED</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget style-2">
							<h4>LOCATION</h4>
							<div class="fooer-menu">

								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604
								.6140424704345!2d68.34714717492666!3d25.384248677590918!2m3!1f0!2f0!
								!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7091dbec9a17%3A0xda868aa47bcd1
								e33!2sAptech%20Defence%20Hyderabad!5e0!3m2!1sen!2s!4v1691651797021!5m2!1sen!2s" width="250" height="150"
									style="border:0;" allowfullscreen="" loading="lazy"
									referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget style-2">
							<h4>Subscribe Newsletter</h4>
							<div class="subscribe-form style-3 fix">
								<input type="email" placeholder="Your Email" />
								<button><i class="fa fa-envelope"></i></button>
							</div>
							<div class="social-icons style-3 mt-35">
								<p>Follow us on</p>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-youtube"></i></a>
								<a href="#"><i class="fa fa-skype"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer copyright-->
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p><a href="templatespint.net">Templates Point</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--footer-area end-->

	<!-- modernizr js -->
	<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
	<!-- jquery-1.12.0 version -->
	<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
	<!-- bootstra.min js -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- meanmenu js -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- easing js -->
	<script src="assets/js/jquery.easing.min.js"></script>
	<!---venobox-js-->
	<script src="assets/js/venobox.min.js"></script>
	<!---slick-js-->
	<script src="assets/js/slick.min.js"></script>
	<!---waypoints-js-->
	<script src="assets/js/waypoints.js"></script>
	<!---counterup-js-->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!---isotop-js-->
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<!-- jquery-ui js -->
	<script src="assets/js/jquery-ui.min.js"></script>
	<!-- jquery.countdown js -->
	<script src="assets/js/jquery.countdown.min.js"></script>
	<!-- plugins js -->
	<script src="assets/js/plugins.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>

</html>