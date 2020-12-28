<?php
	 include('connect.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="donhang_admin.php">Đơn hàng <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="danhmuc_admin.php">Danh Sách Loại</a>
      </li>
        <a class="nav-link" href="sanpham_admin.php">Sản phẩm</a>
      </li>
      <li class="nav-item">
         <a class="nav-link disabled" href="khachhang_admin.php">Khách hàng</a>
      </li>
    </ul>
  </div>
</nav>