<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
</head>
<body>
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataPenjualan.xls");
	?>
 <div align="center">
  <table border="1">
   <thead>
    <tr>
     <th>id nota</th>
     <th>tanggal</th>
     <th>jumlah</th>
     <th>id menu</th>
     <th>nama</th>
    </tr>
   </thead>
   <tbody>
    <?php
    $no=0;
     foreach($data->result_array() as $data):
        $no++;
    ?>
     <tr>
     
      <td><?=$data['id_nota'];?></td>
      <td><?=$data['tanggal'];?></td>
      <td><?=$data['jumlah'];?></td>
      <td><?=$data['id_menu']?></td>
      <td><?=$data['nama'];?></td>
     </tr>
    <?php
     endforeach
    ?>
   </tbody>
  </table>
  
 </div>
</body>
</html>