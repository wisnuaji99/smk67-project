<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Surat Masuk</title>
</head>
<body>
    <form >
        <input type="hidden" name="id" value="<?php echo $masuk->id; ?>" >
        <label for="judul">Judul: </label>
        <input type="text" name="judul" placeholder="Masukkan Judul" id="judul" value="<?php echo $masuk->judul; ?>"readonly>
        </br>

        <label for="file"> File Surat</label>
       <a href="<?php echo base_url()."/uploads/".$masuk->file; ?>" target="_blank"><?php echo $masuk->file; ?></a>
        </br>

        <label for="status">Status Surat: </label>
        <input type="text" name="status" placeholder="Masukkan Status Surat" id="status" value="<?php 
        if ($masuk->status == 1 ) {
            echo "surat dikirim";
        } else if ($masuk->status == 2){
            echo "surat dibaca";
        } else if ($masuk->status == 3){
            echo "permintaan surat balasan";
        }
        
        ?>"readonly>
        </br>
        <a href="/surat">Kembali</a>
    </form>
</body>
</html>