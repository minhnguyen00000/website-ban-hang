<?php
  session_start();
  if(!isset($_SESSION['dangnhap'])){
       header('Location:index.php');
  }
    if(isset($_GET['login'])){
    $dangxuat=$_GET['login'];
   }else{
    $dangxuat='';
   }
   if($dangxuat=='dangxuat'){ 
    session_destroy();
    header('Location:index.php');
   }
   if(isset($_POST['dangnhap'])){
    $taikhoan=$_POST['taikhoan'];
    $matkhau=md5($_POST['matkhau']);
    if($taikhoan==''|| $matkhau==''){
      echo '<p>Xin nhập đầy đủ thông tin</p>';
    }else{
              //Ket noi vs CSDL lay thong tin dang nhap
        $sql_select_admin=mysqli_query($toannhat,"SELECT * FROM admin where taikhoan='$taikhoan' AND matkhau='$matkhau' LIMIT 1");
        $count=mysqli_num_rows($sql_select_admin);
        $row_dangnhap=mysqli_fetch_array($sql_select_admin);
        if($count>0){
          $_SESSION['dangnhap']=$row_dangnhap['tenadmin'];
           $_SESSION['ma']=$row_dangnhap['ma'];
           
          header('Location:home.php');
        }else{
          echo 'Tài khoản hoặc mật khẩu không đúng !';
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chào mừng đến với trang ADMIN</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <?php 
  if(isset($_SESSION['ma'])){?>
    <p>Xin chào <?php echo $_SESSION['dangnhap'] ?> <a href="logout.php"> Đăng xuất </a></p>
  <?php
  }else{
    header('Location:index.php');
  }
  ?>
  
  <?php include("menu.php") ?>
</body>
</html>