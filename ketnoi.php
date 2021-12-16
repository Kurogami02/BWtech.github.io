<?php
$conn = mysqli_connect("localhost","root","","test");
// kiểm tra kết nối
if (mysqli_connect_errno())
{
echo "Kết nối thất bại " . mysqli_connect_error();
}
?>