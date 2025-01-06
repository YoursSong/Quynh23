<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation" style="
    top: 0;
    left: 0;
    height: 100vh;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="home.php">For Admin</a>
                    </li>
                    <li>
                        <a href="#" ><i class="fa fa-desktop "></i>Phòng khách sạn<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="select_rooms.php"><i class="fa fa-toggle-on"></i>Quản lí phòng</a>
                            </li>
                            <li>
                                <a href="category.php"><i class="fa fa-toggle-on "></i>Category</a>
                            </li>
                        </ul>
                    </li>   
                     <li>
                        <a href="dsorder.php"><i class="fa fa-yelp "></i>Danh sách Book room</a>
                    </li>
                     <li>
                        <a href="contact_user.php"><i class="fa fa-envelope "></i>Phản hồi</a>
                    </li>
                      <li>
                        <a href="report.php"  class="active-menu"><i class="fa fa-anchor "></i>Báo cáo</a>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-user"></i>Log out</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Báo cáo phòng đã kín</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div >
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default wi" style="width:90%;margin-left:15px;">
                        <div class="panel-heading">
                            Rooms
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                <tbody>
                                    <?php
                                    include "control.php";
                                    $get_data = new data_user();
                                    $select = $get_data->select_room_quantity();
                                    ?>

                                        <tr>
                                            <th>ID</th>
                                            <th>Name Room</th>
                                            <th>Price</th>
                                            <th>Picture</th>                                          
                                            <th>Category Product</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            
                                        </tr>

                                    <?php
                                    foreach ($select as $se_pros)  
                                    {
                                ?>
                                <tr>
                                <td><?php echo $se_pros['id_room']?></td>
                                    <td><?php echo $se_pros['name_room']?></td>
                                    <td><?php echo $se_pros['price_room']?></td>
                                    <td><img src="img/<?php echo $se_pros['Picture']?>" width="50px" heigh="50px"></td>
                                    <td><?php echo $se_pros['CategoryRoom']?></td>
                                    <td><?php echo $se_pros['Des_room']?></td>
                                    <td><?php echo $se_pros['soluong']?></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>

            </div>




            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec" style="
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;z-index:10">
        &copy; 2024 PVDHOTEL | Design By : PhamVanDuyet
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
