<?php session_start();?>
<?php

    if(!empty($_POST)){
        $action = explode("_", $_POST['action']);

        // Handle product image
        $target_dir = "./assets/img/";
        $target_file = $target_dir . basename($_FILES["anh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);

        switch($action[0]){
            case 'add':
                $sql = "INSERT INTO `sanpham`(`tensp`, `gia`, `mota`, `anh`, `loai`) VALUES 
                    ('" . $_POST['tensp'] . "','" . $_POST['gia'] . "','" . $_POST['mota'] . "','" . $target_file . "','" . $_POST['loai'] . "')";
                make_query($sql);
                break;
            case 'edit':
                $data = $_POST['data'][$action[1]];
                $sql = "UPDATE `sanpham` SET 
                    `tensp`='" . $data['tensp']. "',`gia`='" . $data['gia']. "',`mota`='" . $data['mota']. "' ,`anh`='" . $data['anh']. "',`loai`='" . $data['loai']. "'
                    WHERE tensp = '" . $action[2] . "'";
                make_query($sql);
                break;
            case 'delete':
                $data = $_POST['data'][$action[1]];
                $sql = "DELETE FROM `sanpham` WHERE tensp = '" . $action[2] . "'";
                
                make_query($sql);
                break;
        }
    }

    $get_data_from_mysql = make_query("SELECT * FROM `sanpham`");
    $list_sanpham = array();
    if(mysqli_num_rows($get_data_from_mysql)){
        while ($row = mysqli_fetch_array($get_data_from_mysql)) {
            array_push($list_sanpham, array(
                "tensp" => $row['tensp'],
                "gia" => $row['gia'],
                "mota" => $row['mota'],
                "anh" => $row['anh'],
                "loai" => $row['loai'],
            ));
        }
    }

    function make_query($sql){
        $connect = mysqli_connect('localhost', 'root', '', 'test');
        mysqli_set_charset($connect, 'utf8');
        return mysqli_query($connect, $sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản Phẩm</title>
      <link rel="stylesheet" href="./assets/css/styles.css">
    <style>

        .table{
            width: auto;
            margin: 10% 0 3% 0;
            border-radius: 2em;
            background-color: #ffe6e6;
            overflow: auto;
        }
        .body{
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-color: #e6ffff;
        }
        .table input{
            border-radius: 15px;
            border: none;
            outline:none;
            padding: 0.4em;
            margin-left: 10px;
            margin-bottom: 5px;
        }
        .table #tb{
            width: 90%;
            padding: 3% 0 0 10%;
        }
        .table .tb2{
            width: 100%;
            padding-bottom: 3%;
        }
        #add{
            width: 20%;
        }
        .table #add input{
            width: 100%;
        }
        .table #add button{
            margin-left: 100%;
        }
        .main-box{
            position: fixed;
            z-index: 999;
        }
        #footer{
            bottom: 0;
        }
        .thead{
            width: 17%;
        }
        .thead:last-child{
            width: 10%;
        }
        .tdata{
            padding: 0 1% 0 1%;
        }
    </style>
</head>
<body class="body">
    <div class="main">
        <div class="main-box">
            <div class="header">
                <div class="logo">
                    <div class="bt">
                            <a href="index.php"><img src="./assets/img/logo.PNG" alt=""></a>
                    </div>
                </div>
                <div class="searchbar">
                    <form action="sanpham.php" method="POST">
                        <input type="text" name="txtsearch"/>
                            <button type="submit" name="search">
                                <i class="fas fa-search"></i>
                            </button>
                    </form>
                </div>
                <div class="icon-shoping">
                    <a href="shoping.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="sign">
                    <ul>
                        <?php if($_SESSION["ttnd"]=="test"){?>
                            <li><a href="signup.php">Đăng ký</a></li>
                            <li><a href="login.php">Đăng nhập</a></li>
                        <?php }?>
                        <?php if($_SESSION["ttnd"]=="admin"){?>
                            <li><strong>admin</strong></li>
                            <li><a href="login.php">Đăng xuất</a></li>
                        <?php }?>
                        <?php if($_SESSION["ttnd"]==""){?>
                            <li><strong>user</strong></li>
                            <li><a href="login.php">Đăng xuất</a></li>
                        <?php }?>
                    </ul>
                </div>
           </div>
           <div class="header-bottom">
                <ul class="nav">
                <ul class="nav">
                    <li><a href="laptop.php">Laptop</a>
                        <ul id="subnav">
                            <li><a href="">Laptop văn phòng</a></li>
                            <li><a href="">Laptop gaming</a></li>
                            <li><a href="">Laptop doanh nghiệp</a></li>
                            <li><a href="">Laptop giá rẻ</a></li>
                        </ul>
                    </li>
                    <li><a href="phone.php">Điện thoại</a>
                        <ul id="subnav-a">
                            <li><a href="">Iphone</a></li>
                            <li><a href="">Samsung</a></li>
                            <li><a href="">Oppo</a></li>
                            <li><a href="">Xiaomi</a></li>
                            <li><a href="">Oneplus</a></li>
                        </ul>
                    </li>
                    <li><a href="linh-kien-pc.php">Linh kiện PC</a>
                        <ul id="subnav-v">
                            <li><a href="">Mainboard</a></li>
                            <li><a href="">CPU - Vi xử lý</a></li>
                            <li><a href="">VGA - Card đồ họa</a></li>
                            <li><a href="">Ổ cứng</a></li>
                            <li><a href="">RAM - Bộ nhớ đệm</a></li>
                            <li><a href="">PSU - Nguồn</a></li>
                        </ul>
                    </li>
                    <li><a href="phu-kien.php">Phụ kiện</a>
                        <ul id="subnav-p">
                            <li><a href="">Điện thoại</a></li>
                            <li><a href="">Laptop</a></li>
                            <li><a href="">Chuột</a></li>
                            <li><a href="">Bàn phím</a></li>
                            <li><a href="">Tai nghe</a></li>
                        </ul>
                    </li>
                    <li><a href="news.php">Tin công nghệ</a></li>
                    <li><a href="contact.php">Liên hệ</a></li>
                    <!-- Phan quyen admin -->
                    <?php if($_SESSION["ttnd"]=="admin"){?>
                    <li><a href="admin.php">Quản lý sản phẩm</a></li>
                    <?php }?>
                </ul>
           </div>
        </div>
    <div class="table">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Thêm sinh viên -->
            <table id="tb">
                <tr id="add">
                    <td><label>Tên Sản Phẩm</label></td>
                    <td><input type="text" id="tensp" name="tensp"></td>
                </tr>
                <tr id="add">
                    <td><label>Giá</label></td>
                    <td><input type="number" id="gia" name="gia"></td>
                </tr>
                <tr id="add">
                    <td><label>Mô Tả</label></td>
                    <td><input type="text" id="mota" name="mota"></td>
                </tr>
                <tr id="add">
                    <td><label>Ảnh</label></td>
                    <td><input type="file" id="anh" name="anh"></td>
                </tr>
                <tr id="add">
                    <td><label>Loại SP</label></td>
                    <td><input type="text" id="loai" name="loai"></td>
                </tr>
                <tr id="add">
                    <td><button name="action" value="add">Thêm</button></td>
                </tr>
            </table>

            <!-- Danh sách sản phẩm -->
            <table class="tb2">
                <tr>
                    <th class="thead">Tên Sản Phẩm</th>
                    <th class="thead">Giá</th>
                    <th class="thead">Mô tả</th>
                    <th class="thead">Hình ảnh</th>
                    <th class="thead">Loại SP</th>
                    <th class="thead">Tác vụ</th>
                </tr>
                <?php foreach($list_sanpham as $key => $sanpham){ ?>
                <tr class="trow2">
                    <td class="tdata"><input type="text" name="data[<?php echo $key ?>][tensp]" value="<?php echo $sanpham['tensp'] ?>"></td>
                    <td class="tdata"><input type="text" name="data[<?php echo $key ?>][gia]" value="<?php echo $sanpham['gia'] ?>"></td>
                    <td class="tdata"><input type="text" name="data[<?php echo $key ?>][mota]" value="<?php echo $sanpham['mota'] ?>"></td>
                    <td class="tdata"><input type="text" name="data[<?php echo $key ?>][anh]" value="<?php echo $sanpham['anh'] ?>"></td>
                    <td class="tdata"><input type="text" name="data[<?php echo $key ?>][loai]" value="<?php echo $sanpham['loai'] ?>"></td>
                    <td class="tdata">
                        <button name="action" value="edit_<?php echo $key ?>_<?php echo $sanpham['tensp'] ?>">Sửa</button>
                        <button name="action" value="delete_<?php echo $key ?>_<?php echo $sanpham['tensp'] ?>">Xóa</button>
                    </td>
                </tr>
                <?php }?>
            </table>
        </form>
    </div>
    <div id="footer">
        <div class="bottom">
            <!--Begin #footer-info-->
            <div id="footer-info">
                <p class="st"><Strong>BlackWhite team's project</Strong></p>
                <p><strong>L. Khanh: </strong>Production leader & Desiner</p>
                <p><Strong>Dr. Hoan: </Strong>Front-end maker</p>
                <p><Strong>Nghia 64: </Strong>Back-end maker</p>
                <p><Strong>DQ Phuc: </Strong>Content Maker</p>
                <p><Strong>Thien HC: </Strong>Tester & Content maker</p>
            </div>
            <!--End #footer-info-->
            <!--Begin #footer-right-->
            <div id="footer-right">
                <p><strong>Contact with us:</strong></p>
                <ul>
                    <li><img src="./assets/img/github.png" alt="" class="footer-img"><a href="https://github.com/BlackWhite05">BW's github</a></li>
                    <li><img src="./assets/img/gmail.png" alt="" class="footer-img"><a href="https://mail.google.com/">Our email</a></li>
                    <li><img src="./assets/img/facebook.png" alt="" class="footer-img"><a href="https://www.facebook.com/">Our page</a></li>
                </ul>
            </div>
            <!--End #footer-right-->
        </div>
    </div>
    <!--End #footer-->
    <div id="copyright">
        <p>© 2021 BlackWhite team, All Rights Reserved</p>
    </div>
</body>
</html>