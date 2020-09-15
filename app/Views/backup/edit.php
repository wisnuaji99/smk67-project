<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Backup Surat</title>
</head>
<body>
    <form action="/backup/update" method="post">
        <input type="hidden" name="id" value="<?php echo $backup->id; ?>" >
        <label for="judul">Judul: </label>
        <input type="text" name="judul" placeholder="Masukkan Judul" id="judul" value="<?php echo $backup->judul; ?>">
        </br>    
        <label for="file">Upload File </label>
        <input type="text" name="file" placeholder="Masukkan File" id="file"value="<?php echo $backup->file; ?>">
        </br>   
        <label for="tgl_disimpan">Tanggal Disimpan: </label>
        <input type="text" name="tgl_disimpan" placeholder="Masukkan Tanggal Disimpan" id="tgl_disimpan"value="<?php echo $backup->tgl_simpan; ?>">
        </br>

        <label for="disimpan_oleh">Disimpan Oleh: </label>
        <input type="text" name="disimpan_oleh" placeholder="Masukkan Penyimpan" id="disimpan_oleh"value="<?php echo $backup->disimpan_oleh; ?>">
        </br>
        <button type="submit">Save</button>
    </form>
</body>
</html>