<?php
	 include('../connect.php');
?>

<?php
	if(isset($_POST['capnhapdonhang'])){
		$xuly=$_POST['xuly'];
		$mahang=$_POST['mahang_xuly'];
		$sql_update_donhang=mysqli_query($toannhat,"UPDATE don_hang SET trangthai='$xuly' WHERE ma_dh='$mahang'");
	}
?>

<?php 
if(isset($_GET['xoadonhang'])){
	$mahang=$_GET['xoadonhang']; 	
	$sql_delele=mysqli_query($toannhat,"DELETE FROM chitiet_dh WHERE ma_banh= '$mahang'");
	header('location:donhang_admin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đơn hàng</title>
	 <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<?php
	session_start(); 
  if(isset($_SESSION['ma'])){?>
    <p> Xin chào -:-  <?php echo $_SESSION['dangnhap'] ?> <a href="logout.php"> Đăng xuất </a></p>
  <?php
  }else{
    header('Location:index.php');
  }
  ?>
<?php include("menu.php") ?>
</br>
	<div class="container">
		<div class="row">	
			<?php 
			if(isset($_GET['quanly'])=='xemdonhang'){
				$mahang=$_GET['mahang'];
				//$sql_chitietdonhang=mysqli_query($toannhat,"SELECT * FROM chitiet_dh,banh WHERE chitiet_dh.ma_dh=banh.ma_banh AND chitiet_dh.ma_dh='$mahang'");
				$sql_chitietdonhang=mysqli_query($toannhat,"SELECT * FROM chitiet_dh,banh WHERE chitiet_dh.ma_banh=banh.ma_banh AND chitiet_dh.ma_dh='$mahang'");


				?> 
				<div class="col-md-10">
				<h1>Xem chi tiết đơn hàng</h1>
				<form action="" method="POST">	
				<table class="table table-bordered">
					<tr>
						<th>Thứ tự</th>		
						<th>Mã đơn hàng</th>
						<th>Tên bánh</th>
						<th>Mã Bánh</th>
						<th>Số lượng</th>	
						<th>Tổng tiền</th>
					</tr>
					<?php 
					

					$i=0;
					while($row_donhang=mysqli_fetch_array($sql_chitietdonhang)){
						
						$i++;
						
					
					?>
					<tr>
						<td><?php  echo $i; ?></td>
						<td><?php echo $row_donhang['ma_dh']; ?></td>
						<td><?php echo $row_donhang['ten_banh']; ?></td>
						<td><?php echo $row_donhang['ma_banh']; ?></td>
						<td><?php echo $row_donhang['soluong']; ?></td>
						<td><?php echo $row_donhang['tonggia']; ?></td>

						<input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['ma_dh']?>">
						<!-- <td><a href="?xoa=<?php echo $row_donhang['id_donhang']?>"> Xóa </a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang']?>">Xem đơn hàng</a> </td> -->
					</tr>	
					<?php
					}
					?> 
				</table>
				</div>
				</form>
				<?php
			}else{	
				?>
				
				<div class="col-md-7">
				<p>Đơn hàng</p>
				</div> 
			<?php
			}
			?> 
			<div class="col-md-8">
				<h4>Liệt kê đơn hàng</h4>
				<?php 
				$sql_select=mysqli_query($toannhat,"SELECT * FROM khach_hang,chitiet_dh,don_hang WHERE don_hang.ma_dh=chitiet_dh.ma_dh AND don_hang.ma_kh=khach_hang.tai_khoan ORDER BY don_hang.ma_dh DESC");
				?> 
				<table class="table table-bordered">
					<tr>
						<th>Thứ tự</th>
						<th>Mã bánh</th>
						<th>Số lượng</th>
						<th>Mã hàng</th>
						<th>Tên KH</th>
						<th>Quản lý</th> 
					</tr>
					<?php 

					$i=0;
					$tam = 0;
					while($row_donhang=mysqli_fetch_array($sql_select)){
						
						if ($tam!= $row_donhang['ma_dh']) {
							$i++;
						}
					$tam =$row_donhang['ma_dh'];				
						?>
					<tr>

						<td><?php echo $i; ?></td>
						<td><?php echo $row_donhang['ma_banh']; ?></td>
						<td><?php echo $row_donhang['soluong']; ?></td>
						<td><?php echo $row_donhang['ma_dh']; ?></td>
						<td><?php echo $row_donhang['ten_kh']; ?></td>
						<td><a href="?xoadonhang=<?php echo $row_donhang['ma_banh']?>"> Xóa </a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['ma_dh']?>">Xem chi tiết</a> </td>
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