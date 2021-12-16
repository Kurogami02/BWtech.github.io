<?php
    require "ketnoi.php";
?>
<?php
    session_start();

    if(isset($_POST["action"])){
        if($_POST["action"] == "delete_all"){
            unset($_SESSION["giohang"]);
            header("location: index.php");
        }
    }

    if(isset($_POST["delete"])){
        unset($_SESSION["giohang"][$_POST["delete"]]);
        // echo '"'. $_POST["delete"] .'"';
        // print_r($_SESSION["giohang"]);
        // exit();
    }

    $query = null;
    if(isset($_SESSION["giohang"])){
        $sql = "SELECT * FROM sanpham WHERE id in (". implode(",", $_SESSION["giohang"]) . ")";
        $query=mysqli_query($conn,$sql);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BWtech</title>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
      <link rel="stylesheet" href="./assets/css/styles.css">
      <script src="./assets/slider/slider.js"></script>
</head>
<body>
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
            <form action="" method="post" id="shoping-form">
        <div class="content">
                        <?php if(!empty($query)){?>
                <span><h2 class="header-page">Giỏ hàng</h2></span>
                        <table class="shopping-table">
                            <tr>
                                <th class="shoping-img">Sản Phẩm</th>
                                <th class="shoping-name">Tên Sản Phẩm</th>
                                <th class="shoping-pr">Giá tiền</th>
                                <th class="shoping-num">Số lượng</th>
                                <th class="shoping-del"></th>
                            </tr>
                            <?php
                            ?>
                            <?php
                                
                               while($row=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td class="shoping-img"><img class="product-img" src="<?php echo $row["anh"]; ?>" alt=""></td>
                                <td class="shoping-name"><div class="product-name"><?php echo $row["tensp"]; ?></div></td>
                                <td class="shoping-pr"><div class="product-pr"><?php echo $row["gia"]; ?></div></td>
                                <td class="shoping-num"><input type="number" value="<?php echo $soluong[$row["id"]] = 1; ?>" /></td>
                                <td class="shoping-del"><button name="delete" value="<?php echo $row["id"]; ?>">Xóa</button></td>
                            </tr>
                            <?php }?>
                            
                        </table>
                            <div class="shopping-acp"><button name="action" value="delete_all">Thanh Toán</button></div>
        </div>
        <?php } else {?>
            <div class="no-product">
                <h2 class="header-page">Hiện không có sản phẩm nào trong giỏ hàng</h2>
                <a href="index.php">Quay lại</a>
            </div>
        <?php } ?>
            </form>
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