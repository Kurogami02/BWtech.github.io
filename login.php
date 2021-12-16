<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
      <link rel="stylesheet" href="./assets/css/styles.css">
      <script src="./assets/slider/sliders.js"></script>
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
                    <input type="text" id="js-search" class="search-txt" value name="q"  placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                    <button>
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="icon-shoping">
                    <a href="shoping.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="sign">
                    <ul>
                        <li><a href="signup.php">Đăng ký</a></li>
                        <li><a href="login.php">Đăng nhập</a></li>
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
                </ul>
           </div>
        </div>
    <div class="login">
    <h3 class="login-head">Đăng nhập</h3>
    <form action="submit.php" method="POST" class="login-head">
        <table>
            <tr>
                <td>Username: </td>
                <td><input class="login-input" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login-input" type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Login</button>
                    <button type="reset">Reset</button>
                    <a href="signup.php"> Đăng Ký</a>
                </td>
            </tr>
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