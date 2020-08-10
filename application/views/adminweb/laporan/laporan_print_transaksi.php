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

 <h3><center>Laporan Data Transaksi JayaSport</h3>
 <br/>
    <table class="table-data">
      <thead>
      <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Nama Member</th>
        <th>Nama lapangan</th>
        <th>Tanggal Main</th>
        <th>Jam</th>
        <th>Durasi</th>
        <th>Pembayaran</th>
        <th>Harga</th>
      </tr>
      </thead>
      
      <tbody>
        <?php
          $no=1;
          if ($transaksi->num_rows()>0) {
          foreach ($transaksi->result_array() as $tampil) 
        { ?>
          <tr>
              <th scope="row"><center><?php echo $no;?></th>
              <td><center><?php echo $tampil['kode_transaksi'];?></td>
              <td><center><?php echo $tampil['nama_member'];?></td>
              <td><center><?php echo $tampil['nama_lapangan'];?></td>
              <td><center><?php echo $tampil['tgl_main'];?></td>
              <td><center><?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?> WIB</td>
              <td><center><?php echo $tampil['durasi'];?> Jam</td>
              <td><center>Bank <?php echo $tampil['nama_bank'];?></td>
              <td><center>Rp.<?php echo $tampil['total'];?>,-</td>
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