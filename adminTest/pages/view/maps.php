<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/admin/system/dbCon.php";
include_once ($path);
require '../../api/webservices/complain.php';
?>
/* <?php
// check logged in or not!
if (! isset ( $_SESSION ['login_user'] )) {
	header ( 'Location:/admin/login.php?pagename=' . basename ( $_SERVER ['PHP_SELF'], ".php" ) );
}
?> */
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin panel | Data view | Sellers</title>
<meta
	content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="../../css/bootstrap.min.css" rel="stylesheet"
	type="text/css" />
<!-- font Awesome -->
<link href="../../css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<!-- Ionicons -->
<link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link href="../../css/datatables/dataTables.bootstrap.css"
	rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link media="all" type="text/css"
	href="/adminTest/maps/assets/dashicons.css" rel="stylesheet">
<link media="all" type="text/css"
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic"
	rel="stylesheet">
<script type='text/javascript' src='/adminTest/maps/assets/jquery.js'></script>
<script type='text/javascript'
	src='/adminTest/maps/assets/jquery-migrate.js'></script>

<?php /* === GOOGLE MAP JAVASCRIPT NEEDED (JQUERY) ==== */ ?>
<script src="http://maps.google.com/maps/api/js?sensor=true"
	type="text/javascript"></script>
<script type='text/javascript' src='/adminTest/maps/assets/gmaps.js'></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>
<body class="skin-blue">
	<!-- header logo: style can be found in header.less -->
	<header class="header">
		<a href="../../index.php" class="logo"> <!-- Add the class icon to your logo image or logo icon to add the margining -->
			Admin Area
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas"
				role="button"> <span class="sr-only">Toggle navigation</span> <span
				class="icon-bar"></span> <span class="icon-bar"></span> <span
				class="icon-bar"></span>
			</a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">

					<!-- Notifications: style can be found in dropdown.less -->
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"> <i
							class="glyphicon glyphicon-user"></i> <span><?php echo $username; ?> <i
								class="caret"></i></span>
					</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header bg-light-blue"><img
								src="../../img/avatar3.png" class="img-circle" alt="User Image" />
								<p>
                                        <?php echo $username; ?>
                                        <small>Crafts n Papers - Admin</small>
								</p></li>
							<!-- Menu Body -->

							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="../../login.php?ch=logout"
										class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="../../img/avatar3.png" class="img-circle"
							alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>Hello, <?php echo $username; ?></p>

						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control"
							placeholder="Search..." /> <span class="input-group-btn">
							<button type='submit' name='seach' id='search-btn'
								class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php
																				
$path = $_SERVER ['DOCUMENT_ROOT'];
																				$path .= "/adminTest/include/menubar.php";
																				include_once ($path);
																				?>
                </section>
			<!-- /.sidebar -->
		</aside>

		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Content Header (Page header) -->


			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Maps</h3>
							</div>
							<!-- /.box-header -->
							<div id="container">

								<div class="entry-content">

				<?php /* === THIS IS WHERE WE WILL ADD OUR MAP USING JS ==== */ ?>
				<div class="google-map-wrap" itemscope itemprop="hasMap"
										itemtype="http://schema.org/Map">
										<div id="google-map" class="google-map"></div>
										<!-- #google-map -->
									</div>

				 
				
				<?php
				/*
				$sql = "select * from complain";
				$result = mysqli_query ( getLink (), $sql );
				if (mysqli_num_rows ( $result ) > 0) {
					// Found data
					$arr = array ();
					$locations = array ();
					while ( $row1 = mysqli_fetch_assoc ( $result ) ) {
						
						$complain = new complainModel ();
						$complain->setLoosid ( $row1 ['loosid'] );
						$complain->setImages ( $row1 ['images'] );
						$complain->setComment ( $row1 ['comment'] );
						$complain->setComplaintype ( $row1 ['complaintype'] );
						$complain->setAuthorityId ( $row1 ['authorityId'] );
						$complain->setNextcomplainid ( $row1 ['nextcomplainid'] );
						
						// fetch loos id details
						$sql = "select * from loos where id = 33";// . $row ['loosid'];
// 						echo $sql;
						
						$result = mysqli_query ( getLink (), $sql );
						if (mysqli_num_rows ( $result ) > 0) {
							// Found data
							$arr = array ();
							while ( $row = mysqli_fetch_assoc ( $result ) ) {
								
								$loosModel = new loosModel ();
								$loosModel->setId ( $row ['id'] );
								$loosModel->setName ( $row ['name'] );
								$loosModel->setAddress1 ( $row ['address1'] );
								$loosModel->setAddress2 ( $row ['address2'] );
								$loosModel->setCity ( $row ['city'] );
								$loosModel->setDistric ( $row ['distric'] );
								$loosModel->setState ( $row ['state'] );
								$loosModel->setPincode ( $row ['pincode'] );
								$loosModel->setLati ( $row ['lati'] );
								$loosModel->setLongi ( $row ['longi'] );
								array_push ( $arr, $loosModel->toJson () );
								
								$l = array (
										'google_map' => array (
												'lat' => "'".$row ['lati']."'",
												'lng' => "'".$row ['longi']."'" 
										),
										'location_address' =>  $row ['address1'] ,
										'location_name' => $row ['name']
								);
								
								
								array_push($locations, $l);
								
							}
// 							$responseJson = getResponseObjectInJson ( $arr, false );
						}
						
						//
						
						array_push ( $arr, $complain->toJson () );
					}
// 					echo $arr;
					// $responseJson=getResponseObjectInJson($arr, false);
				} else {
					// Not found Data
					echo 'not found data';
					// $responseJson=getResponseObjectInJson('', true);
				}
				*/
			 	?> 
				<?php
				// echo 'going to hit api';
				// $jsonData = fetchallData($paramsd, true);
				// echo $jsonData;
				// $data= parseResponse($jsonData);
				
				// echo $data;
// 				$locations = array();
				
				/* Marker #1 */
				$locations[] = array(
				'google_map' => array(
				'lat' => '-6.976622',
				'lng' => '110.39068959999997',
				),
				'location_address' => 'Address A',
				'location_name' => 'Loc A',
				);
				
// 				/* Marker #2 */
				$locations [] = array (
						'google_map' => array (
								'lat' => '-6.974426',
								'lng' => '110.38498099999993' 
						),
						'location_address' => 'Address B',
						'location_name' => 'Loc B' 
				);
				
// 				/* Marker #3 */
				$locations [] = array (
						'google_map' => array (
								'lat' => '-7.002475',
								'lng' => '110.30163800000003' 
						),
						'location_address' => 'Address C',
						'location_name' => 'Loc C' 
				);
				?>


				<?php /* === PRINT THE JAVASCRIPT === */ ?>

				<?php
				/* Set Default Map Area Using First Location */
				$map_area_lat = isset ( $locations [0] ['google_map'] ['lat'] ) ? $locations [0] ['google_map'] ['lat'] : '';
				$map_area_lng = isset ( $locations [0] ['google_map'] ['lng'] ) ? $locations [0] ['google_map'] ['lng'] : '';
				?>

				<script>
				jQuery( document ).ready( function($) {

					/* Do not drag on mobile. */
					var is_touch_device = 'ontouchstart' in document.documentElement;

					var map = new GMaps({
						el: '#google-map',
						lat: '<?php echo $map_area_lat; ?>',
						lng: '<?php echo $map_area_lng; ?>',
						scrollwheel: false,
						draggable: ! is_touch_device
					});

					/* Map Bound */
					var bounds = [];

					<?php 
/* For Each Location Create a Marker. */
					foreach ( $locations as $location ) {
						$name = $location ['location_name'];
						$addr = $location ['location_address'];
						$map_lat = $location ['google_map'] ['lat'];
						$map_lng = $location ['google_map'] ['lng'];
						?>
						/* Set Bound Marker */
						var latlng = new google.maps.LatLng(<?php echo $map_lat; ?>, <?php echo $map_lng; ?>);
						bounds.push(latlng);
						/* Add Marker */
						map.addMarker({
							lat: <?php echo $map_lat; ?>,
							lng: <?php echo $map_lng; ?>,
							title: '<?php echo $name; ?>',
							infoWindow: {
								content: '<p><?php echo $name. '<br/>'. $addr; ?></p>'
							}
						});
					<?php } //end foreach locations ?>

					/* Fit All Marker to map */
					map.fitLatLngBounds(bounds);

					/* Make Map Responsive */
					var $window = $(window);
					function mapWidth() {
						var size = $('.google-map-wrap').width();
						$('.google-map').css({width: size + 'px', height: (size/2) + 'px'});
					}
					mapWidth();
					$(window).resize(mapWidth);

				});
				</script>

									<div class="map-list">

										<h3>
											<span>View in Google Map</span>
										</h3>

										<ul class="google-map-list" itemscope itemprop="hasMap"
											itemtype="http://schema.org/Map">

						<?php
						
foreach ( $locations as $location ) {
							$name = $location ['location_name'];
							$addr = $location ['location_address'];
							$map_lat = $location ['google_map'] ['lat'];
							$map_lng = $location ['google_map'] ['lng'];
							?>
							<li><a target="_blank" itemprop="url"
												href="<?php echo 'http://www.google.com/maps/place/' . $map_lat . ',' . $map_lng;?>"><?php echo $name; ?></a>
												<span itemprop="address" itemscope
												itemtype="http://schema.org/PostalAddress"><?php echo $addr; ?></span>
											</li>
						
						<?php } //end foreach ?>

					</ul>
										<!-- .google-map-list -->
									</div>

								</div>
								<!-- .entry-content -->

								</article>

							</div>
							<!-- #container -->
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
	
	</div>

	</section>
	<!-- /.content -->
	</aside>
	<!-- /.right-side -->
	</div>
	<!-- ./wrapper -->


	<!-- jQuery 2.0.2 -->
	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="../../js/plugins/datatables/jquery.dataTables.js"
		type="text/javascript"></script>
	<script src="../../js/plugins/datatables/dataTables.bootstrap.js"
		type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	<!-- page script -->
	<script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

</body>
</html>