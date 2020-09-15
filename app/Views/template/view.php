<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Template</title>
</head>
<body>
    <form action="/template/update" method="post">
        <input type="hidden" name="id" value="<?php echo $template->id; ?>" >
        <label for="nomor">Nomor: </label>
        <input type="text" name="nomor" placeholder="Masukkan Nomor" id="nomor"value="<?php echo $template->nomor; ?>"readonly>
        </br>

        <label for="sifat">Sifat: </label>
        <input type="text" name="sifat" placeholder="Masukkan Sifat" id="sifat"value="<?php echo $template->sifat; ?>"readonly>
        </br>

        <label for="lampiran">Lampiran: </label>
        <input type="text" name="lampiran" placeholder="Masukkan Lampiran" id="lampiran"value="<?php echo $template->lampiran; ?>"readonly>
        </br>

        <label for="hal">Perihal: </label>
        <input type="text" name="hal" placeholder="Masukkan hal" id="hal"value="<?php echo $template->hal; ?>"readonly>
        </br>

        <label for="tgl_keluar">Tanggal Keluar: </label>
        <input type="text" name="tgl_keluar" placeholder="Masukkan Tanggal Keluar" id="tgl_keluar"value="<?php echo $template->tgl_keluar; ?>"readonly>
        </br>

        <label for="jabatan_penulis">Jabatan Penulis: </label>
        <input type="text" name="jabatan_penulis" placeholder="Masukkan Jabatan Penulis" id="jabatan_penulis"value="<?php echo $template->jabatan_penulis; ?>"readonly>
        </br>
        <button type="view">View</button>
    </form>
</body>
</html>