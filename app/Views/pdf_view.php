<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 PDF Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<?php 
      $path =  'jaya-raya.jpg';
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data2 = file_get_contents($path);
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data2);
     
     ?>

<table width="100%">
<tr>
<td width="25" align="center"><img src="<?php echo $base64; ?>" width="150%"></td>
<td width="40" align="center" style="font-size: 5px;">
<h5 style="line-height: 2px;"><b>PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</b></h5>
<br/><h5 style="line-height: 1px;"><b>DINAS PENDIDIKAN</b></h5><br/>
<h5 style="line-height: 1px;"><b>SEKOLAH MENENGAH KEJURUAN (SMK) NEGERI 67 JAKARTA</b></h5><br/>
<h5 style="line-height: 1px;"><b>KELOMPOK TEKNOLOGI DAN SENI</b></h5><br/>
<h5 style="line-height: 1px;">KOMPETENSI KEAHLIAN : ANIMASI, DESAIN KOMUNIKASI VISUAL & MULTIMEDIA</h5><br/>
   <p style="line-height: 1px;"> JL. TELAGA RT.13/RW.09 Pekayon, Pasar Rebo, Jakarta Timur 13710</p>
</td>

</tr>
</table>
<hr>

</body>
</html>