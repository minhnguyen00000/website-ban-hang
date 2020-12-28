<?php
	include('connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		$mabanh=$_POST['mabanh'];
		$tenbanh = $_POST['tensanpham'];
		$gia = $_POST['giasanpham'];
		$thanhphan = $_POST['thanhphan'];
		$mota = $_POST['mota'];
		$hinhanh = $_FILES['hinhanh']['name'];
		if($hinhanh==null)
		{
			$_SESSION['error']="them khong thanh cong ! chua cho hinh anh";

			header("location:sanpham_admin.php");
			exit;
		}
		else{
			$_SESSION['error']="them thanh cong ";

			header("location:sanpham_admin.php");
			exit;
		}

		$loai = $_POST['danhmuc'];
		$path = '../img/banh/';
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($toannhat,"INSERT INTO banh(ma_banh,ten_banh,gia,thanh_phan,mo_ta,hinh,ma_loai) values ('$$mabanh','$tenbanh','$gia','$thanhphan','$mota','$hinhanh','$loai')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}	
	
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
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
	<?php include("menu.php") ?><br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($toannhat,"SELECT * FROM banh WHERE ma_banh='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['ma_loai'];
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên bánh</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['ten_banh'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['ma_banh'] ?>">
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['gia'] ?>"><br>
					<label>Thành phần</label>
					<textarea class="form-control" rows="10" name="thanhphan"><?php echo $row_capnhat['thanh_phan'] ?></textarea><br>
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['mo_ta'] ?></textarea><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../img/banh/<?php echo $row_capnhat['hinh'] ?>" height="80" width="80"><br>
					<label>Loại</label>
					<?php
					$sql_danhmuc = mysqli_query($toannhat,"SELECT * FROM loai ORDER BY ma_loai DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn Loại-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['ma_loai']){
						?>
						<option selected value="<?php echo $row_danhmuc['ma_loai'] ?>"><?php echo $row_danhmuc['ten_loai'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['ma_loai'] ?>"><?php echo $row_danhmuc['ten_loai'] ?></option>
						<?php
						}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>

				
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Mã bánh</label>
					<input type="text" class="form-control" name="mabanh" placeholder="Tên sản phẩm"><br>
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
					<label>Thành phần</label>
					<textarea class="form-control" name="thanhphan"></textarea><br>
					<label>Mô tả</label>
					<textarea class="form-control" name="mota"></textarea><br>
					
					<label>Loại</label>
					<?php
					$sql_danhmuc = mysqli_query($toannhat,"SELECT * FROM loai ORDER BY ten_loai DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn loai-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['ma_loai'] ?>"><?php echo $row_danhmuc['ten_loai'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Danh Sách Bánh</h4>
				<?php
				$sql_select_sp = mysqli_query($toannhat,"SELECT * FROM banh,loai WHERE banh.ma_loai=loai.ma_loai ORDER BY banh.ma_banh DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên Bánh</th>
						<th>Hình ảnh</th>
						
						<th>Loại</th>
						<th>Giá </th>
						
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['ten_banh'] ?></td>
						<td><img src="../img/banh/<?php echo $row_sp['hinh'] ?>" height="100" width="80"></td>
						
						<td><?php echo $row_sp['ten_loai'] ?></td>
						<td><?php echo number_format($row_sp['gia']).'vnđ' ?></td>
						
						<td><a href="?xoa=<?php echo $row_sp['ma_banh'] ?>">Xóa</a> || <a href="sanpham_admin?quanly=capnhat&capnhat_id=<?php echo $row_sp['ma_banh'] ?>">Cập nhật</a></td>
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