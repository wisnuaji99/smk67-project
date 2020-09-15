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
            <th>Nomor </th>
            <th>Sifat </th>
            <th>Lampiran </th>
            <th>Perihal </th>
            <th>Tanggal Keluar</th>
            <th>Jabatan Penulis</th>
            <th>Action</th>
        </tr>
        <?php foreach($user3 as $row ) : ?>
        <tr>
           
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nomor']; ?></td>
                <td><?php echo $row['sifat']; ?></td>
                <td><?php echo $row['lampiran']; ?></td>
                <td><?php echo $row['hal']; ?></td>
                <td><?php echo $row['tgl_keluar']; ?></td>
                <td><?php echo $row['jabatan_penulis']; ?></td>
                <td>
                    <a href="/template/edit/<?php echo $row['id']?>">Edit</a> |
                    <a href="/template/view/<?php echo $row['id']?>">View</a> |
                    <a href="/template/delete/<?php echo $row['id'] ?>">Delete</a>
            </td>

           
        </tr>
        <?php endforeach;?>
    </table>
    <br />
    <a href="/template/add">Tambah Data</a>
</body>
</html>