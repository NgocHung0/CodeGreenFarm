<?php

require_once("server.php");
  $sql="SELECT MaNhom, TenNhom FROM `nhomraucu`";
   
	$rs=mysqli_query($conn,$sql);//bộ resultset
    $mang=array();
	while ($rows=mysqli_fetch_array($rs)){	
    
        $usertemp['MaNhom']=$rows["MaNhom"];
        $usertemp['TenNhom']=$rows["TenNhom"];
        array_push($mang,$usertemp);  
    }
    $jsondata['items'] =$mang;	
    echo json_encode($jsondata); //trả về cho client 1 chuỗi json dạng mảng
   mysqli_close($conn);
?>