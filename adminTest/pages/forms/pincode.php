<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/admin/system/dbCon.php";
   include_once($path);
?>
<?php 
//check logged in or not!

if($_POST){
    if(isset($_POST['reject'])){
        reject_user($_POST['id']);
    }
}

    function reject_user($id)
    {
    	$result = mysql_query("update pincode set status='Expired' where id=$id");
    }

if(!isset($_SESSION['login_user'])){
header('Location:/admin/login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crafts n Papers | Admin Panel</title>
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
                                        <small>Crafts n Papers - Admin</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
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
                        Admin Workspace
                        <small>Manage Pincode</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Admin Workspace</a></li>
                        <li class="active">Manage Pincode</li>
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
                                    <h3 class="box-title">Add Pincode</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" method="post" action="processing/add-pin-code.php">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>
                                           
                                             </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Pin Code</label>
                                            <input type="text" name="pincode" class="form-control" placeholder="Pin Code Number" required/>
                                        </div>
                                         <div class="form-group">
                                            
															<label>Delivery Time</label>
                                            <input type="text" name="time" class="form-control" placeholder="i.e. 5 Days" required/>
                                        </div>
                                         <div class="form-group">
                                            
															<label>Delivery Charges</label>
                                            <input type="text" name="charges" class="form-control" placeholder="i.e. 75.00" required/>
                                        </div>
                                        
                                    <div class="box-footer">
                                    
                                    	<input type="hidden" name="valid" value="yes">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                        
                        
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Current Pincodes</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>PinCodes</th>
                                            <th>Time</th>
                                            <th>Charges</th>
<th>Status</th>
															<th></th>
                                        </tr>
                                        <?php 
										$c=1;
										$qlocation=mysql_query("SELECT * FROM pincode where status='open' ORDER BY id");
										while($rlocation=mysql_fetch_array($qlocation))
										{
										?>
                                        <tr>
                                            <td><?php echo $c; $c=$c+1; ?></td>
                                            <td><?php 
											echo $rlocation['pincode'];								
											?></td>
                                            <td><?php echo $rlocation['delivery']; ?></td>
                                            <td><?php echo $rlocation['charges']; ?></td>
<td><?php echo $rlocation['status']; ?></td>
                                            <td> <form method="post">
                                         <?php   if($rlocation['status'] == 'open') { ?>    
                                 	     <input type="hidden" id="id" name="id" value='<?php echo $rlocation['id']; ?>' />       	
                                         <button type="submit" class="btn btn-danger" id="reject" name="reject" value="reject">Delete</button>
                                                                         		    <?php }?>
                                		     </form></td>

                                        </tr>
                                        <?php 
										}
										?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
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