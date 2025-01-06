<?php
include('connect.php');
include('control.php');

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Tạo đối tượng Search
    $search = new Search();

    // Thực hiện tìm kiếm
    $resultRoom = $search->searchRoom($query);
}
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
    <title>Search Results</title>
    <style>
        .result-item {
            margin-bottom: 20px;
        }
    </style>
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
                                <a href="./Home.php">
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
    <div class="container">
        <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>

        <h3>Rooms</h3>
        <ul style="display: flex; flex-wrap: wrap; list-style-type: none; padding: 0; justify-content: space-between;">
            <?php while ($row = mysqli_fetch_assoc($resultRoom)): ?>
                <li class="result-item" style="display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 20px; width: calc(33.33% - 20px);"> <!-- Adjust width for better layout -->
                    <div style="margin-bottom: 10px;">
                        <img src="img/<?php echo htmlspecialchars($row['picture']); ?>" alt="<?php echo htmlspecialchars($row['name_room']); ?>" style="width: 100%; height: auto;"> <!-- Responsive image -->
                    </div>
                    <div style="display: flex; flex-direction: column; justify-content: center; text-align: left;"> <!-- Align text to the left -->
                        <div style="font-weight: bold; font-size: 1.1em;"><?php echo htmlspecialchars($row['name_room']); ?></div>
                        <div style="font-size: 0.9em; color: #555;"><?php echo htmlspecialchars($row['CategoryRoom']); ?></div>
                        <div style="color: green; font-weight: bold; font-size: 1.2em;"><?php echo htmlspecialchars($row['price_room']); ?></div> <!-- Enhanced price styling -->
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>

</html>