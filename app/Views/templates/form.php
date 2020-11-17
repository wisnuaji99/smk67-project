<?php

$id = isset($template) ? $template->id : "";
$nomor = isset($template) ? $template->judul_surat : "";
$sifat = isset($template) ? $template->file_surat : "";
$lampiran = isset($template) ? $template->nama_penerima : "";
$hal = isset($template) ? $template->waktu : "";
$tgl_keluar = isset($template) ? $template->pengirim : "";
$jabatan_penulis = isset($template) ? $template->status : "";
$v = isset($v) ? "readonly" : "";
$btn = isset($template) ? "Ubah" : "Simpan";
?>
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Letter Template</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/hello'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Letter Template</li>
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
                      <label for="nomor">Nomor</label>
                      <input type="text" class="form-control" id="nomor" name="nomor" aria-describedby="nomor"
                        placeholder="Enter Number" value="<?php echo $nomor?>" <?php echo $v; ?> required>
                      <small id="nomor" class="form-text text-muted">Input Nomor Properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="sifat">Sifat</label>
                      <input type="text" class="form-control" id="sifat" name="sifat" aria-describedby="sifat"
                        placeholder="Enter Sifat" value="<?php echo $sifat?>" <?php echo $v; ?> required>
                      <small id="sifat" class="form-text text-muted">Input Sifat Surat properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="lampiran">Lampiran</label>
                      <input type="text" class="form-control" id="lampiran" name="lampiran" aria-describedby="lampiran"
                        placeholder="Enter Lampiran" value="<?php echo $lampiran?>" <?php echo $v; ?> required>
                      <small id="lampiran" class="form-text text-muted">Input Lampiran properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="perihal">Perihal</label>
                      <input type="text" class="form-control" id="perihal" name="perihal" aria-describedby="perihal"
                        placeholder="Enter Perihal" value="<?php echo $hal?>" <?php echo $v; ?> required>
                      <small id="perihal" class="form-text text-muted">Input Perihal properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="editor">ISI</label>
                      <textarea class="form-control" id="editor" rows="3"></textarea>
                      <small id="editor" class="form-text text-muted">Input ISI properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="tgl_keluar">Tanggal Keluar</label>
                      <input type="text" class="form-control" id="tgl_keluar" name="tgl_keluar" aria-describedby="tgl_keluar"
                        placeholder="Enter Tanggal Keluar" value="<?php echo $tgl_keluar?>" <?php echo $v; ?> required>
                      <small id="tgl_keluar" class="form-text text-muted">Input Tanggal Keluar properly.</small>
                    </div>

                    <div class="form-group">
                      <label for="jabatan_penulis">Jabatan Penulis</label>
                      <input type="text" class="form-control" id="jabatan_penulis" name="jabatan_penulis" aria-describedby="jabatan_penulis"
                        placeholder="Enter jabatan penulis" value="<?php echo $jabatan_penulis?>" <?php echo $v; ?> required>
                      <small id="jabatan_penulis" class="form-text text-muted">Input Jabatan Penulis properly.</small>
                    </div>
               
                  
                    <?php if ($v == "") { ?>
                      <button type="submit" class="btn btn-primary"><?php echo $btn; ?></button>
                    <?php }?>
                    <a href="/template" class="btn btn-primary" >Kembali</a>
                  </form>
                </div>
              </div>
            </div>
        </div>
        
        <script src="<?php echo base_url().'/ckeditor5/ckeditor.js'?>"></script>
        <style>
        .ck-editor__editable_inline{
            min-height: 200px;
        }
    </style>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>