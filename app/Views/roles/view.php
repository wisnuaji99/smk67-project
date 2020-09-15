<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Role</title>
</head>
<body>
    <form action="" method="">
        
        <label for="role"> Role: </label>
        <input type="text" name="role"  id="role" value="<?php echo $role->name_role; ?>" readonly>
       <a href="/role">Kembali</a>
    </form>
</body>
</html>