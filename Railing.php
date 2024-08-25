<?php
// Start the session
session_start();

// Include the database connection file
include 'plantdb.php';

// Retrieve the data for the currently logged-in user from the database

// Retrieve the sorting order from the URL parameter
$sort = $_GET['sort'] ?? '';

// Adjust the SQL query based on the sorting order
if ($sort === 'price_low') {
	$query = "SELECT * FROM railings ORDER BY price ASC";
} else if ($sort === 'price_high') {
	$query = "SELECT * FROM railings  ORDER BY price DESC";
} else {
	$query = "SELECT * FROM railings";
}

$result_railings = mysqli_query($conn, $query);
$result_railings_details = mysqli_query($conn, $query);


?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Garden - Shop With Sidebar</title>
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
	<script src="https://code.jquery.com/jquery-3.7.0.js"
		integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

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
								<ul class="list-none cart-dropdown" id="cart-details-list">
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


	<script>
		$(document).ready(function () {
			// Retrieve cart data from local storage
			var cartData = JSON.parse(localStorage.getItem('cart'));

			// Get the UL element where you want to display the cart details
			var cartList = $('#cart-details-list');


			// Update the cart details list
			function updateCartDetails() {
				cartList.empty();

				// Insert new cart items before the "Total" and "Checkout" sections
				$.each(cartData, function (index, item) {
					var listItem = '<li>' +
						'<div class="mini-cart-thumb">' +
						'<a href="#"><img src="' + item.image + '" alt="" /></a>' +
						'</div>' +
						'<div class="mini-cart-heading">' +
						'<h5><a href="#">' + item.name + '</a></h5>' +
						'<span>' + item.quantity + ' x $' + item.price + '</span>' +
						'</div>' +
						'<div class="mini-cart-remove">' +
						'<button class="remove-cart-item" data-index="' + index + '"><i class="fa fa-trash-o" aria-hidden="true"></i></button>' +
						'</div>' +
						'</li>';

					if (index === cartData.length - 1) {
						// Insert before the "Total" and "Checkout" sections
						cartList.append(listItem);
						cartList.append(totalAndCheckoutSection);
					} else {
						cartList.append(listItem);
					}
				});

				// Update the "Total" section
				$('.mini-cart-total h5').text('Total: $' + calculateTotal());
			}

			// HTML for the "Total" and "Checkout" sections
			var totalAndCheckoutSection = '<li>' +
				'<div class="mini-cart-total">' +
				'<h5>Total: $' + calculateTotal() + '</h5>' +
				'</div>' +
				'<div class="mini-cart-checkout">' +
				'<a href="checkout.html">Checkout</a>' +
				'</div>' +
				'</li>';

			// Calculate the total cart value
			function calculateTotal() {
				var total = 0;
				$.each(cartData, function (index, item) {
					total += item.price * item.quantity;
				});
				return total.toFixed(2);
			}

			// Initial update of cart details
			updateCartDetails();



			// Add event listener for removing items from the cart
			$(document).on('click', '.remove-cart-item', function () {
				var index = $(this).data('index');
				var removedItem = cartData.splice(index, 1)[0]; // Remove item from cart data and get the removed item
				localStorage.setItem('cart', JSON.stringify(cartData)); // Update local storage
				$(this).closest('li').remove(); // Remove list item from UI
				updateCartDetails(); // Update the cart details list
			});
		});

	</script>
	<!--header-area end-->

<!--page-banner-area start-->
<div class="page-banner-area bg-6">
		<img class="bannerback6" src="assets\images\card\garden-Railing-card-1.jpg" alt="">
		<div class="container">
			<div class="row align-items-center height-400">
				<div class="col-lg-12">
					<div class="page-banner-text text-center">
						<h2><u>Garden Railing	</u></h2>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--page-banner-area end-->

	<!--products start-->
	<div class="products-area mt-100 sm-mt-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<div class="sidebar sm-mt-0">
						<div class="single-sidebar no-bg sidebar-search-box">
							<button><i class="fa fa-search"></i></button>
							<input type="text" placeholder="Search..." />
						</div>

						<div class="single-sidebar no-bg">
							<h4>Categories</h4>
							<ul class="list-none">
								<li><a href="?sort=''">Default</a><span>(16)</span></li>
								<li><a href="#">Popularity</a><span>(25)</span></li>
								<li><a href="#">Average rating</a><span>(95)</span></li>
								<li><a href="?sort=price_low">Price: low to high</a><span>(15)</span></li>
								<li><a href="?sort=price_high">Price: high to low</a><span>(10)</span></li>
							</ul>
						</div>


						<div class="single-sidebar no-bg">
							<h4>Price</h4>
							<div class="price_filter">
								<div id="slider-range"></div>
								<div class="price_slider_amount">
									<label>Price:</label>
									<input type="text" id="amount" name="price" placeholder="Add Your Price" />
								</div>
							</div>
						</div>
						<div class="single-sidebar no-bg product-list">
							<h4>New Products</h4>
							<ul class="list-none">
								<li>
									<a href="#"><img src="assets\images\card\garden-Railing-card-2.jpg" alt="" /></a>
									<h5><a href="#">Children's toys on sand</a></h5>
									<small>$69.99</small>
								</li>

							</ul>
						</div>
						<div class="single-sidebar ad-placeholder img-100p">
							<img src="assets/images/sidebar/2.jpg" alt="" />
							<div class="adplace-text style-2">
								<h4>Discount 16% <br /> for plant</h4>
							</div>
						</div>

					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<!--products-area start-->
					<div class="products-area">
						<div class="container">
							<div class="row align-items-baseline">
								<div class="col-sm-6">
									<div class="products-sort">
										<form>
											<label>Item Show :</label>
											<select>
												<option>12 Products</option>
												<option>8 Products</option>
												<option>4 Products</option>
											</select>
										</form>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="product-view-system pull-right mb-minus-20" role="tablist">
										<ul class="nav nav-tabs">
											<li><a class="active" data-toggle="tab" href="#home"><i
														class="fa fa-th-large"></i></a></li>
											<li><a data-toggle="tab" href="#menu1"><i class="fa fa-th-list"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-content mt-30">
								<div id="home" class="tab-pane active">
									<div class="row" id="products-list">
										<?php while ($data = mysqli_fetch_assoc($result_railings)) { ?>

											<div class="col-lg-4 col-md-6 col-sm-12">

												<div class="single-product">

													<div class="product-thumb-sin">
														<a href="#"><img
																src="Plant Images/<?php echo $data['product_image']; ?>"
																alt="" /></a>
														<div class="product-action">
															<a href="" class="add-to-cart"
																data-name="<?php echo $data['Product']; ?>"
																data-price="<?php echo $data['price']; ?>"
																data-image="Plant Images/<?php echo $data['product_image']; ?>">
																<span>Add to Cart</span>
															</a>
														</div>
													</div>
													<div class="product-text">
														<h4><a href="#">
																<?php echo $data['Product']; ?>
															</a></h4>
														<span class="product-price">
															<?php echo $data['price']; ?>
														</span>
													</div>

												</div>

											</div>
										<?php } ?>

									</div>
								</div>
								<script>
									// Add event listener for "Add to Cart" button click
									$('.add-to-cart').on('click', function () {

										var productName = $(this).data('name');
										var productPrice = $(this).data('price');
										var productImage = $(this).data('image');

										// Create a cart item object
										var cartItem = {
											name: productName,
											price: productPrice,
											image: productImage,
											quantity: 1 // You can set the quantity as needed
										};

										// Get existing cart data from local storage
										var cartData = JSON.parse(localStorage.getItem('cart')) || [];

										// Check if the product is already in the cart
										var existingItem = cartData.find(item => item.name === productName);
										if (existingItem) {
											existingItem.quantity++; // Increase quantity if already in cart
										} else {
											cartData.push(cartItem); // Add the new item to cart
										}

										// Save updated cart data to local storage
										localStorage.setItem('cart', JSON.stringify(cartData));
									});
								</script>
								<div id="menu1" class="tab-pane fade">
									<?php while ($data = mysqli_fetch_assoc($result_railings_details)) { ?>
										<div class="row">
											<div class="col-sm-12">


												<div class="single-product style-3">
													<div class="row">
														<div class="col-sm-4">
															<div class="product-thumb-sin">
																<a href="#"><img
																		src="Plant Images/<?php echo $data['product_image']; ?>"
																		alt="" /></a>
															</div>
														</div>
														<div class="col-sm-8">
															<div class="product-text">
																<h4><a href="#">
																		<?php echo $data['Product']; ?>
																	</a></h4>
																<span class="product-price">
																	<?php echo $data['Product']; ?>
																</span>
																<p>
																	<?php echo $data['product_description']; ?>
																</p>
																<a href="#" class="add-to-cart btn-common">Add to Cart</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>

								</div>

							</div>
						</div>
					</div>
					<!--products-area end-->
				</div>
			</div>
		</div>
	</div>
	<!--products-area end-->

	<!--subscribe-area start-->
	<div class="subscribe-area mt-65 sm-mt-55">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="subscribe-form">
						<h3>Subscribe To Our Newletter</h3>
						<p>We will send you the monthly Newsletter</p>
						<input type="email" placeholder="Your Email" />
						<button class="btn-common">Subscribe</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--subscribe-area end-->

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