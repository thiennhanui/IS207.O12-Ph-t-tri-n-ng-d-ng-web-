<?php
// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thông tin kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ biểu mẫu
    $id = $_POST["id"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    echo "gt :".$sex;
    // Câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO client (id, name,sex)
    VALUES ('$id', '$name','$sex')";

    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được thêm thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
