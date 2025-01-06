<?php
include('connect.php');
include('control.php');

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $search = new Search();

    // Tìm kiếm tên phòng và loại phòng
    $resultRoom = $search->searchRoom($query); // Sử dụng phương thức searchRoom trong class Search

    // Hiển thị gợi ý
    if (mysqli_num_rows($resultRoom) > 0) {
        while ($row = mysqli_fetch_assoc($resultRoom)) {
            echo "<div class='suggestion-item'>" . htmlspecialchars($row['name_room']) . " - " . htmlspecialchars($row['CategoryRoom']) . "</div>"; // Giả sử có cột room_type
        }
    } else {
        echo "<div class='suggestion-item'>No suggestions found</div>";
    }
}
?>