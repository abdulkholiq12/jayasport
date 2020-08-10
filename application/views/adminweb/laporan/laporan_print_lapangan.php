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

 <h3><center>Laporan Data Lapangan JayaSport</h3>
 <br/>
    <table class="table-data">
      <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Kode Lapangan</th>
        <th>Nama lapangan</th>
        <th>Harga</th>
      </tr>
      </thead>
      
      <tbody>
        <?php
          $no=1;
          if ($lapangan->num_rows()>0) {
          foreach ($lapangan->result_array() as $tampil) 
        { ?>
          <tr>
              <th scope="row"><center><?php echo $no;?></th>
              <td><center><img src="<?php echo base_url().'/images/lapangan/'.$tampil['gambar'];?>"
              width="80" height="80" alt="gambar tidak ada"></td>
              <td><center><?php echo $tampil['kode_lapangan'];?></td>
              <td><center><?php echo $tampil['nama_lapangan'];?></td>
              <td><center>Rp.<?php echo $tampil['harga'];?>,-</td>
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