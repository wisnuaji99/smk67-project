<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Roles</title>
</head>
<body>
<?php 
    if(session()->getFlashData('danger')){
    ?>
    <script>
        alert( '<?php echo session()->getFlashData('danger') ?>');
    </script>
       
      
    <?php
    }
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama Role</th>
            <th>Action</th>
        </tr>
        <?php 
        $no = 1;
        foreach($roles as $row ) : ?>
        <tr>
           
                <td><?php echo $no++?></td>
                <td><?php echo $row['name_role']; ?></td>
                <td>
                    <a href="/role/edit/<?php echo $row['id']?>">Edit</a> |
                    <a href="/role/view/<?php echo $row['id'] ?>">View</a> |
                    <a href="/role/delete/<?php echo $row['id'] ?>">Delete</a>
                </td>
           
        </tr>
        <?php endforeach;?>
    </table>
    <br />
    <a href="/role/add">Tambah Data</a>
</body>
</html>