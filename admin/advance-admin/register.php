<?php
    session_start();
?>

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
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
            <h1 style="  position: absolute;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 50px;
                color: black;
                font-weight: 800;">OVUHOTEL</h1>
            </div>
            
        </div>
        <p style="padding-top: 50px;text-align: center">Admin page</p>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="txtuser" class="form-control" placeholder="Your Username " />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="txtpass" class="form-control"  placeholder="Your Password" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="txtre_pass" class="form-control"  placeholder="Re-enter Your Password" />
                                        </div>
            
                                        <button type="submit" class="btn btn-info" name="txtsub">Register now</button>
                                    <hr />
                                    Login now ? <a href="login.php" >click here </a>
                                    </form>

                                    <?php
                                        include('control.php');
                                        $get_data=new data_user();
                                        if(isset($_POST['txtsub'])) {
                                            $se_user = $get_data->select_user($_POST['txtuser']);
                                            if(empty($_POST['txtuser']) || empty($_POST['txtpass'])) {
                                                echo "<script> alert('Bạn chưa nhập đủ dữ liệu')</script>";
                                            } else {
                                                if(mysqli_num_rows($se_user) >= 1) {
                                                    echo "<script> alert('Admin đã tồn tại')</script>";
                                                } else {
                                                    if($_POST['txtpass'] != $_POST['txtre_pass']) {
                                                        echo "<script> alert('Hai mật khẩu phải trùng nhau')</script>";
                                                    } else {
                                                        $re_user = $get_data->register($_POST['txtuser'], $_POST['txtpass']);
                                                        if($re_user) {
                                                            echo "<script>alert('Thành công');
                                                            window.location='login.php';
                                                                    </script>";
                                                                   
                                                        } else {
                                                            echo "<script>alert('Không thực thi được')</script>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
