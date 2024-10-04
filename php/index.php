<?php
// Kết nối đến cơ sở dữ liệu
include 'server.php'; // Tệp này chứa thông tin kết nối cơ sở dữ liệu

// Lấy danh sách nhóm rau từ cơ sở dữ liệu
$sql = "SELECT * FROM nhomraucu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Farm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh Sách Nhóm Rau Củ</h1>
        <div class="list-group">
            <?php
            if ($result->num_rows > 0) {
                // Hiển thị danh sách nhóm rau
                while($row = $result->fetch_assoc()) {
                    echo '<a href="#" class="list-group-item list-group-item-action" onclick="showProducts(\'' . $row['MaNhom'] . '\')">' . $row['TenNhom'] . '</a>';
                }
            } else {
                echo "Không có nhóm rau nào.";
            }
            ?>
        </div>

        <div id="product-list" class="mt-4"></div>
    </div>

    <script>
        function showProducts(MaNhom) {
            // Gửi yêu cầu AJAX đến server để lấy danh sách sản phẩm
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_products.php?MaNhom=" + MaNhom, true);
            xhr.onload = function() 
            {
                if (this.status == 200) 
                {
                    document.getElementById('product-list').innerHTML = this.responseText;
                } else 
                {
                    document.getElementById('product-list').innerHTML = "Có lỗi xảy ra khi tải sản phẩm.";
                }
            }
            xhr.send();
        }
    </script>
</body>
</html>

