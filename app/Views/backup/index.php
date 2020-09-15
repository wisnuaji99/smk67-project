<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel template</title>
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
            <th>ID</th>
            <th>Judul Surat </th>
            <th>File </th>
            <th>Tanggal Disimpan</th>
            <th>Disimpan Oleh</th>
            <th>Action</th>
        </tr>
        <?php foreach($user3 as $row ) : ?>
        <tr>
           
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['file']; ?></td>
                <td><?php echo $row['tgl_simpan']; ?></td>
                <td><?php echo $row['disimpan_oleh']; ?></td>
                <td>
                    <a href="/backup/edit/<?php echo $row['id']?>">Edit</a>
                    <a href="/backup/view/<?php echo $row['id'] ?>">View</a>
                    <a href="/backup/delete/<?php echo $row['id'] ?>">Delete</a>
                </td>

           
        </tr>
        <?php endforeach;?>
    </table>
    <br />
    <a href="/backup/add">Tambah Data</a>
</body>
</html>