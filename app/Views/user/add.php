<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penambahan Role</title>
</head>
<body>
    <form action="/user/save" method="post">
        <label for="role">Masukkan Nama: </label>
        <input type="text" name="nama" placeholder="Masukkan Nama" id="nama" required> 
        </br>

        <label for="role">Masukkan Alamat: </label>
        <input type="text" name="alamat" placeholder="Masukkan Alamat" id="alamat" required>
        </br>

        <label for="role">Masukkan role: </label>
        <select name="role" id="role" required>
            <option value="" selected>Pilih Role</option>
            <?php foreach ($roles as  $role) { ?>
                <option value="<?php echo $role['id']?>"><?php echo $role['name_role']?></option>
           <?php  } ?>
        </select>
        
        </br>

        <label for="role">Masukkan Nomor Telepon: </label>
        <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" id="no_telp" required>
        </br>
        <button type="submit">Save</button>
    </form>
</body>
</html>