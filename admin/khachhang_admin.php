<?php
	 include('../connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Khách hàng</title>
	 <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<?php
	session_start(); 
  if(isset($_SESSION['ma'])){?>
    <p> Xin chào -:- <?php echo $_SESSION['dangnhap'] ?> <a href="logout.php"> Đăng xuất </a></p>
  <?php
  }else{
    header('Location:index.php');
  }
  ?>
<?php include("menu.php") ?>
</br>
	<div class="container">
		<div class="row">	

				
			<div class="col-md-12">
				<h4>Khách hàng</h4>
				<?php 
				$sql_select2=mysqli_query($toannhat,"SELECT * FROM khach_hang ORDER BY khach_hang.tai_khoan ");
				?> 
				<table class="table table-bordered">
					<tr>
						<th>Thứ tự</th>
						<th>Tài khoản</th>
						<th>Mật khẩu</th>
						<th>Tên kh</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
					</tr>
					<?php 
					$i=0;
					while($row_khachhang=mysqli_fetch_array($sql_select2)){
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_khachhang['tai_khoan']; ?></td>
						<td><?php echo $row_khachhang['mat_khau']; ?></td>
						<td><?php echo $row_khachhang['ten_kh']; ?></td>
						<td><?php echo $row_khachhang['sdt']; ?></td>
						<td><?php echo $row_khachhang['dia_chi']; ?></td>
					</tr>	
					<?php
					}
					?> 
				</table>
			</div>
		</div>	
	</div>
	
</body>
</html>