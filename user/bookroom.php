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
                  <span style="padding: 6px 10px;background-image: url('./img/bg-tit.png');background-repeat: no-repeat;" class="Gallery-link">Gallery</span>
                </a>
              </li>
              <li>
                <a href="./contact.php">
                  <span style="padding: 6px 10px;" class="Contact-link">Contact</span>
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
          <img src="img/banner-gallery.jpg" alt="" width="100%">
        </div>
        <div class="desc">
            <h1>
                <span>Book Room</span>
            </h1>
        </div>
    </div>
</div>

    <div class="gallery  bg-abe">
    <div class="container">
    <div class="">
        <div class="">
          <div class="">
          <?php
            include('control.php');
            $get_data = new contact_user();
            $select_room = $get_data->select_room();
            $totalPrice = 0;
            
            if (isset($_POST['txtaddtocart'])) {
                $room_id = $_POST['id_room'];
            }
            
            if (isset($_POST['txtdelete'])) {
                $room_id_to_delete = $_POST['txtdelete'];
                if (isset($_SESSION['cart'][$room_id_to_delete])) {
                    unset($_SESSION['cart'][$room_id_to_delete]); 
                }
                header('Location: bookroom.php');
                exit();
            }


            
            
            ?>
          <form action="" method="POST" enctype="multipart/form-data" class="form_book_room">
              <table class="table table-striped contact_form-container" >
                <tr>
                    <td>Tên Phòng</td>
                    <td>Hinh Ảnh</td>
                    <td>Giá</td>
                    <td>Loại Phòng</td>
                    <td>Số Lượng</td>
                    <th colspan="2">Tùy chọn</th>
                </tr>
                <?php
               foreach($_SESSION['cart'] as $room_id => $cart_item){
                foreach($select_room as $se_room) {
                  if ($se_room['id_room'] == $room_id) {
                    // update
              if (isset($_POST['txtupdate'])){ 
                if (isset($_POST['soluong_' . $se_room['id_room']])){
                    $updated_sl = $_POST['soluong_' . $se_room['id_room']];
                    if ($updated_sl > $se_room['soluong']) {
                        echo '<p style="color: red;">Xin lỗi chúng tôi hiện không còn đủ phòng cho bạn!</p>';
                        $updated_sl = $se_room['soluong'];
                    }
                }
                
              }
          ?>

            <tr>
            <td><?php echo $se_room["name_room"]?></td>
            <td><img src="img/<?php echo $se_room['Picture']?>" width="100px" heigh="100px"></td>
            <td><?php echo $se_room["price_room"] ?> VND</td>
            <td><?php echo $se_room["CategoryRoom"] ?></td>
            <td>
                <input type="number" class="input_fbr" name="soluong_<?php echo $se_room['id_room'] ?>" value="<?php echo isset($updated_sl) ? $updated_sl : 1; ?>" placeholder="Nhập số lượng">
                <p>Số lượng còn lại là: <?php echo $se_room['soluong'] ?></p>
            </td>
            <td class="form_br">
                <button name="txtupdate" style="margin-left:10px">Update</button>
                <input type="hidden" name="room_id" value="<?php echo $se_room['id_room'] ?>">
                <button type="submit" name="txtdelete" value="<?php echo $se_room['id_room'] ?>">Delete</button>
            </td> 
            </tr>

           

            <?php
            $totalPrice += $se_room["price_room"] * (isset($updated_sl) ? $updated_sl : 1);
                }
            }
        }
        ?>
            <!-- update -->
                <tr>
                  <td></td>
                <td style="line-height:3;">Tổng tiền:</td>
                 <td id="totalPrice" name="txttong" style="line-height:3;"><?php echo $totalPrice ?> VND</td>
                 <td></td>
                 <td></td>
                 <td class="form_br"><button type="submit" name="txtxacnhan" style="margin-top: 5px;margin-left: 100px;"> Xác nhận</button></td>
                </tr>  
                </table>
            </form>

            <?php
            if (isset($_POST['txtxacnhan'])) {
              foreach ($_SESSION['cart'] as $room_id => $cart_item) {
                  foreach ($select_room as $se_room) {
                      if ($se_room['id_room'] == $room_id) {
                          $id_room = $se_room['id_room'];
                          $username = $_SESSION['user'];
                          $tenphong = $se_room['name_room'];
                          $soluong = $_POST['soluong_' . $se_room['id_room']];
                          $total = $se_room['price_room'] * $soluong; 
          
                          // Lấy số lượng tồn của sản phẩm từ CSDL
                          $sql = "select soluong from room where id_room = '$id_room'";
                          $result_soluong = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_assoc($result_soluong);
                          $soluong_ton = $row['soluong'];
          
                              $result = $get_data->insert_book_user($id_room, $username, $tenphong, $soluong, $total);
                              if ($result) {
                                  // Trừ số lượng đặt hàng từ số lượng tồn và cập nhật vào CSDL
                                  $soluong_moi = $soluong_ton - $soluong;
                                  $sql_update = "update room set soluong = '$soluong_moi' where id_room = '$id_room'";
                                  $result_update = mysqli_query($conn, $sql_update);
                                  if ($result_update) {
                                      echo "<script>alert('Đặt phòng thành công!')</script>";
                                      echo "<script>window.location = 'bookroom.php'</script>";
                                  } else {
                                      echo "Lỗi khi cập nhật số lượng phòng còn trống";
                                  }
                              } else {
                                  echo "Lỗi khi đặt phòng";
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

  <div class="back-top">
    <a href="#">
      <img src="img/icon/back-top.png" alt="">
    </a>
  </div>
</body>

</html>