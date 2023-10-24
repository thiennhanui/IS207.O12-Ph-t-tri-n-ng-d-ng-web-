
<?php
        //thêm bằng file
        $file_path = "data_flower.txt"; // Đường dẫn tới tệp văn bản
        // Đọc nội dung tệp và lưu từng hàng vào mảng
        $dem=0;
        $dem_name=0;
        $arr_name=[];
        $dem_id=0;
        $arr_id=[];
        $dem_gia=0;
        $arr_gia=[];
        $dem_mt=0;
        $arr_mt=[];
        $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines !== false) {
        // Hiển thị nội dung trong mảng
        foreach ($lines as $line) 
        {
            $words = explode(" ", $line);
            // Hiển thị các từ trong mảng
            foreach ($words as $word) 
            {  
                if($dem==0)
                {
                    $arr_id[$dem_id]=$word;
                    $dem++;
                    $dem_id++;
                }
                elseif($dem==1)
                {
                    $arr_name[$dem_name]=$word;
                    $dem++;
                    $dem_name++;
                }
                elseif($dem==2)
                {
                    $arr_gia[$dem_gia]=$word;
                    $dem++;
                    $dem_gia++;
                }
                elseif($dem==3)
                {
                    $arr_mt[$dem_mt]=$word;
                    $dem++;
                    $dem_mt++;
                    $dem=0;
                }
            }
        }}

            
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        // thêm 
        $dem=0;
        foreach ($arr_id as $i) {
            echo $arr_id[$dem];
            // Sử dụng câu lệnh SQL INSERT và thực thi nó
            $sql = "INSERT INTO ttsp (id, name, gia, mota) 
            VALUES ('{$arr_id[$dem]}', '{$arr_name[$dem]}', '{$arr_gia[$dem]}', '{$arr_mt[$dem]}')";
            $dem++;
            if ($conn->query($sql) === TRUE) {
                echo "Thêm dữ liệu thành công!";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();

?>
