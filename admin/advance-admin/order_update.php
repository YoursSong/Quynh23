

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
                        <a href="#" class="active-menu-top"><i class="fa fa-desktop "></i>Sản phẩm <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level collapse in">
                            <li>
                                <a href="select_rooms.php" class="active-menu"><i class="fa fa-toggle-on"></i>Quản lí sản phẩm</a>
                            </li>
                            <li>
                                <a href="category.php"><i class="fa fa-toggle-on "></i>Category</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="dsorder.php"><i class="fa fa-yelp "></i>Danh sách Order</a>
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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Cập nhật thông tin</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-24">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Sản phẩm
                        </div>
                        <div class="panel-body">

                        <?php
                            include "control.php"; 
                            $get_data = new data_user(); 

                            if(isset($_GET['up'])) {
                                $update = $get_data->select_order_id($_GET['up']); 
                                foreach ($update as $up_pro) {
                            ?>  
                            <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                            <label>Status</label>
                                                <select class="form-control" name="txtsta" id="">
                                                    <option value="Đã phê duyệt">Đã phê duyệt</option>
                                                    <option value="Chưa phê duyệt">Chưa phê duyệt</option>
                                                </select>
                                            <p class="help-block">Help text here.</p>
                                        </div>
                                        <button type="submit" class="btn btn-info" name="txtsub">Update</button>

                                    </form>
                                    <?php
                                        }
                                    }

                                    if(isset($_POST['txtsub'])) {
                                        $up_pro = $get_data->update_order($_POST['txtsta'], $_GET['up']);
                                        if($up_pro) {
                                            echo "<script>alert('Thành công');
                                                            window.location='dsorder.php';
                                                    </script>";
                                                     
                                        } else {
                                            echo "<script>alert('Không thực thi được')</script>";
                                        }
                                    
                                    }
                                    ?>
                                    
                            </div>
                        </div>
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
