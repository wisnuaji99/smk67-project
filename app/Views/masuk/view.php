<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Surat Masuk</title>
</head>
<body>
    <form action="/masuk/update" method="post">
        <input type="hidden" name="id" value="<?php echo $masuk->id; ?>" >
        <label for="judul">Judul: </label>
        <input type="text" name="judul" placeholder="Masukkan Judul" id="judul" value="<?php echo $masuk->judul; ?>"readonly>
        </br>

        <label for="file">Upload File </label>
        <input type="text" name="file" placeholder="Masukkan File" id="file" value="<?php echo $masuk->file; ?>"readonly>
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
        <a href="/masuk">Kembali</a>
    </form>
</body>
</html>