<!DOCTYPE html>
<html lang="vi">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_info.css"> <!-- Đường dẫn tới file CSS -->
    <title>thong tin san pham</title>
</head>
<body>
    <header>
        Trang web ban than
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">trang chủ
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">sản phẩm 
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">vè chúng tôi
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">liên hệ
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="form-image">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $anh = 'img/' . $_POST["id"].'.jpg';
                $id=$_POST["id"];
                // Kiểm tra xem $anh có tồn tại không
                if (file_exists($anh)) {
                    echo "<img src='$anh' alt='Ảnh sản phẩm' width='500' height='500'>" ;
                } else {
                    echo "<p>Đường dẫn ảnh không tồn tại.</p>";
                }
            }
            ?>
        </div>
        <div class="form">
            <?php
            $mt;
            // Kết nối đến cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM ttsp WHERE id = '$id'";
            $result = $conn->query($sql);
            
            // Kiểm tra và xử lý kết quả
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "ID: " . $row["id"]. "<br>";
                    $mt = $row["mota"];
                }
            } else {
                echo "Không có dòng nào được tìm thấy có ID = $id";
            }
            $conn->close();
            ?>
            <form action="Process_add_to_bag.php" method="post">
                <!-- Các trường và dữ liệu bạn muốn bao gồm trong biểu mẫu -->
                <label for="input1">mô tả:</label>
                <p><?php echo $mt ?></p>  <!-- mô tả -->
                <!-- Nút submit 1 -->
                <input   type="hidden" name="id_sp" value=<?php echo $_POST["id"] ?>>
                <input   type="submit" name="gio" value="thêm vào giỏ">
                
                <!-- Nút submit 2 -->
                <input  type="submit" name="mua" value="mua ngay">
            </form>
        </div>
    </div>

</body>
</html>

