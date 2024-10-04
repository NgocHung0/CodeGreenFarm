<?php
include 'server.php'; // Kết nối đến cơ sở dữ liệu

if (isset($_GET['MaNhom'])) {
    $MaNhom = $_GET['MaNhom'];

    // Lấy danh sách sản phẩm theo mã nhóm
    $sql = "SELECT * FROM mathang WHERE MaNhom = '$MaNhom'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Sản Phẩm:</h2>';
        echo '<ul class="list-group">';
        while($row = $result->fetch_assoc()) {
            echo '<li class="list-group-item">' . $row['TenMH'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Không có sản phẩm nào trong nhóm này.';
    }
} else {
    echo 'Mã nhóm không được cung cấp.';
}
?>