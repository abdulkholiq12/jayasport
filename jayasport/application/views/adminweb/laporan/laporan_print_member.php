<!DOCTYPE html>
<html>
<head>
 <title></title>
</head>
<body>
 <style type="text/css">
 .table-data{
   width: 100%;
   border-collapse: collapse;
  }

  .table-data tr th,
  .table-data tr td{
   border:1px solid black;
   font-size: 10pt;
  }
 </style>

 <h3><center>Laporan Data Member JayaSport</h3>
 <br/>
    <table class="table-data">
      <thead>
      <tr>
        <th>No</th>
        <th>Kode Member</th>
        <th>Nama Member</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>No.Telp</th>
        <th>Alamat</th>
      </tr>
      </thead>
      
      <tbody>
        <?php
          $no=1;
          if ($member->num_rows()>0) {
          foreach ($member->result_array() as $tampil) 
        { ?>
          <tr>
              <th scope="row"><center><?php echo $no;?></th>
              <td><center><?php echo $tampil['kode_member'];?></td>
              <td><center><?php echo $tampil['nama_member'];?></td>
              <td><center><?php echo $tampil['username'];?></td>
              <td><center>**********</td>
              <td><center><?php echo $tampil['email'];?></td>
              <td><center>+(62) <?php echo $tampil['phone'];?></td>
              <td><center><?php echo $tampil['alamat'];?></td>
          </tr>
   	    <?php
					$no++;
					}
					}
          else 
        { ?>
					<tr>
						<td colspan="10">No Result Data</td>
					</tr>
				<?php
        }  ?>
      </tbody>
    </table>

<script type="text/javascript">
 window.print();
</script>

</body>
</html>