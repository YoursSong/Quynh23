<?php
ob_start();
session_start();
?>
<?php
include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/OAuth.php';
include 'PHPMailer/src/POP3.php';
include 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./font/css/all.css">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <link rel="icon" href="img/logo.png" type="image/png">
  <title>PVD HOTEL</title>
</head>

<body>
  <header style="z-index: 1000;position: fixed;">
    <div class="header">
      <div class="header-container">
        <!-- logo -->
        <div class="logo">
          <a href="" title="">
            <img src="img/logo.png" alt="PVD HOTEL">
          </a>
        </div>

        <!-- nav + search, option, book -->
        <div class="header-right">
          <!-- phần trên -->
          <div class="header-top">
            <div class="form-search">
              <form action="">
                <input type="text" placeholder="Search">

                <a href="#" style="color: black;"><i class="fa-solid fa-magnifying-glass icon-search-home"></i></a>
              </form>
            </div>
            <div class="language">
              <img src="./img/icon/language.png" alt="global">
              <select class="lang-active">
                <option>English</option>
                <option>Viet Nam</option>
              </select>
            </div>
            <div class="btn-book">
              <a href="">Book a room</a>
            </div>


          </div>
          <!-- phần nav -->
          <div>
            <ul class="ul-nav">
              <li class="active">
                <a href="./Home.php">
                  <span
                    style="padding: 6px 20px;"
                    class="home-link">Home</span>
                </a>
              </li>
              <li>
                <a href="./About.php">
                  <span style="padding: 6px 6px;" class="about-link">About Us</span>
                </a>
              </li>
              <li>
                <a href="./accommodation.php">
                  <span style="padding: 6px 10px;" class="Accommodation-link">Accommodation</span>
                </a>
              </li>
              <li>
                <a href="./menu.php">
                  <span style="padding: 6px 20px;" class="Menu-link">Menu</span>
                </a>
              </li>
              <li>
                <a href="./travel.php">
                  <span style="padding: 6px 20px;" class="Tour-link">Tour travel</span>
                </a>
              </li>
              <li>
                <a href="./service.php">
                  <span style="padding: 6px 10px;" class="Service-link">Service</span>
                </a>
              </li>
              <li>
                <a href="./news.php">
                  <span style="padding: 6px 20px;" class="News-link">News</span>
                </a>
              </li>
              <li>
                <a href="./gallery.php">
                  <span style="padding: 6px 10px;" class="Gallery-link">Gallery</span>
                </a>
              </li>
              <li>
                <a href="./contact.php">
                  <span style="padding: 6px 10px;" class="Contact-link">Contact</span>
                </a>
              </li>
              <?php if(isset($_SESSION['user'])): ?>
                    <li>
                        <span style="padding: 6px 10px"  class="Contact-link">Xin chào, <?php echo$_SESSION['user'];?></span>
                    </li>
                    <li>
                        <a href="logout.php">
                        <span style="padding: 6px 20px;" class="Contact-link">Logout</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php">
                        <span style="padding: 6px 20px;background-image: url('./img/bg-tit.png');background-repeat: no-repeat;" class="Contact-link">Login</span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
          </div>
        </div>

      </div>
    </div>
  </header>


  <div class="banner">
    <div class="banner-title">
        <div class="avt">
          <img src="img/banner-gallery.jpg" alt="" width="100%">
        </div>
        <div class="desc">
            <h1>
                <span>FORGOT PASSWORD</span>
            </h1>
        </div>
    </div>
</div>
<div class="gallery  bg-abe">
    <div class="container" style="
    display: flex;
    justify-content: center;">
    <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-login">
                <div>
                  <div>
                    <input type="email" class="inp-r" placeholder="Nhập email của bạn" name="txtemail" style="margin-bottom: 20px;"/>
                  </div>
                  <div>
                    <button type="submit" name="txtsub">
                    GỬI
                    </button>
                  </div>
                  <div>
                  Register <a href="register.php" >click here </a> or <a href="login.php">Login</a> 
                  </div>
                </div>
              </div>
            </form>

            <?php
             include('control.php');
             $get_data=new contact_user();
             if(isset($_POST['txtsub'])){
              $email = $_POST['txtemail'];
              $select_user = $get_data->select_register_email($email);
              if ($select_user) {
                $password = '';
                foreach ($select_user as $row) {
                  $password = $row['pass']; 
              }
                $mail = new PHPMailer(true);
                try {
                    $mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'pvduyet20031703@gmail.com';
                    $mail->Password = 'zbif puwi yavh hkdm'; 
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587; 
                
                    $mail->CharSet="UTF-8";
                    $mail->setFrom('pvduyet20031703@gmail.com');
                    $mail->addAddress($email); 
                    $mail->isHTML(true);   
                    $mail->Subject = 'Mật khẩu của bạn';
                    $mail->Body = 'Mật khẩu của bạn là:' . $password;
                    $mail->send();
                    echo 'Tin nhắn đã được gửi';
                } catch (Exception $e) {
                    echo "Không thể gửi tin nhắn. Lỗi Mailer: {$mail->ErrorInfo}";
                }

                echo "<script>alert('Gửi thành công');
                window.location='login.php';
                      </script>";
              } else {
                
                echo "Không tìm thấy thông tin với email cung cấp.";
            }
              }
            ?>
            </div>
</div>


  <footer>
    <div class="container">
      <div class="footer">
        <div class="item">
          <div class="tit-F">
            <span>Contact Us</span>
          </div>
          <div class="loc">
            <p>12C/83, Goc De, Hanoi</p>
          </div>
          <div class="phone">
            <p><a href="tel:02437835639">+84 367346998</a></p>
          </div>
          <div class="mail">
            <p>pvduyet20031703@gmail.com</p>
          </div>
          <div class="web">
            <a href="">www.pvdhotel.com</a>
          </div>
        </div>
        <div class="item">
          <div class="tit-F">
            <span>Accommodation</span>
          </div>
          <ul class="menu-F">
            <li>
              <a href="">Double Room</a>
            </li>
            <li>
              <a href="">Triple Room</a>
            </li>
            <li>
              <a href="">Dorm Room</a>
            </li>
          </ul>
        </div>
        <div class="item">
          <div class="tit-F">
            <span>Service</span>
          </div>
          <ul class="menu-F">
            <li>
              <a href="">Massage &amp; Sauna</a>
            </li>
            <li>
              <a href="">Charles Bar</a>
            </li>
            <li>
              <a href="">Wedding</a>
            </li>
            <li>
              <a href="">Meetings &amp; Events</a>
            </li>
          </ul>
        </div>
        <div class="item">
          <div class="tit-F">
            <span>Newsletter</span>
          </div>
          <div class="form-letter">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button></button>
            </form>
          </div>
          <div class="social-F">
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="ft-more">
        <div class="left">
          <ul>
            <li>
              <a href="">Home</a>
            </li>
            <li>
              <a href="">About Us</a>
            </li>
            <li>
              <a href="">Food Restaurant</a>
            </li>
            <li>
              <a href="">Tour Travel</a>
            </li>
            <li>
              <a href="">News</a>
            </li>
            <li>
              <a href="">Gallery</a>
            </li>
            <li>
              <a href="">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="right">
          <p>Copyright &copy; PVD HOTEL. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="back-top">
    <a href="#">
      <img src="img/icon/back-top.png" alt="">
    </a>
  </div>
</body>

</html>

