<?php

$id = isset($masuk) ? $masuk->id : "";
$judul = isset($masuk) ? $masuk->judul : "";
$file = isset($masuk) ? $masuk->file : "";
$status = isset($masuk) ? $masuk->status : "";
$surat_user = isset($masuk) ? $masuk->user : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($masuk) ? "Ubah" : "Simpan";
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Letters Management</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hello'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Letters Management</li>
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
                  <input type="hidden" name="tgl_kirim" value="<?php echo $surat_user; ?>">  
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
                    <div class="form-group">
                    <label for="select2Single">Status Surat</label>
                    <?php if ($v !== "") { 
                      
                      if ($status == 1) {
                            echo "Dikirim";
                          } elseif ($status == 2) {
                            echo "Dibaca";
                          } elseif ($status == 3) {
                            echo "Prmintaan Surat Balasan";
                          } 

                     } else { ?>
                      
                      <select class="select2-single form-control" name="status" id="select2Single">
                      <?php if (isset($masuk)) { ?>

                        <option value="<?php echo $status; ?>">
                          <?php 
                          if ($status == 1) {
                            echo "Dikirim";
                          } elseif ($status == 2) {
                            echo "Dibaca";
                          } elseif ($status == 3) {
                            echo "Prmintaan Surat Balasan";
                          } 
                           
                          ?>
                        </option>
                          
                      <?php } else { ?>
                        
                        <option value="">Select Status</option>

                      <?php   } ?>
                     
                      <option value="1">Dikirim</option>
                      <option value="2">Dibaca</option>
                      <option value="3">Permintaan Surat Balasan</option>
                    </select>

                    <?php }?>
                   
                  </div>

                  <div class="form-group">
                    <label for="select2Multiple">Dikirim Ke</label>
                    <?php if ($v == "") { ?>
                      
                      <select class="select2-multiple form-control" name="users[]" multiple="multiple"
                          id="select2Multiple">
                          <option value="">Select Penerima</option>
                          <?php foreach ($users as $key => $user) { ?>
                          <option value="<?php echo $user['id']; ?>"><?php echo $user['name'] ?></option>
                        <?php } ?>
                      </select>
                            <br />
                   <?php  } 
                   if($surat_user != "") { ?>
                          <b>Penerima : <?php echo $surat_user;  ?></b>
                       <?php } ?>  
                     </ol>                   
                  </div>

                    <?php if ($v == "") { ?>
                      <button type="submit" class="btn btn-primary"><?php echo $btn; ?></button>
                    <?php }?>
                    <a href="/masuk" class="btn btn-primary" >Kembali</a>
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

   