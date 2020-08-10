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

 <h3><center>BUKTI BOOKING LAPANGAN</h3></center><br/><hr/>
  <?php
          $no=1;
          if ($cetak_detail_booking->num_rows()>0) {
          foreach ($cetak_detail_booking->result_array() as $tampil) 
        { ?>			
<table width='100%'>
      <tr><td width='120px'>Nama Member</td>     	<td> : &nbsp;<?php echo $tampil['nama_member'];?></td></tr>
		  <tr><td>No Telp</td>     	<td> : &nbsp;+(62) <?php echo $tampil['phone'];?></td></tr>
		  <tr><td>Nama Lapangan</td>     	<td> : &nbsp;<?php echo $tampil['nama_lapangan'];?></td></tr>
		  <tr><td>Tanggal Main</td>     	<td> : &nbsp;<?php echo $tampil['tgl_main'];?></td></tr>
      <tr><td>Jam</td>     	<td> : &nbsp;<?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?> WIB</td></tr>
		  <tr><td>Harga</td>   	<td> : &nbsp;Rp.<?php echo $tampil['total'];?>,- / <?php echo $tampil['durasi'];?> Jam</td></tr>
		  <!--<tr><td>Status</td>   <td> : &nbsp;<?php echo $tampil['status'];?></td></tr>-->

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
  </table><hr>
  <div align="center">Copyright © 2020 <b>JayaSport</b>. All rights reserved.</div>
 

<script type="text/javascript">
 window.print();
</script>

</body>
</html>