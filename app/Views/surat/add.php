<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Masuk</title>
</head>
<body>
    <form action="/surat/save" method="post" enctype="multipart/form-data">
    
        <label for="judul">Judul: </label>
        <input type="text" name="judul" placeholder="Masukkan Judul" id="judul">
        </br>

        <label for="file">Upload File </label>
        <input type="file" name="file" id="file" onchange="ValidateSingleInput(this)">
       
        </br>

        <label for="status">Status Surat: </label>
        <select name="status" id="status"required>
            <option value= "" selected> pilih status </option>
            <option value="1"> Dikirim </option>
            <option value="2"> Dibaca </option>
            <option value="3"> Permintaan surat balasan </option>

        </select>
        </br>
        <button type="submit">Save</button>
    </form>

    <script>
        var _validateFileExtentions = [".pdf"];
        function ValidateSingleInput(oInput) {
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false ;
                    for (let index = 0; index < _validateFileExtentions.length; index++) {
                        const element = _validateFileExtentions[index];
                        if (sFileName.substr(sFileName.length - element.length, element.length).toLowerCase()
                        == element.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }
                }

                if (!blnValid) {
                    alert("Maaf, "+ sFileName + " invalid , sistem hanya menerima ekstensi file : "+_validateFileExtentions.join(""));
                    oInput.value = "";
                    return false;
                }
                
            }
            return true;
        } 
    </script>
</body>
</html>