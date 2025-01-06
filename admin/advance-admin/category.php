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
                        <a href="#" class="active-menu-top"><i class="fa fa-desktop "></i>Phòng khách sạn<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level collapse in">
                            <li>
                                <a href="select_rooms.php" ><i class="fa fa-toggle-on"></i>Quản lí phòng</a>
                            </li>
                            <li>
                                <a href="category.php" class="active-menu"><i class="fa fa-toggle-on "></i>Category</a>
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
                        <a href="report.php"><i class="fa fa-anchor "></i>Báo cáo</a>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-user"></i>Log out</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Category</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-24">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default"  style="width:90%;margin-left:15px;">
                        <div class="panel-heading" >
                            Room
                        </div>
                        <div class="panel-body" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <?php
                                        include "control.php";
                                        $get_data=new data_user();
                                        $select=$get_data->select_category();
                                        ?>
                                      
                                        <tr>
                                            <th>id_cate</th>
                                            <th>Name_Category</th>
                                            <th>Description</th>
                                            <th colspan="2">Tuy chon</th>
                                        </tr>
                                            <?php
                                                foreach ($select as $se_cate)    
                                                {
                                            ?>
                                            <tr>
                                                <td><?php echo $se_cate["id_cate"]?></td>
                                                <td><?php echo $se_cate["Category"]?></td>
                                                <td><?php echo $se_cate["Description"]?></td>
                                                <td><a href="cate_update.php?up=<?php echo $se_cate['id_cate']?>">Update</a></td>
                                                <td><a href="cate_delete.php?del=<?php echo $se_cate['id_cate']?>"
                                                onclick="if(confirm('Bạn có chắc chắn xóa'))return true;
                                                else return false";>Delete</a></td> 
                                            </tr>
                                            <?php
                                             }
                                            ?>
                                    </tbody>
                                </table>
                            </div>

                            <button class="btn btn-info"><a href="insert_cate.php" style="text-decoration: none; color: white;">Thêm category</a></button>
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
        &copy; 2024 NINOM | Design By : <a href="http://www.PhamVanDuyet.com/" target="_blank">PhamVanDuyet.com</a>
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