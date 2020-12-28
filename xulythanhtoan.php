<?php 
	include('./connectDB.php');
	if(isset($_SESSION['user'])){
        if(isset($_GET['id'])){
            $sqlcheck = "SELECT * FROM `don_hang` WHERE `ma_kh`=? AND `trangthai`=? LIMIT 1";
            $queryCheck = $pdo->prepare($sqlcheck);
            $id = $_SESSION['user']['tai_khoan'];
            $queryCheck->execute([$id,0]);
            $datacheck = $queryCheck ->fetch();
            if($queryCheck->rowCount()==0){
                header('location:index');
                exit;
            }
            $idGiocheck = $datacheck['ma_dh'];
            $idGio = $_GET['id'];
            if($idGiocheck === $idGio){
                // print_r($_GET);
                $sql ="UPDATE `don_hang` SET `trangthai`=?,`ghichu`=? WHERE `ma_dh`=? and `ma_kh`= ?";
                $arr = array(1,"đang xử lý",$idGio,$id);
                $queryThanhToan = $pdo->prepare($sql);
                $queryThanhToan->execute($arr);
                if($queryThanhToan->rowCount()!=0){
                    $_SESSION['payment']= "thanh toán thành công";
                    header('location:cake.php');
		            exit;           
                }
                else{
                    $_SESSION['payment']= "thanh toán thất bại";
                    header('location:cake.php');
		            exit;
                }
            }
        }
        else{
            header('location:cake.php');
		    exit;    
        }
    }
	else{
		header('location:login.php');
		exit;
	}
?>
