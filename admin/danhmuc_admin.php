<?php
	 include('../connect.php');
?>

<?php
	if(isset($_POST['themdanhmuc'])){
		$tendanhmuc=$_POST['danhmuc'];
		$maloai=$_POST['maloai'];
		$sql_themdanhmuc=mysqli_query($toannhat,"INSERT INTO loai(ten_loai,ma_loai) values('$tendanhmuc','$maloai')");
	}
	if(isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		$sql_xoa_danhmuc=mysqli_query($toannhat,"DELETE FROM loai WHERE ma_loai='$id'");
	}
	if(isset($_GET['quanly'])=='capnhap'){
		$id_capnhap=$_GET['id'];
		$sql_capnhap_danhmuc=mysqli_query($toannhat,"SELECT * FROM loai WHERE ma_loai='$id_capnhap'");
		$row_capnhap=mysqli_fetch_array($sql_capnhap_danhmuc);
	}
	if(isset($_POST['capnhapdanhmuc'])){
	$ten_danhmuc=$_POST['danhmuc'];
	$id_post=$_POST['id_danhmuc'];
	$sql_update=mysqli_query($toannhat,"UPDATE loai SET  ten_loai='$ten_danhmuc'  WHERE ma_loai='$id_post'");
	header('Location:danhmuc_admin.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh Sách Loại Bánh</title>
	 <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<?php
	session_start(); 
  if(isset($_SESSION['ma'])){?>
    <p> Xin chào ! <?php echo $_SESSION['dangnhap'] ?> <a href="logout.php"> Đăng xuất </a></p>
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
			if(isset($_GET['quanly'])){
				$capnhap=$_GET['quanly']; 
			}else{
				$capnhap='';
			}
			if($capnhap=='capnhap'){
				?>
				<div class="col-md-4">
				<h4>Cập nhập </h4>
				<label>Mã Loại</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhap['ma_loai']?>"></br>
					<label>Tên Loại</label>
					<input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhap['ten_loai']?>"></br>
					
					<input type="submit"  name="capnhapdanhmuc" value="Cập nhập " class="btn btn-primary">
				</form>
				</div>
				<?php
			}else{	
				?>
				<div class="col-md-4">
				<h4>Thêm Loại</h4>
				<label>Mã Loại</label>
				<form action="" method="POST">
					<input type="text" class="form-control" name="maloai" placeholder="Mã Loại"></br>
					<label>Tên Loại</label>
					<input type="text" class="form-control" name="danhmuc" placeholder="Tên Loại"></br>
					<input type="submit"  name="themdanhmuc" value="Thêm " class="btn btn-primary">
				</form>
				</div>
			<?php
			}
			?>
			<div class="col-md-8">
				<h4>Danh sách loại</h4>
				<?php 
				$sql_select_danhmuc=mysqli_query($toannhat,"SELECT * FROM loai ORDER BY ma_loai DESC");
				?>
				<table class="table table-bordered">
					<tr>
						<th>Thứ tự</th>
						<th>Mã loại</th>
						<th>Tên loại</th>
						<th>Quản lý</th>
					</tr>
					<?php 
					$i=0;
					while($row_danhmuc=mysqli_fetch_array($sql_select_danhmuc)){
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_danhmuc['ma_loai'] ?></td>
						<td><?php echo $row_danhmuc['ten_loai'] ?></td>
										
						<td><a href="?xoa=<?php echo $row_danhmuc['ma_loai']?>"> Xóa </a> || <a href="?quanly=capnhap&id=<?php echo $row_danhmuc['ma_loai']?>">Cập nhập</a> </td>
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