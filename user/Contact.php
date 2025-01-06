<?php
ob_start();
session_start();
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
  <link rel="icon" href="img/logo1-removebg-preview.png" type="image/png">
  <title> HOTEL</title>
</head>

<body>
  <header style="z-index: 1000;position: fixed;">
    <div class="header">
      <div class="header-container">
        <!-- logo -->
        <div class="logo">
          <a href="Home.php" title="Hotel logo">
            <img src="img/logo1-removebg-preview.png" alt=" HOTEL" height="120px" width="100%">
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
                <option>VietNamese</option>
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
                  <span style="padding: 6px 10px;background-image: url('./img/bg-tit.png');background-repeat: no-repeat;" class="Contact-link">Contact</span>
                </a>
              </li>
              <?php if(isset($_SESSION['user'])): ?>
                    <li>
                        <span style="padding: 6px 10px;"  class="username">Xin chào, <?php echo$_SESSION['user'];?></span>
                    </li>
                    <li>
                        <a href="logout.php">
                        <span style="padding: 6px 10px;" class="Contact-link">Logout</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php">
                        <span style="padding: 6px 20px;" class="Contact-link">Login</span>
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
          <img src="./img/banner-contact.jpg" alt="" width="100%">
        </div>
        <div class="desc">
            <h1>
                <span>Contact</span>
            </h1>
        </div>
    </div>
</div>
<div class="contact-page">
    <div class="ple  bg-sena">
        <div class="container">
            <div class="left">
                <h2 style="font-weight: 700;">OVU Hotel</h2>
                <div class="contact-address">
                    <div class="item">
                        <div class="icon">
                            <img src="./img/ct-loc.png" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-midle">
                                <p>12C/83, Goc De, Hanoi</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="./img/ct-phone.png" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-midle">
                                <p><a href="" style="text-decoration: none;">+83 67346998</a>  <a href=""></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="./img/ct-fax.png" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-midle">
                                <p >0367346998</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="./img/ct-mail.png" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-midle">
                                <p>ovu0120@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="./img/ct-web.png" alt="">
                        </div>
                        <div class="desc">
                            <div class="desc-midle">
                                <p><a href="" style="text-decoration: none;">www.hotel.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="tit-Ct">
                    <p style="font-weight: 700;">Get in touch with us</p>
                </div>
                <div class="form-contact-k">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-2">
                                <input type="text" class="inp-c" placeholder="Name" name="txtname">
                            </div>
                            <div class="col-2">
                                <input type="text" class="inp-c" placeholder="Tel" name="txttel">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <input type="text" class="inp-c" placeholder="Email" name="txtemail">
                            </div>
                            <div class="col-2">
                                <input type="text" class="inp-c" placeholder="Address" name="txtaddress">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="inp-c" placeholder="Title" name="txttitle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea  class="area-c" placeholder="Comments"  name="txtcomment" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                
                                <button type="submit" name="txtsub">Submit</button>
                              
                            </div>
                        </div>
                    </form>

                    <?php
                    include('control.php');
                    $get_data=new contact_user();
                    if(isset($_POST['txtsub'])) 
                    {
                                   
                                    $re_contact = $get_data->Insert_Contact($_POST['txtname'], $_POST['txtemail'], $_POST['txttel'], $_POST['txtaddress'], $_POST['txttitle'], $_POST['txtcomment']);
                                    if($re_contact) {
                                        echo "<script>alert('Đã gửi thành công');
                                                </script>";
                                                // window.location='login.php';
                                    } else {
                                        echo "<script>alert('Không thực thi được')</script>";
                                    }
                    }   
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.9871978888127!2d105.8522594749996!3d20.99315028900122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac12ee34ca35%3A0xa48f99dde993dc90!2zTmcuIEfhu5FjIMSQ4buBLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1697634149337!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


  <footer style="margin-top: 0px;">
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
            <p>ovu0120@gmail.com</p>
          </div>
          <div class="web">
            <a href="">www.hotel.com</a>
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
          <p>Copyright &copy; OVU HOTEL. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="back-top">
    <a href="#">
      <img src="./img/icon/back-top.png" alt="">
    </a>
  </div>
</body>

</html>