<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Surat Masuk</title>
</head>
<body>
    <form action="/surat/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $masuk->id; ?>" >
        <label for="judul">Judul: </label>
        <input type="text" name="judul" placeholder="Masukkan Judul" id="judul" value="<?php echo $masuk->judul; ?>">
        </br>

        <label for="file">Upload File </label>
        <input type="file" name="file" id="file" onchange= "ValidateSingleInput(this)">
        <a href="<?php echo base_url()."/uploads/".$masuk->file; ?>" target="_blank"><?php echo $masuk->file; ?></a>
        </br>

        <label for="status">Status Surat: </label>
        <select name="status" id="status"required>
            <option value= "<?php echo $masuk->status; ?>" selected> <?php 
            if ($masuk->status == 1 ) {
                echo "surat dikirim";
            } else if ($masuk->status == 2){
                echo "surat dibaca";
            } else if ($masuk->status == 3){
                echo "permintaan surat balasan";
            }
            
            ?> </option>
            <option value="1"> Dikirim </option>
            <option value="2"> Dibaca </option>
            <option value="3"> Permintaan surat balasan </option>
        </select>
        </br>
        <button type="submit">Save</button>
    </form>

    <script>

    var _ValidateFileExtension = [".pdf"];
    function ValidateSingleInput(oinput){
        if (oinput.type == "file"){
            var sFileName = oinput.value;
            if (sFileName.length > 0) {
                var blnValid = false ;
                for (let index = 0; index < _ValidateFileExtension.length; index++) {
                    const element = _ValidateFileExtension[index];
                    if (sFileName.substr(sFileName.length - element.length, element.length).toLowerCase()
                    == element.toLowerCase()){
                        blnValid = true;
                        break;
                    }
                }
            }
            if (!blnValid) {
                alert ("maaf, " + sFileName + "invalid, system hanya bisa menerima file dalam bentuk "+_ValidateFileExtension.join(""));
                oinput.value = "";
                return false;

            }
        }
        return true;
    }
    </script>

</body>
</html>