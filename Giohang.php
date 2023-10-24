<?php 
    include('account.php');
    $my_bag="";

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Thực hiện câu lệnh SQL SELECT
    $sql = "SELECT gio FROM client WHERE id = '$acc'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Có ít nhất một hàng được trả về
        $row = $result->fetch_assoc();
        $my_bag = $row['gio'];
        echo "Giá trị của cột 'gio' cho hàng có id = 000 là: " .  $my_bag;
    } else {
        echo "Không tìm thấy ";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>   
    <title>Sanpham</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_bag.css"> <!-- Đường dẫn tới file CSS -->

</head>
<body>
    <h1 class="center-heading">LA MAISION</h1>
    <table border="1">
        <tr>
            <td>Trang chủ</td>
            <td>Sản phẩm</td>
            <td>Về chúng tôi</td>
            <td>Liên hệ</td>
        </tr>
    </table>

    <h2 >Trang chủ/ Giỏ hàng</h2>

    <h3 class="center-heading">GIỎ HÀNG CỦA BẠN</h3>

<div class="table-container">
    <table class="fixed-table">
    <tbody>
    <?php
        $columnCount = 0;
        // Kết nối đến cơ sở dữ liệu để tạo gỏ hàng 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        // Truy vấn SQL để lấy dữ liệu
        $sql = "SELECT id FROM ttsp";
        $result = $conn->query($sql);

        $columnCount = 0; // Đếm số cột đã thêm vào hàng
        $my_bags=[];
        $dem=0;
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {   if ($columnCount === 0) 
                {
                    echo "<tr>"; // Bắt đầu một hàng mới
                }
                if (strpos($my_bag, $row["id"]) !== false) 
                {
                    $my_bags[$dem]=$row["id"];
                    ?>
                    <td>
                    <form action="info.php" method="POST">
                        <img width='100' src='img/<?php echo $row["id"].'.jpg'; ?>' alt='Mô tả hình ảnh'>
                        <label for="inputData">'<?php echo $row["id"].'.jpg'; ?>'</label>
                        <input type="submit" value="Xem">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </form>
                    </td>
                    <?php 
                    $columnCount++;
                    if($columnCount == 1)
                    {
                        $columnCount=0;
                    }
                } 
            }
        }
        $conn->close();
    ?>
        </tbody>
    </table>
</div>


    <h4 >Bạn có tài khoản?</h4>
    
        
    <table border="0">
        <tr>
            <td>Giới thiệu</td>
            <td>Thông tin liên hệ</td>
            <td>Liên hệ</td>
            <td>Hỗ trợ</td>
        </tr>
        <tr>
            <td>Tiệm hoa MQ chuyên cung cấp các sản phẩm hoa tươi trong nước và nhập khẩu từ Hà Lan, Pháp, Ecuador, Nhật Bản, Malaysia, Trung Quốc... Tiêm hoa luôn mong muốn được lắng nghe mọi phản hồi và ý kiến đóng góp của khách hàng để ngày càng hoàn thiện hơn về chất lượng, nhận được nhiều hơn sự tin tưởng và ủng hộ của khách hàng mỗi lần ghé thăm.</td>
            <td>132 Nguyễn Hoàng, P. An Phú, TP. Thủ Đức (Quận 2 cũ), TP. Hồ Chí Minh<br>
                090 717 0030<br>
                mqflowershop@gmail.com</td>
            <td>Sản phẩm khuyến mãi<br>
                Sản phẩm nổi bật<br>
                Tất cả sản phẩm</td>
            <td>Tìm kiếm<br>
                Giới thiệu<br>
                Chính sách đổi trả<br>
                Chính sách bảo mật<br>
                Điều khoản<br>
                Dịch vụ<br>
                Liên hệ</td>
        </tr>
    </table>
    ​
</body>
</html>

