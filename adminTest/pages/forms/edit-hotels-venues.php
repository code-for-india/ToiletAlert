<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/admin/system/dbCon.php";
   include_once($path);
?>
<?php 
//check logged in or not!
if(!isset($_SESSION['login_user'])){
header('Location:/admin/login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>eBoookMyEvent.com | Edit Hotel Venue</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />

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
            <a href="../../index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Admin Area
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 1 notification</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $username; ?>
                                        <small>eBookmyevent - Member</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../login.php?ch=logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
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
                            <img src="../../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $username; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php    $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/admin/include/menubar.php";
   include_once($path); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Settings
                        <small>Edit Hotel Venues</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="active">Edit Hotel Venues</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Hotel Venues</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                <?php
								$hv_id=$_GET['hvid'];
								$qh=mysql_query("SELECT * FROM venues WHERE id LIKE '$hv_id'");
								while($rh=mysql_fetch_array($qh))
								{
									$venue_name=$rh['name'];
									$description=$rh['description'];
									$hotel_id=$rh['hotel_id'];
									$working_hours=$rh['working_hours'];
									$contact=$rh['contact'];
									$minpax=$rh['minpax'];
									$maxpax=$rh['maxpax'];
									$split=$rh['split'];
									$facilities=$rh['facilities'];
									$tent=$rh['tent'];
									$tent_decoration=$rh['tent_decoration'];
									$thirdparty=$rh['thirdparty'];
									$profit_margin=$rh['profit_margin'];
									$paymentlink=$rh['paymentlink'];
									$website=$rh['website'];
								}
								?>
                                    <form role="form" method="post" action="processing/edit-hotels-venues.php">
                                    <input type="hidden" value="<?php echo $hv_id; ?>" name="hv_id">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Venue/Banquet name</label>
                                            <input type="text" name="venuename" class="form-control" value="<?php echo $venue_name; ?>" required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3"><?php echo $description; ?></textarea>
                                        </div>
                                        
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Hotel</label>
                                            <select class="form-control" name="hotel">
                                            <?php 
										$c=1;
										$qhotels=mysql_query("SELECT * FROM hotels ORDER BY name");
										while($rhotels=mysql_fetch_array($qhotels))
										{
											if($rhotels['id']==$hotel_id)
											{
										?>
                                                <option value="<?php echo $rhotels['id']; ?>" selected><?php echo $rhotels['name']; $rhid=$rhotels['location_id']; ?>
                                                <?php 
												$qqq=mysql_query("SELECT * FROM location WHERE id LIKE '$rhid'");
												while($rrr=mysql_fetch_array($qqq))
												{
														echo " - ".$rrr['name'];
												}
												?>
                                                </option>
                                        <?php 
											}
											else
											{
											?>
												<option value="<?php echo $rhotels['id']; ?>"><?php echo $rhotels['name']; $rhid=$rhotels['location_id']; ?>
                                                <?php 
												$qqq=mysql_query("SELECT * FROM location WHERE id LIKE '$rhid'");
												while($rrr=mysql_fetch_array($qqq))
												{
														echo " - ".$rrr['name'];
												}
												?>
                                                </option>
											<?php
											}
										}
										?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Working hours</label>
                                            <input type="text" name="workhours" class="form-control" value="<?php echo $working_hours; ?>" required/>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Telephone & Mobile no. / Email</label>
                                            <input type="text" name="phone" class="form-control"  value="<?php echo $contact; ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Min capacity</label>
                                            <input type="text" name="minpax" class="form-control"  value="<?php echo $minpax; ?>"required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Max capacity</label>
                                            <input type="text" name="maxpax" class="form-control"  value="<?php echo $maxpax; ?>"required/>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Split system</label>
                                            <input type="text" name="split" class="form-control"  value="<?php echo $split; ?>" required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Facilities</label>
                                            <textarea class="form-control" name="facilities" rows="3"><?php echo $facilities?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>In house tent & decoration team, If yes then provide details</label>
                                            <textarea class="form-control" name="tent" rows="3"><?php echo $tent; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tent and decoration is outsourced, then name of empanelled team</label>
                                            <textarea class="form-control" name="tent_decoration" rows="3"><?php echo $tent_decoration; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Is the third party other then empanelled team allowed to work, then the charges/margin/cut of venue</label>
                                            <textarea class="form-control" name="thirdparty" rows="3"><?php echo $thirdparty; ?></textarea>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Is the hotel interested in setting our firm as there online sales channel partner(results more attention)-if yes then what sort of commission/cuts/charges shall be passed to our firm</label>
                                            <textarea class="form-control" name="profitmargin" rows="3"><?php echo $profit_margin; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Is the website having having facility of taking online booking with advance. If yes, venue management interested in sharing/linking with our site for payment.<br>
                                            If not, venue management is interested in setting up online payment system on their existing website</label>
                                            <textarea class="form-control" name="paymentlink" rows="3"><?php echo $paymentlink; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>If no web page is available, whether interested in setting up a simple page with online option</label>
                                            <textarea class="form-control" name="website" rows="3"><?php echo $website; ?></textarea>
                                        </div>
                                        
                                    <div class="box-footer">
                                    	<input type="hidden" name="valid" value="yes">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                        
                        
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled --><!-- /.box -->
                        </div><!--/.col (right) -->
                        
                        
                        
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>        
    </body>
</html>