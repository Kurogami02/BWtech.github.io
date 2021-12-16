<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them</title>
</head>
<body>
    <div class="index">
        <form method="POST" action="" class="table">
            <label>Tên sản phẩm:</label><input type="text" name="tensp" /><br/>
            <label>Giá:</label><input type="number" name="gia" /><br/>
            <label>Mô tả:</label><textarea rows="9" cols="30" name="mota"></textarea><br/>
            <a href="admin.php">Quay lại</a>
            <input type="submit" name="them" value="Thêm"/>
        </form>
    </div>
</body>
</html>
<?php
//Truyền địa chỉ vào
    if(isset($_POST["them"])){
        $tensp = $_POST["tensp"];
        $gia = $_POST["gia"];
        $mota = $_POST["mota"];
//Thông tin không được bỏ trống
        if($tensp =="") {echo "Vui lòng nhập vào Tên Sản Phẩm! <br/>";}
        if($gia =="") {echo "Vui lòng nhập vào Giá! <br/>";}
        if($mota =="") {echo "Vui lòng nhập vào Mô Tả! <br/>";}
//Điều kiện đủ để thêm vào csdl
        if($tensp != "" && $gia !="" && $mota !=""){
            $sql = "INSERT INTO sanpham(`tensp`, `gia`, `mota`) VALUES('$tensp','$gia','$mota')";
            if ($conn->query($sql) === TRUE) {
                echo "Thêm thành công . Hãy quay lại để kiểm tra !";
            } else {
                echo "Đã có lỗi xảy ra " . $conn->error;
            }

            $conn->close();
        }
    }else{
        require "admin.php";
    }    

