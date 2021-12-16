<?php
        session_start();
        include 'ketnoi.php';
        if(isset($_POST["submit"]) && $_POST["username"] !='' && $_POST["password"] !=''){           
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM users WHERE `username`='$username' AND `password`='$password' ";
            $users = mysqli_query($conn, $sql);
            var_dump(mysqli_num_rows($users));
            if(mysqli_num_rows($users)){
                while ($row = mysqli_fetch_array($users)) {
                   $_SESSION["ttnd"]=$row["quyen"];
                     header("Location: index.php");
                }
            }
            if(mysqli_num_rows($users) <= 0){
                echo "Bạn đã nhập sai Username hoặc Password ! ";
            }                
    }
        
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="login.php"><h3>Vui lòng quay lại</h3></a>
    </body>
    </html>