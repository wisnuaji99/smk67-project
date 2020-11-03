<?php

$id = isset($backup) ? $backup->id : "";
$nomor_surat = isset($backup) ? $backup->nomor : "";
$judul = isset($backup) ? $backup->judul : "";
$file = isset($backup) ? $backup->file : "";

$v = isset($v) ? "readonly" : "";
$btn = isset($backup) ? "Ubah" : "Simpan";
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Letters Backup</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hello'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Letters Backups</li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $arr; ?></li>
            </ol>
          </div>
       
       <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                </div>
                <div class="card-body">
                  <form action="<?php echo site_url($urlmethod) ?>" method="post"  enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                  <div class="form-group">
                      <label for="nomor">Nomor Surat</label>
                      <input type="text" class="form-control" id="nomor" name="nomor" aria-describedby="nomor"
                        placeholder="Enter nomor" value="<?php echo $nomor_surat; ?>" <?php echo $v; ?> required autocomplete="off">
                      <small id="nomor" class="form-text text-muted">Input Nomor Surat  properly.</small>
                    </div>
                  <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul"
                        placeholder="Enter Judul" value="<?php echo $judul?>" <?php echo $v; ?> required>
                      <small id="judul" class="form-text text-muted">Input Judul Surat properly.</small>
                  </div>
                    <div class="form-group">
                    <div class="custom-file">
                        <?php if($v == ""){ ?>

                          <label class="custom-file-label" for="file" id="setFile">Masukan File</label>
                        <input type="file" class="custom-file-input" id="file" name="file" onchange="ValidateSingleInput(this);" >
                      <br/>
                        <small id="file" class="form-text text-muted">Input File properly.</small>

                        <?php }?>
                        
                        <?php if ($file !== "") { ?>
                          <a class="btn btn-success" 
                                href="<?php echo base_url().'/uploads/'.$file?>"  data-toggle="tooltip" data-html="true" 
                                title="Tombol Download File" download>
                              <i class="fa fa-download"></i> Download FIle Sebelumnya</a>
                      <?php } ?>
                    </div>
                        </div>

                  
                    <?php if ($v == "") { ?>
                      <button type="submit" class="btn btn-primary"><?php echo $btn; ?></button>
                    <?php }?>
                    <a href="/backup" class="btn btn-primary" >Kembali</a>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <script>
        var _validateFileExtentions = [".pdf"];
        function ValidateSingleInput(oInput) {
          $('#setFile').text(oInput.value);
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

   