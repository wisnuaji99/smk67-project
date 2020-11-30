  <!-- Bootstrap DatePicker -->  
  <link href="<?php echo base_url().'/template/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'?>" rel="stylesheet" type="text/css">
  <!-- Bootstrap Touchspin -->
  <link href="<?php echo base_url().'/template/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css'?>" rel="stylesheet" type="text/css">
  <!-- ClockPicker -->
  <link href="<?php echo base_url().'/template/vendor/clock-picker/clockpicker.css'?>" rel="stylesheet" type="text/css">

<?php

$id = isset($template) ? $template->id : "";
$nomor = isset($template) ? $template->nomor : "";
$sifat = isset($template) ? $template->sifat : "";
$lampiran = isset($template) ? $template->lampiran : "";
$hal = isset($template) ? $template->hal : "";
$tgl_keluar = isset($template) ? $template->tgl_keluar : "";
$jabatan_penulis = isset($template) ? $template->jabatan_penulis : "";
$user_id = isset($template) ? $template->user_id : "";
$created_by = isset($template) ? $template->created_by : "";
$isi = isset($template) ? $template->isi : "";
$user_data_id = isset($template) ? "" : $user_data_id;
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
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                  <input type="hidden" name="user_data_id" value="<?php echo $user_data_id; ?>">
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
                      <label for="editor">Isi Surat</label>
                      <textarea class="form-control" id="editor" name="isi" rows="3"><?php echo $isi; ?></textarea>
                      <small id="editor" class="form-text text-muted">Input ISI properly.</small>
                    </div>

                   

                    <div class="form-group" id="simple-date1">
                    <label for="simpleDataInput">Tanggal Keluar</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" name="tgl_keluar"  placeholder="Enter Tanggal Keluar" value="<?php echo $tgl_keluar?>" id="simpleDataInput" 
                        <?php echo $v; ?> required>
                      </div>
                  </div>

                    <div class="form-group">
                      <label for="jabatan_penulis">Ditujukkan kepada</label>
                      <input type="text" class="form-control" id="jabatan_penulis" name="jabatan_penulis" aria-describedby="jabatan_penulis"
                        placeholder="Enter Ditujukan Kepada" value="<?php echo $jabatan_penulis?>" <?php echo $v; ?> required>
                      <small id="jabatan_penulis" class="form-text text-muted">Input Ditujukan Kepada Properly.</small>
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

     <!-- Bootstrap Datepicker -->
  <script src="<?php echo base_url().'/template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'?>"></script>
  <!-- Bootstrap Touchspin -->
  <script src="<?php echo base_url().'/template/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js'?>"></script>
  <!-- ClockPicker -->
  <script src="<?php echo base_url().'/template/vendor/clock-picker/clockpicker.js'?>"></script>

  <!-- Javascript for this page -->
  <script>
    $(document).ready(function () {


      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      

      // Select2 Multiple
      $('.select2-multiple').select2();

      // Bootstrap Date Picker
      $('#simple-date1 .input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
      });

      $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date3 .input-group.date').datepicker({
        startView: 2,
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });

      $('#simple-date4 .input-daterange').datepicker({        
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });    

      // TouchSpin

      $('#touchSpin1').TouchSpin({
        min: 0,
        max: 100,                
        boostat: 5,
        maxboostedstep: 10,        
        initval: 0
      });

      $('#touchSpin2').TouchSpin({
        min:0,
        max: 100,
        decimals: 2,
        step: 0.1,
        postfix: '%',
        initval: 0,
        boostat: 5,
        maxboostedstep: 10
      });

      $('#touchSpin3').TouchSpin({
        min: 0,
        max: 100,
        initval: 0,
        boostat: 5,
        maxboostedstep: 10,
        verticalbuttons: true,
      });

      $('#clockPicker1').clockpicker({
        donetext: 'Done'
      });

      $('#clockPicker2').clockpicker({
        autoclose: true
      });

      let input = $('#clockPicker3').clockpicker({
        autoclose: true,
        'default': 'now',
        placement: 'top',
        align: 'left',
      });

      $('#check-minutes').click(function(e){        
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
      });

    });
  </script>