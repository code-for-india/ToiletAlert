<?php 
include "methods.php";
 ?>

<ul class="sidebar-menu">

                        <li class="active">
                            <a href="/admin/index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="treeview">
                                                   <a href="#">
                                <i class="fa fa-edit"></i> <span><strong>User Management</strong></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
 								<ul class="treeview-menu">                                
                                <li class="active"><a href="/admin/pages/forms/user-confirmation.php"><i class="fa fa-angle-double-right"></i>User Confirmation (<?php unconfirmed_users(); ?>) </a></li>
                            </ul>
                        </li> -->
<li class="treeview">
                                                   <a href="#">
                                <i class="fa fa-edit"></i> <span><strong>General User</strong></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
 								<ul class="treeview-menu">                                
                                <li class="active"><a href="/admin/pages/forms/user-confirmation.php"><i class="fa fa-angle-double-right"></i>Seller Confirmation (<?php unconfirmed_users(); ?>) </a></li>
                                <li class="active"><a href="/admin/pages/forms/seller-banking-confirmation.php"><i class="fa fa-angle-double-right"></i>Seller Banking (<?php unconfirmed_banking(); ?>) </a></li>
                                <li class="active"><a href="/admin/pages/forms/change-seller-status.php"><i class="fa fa-angle-double-right"></i>Change Seller Status</a></li>
                                <li class="active"><a href="/admin/pages/forms/product-confirmation.php"><i class="fa fa-angle-double-right"></i>Product Confirmation (<?php unconfirmed_products(); ?>)</a></li>
                            </ul>
                        </li>
          
<li class="treeview">
                                                   <a href="#">
                                <i class="fa fa-edit"></i> <span><strong>Authority</strong></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
 								<ul class="treeview-menu">
                                    <li class="active"><a href="/admin/pages/forms/add-products.php"><i class="fa fa-angle-double-right"></i>Products</a></li>
 								    <li class="active"><a href="/admin/pages/forms/add-multi-products.php"><i class="fa fa-angle-double-right"></i>Bulk Product Uploads</a></li>                                
                                    <li class="active"><a href="/admin/pages/forms/change-product-status.php"><i class="fa fa-angle-double-right"></i>Change Product Status</a></li>                                
                                    <li class="active"><a href="/admin/pages/forms/update-products.php"><i class="fa fa-angle-double-right"></i>Update Products</a></li>
									<li class="active"><a href="/admin/pages/forms/update-stock.php"><i class="fa fa-angle-double-right"></i>Update Stocks</a></li>
										  
                            </ul>
                            
                        </li>
          
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Admin Area</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
 								<ul class="treeview-menu">                                
 									<!--   <li class="active"><a href="/admin/pages/forms/under_construction.php"><i class="fa fa-angle-double-right"></i>Order Status</a></li> -->
                            <li class="active"><a href="/adminTest/pages/forms/loosmaping.php"><i class="fa fa-angle-double-right"></i>Loos Mapping</a></li>
									<!-- 	  <li class="active"><a href="/admin/pages/forms/pincode.php"><i class="fa fa-angle-double-right"></i>Delivery Management</a></li> -->
                            </ul>	  
                            
                        </li>          
          
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>View Port</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="/admin/pages/view/view-sellers.php"><i class="fa fa-angle-double-right"></i>Sellers</a></li>
                                <li class="active"><a href="/admin/pages/view/view-users.php"><i class="fa fa-angle-double-right"></i>Users</a></li>
                                <li class="active"><a href="/admin/pages/view/view-products.php"><i class="fa fa-angle-double-right"></i>Products</a></li>
                                <li class="active"><a href="/admin/pages/view/view-orders.php"><i class="fa fa-angle-double-right"></i>View Orders</a></li>
                                <li class="active"><a href="/admin/pages/view/view-promo-code.php"><i class="fa fa-angle-double-right"></i>Promo Codes</a></li>
                                <li class="active"><a href="/admin/pages/view/view-pin-code.php"><i class="fa fa-angle-double-right"></i>Pin Codes</a></li>
								<li class="active"><a href="/adminTest/pages/view/maps.php"><i class="fa fa-angle-double-right"></i>Maps</a></li>
                            </ul>
                        </li>
                    </ul>
