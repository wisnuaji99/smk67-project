<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Surat Masuk</title>
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
            <th>No</th>
            <th>Judul Surat </th>
            <th>File </th>
            <th>Dikirim Ke </th>
            <th>Status Surat</th>
            <th>Action</th>
        </tr>
        <?php 
        $no = 1;
        foreach($user3 as $row ) : ?>
        <tr>
           
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td> <a href="<?php echo base_url()."/uploads/".$row['file'] ?>" download> <?php echo $row['file']; ?></a>
                </td>
                <td></td>
                <td><?php
                if ($row['status'] == 1) {
                    echo "dikirim";
                } else if($row['status']== 2) {
                    echo "dibaca";
                } else if ($row['status']== 3) {
                    echo "Permintaan Surat Balasan";
                }
                 
                 ?></td>
                <td>
                    <a href="/masuk/edit/<?php echo $row['id']?>">Edit</a> |
                    <a href="/masuk/view/<?php echo $row['id']?>">View</a> |
                    <a href="/masuk/delete/<?php echo $row['id'] ?>">Delete</a>
            </td>

           
        </tr>
        <?php endforeach;?>
    </table>
    <br />

    <
    <a href="/masuk/add">Tambah Data</a>
</body>
</html>