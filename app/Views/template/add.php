<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Template</title>
</head>
<body>
    <form action="/template/save" method="post">
        <label for="nomor">Nomor: </label>
        <input type="text" name="nomor" placeholder="Masukkan Nomor" id="nomor">
        </br>

        <label for="sifat">Sifat: </label>
        <input type="text" name="sifat" placeholder="Masukkan Sifat" id="sifat">
        </br>

        <label for="lampiran">Lampiran: </label>
        <input type="text" name="lampiran" placeholder="Masukkan Lampiran" id="lampiran">
        </br>

        <label for="hal">Perihal: </label>
        <input type="text" name="hal" placeholder="Masukkan hal" id="hal">
        </br>

        <label for="tgl_keluar">Tanggal Keluar: </label>
        <input type="text" name="tgl_keluar" placeholder="Masukkan Tanggal Keluar" id="tgl_keluar">
        </br>

        <label for="jabatan_penulis">Jabatan Penulis: </label>
        <input type="text" name="jabatan_penulis" placeholder="Masukkan Jabatan Penulis" id="jabatan_penulis">
        </br>
        <button type="submit">Save</button>
    </form>
</body>
</html>