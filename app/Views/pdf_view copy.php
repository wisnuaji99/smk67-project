<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 PDF Example - positronx.io</title>
 
</head>

<body>
<?php 

      $path =  'kop_surat.png';
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data2 = file_get_contents($path);
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data2);
     
     ?>

<table width="100%">
<tr>
<td align="center">
  <!-- <img src="<?php //echo $base64; ?>" width="100%"> -->
  <img src="<?php echo base_url().'/'.$path; ?>">
</td>

</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>

<div class="row">
		<div class="col-md-6">

    <table>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
  </table>


		</div>
		<div class="col-md-6">

    <table>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
    <tr>
      <td>No</td>
      <td>:</td>
      <td>72 /-1.851.75</td>
    </tr>
  </table>

		</div>
	</div>
 
</tr>
</table>



</body>
</html>