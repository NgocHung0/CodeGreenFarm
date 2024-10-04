<?php
  require_once("server.php");
  $vt=$_GET['vt'];
  $MaNhom =$_GET["MaNhom"];
  $sql= "SELECT m.MaMH, m.TenMH, m.MoTa, m.XuatXu, m.Gia, m.DonViTinh, m.HinhAnh, m.MaNhom, n.TenNhom FROM mathang m, nhomraucu n WHERE n.MaNhom = m.MaNhom and m.MaNhom='".$MaNhom."'";
    $rs = mysqli_query($conn, $sql);//bộ resultset
    $mang=array();
	  while ($rows=mysqli_fetch_array($rs)){	
      $usertemp['MaMH']=$rows["MaMH"];
      $usertemp['TenMH']=$rows["TenMH"];
      $usertemp['MoTa']=$rows["MoTa"];
      $usertemp['XuatXu']=$rows["XuatXu"];
      $usertemp['Gia']=$rows["Gia"];
      $usertemp['DonViTinh']=$rows["DonViTinh"];
      $usertemp['HinhAnh']=$rows["HinhAnh"];
      $usertemp['MaNhom']=$rows["MaNhom"];
      $usertemp['TenNhom']=$rows["TenNhom"];
      $usertemp['vt']=$vt;
      array_push($mang,$usertemp);  
    }
    $jsondata['items'] =$mang;	
    var_dump($_GET);
    echo json_encode($jsondata); //trả về cho client 1 chuỗi json dạng mảng
    mysqli_close($conn);
?>