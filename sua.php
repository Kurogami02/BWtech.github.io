<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
</head>
<body>
<?php
        // Kết nối Database và chọn id cần sửa
        include 'connect.php';
        if(isset($_GET["id"])){
            $id=$_GET['id']; 
        }
        $query=mysqli_query($conn,"select * from `sanpham` where id='$id'");
        $row=mysqli_fetch_assoc($query);
?>
<?php
//Truyền địa chỉ vào
    if(isset($_POST["Sửa"])){
        $tensp = $_POST["tensp"];
        $gia = $_POST["gia"];
        $mota = $_POST["mota"];
//Thông tin không được bỏ trống
        if($tensp =="") {echo "Vui lòng nhập vào Tên Sản Phẩm! <br/>";}
        if($gia =="") {echo "Vui lòng nhập vào Giá! <br/>";}
        if($mota =="") {echo "Vui lòng nhập vào Mô Tả! <br/>";}
//Điều kiện đủ để thêm vào csdl
        if($tensp != "" && $gia !="" && $mota !=""){
            $sql = "UPDATE sanpham SET `tensp` = '$tensp', `gia` = '$gia', `mota` = '$mota' WHERE `id` = $id";
            if ($conn->query($sql) === TRUE) {
               echo "Sửa thành công, hãy quay lại để kiểm tra !";
            } else {
                echo "Đã có lỗi xảy ra " . $conn->error;
            }

            $conn->close();
        }
    }
?>
        <form method="POST" action="" >             
            <label>Tên Sản Phẩm:</label><input type="text" name="tensp" value="<?php echo $row['tensp']; ?>"/><br/>
            <label>Giá:</label><input type="number" name="gia" value="<?php echo $row['gia']; ?>"/><br/>
            <label>Mô Tả:</label><input type="text" name="mota" value="<?php echo $row['mota']; ?>"/><br/>
            <a href="admin.php">Quay lại</a>
            <input type="submit" name="Sửa" value="Sửa"/>
        </form>
</body>
</html>