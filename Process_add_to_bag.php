<?php
include('account.php');

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sp = $_POST['id_sp'];
    
    // Lấy giá trị cũ từ cơ sở dữ liệu
    $query = "SELECT gio FROM client WHERE id = '$acc'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gio_cu = $row['gio'];
        
        // Cộng giá trị cũ với giá trị mới
        $gio_moi = $gio_cu.$id_sp;
        
        // Thực hiện câu lệnh UPDATE
        $sql = "UPDATE client SET gio = '$gio_moi' WHERE id = '$acc'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật dữ liệu thành công!";
            
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy dữ liệu cho ID $acc";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

$conn->close();
header("Location: Giohang.php");
exit();
?>
