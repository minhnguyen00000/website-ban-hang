<?php
    include('./connectDB.php');
    if(!isset($_SESSION['user'])){
        header('location:index.php');
        exit;
    }
    if(!isset($_SESSION['giohang'])){
        header('location:index.php');
        exit;
    }
    if(isset($_POST['update-gio'])){
        // print_r($_POST);
        // exit;
        $idgio = $_SESSION['giohang'];
        unset($_SESSION['giohang']);
        $data = $_POST;
        foreach($data as $id=>$v){
            if($id!='update-gio'){
                $sqlupdate ="UPDATE `chitiet_dh` SET `soluong`=? WHERE `ma_banh`=? and `ma_dh`=?";
                $queryupdate = $pdo ->prepare($sqlupdate);
                $queryupdate ->execute([$v,$id,$idgio]);
                $queryupdate ->fetchAll();
            }
        }
        $sqlctdh = "SELECT * FROM `chitiet_dh` WHERE `ma_dh`= '$idgio'";
        $query = $pdo->prepare($sqlctdh);
        $query->execute();
        $dataitem = $query->fetchALL();
        $tongtien =0;
        foreach($dataitem as $v){
            $tongtien += $v['soluong']*$v['dongia'];
        }
        $sqlUpdateGia = "UPDATE `don_hang` SET `thanhtien`=? WHERE `ma_dh` = ?";
        $queryupdate = $pdo->prepare($sqlUpdateGia);
        $queryupdate->execute([$tongtien,$idgio]);
    }
    header('location:cart.php');
    exit;
?>
    