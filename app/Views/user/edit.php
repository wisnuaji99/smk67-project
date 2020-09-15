<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penambahan Role</title>
</head>
<body>
    <form action="/user/update" method="post">
        <input type="hidden" name="id" value="<?php echo $user->id; ?>" >
        <label for="role">Masukkan Nama: </label>
        <input type="text" name="nama" placeholder="Masukkan Nama" id="nama"value="<?php echo $user->name; ?>">
        </br>

        <label for="role">Masukkan Alamat: </label>
        <input type="text" name="alamat" placeholder="Masukkan Alamat" id="alamat"value="<?php echo $user->alamat; ?>">
        </br>

        <label for="role">Masukkan role: </label>
        <select name="role" id="role">
            <option value="<?php echo $user->role_id?>" selected><?php echo $user->name_role?></option>
            <?php foreach ($roles as $role) { ?>
            <option value="<?php echo $role["id"]?>"><?php echo $role["name_role"]; ?></option>
            <?php }?>
        </select>
        </br>

        <label for="role">Masukkan Nomor Telepon: </label>
        <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" id="no_telp"value="<?php echo $user->no_telp; ?>">
        </br>
        <button type="submit">Save</button>
    </form>
</body>
</html>