<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
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

    <!-- show cac san pham-->
<div class="table-container">
    <table class="fixed-table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Kết nối đến cơ sở dữ liệu
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

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($columnCount === 0) {
                    echo "<tr>"; // Bắt đầu một hàng mới
                }
                echo "<td>";
                ?>
                <form action="info.php" method="POST">
                    <img width='100' src='img/<?php echo $row["id"].'.jpg'; ?>' alt='Mô tả hình ảnh'>
                    <label for="inputData">'<?php echo $row["id"].'.jpg'; ?>'</label>
                    <input type="submit" value="Xem">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </form>
                </td>
                <?php
                $columnCount++;

                if ($columnCount === 3) {
                    echo "</tr>"; // Đóng hàng nếu đã đủ 3 cột
                    $columnCount = 0; // Đặt lại số cột đếm
                }
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu.</td></tr>";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
        ?>
        </tbody>
    </table>
</div>


    <script src="script.js"></script>

    <!-- Bao gồm thư viện jQuery và Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
