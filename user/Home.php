<?php
$url = 'http://localhost:8081/api/hotels';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$users = json_decode($response, true);
?>
<?php
ob_start();
session_start();
// Set default language
// $lang = 'en'; // Default language
// if (isset($_GET['lang'])) {
//     $lang = $_GET['lang'];
// }

// // Include the appropriate language file
// $langFile = ($lang == 'vn') ? 'lang_vn.php' : 'lang_en.php';
// $texts = include($langFile);
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
  <link rel="stylesheet" href="./responsive.css">
  <link rel="icon" href="img/logo1-removebg-preview.png" type="image/png">
  <script src="./font/js/api.js"></script>

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
              <form action="search.php" method="GET">
                <!-- <form action="search.php" method="GET" id="searchForm">
                  <script>
                    function showSuggestions(query) {
                      if (query.length == 0) {
                        document.getElementById("suggestions").innerHTML = "";
                        return;
                      }
                      const xhr = new XMLHttpRequest();
                      xhr.open("GET", "suggestions.php?q=" + query, true);
                      xhr.onload = function() {
                        if (this.status == 200) {
                          document.getElementById("suggestions").innerHTML = this.responseText;
                        }
                      }
                      xhr.send();
                    }
                  </script>
                  <input type="text" name="query" id="searchQuery" placeholder="Search" onkeyup="showSuggestions(this.value)" required>
                  <i class="fa-solid fa-magnifying-glass icon-search-home"></i></a>
                  <div id="suggestions" class="suggestions-box"></div> -->
                <input type="text" name="query" id="searchQuery" placeholder="Search" required>

                <button type="submit" style="color: black; border: none; background: none;"><i class="fa-solid fa-magnifying-glass icon-search-home"></i></button>

              </form>
            </div>
            <div class="language">
              <img src="./img/icon/language.png" alt="global">
              <select class="lang-active" onchange="changeLanguage(this.value)">
                <option value="en" <?php echo (isset($_GET['lang']) && $_GET['lang'] == 'en') ? 'selected' : ''; ?>>English</option>
                <option value="vn" <?php echo (isset($_GET['lang']) && $_GET['lang'] == 'vn') ? 'selected' : ''; ?>>VietNamese</option>
              </select>
              <!-- <script>
function changeLanguage(lang) {
    window.location.href = window.location.pathname + '?lang=' + lang;
}
</script> -->
            </div>
            <div class="btn-book">
              <a href="">Book a room</a>
            </div>


          </div>
          <!-- phần nav -->
          <div>
            <ul class="ul-nav">
              <li class="active">
                <a href="">
                  <span
                    style="background-image: url('./img/bg-tit.png');background-repeat: no-repeat;padding: 6px 20px;"
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
              <?php if (isset($_SESSION['user'])): ?>
                <li>
                  <span style="padding: 6px 10px;" class="username">Xin chào, <?php echo $_SESSION['user']; ?></span>
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
  <div class="banner" style="top: 0;">
    <div>
      <img src="img/banner.jpg" alt="" width="100%">
    </div>
  </div>
  <div class="intro">
    <div class="intro-container">
      <div class="left">
        <h2>
          Welcome to
          <br>
          <b style="
            color: #000;
            font-size: 48px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            padding: 20px 0px;"> HOTEL</b>
        </h2>
        <P style="
          color: #000;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          width: 400px;
          text-align: justify;">
          Thing lesser replenish evening called void a sea blessed meat fourth called moveth place behold night own
          night third in they’re abundant and don’t you’re the upon fruit. Divided open divided appear also saw may
          fill. whales seed creepeth. Open lessegether he also morning land i saw.
        </P>
        <a href="" class="btn-read">Read more</a>
      </div>
      <div class="right">
        <div class="list-intro">
          <ul style="display: flex;" class="item-intro">
            <li>
              <div>
                <img src="img/icon/inrtro-k.png" alt="" style="position: absolute;z-index: 10;">
              </div>
              <div class="image-container">
                <img src="img/intro-1.jpg" alt="">
              </div>

              <div class="inf-intro-1">
                <div style="background-image: url(./img/icon/intro-desc.png);background-repeat: no-repeat;height: 77px;
                  text-align: center;transform: translateY(-20px);height: 100px;z-index: -1;">
                  <h3 style="padding-top: 30px;
                  color: #D7B659;
                  font-size: 24px;
                  font-style: normal;
                  font-weight: 700;
                  line-height: normal;">Double room</h3>
                </div>
              </div>
            </li>
            <li>
              <div>
                <img src="img/icon/inrtro-k.png" alt="" style="position: absolute;z-index: 10;">
              </div>
              <div class="image-container">
                <img src="img/intro-2.jpg" alt="">
              </div>

              <div class="inf-intro-1">
                <div style="background-image: url(./img/icon/intro-desc.png);background-repeat: no-repeat;height: 77px;
                  text-align: center;transform: translateY(-20px);height: 100px;z-index: -1;">
                  <h3 style="padding-top: 30px;
                  color: #D7B659;
                  font-size: 24px;
                  font-style: normal;
                  font-weight: 700;
                  line-height: normal;">Triple room</h3>
                </div>
              </div>
            </li>
            <li>
              <div>
                <img src="img/icon/inrtro-k.png" alt="" style="position: absolute;z-index: 10;">
              </div>
              <div class="image-container">
                <img src="img/intro-3.jpg" alt="">
              </div>

              <div class="inf-intro-1">
                <div style="background-image: url(./img/icon/intro-desc.png);background-repeat: no-repeat;height: 77px;
                  text-align: center;transform: translateY(-20px);height: 100px;z-index: -1;">
                  <h3 style="padding-top: 30px;
                  color: #D7B659;
                  font-size: 24px;
                  font-style: normal;
                  font-weight: 700;
                  line-height: normal;">Dorm room</h3>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="travel-content">
    <div class="travel-container">
      <h2 class="" style="padding-top: 100px;
                          color: #fff;
                          text-align: center;
                          font-size: 46px;
                          font-style: normal;
                          font-weight: 700;
                          line-height: normal;
                          text-transform: uppercase;">Tours travel
      </h2>
      <div style="display: flex;
                  align-items: center;
                  justify-content: center;">
        <img src="./img/bg-titH2a.png" alt="">
      </div>


      <div class="list-travel">
        <ul>

          <table class="tb-travel">
            <tr>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="">
                      <img src="img/travel-1.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="avt" class="des-travel">
                      <img src="img/travel-2.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="avt">
                      <img src="img/travel-3.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
            </tr>

            <tr>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="avt">
                      <img src="img/travel-4.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="avt">
                      <img src="img/travel-5.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
              <td class="travel-td">
                <li>
                  <div class="travel-item">
                    <a href="" class="avt">
                      <img src="img/travel-6.jpg" alt="" class="des-travel">
                    </a>
                    <div class="travel-item-content">
                      <h3>
                        <a href="">Bich Dong Pahoga Mua Cave - Phat Diem Cathedral</a>
                      </h3>
                      <a href="#">
                        <img src="./img/icon/more-travel.png" alt="more-travel" class="img-travel">
                      </a>
                    </div>
                  </div>
                </li>
              </td>
            </tr>
          </table>






        </ul>
      </div>
    </div>
  </div>
  <div class="frs bg-abe">
    <div class="service-container">
      <div class="row">
        <div class="item-frs">
          <h2 class="titH2">Food Restaurant</h2>
          <div class="food-res">
            <div class="food-k">
              <span></span>
            </div>
            <div class="item">
              <a href="" class="avt">
                <img src="img/food-res.jpg" alt="">
              </a>
              <div class="desc">
                <h3>
                  <a href="#">Lasagne al Forno</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="item-frs">
          <h2 class="titH2">Services</h2>
          <div class="services">
            <ul>
              <li>
                <div class="item-ser">
                  <a href="" class="icon">
                    <img src="img/icon/ser-1.png" alt="">
                  </a>
                  <h3>
                    <a href="">Massage &amp; Sauna</a>
                  </h3>
                </div>
              </li>
              <li>
                <div class="item-ser">
                  <a href="" class="icon">
                    <img src="img/icon/ser-2.png" alt="">
                  </a>
                  <h3>
                    <a href="">Charles Bar</a>
                  </h3>
                </div>
              </li>
              <li style="margin-top: 45px;">
                <div class="item-ser">
                  <a href="" class="icon">
                    <img src="img/icon/ser-3.png" alt="">
                  </a>
                  <h3>
                    <a href="">Wedding</a>
                  </h3>
                </div>
              </li>
              <li style="margin-top: 45px;">
                <div class="item-ser">
                  <a href="" class="icon">
                    <img src="img/icon/ser-4.png" alt="">
                  </a>
                  <h3>
                    <a href="">Meetings &amp; Events</a>
                  </h3>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
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

  <span class="back-top">
    <a href="#">
      <img src="img/icon/back-top.png" alt="">
    </a>
  </span>
</body>

</html>