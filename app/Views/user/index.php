<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel User</title>
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
            <th>Nama </th>
            <th>Alamat </th>
            <th>Level User </th>
            <th>No Telpon </th>
            <th>Action</th>
        </tr>
        <?php 
        $no = 1;
        foreach($user3 as $row ) : ?>
        <tr>
           
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['name_role']; ?></td>
                <td><?php echo $row['no_telp']; ?></td>
                <td>
                    <a href="/user/edit/<?php echo $row['id']?>">Edit |</a>
                    <a href="/user/View/<?php echo $row['id']?>">View |</a>
                    <a href="/user/delete/<?php echo $row['id'] ?>">Delete</a>
                
                </td>

           
        </tr>
        <?php endforeach;?>
    </table>
    <br />
    <a href="/user/add">Tambah Data</a>
</body>
</html>