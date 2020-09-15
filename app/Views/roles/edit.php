<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Role</title>
</head>
<body>
    <form action="/role/update" method="post">
        <input type="hidden" name="id" value="<?php echo $role->id; ?>" >
        <label for="role">Masukkan Role: </label>
        <input type="text" name="role" placeholder="Masukkan Role" id="role" value="<?php echo $role->name_role; ?>">
        <button type="submit">Save</button>
    </form>
</body>
</html>