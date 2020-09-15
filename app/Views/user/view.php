<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form view</title>
</head>
<body>
    <form action="" method="">
        <input type="hidden" name="id" value="<?php echo $user->id; ?>" >
        <label for="role">Masukkan Nama: </label>
        <input type="text" name="nama"  id="nama"value="<?php echo $user->name; ?>"readonly>
        </br>

        <label for="role">Masukkan Alamat: </label>
        <input type="text" name="alamat"  id="alamat"value="<?php echo $user->alamat; ?>"readonly>
        </br>

        <label for="role">Masukkan role: </label>
        <input type="text" name="role"  id="role" value="<?php echo $user->name_role; ?>" readonly>
        </br>

        <label for="role">Masukkan Nomor Telepon: </label>
        <input type="text" name="no_telp"  id="no_telp"value="<?php echo $user->no_telp; ?>"readonly>
        </br>
        <a href="/user">Kembali</a>
    </form>
</body>
</html>